<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Name: PAS Deep Search Model
*
* Author: 
* Jifeng Sun
* rob@asmex.com.au
*
* Copyright 2014 Jifeng Sun
*
* Description: Prêt à Styler 2.0 Deep Search model.
* Released: 17/12/2014
* Requirements: PHP5 or above and Codeigniter 2.0+
*/

class Deep_search_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Read Deep Search Info
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	/**
	 * get_available_categories
	 * Read category's
	 * Returning category info
	 *
	 * @return category array if existed, if not return FALSE
	 */
	public function get_available_categories(){
		$this->db->select('*')->from('category')->order_by('order', 'asc')->limit(10,0);
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return FALSE;
		}
		$return_array = $query->result_array();
		return $return_array;
	}
	/**
	 * get_static_data
	 * Read category's
	 * Returning category info
	 *
	 * @return category array if existed, if not return FALSE
	 */
	public function get_static_data(){
		$this->db->select('*')->from('category')->order_by('order', 'asc');
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return FALSE;
		}
		$static_array = $query->result_array();
		foreach ($static_array as $category_key => $category_value) {
			$this->db->select('category_field.field_id, short_name, position')->from('category_field')->join('field', 'category_field.field_id = field.field_id', 'right')->where('category_id', $category_value['category_id'])->order_by('position', 'asc');
			$query = $this->db->get();
			if ($query->num_rows() == 0){
				return FALSE;
			}
			$fields = $query->result_array();
			$static_array[$category_key]['fields'] = $fields;
			
			foreach ($fields as $field_key => $field_value) {
				$this->db->select('criteria_id, name, tooltip, position, image_path')->from('criteria')->where('field_id', $field_value['field_id'])->order_by('position', 'asc');
				$query = $this->db->get();
				if ($query->num_rows() == 0){
					return FALSE;
				}
				$criterias = $query->result_array();
				$static_array[$category_key]['fields'][$field_key]['criterias'] = $criterias;
			}
		}
		return $static_array;
	}

	/**
	 * get_initial_field_criteria
	 * Read category's
	 * Returning category info
	 *
	 * @return category array if existed, if not return FALSE
	 */
	public function get_initial_field_criteria($category_id){
		$initial_array = array();
		$this->db->select('category_field.field_id')->from('category_field')->join('field', 'category_field.field_id = field.field_id', 'right')->where(array('category_id' => $category_id, 'deep_search_level' => 1))->order_by('position', 'asc');
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return FALSE;
		}
		$field_id = $query->row()->field_id;
		return $this->get_new_field_criteria($category_id, $field_id, array(), FALSE, array());
	}
	/**
	 * get_new_field_criteria
	 * Read category's
	 * Returning category info
	 *
	 * @return category array if existed, if not return FALSE
	 */
	public function get_new_field_criteria($category_id, $field_id, $selected_criteria_ids, $is_button = FALSE, $array_criteria_ids){
		$new_array = array();
		if ($is_button){
			//need to get new field_id
			$this->db->select('category_field.field_id, showif, hideif, deep_search_level, position')->from('category_field')->join('field', 'category_field.field_id = field.field_id', 'right')->where(array('category_id' => $category_id, 'deep_search_level >=' => 1))->order_by('position', 'asc');
			$query = $this->db->get();
			if ($query->num_rows() == 0){
				return FALSE;
			}
			$fields = $query->result_array();
			//make a big number
			$position = 999;
			foreach ($fields as $field_key => $field_value) {
				if ($field_value['field_id'] == $field_id) {
					$position = $field_value['position'];
				}
				if ($this->judge_field_by_criteria_id($field_value['showif'], $field_value['hideif'], $selected_criteria_ids)){
					if ($field_value['position'] > $position){
						$new_array['new_field_id'] = $field_value['field_id'];
						break;
					}
				}
			}
		} else {
			//use existing one
			$new_array['new_field_id'] = $field_id;
		}
		//find the parent field id and level
		$this->db->select('deep_search_level, deep_search_parent_field_id, position')->from('field')->where(array('field_id' => $new_array['new_field_id']));
		$field_data = $this->db->get()->row();
		$level = $field_data->deep_search_level;
		$parent_field_id = $field_data->deep_search_parent_field_id;
		$position = $field_data->position;
		//last one check
		$this->db->select('max(position) as max_position')->from('category_field')->join('field', 'category_field.field_id = field.field_id', 'right')->where(array('category_id' => $category_id, 'deep_search_level >=' => 1));
		$max_position = $this->db->get()->row()->max_position;
		if ($position >= $max_position) {
			$new_array['last_one'] = TRUE;
		} else {
			$new_array['last_one'] = FALSE;
		}
		//find children for the current top level
		$children = array();
		if ($level == 3) {
			//if it is deepest level
			
		} else if ($level == 2){
			//if it is middle level
			$this->db->select('field_id, deep_search_name, position, showif, hideif, deep_search_required_field_id')->from('field')->where(array('deep_search_parent_field_id' => $parent_field_id))->order_by('position', 'asc');
			$query = $this->db->get();
			$children = $query->result_array();
			foreach ($children as $child_key => $child_value){
				if ($this->judge_field_by_criteria_id($child_value['showif'], $child_value['hideif'], $selected_criteria_ids)){
					$children[$child_key]['judged'] = TRUE;
					if ($child_value['deep_search_required_field_id']){
						//check if the required field is answered
						if (!empty($array_criteria_ids[$child_value['deep_search_required_field_id']])) {
							$children[$child_key]['clickable'] = TRUE;
						} else {
							$children[$child_key]['clickable'] = FALSE;
						}
					} else {
						//this child field doesn't have any requirement
						$children[$child_key]['clickable'] = TRUE;
					}
				} else {
					$children[$child_key]['judged'] = FALSE;
					$children[$child_key]['clickable'] = FALSE;
				}
				if ($new_array['new_field_id'] == $child_value['field_id']){
					$children[$child_key]['selected'] = TRUE;
				} else {
					$children[$child_key]['selected'] = FALSE;
				}
				unset($children[$child_key]['showif']);
				unset($children[$child_key]['hideif']);
			}
		} else if ($level == 1){
			//if it is top level
			$this->db->select('field_id, deep_search_name, position, showif, hideif, deep_search_required_field_id')->from('field')->where(array('deep_search_parent_field_id' => $new_array['new_field_id']))->order_by('position', 'asc');
			$query = $this->db->get();
			$children = $query->result_array();
			foreach ($children as $child_key => $child_value){
				if ($this->judge_field_by_criteria_id($child_value['showif'], $child_value['hideif'], $selected_criteria_ids, TRUE)){
					if ($child_value['deep_search_required_field_id']){
						//check if the required field is answered
						if (!empty($array_criteria_ids[$child_value['deep_search_required_field_id']])) {
							$children[$child_key]['clickable'] = TRUE;
						} else {
							$children[$child_key]['clickable'] = FALSE;
						}
					} else {
						//this child field doesn't have any requirement
						$children[$child_key]['clickable'] = TRUE;
					}
				} else {
					$children[$child_key]['clickable'] = FALSE;
				}
				$children[$child_key]['selected'] = FALSE;
				unset($children[$child_key]['showif']);
				unset($children[$child_key]['hideif']);
			}
		} else {
			return FALSE;
		}
		//use current field id to generate field list
		$this->db->select('category_field.field_id, deep_search_name, position, showif, hideif')->from('category_field')->join('field', 'category_field.field_id = field.field_id', 'right')->where(array('category_id' => $category_id, 'deep_search_level' => 1))->order_by('position', 'asc');
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return FALSE;
		}
		$new_array['fields'] = $query->result_array();
		
		foreach ($new_array['fields'] as $field_key => $field_value) {
			if ($level == 3) {
				
			} else if ($level == 2){
				if ($this->judge_field_by_criteria_id($field_value['showif'], $field_value['hideif'], $selected_criteria_ids)){
					$new_array['fields'][$field_key]['clickable'] = TRUE;
				} else {
					$new_array['fields'][$field_key]['clickable'] = FALSE;
				}
				if ($field_value['field_id'] == $parent_field_id){
					$new_array['fields'][$field_key]['selected'] = TRUE;
					$new_array['fields'][$field_key]['children'] = $children;
				} else {
					$new_array['fields'][$field_key]['selected'] = FALSE;
				}
			} else if ($level == 1){
				if ($this->judge_field_by_criteria_id($field_value['showif'], $field_value['hideif'], $selected_criteria_ids)){
					$new_array['fields'][$field_key]['clickable'] = TRUE;
				} else {
					$new_array['fields'][$field_key]['clickable'] = FALSE;
				}
				if ($field_value['field_id'] == $new_array['new_field_id']){
					$new_array['fields'][$field_key]['selected'] = TRUE;
					if (!empty($children)){
						$new_array['fields'][$field_key]['children'] = $children;
					}
				} else {
					$new_array['fields'][$field_key]['selected'] = FALSE;
				}
			}
			if ($field_value['field_id'] == $new_array['new_field_id']){
				$new_array['fields'][$field_key]['selected'] = TRUE;
			} else {
				$new_array['fields'][$field_key]['selected'] = FALSE;
			}
			unset($new_array['fields'][$field_key]['showif']);
			unset($new_array['fields'][$field_key]['hideif']);
		}
		//generate criteria infos
		$this->db->select('criteria_id, name, tooltip, position, image_path, showif, hideif')->from('criteria')->where(array('field_id' => $new_array['new_field_id'], 'weight <>' => 'CT'))->order_by('position', 'asc');
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return FALSE;
		}
		$criterias = $query->result_array();
		foreach ($criterias as $criteria_key => $criteria_value) {
			if ($this->judge_criteria_by_criteria_id($criteria_value['showif'], $criteria_value['hideif'], $selected_criteria_ids)){
				unset($criterias[$criteria_key]['showif']);
				unset($criterias[$criteria_key]['hideif']);
			} else {
				unset($criterias[$criteria_key]);
			}
		}
		$new_array['criterias'] = $criterias;
		return $new_array;
	}
	private function judge_field_by_criteria_id($showif, $hideif, $selected_criteria_ids, $strict = FALSE){
		if (empty($selected_criteria_ids)){
			return !$strict;
		} else if (empty($showif) && empty($hideif)){
			return TRUE;
		} else if (!empty($showif) && empty($hideif)){
			foreach ($selected_criteria_ids as $criteria_id){
				if (strpos($showif, $criteria_id) !== FALSE){
					return TRUE;
				}
			}
			return FALSE;
		} else if (empty($showif) && !empty($hideif)){
			foreach ($selected_criteria_ids as $criteria_id){
				if (strpos($hideif, $criteria_id) !== FALSE){
					return FALSE;
				}
			}
			return TRUE;
		} else {
			foreach ($selected_criteria_ids as $criteria_id){
				if (strpos($hideif, $criteria_id) !== FALSE){
					return FALSE;
				}
			}
			foreach ($selected_criteria_ids as $criteria_id){
				if (strpos($showif, $criteria_id) !== FALSE){
					return TRUE;
				}
			}
			return FALSE;
		}
		return FALSE;
	}
	private function judge_criteria_by_criteria_id($showif, $hideif, $selected_criteria_ids, $strict = FALSE){
		if (empty($selected_criteria_ids)){
			return !$strict;
		} else if (empty($showif) && empty($hideif)){
			return TRUE;
		} else if (!empty($showif) && empty($hideif)){
			foreach ($selected_criteria_ids as $criteria_id){
				if (strpos($showif, $criteria_id) !== FALSE){
					return TRUE;
				}
			}
			return FALSE;
		} else if (empty($showif) && !empty($hideif)){
			foreach ($selected_criteria_ids as $criteria_id){
				if (strpos($hideif, $criteria_id) !== FALSE){
					return FALSE;
				}
			}
			return TRUE;
		} else {
			foreach ($selected_criteria_ids as $criteria_id){
				if (strpos($hideif, $criteria_id) !== FALSE){
					return FALSE;
				}
			}
			foreach ($selected_criteria_ids as $criteria_id){
				if (strpos($showif, $criteria_id) !== FALSE){
					return TRUE;
				}
			}
			return FALSE;
		}
		return FALSE;
	}
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Insert Deep Search Info
		###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

}
/* End of file deep_search_model.php */
/* Location: ./application/models/deep_search_model.php */
?>