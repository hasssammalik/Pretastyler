<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Name: PAS Admin Model
*
* Author: 
* Jifeng Sun
* rob@asmex.com.au
*
* Copyright 2014 Jifeng Sun
*
* Description: Prêt à Styler 2.0 Admin model, contains methods to CRUD a garment.
* Released: 28/10/2014
* Requirements: PHP5 or above and Codeigniter 2.0+
*/

class Admin_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	
	/**
	 * get_garment_info
	 * Read garment's info by garment_id 
	 * Returning url, image, ...
	 *
	 * @return garment array if existed, if not return FALSE
	 */
	public function get_fields_by_category_id($category_id = FALSE){
		if ($category_id) {
			$query = $this->db->select('field.field_id, field.position, field.name')->from('field')->join('category_field','field.field_id = category_field.field_id')->join('category','category.category_id = category_field.category_id')->where('category.category_id', $category_id)->order_by('position', 'asc')->get();
			if ($query->num_rows() >= 1){
				return $query->result_array();
			} else {
				return array();
			}
		} else {
			return FALSE;
		}
	}
	/**
	 * get_field_by_field_id
	 * Read garment's info by garment_id 
	 * Returning url, image, ...
	 *
	 * @return garment array if existed, if not return FALSE
	 */
	public function get_field_by_field_id($field_id = FALSE){
		if ($field_id) {
			$query = $this->db->select('*')->from('field')->join('category_field','field.field_id = category_field.field_id')->where('field.field_id', $field_id)->get();
			if ($query->num_rows() >= 1){
				return $query->row_array();
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}
	/**
	 * get_criterias_by_field_id
	 * Read garment's info by garment_id 
	 * Returning url, image, ...
	 *
	 * @return garment array if existed, if not return FALSE
	 */
	public function get_criterias_by_field_id($field_id = FALSE){
		if ($field_id) {
			$query = $this->db->order_by('position', 'asc')->get_where('criteria', array('field_id' => $field_id));
			if ($query->num_rows() >= 1){
				return $query->result_array();
			} else {
				return array();
			}
		} else {
			return FALSE;
		}
	}
	/**
	 * get_showif_hideif_list
	 * Read garment's info by garment_id 
	 * Returning url, image, ...
	 *
	 * @return garment array if existed, if not return FALSE
	 */
	public function get_showif_hideif_list($category_id = FALSE, $position = FALSE, $showif = FALSE, $hideif = FALSE){
		if ($category_id) {
			$query_str = "SELECT pas_criteria.field_id, pas_field.`name`, group_concat(pas_criteria.criteria_id ORDER BY pas_criteria.position, pas_criteria.criteria_id SEPARATOR '|') AS criteria_ids, group_concat(pas_criteria.`name` ORDER BY pas_criteria.position, pas_criteria.criteria_id SEPARATOR '|') AS criteria_names FROM pas_criteria JOIN pas_category_field ON pas_category_field.field_id = pas_criteria.field_id JOIN pas_field ON pas_field.field_id = pas_criteria.field_id WHERE pas_category_field.category_id = ? AND pas_field.position < ? GROUP BY pas_criteria.field_id ORDER BY pas_field.position";
			$query = $this->db->query($query_str, array($category_id, $position));
			if ($query->num_rows() >= 1){
				$result = $query->result_array();
				$showifs = array();
				$hideifs = array();
				foreach ($result as $row){
					$field_id = $row['field_id'];
					$field_name = $row['name'];
					$one_showif = array();
					$one_hideif = array();
					$criteria_ids = explode('|', $row['criteria_ids']);
					$criteria_names = explode('|', $row['criteria_names']);
					foreach ($criteria_ids as $key => $value) {
						$showif_selected = (strpos($showif, $criteria_ids[$key]) !== FALSE);
						$hideif_selected = (strpos($hideif, $criteria_ids[$key]) !== FALSE);
						array_push($one_showif, array('criteria_id' => $criteria_ids[$key], 'name' => $criteria_names[$key], 'checked' => $showif_selected));
						array_push($one_hideif, array('criteria_id' => $criteria_ids[$key], 'name' => $criteria_names[$key], 'checked' => $hideif_selected));
					}
					array_push($showifs, array('field_id' => $field_id, 'field_name' => $field_name, 'criterias' => $one_showif));
					array_push($hideifs, array('field_id' => $field_id, 'field_name' => $field_name, 'criterias' => $one_hideif));
				}
				return array($showifs, $hideifs);
			} else {
				return array(array(),array());
			}
		} else {
			return FALSE;
		}
	}
	/**
	 * get_deep_search_list
	 * Read garment's info by garment_id 
	 * Returning url, image, ...
	 *
	 * @return garment array if existed, if not return FALSE
	 */
	public function get_deep_search_list($category_id = FALSE, $position = FALSE, $parent_id = FALSE, $required_id = FALSE){
		if ($category_id) {
			$query = $this->db->select('pas_field.position, pas_field.field_id, pas_field.short_name, pas_field.deep_search_parent_field_id, pas_field.deep_search_level')->from('pas_field')->join('pas_category_field', 'pas_category_field.field_id = pas_field.field_id')->where(array('pas_category_field.category_id' => $category_id, 'pas_field.position <' => $position))->order_by('pas_field.position')->get();
			if ($query->num_rows() >= 1){
				$result = $query->result_array();
				$parent_list = array();
				$required_list = array();
				foreach ($result as $row){
					$field_id = $row['field_id'];
					$short_name = $row['short_name'];
					$field_position = $row['position'];
					$parent_selected = ($field_id == $parent_id);
					$required_selected = ($field_id == $required_id);
					array_push($parent_list, array('field_id' => $field_id, 'short_name' => $short_name, 'position' => $field_position, 'selected' => $parent_selected));
					if ($parent_id != 0){
						if ($row['deep_search_parent_field_id'] == $parent_id) {
							array_push($required_list, array('field_id' => $field_id, 'short_name' => $short_name, 'position' => $field_position, 'selected' => $required_selected));
						}
					} else {
						if ($row['deep_search_level'] == 2) {
							array_push($required_list, array('field_id' => $field_id, 'short_name' => $short_name, 'position' => $field_position, 'selected' => $required_selected));
						}
					}
				}
				return array($parent_list, $required_list);
			} else {
				return array(array(),array());
			}
		} else {
			return FALSE;
		}
	}
	/**
	 * get_criteria_by_criteria_id
	 * Read garment's info by garment_id 
	 * Returning url, image, ...
	 *
	 * @return garment array if existed, if not return FALSE
	 */
	public function get_criteria_by_criteria_id($criteria_id = FALSE){
		if ($criteria_id) {
			$query = $this->db->select('criteria.*, field.position AS field_position, category_id')->from('criteria')->join('field','field.field_id = criteria.field_id')->join('category_field','field.field_id = category_field.field_id')->where('criteria.criteria_id', $criteria_id)->get();
			if ($query->num_rows() >= 1){
				return $query->row_array();
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}
	/**
	 * get_comment_by_criteria_id
	 * Read garment's info by garment_id 
	 * Returning url, image, ...
	 *
	 * @return garment array if existed, if not return FALSE
	 */
	public function get_comment_by_criteria_id($criteria_id = FALSE){
		if ($criteria_id) {
			$query = $this->db->select('*')->from('criteria_comment')->where('criteria_id', $criteria_id)->get();
			if ($query->num_rows() >= 1){
				return $query->result_array();
			} else {
				return array();
			}
		} else {
			return FALSE;
		}
	}
	/**
	 * get_comment_by_criteria_id
	 * Read garment's info by garment_id 
	 * Returning url, image, ...
	 *
	 * @return garment array if existed, if not return FALSE
	 */
	public function get_comment_by_comment_id($comment_id = FALSE){
		if ($comment_id) {
			$query = $this->db->select('*')->from('criteria_comment')->where('criteria_comment_id', $comment_id)->get();
			if ($query->num_rows() >= 1){
				return $query->row_array();
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}
	/**
	 * get_user_group
	 * Read garment's info by garment_id 
	 * Returning url, image, ...
	 *
	 * @return garment array if existed, if not return FALSE
	 */
	public function get_user_group($user_id = FALSE){
		if ($user_id) {
			$query = $this->db->select('pas_user_info.*, pas_user_accounts.uacc_group_fk')->from('user_info')->join('user_accounts','user_info.user_id = user_accounts.uacc_id')->where('pas_user_info.user_id', $user_id)->get();
			if ($query->num_rows() >= 1){
				return $query->row_array();
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}
	/**
	 * get_user_infusionsoft
	 * Read garment's info by garment_id 
	 * Returning url, image, ...
	 *
	 * @return garment array if existed, if not return FALSE
	 */
	public function get_user_infusionsoft($user_id = FALSE){
		if ($user_id) {
			$query = $this->db->select('pas_user_info.*, pas_user_infusionsoft.infusionsoft_id')->from('user_info')->join('user_infusionsoft','user_info.user_id = user_infusionsoft.user_id')->where('pas_user_info.user_id', $user_id)->get();
			if ($query->num_rows() >= 1){
				return $query->row_array();
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}
	/**
	 * update_category
	 * Read garment's info by garment_id 
	 * Returning url, image, ...
	 *
	 * @return garment array if existed, if not return FALSE
	 */
	public function update_category($category_id, $data) {
		return $this->db->where('category_id', $category_id)->update('category', $data);
	}


	/**
	 * update_garment_image
	 * Read garment's info by garment_id 
	 * Returning url, image, ...
	 *
	 * @return garment array if existed, if not return FALSE
	 */
	public function update_garment_image($garment_id, $data) {
		return $this->db->where('garment_id', $garment_id)->update('garment', $data);

	}

	/**
	 * update_field
	 * Read garment's info by garment_id 
	 * Returning url, image, ...
	 *
	 * @return garment array if existed, if not return FALSE
	 */
	public function update_field($field_id, $data) {
		return $this->db->where('field_id', $field_id)->update('field', $data);
	}
	/**
	 * update_field_criterias
	 * Read garment's info by garment_id 
	 * Returning url, image, ...
	 *
	 * @return garment array if existed, if not return FALSE
	 */
	public function update_field_criterias($data) {
		return $this->db->update_batch('criteria', $data, 'criteria_id');
	}
	/**
	 * update_criteria
	 * Read garment's info by garment_id 
	 * Returning url, image, ...
	 *
	 * @return garment array if existed, if not return FALSE
	 */
	public function update_criteria($criteria_id, $data) {
		return $this->db->where('criteria_id', $criteria_id)->update('criteria', $data);
	}
	/**
	 * update_comment
	 * Read garment's info by garment_id 
	 * Returning url, image, ...
	 *
	 * @return garment array if existed, if not return FALSE
	 */
	public function update_comment($comment_id, $data) {
		return $this->db->where('criteria_comment_id', $comment_id)->update('criteria_comment', $data);
	}
	/**
	 * update_user_group
	 * Read garment's info by garment_id 
	 * Returning url, image, ...
	 *
	 * @return garment array if existed, if not return FALSE
	 */
	public function update_user_group($user_id, $group_id) {
		return $this->db->where('uacc_id', $user_id)->update('user_accounts', array('uacc_group_fk' => $group_id));
	}
	/**
	 * update_user_infusionsoft
	 * Read garment's info by garment_id 
	 * Returning url, image, ...
	 *
	 * @return garment array if existed, if not return FALSE
	 */
	public function update_user_infusionsoft($user_id, $infusionsoft_id) {
		return $this->db->where('user_id', $user_id)->update('user_infusionsoft', array('infusionsoft_id' => $infusionsoft_id));
	}
	/**
	 * insert_category
	 *
	 * 
	 */
	public function insert_category($data) {
		$this->db->insert('category', $data);
		return $this->db->insert_id();
	}
	/**
	 * insert_field
	 *
	 * 
	 */
	public function insert_field($category_id, $data) {
		$this->db->insert('field', $data);
		$field_id = $this->db->insert_id();
		$data2 = array('category_id' => $category_id, 'field_id' => $field_id);
		$this->db->insert('category_field', $data2);
		return $field_id;
	}
	/**
	 * insert_criteria
	 *
	 * 
	 */
	public function insert_criteria($data) {
		$this->db->insert('criteria', $data);
		return $this->db->insert_id();
	}
	/**
	 * insert_comment
	 *
	 * 
	 */
	public function insert_comment($data) {
		$this->db->insert('criteria_comment', $data);
		return $this->db->insert_id();
	}
	/**
	 * delete_criteria
	 *
	 * 
	 */
	public function delete_criteria($criteria_id) {
		$field_id = $this->get_criteria_by_criteria_id($criteria_id)['field_id'];
		$this->db->delete(array('criteria'), array('criteria_id' => $criteria_id));
		return $field_id;
	}
	/**
	 * delete_comment
	 *
	 * 
	 */
	public function delete_comment($comment_id) {
		$criteria_id = $this->get_comment_by_comment_id($comment_id)['criteria_id'];
		$this->db->delete(array('criteria_comment'), array('criteria_comment_id' => $comment_id));
		return $criteria_id;
	}
	/**
	 * delete_field
	 *
	 * 
	 */
	public function delete_field($field_id) {
		$category_id = $this->get_field_by_field_id($field_id)['category_id'];
		$criterias = $this->get_criterias_by_field_id($field_id);
		foreach ($criterias as $criteria) {
			$this->delete_criteria($criteria['criteria_id']);
		}
		$this->db->delete(array('field', 'category_field', 'criteria'), array('field_id' => $field_id));
		return $category_id;
	}
	/**
	 * delete_category
	 *
	 * 
	 */
	public function delete_category($category_id) {
		$garment_num = $this->db->from('garment')->where('category_id', $category_id)->count_all_results();
		if ($garment_num == 0) {
			$field_ids = $this->get_fields_by_category_id($category_id);
			foreach ($field_ids as $field) {
				$this->delete_field($field['field_id']);
			}
			$this->db->delete(array('category', 'category_field'), array('category_id' => $category_id));
			return TRUE;
		} else {
			return FALSE;
		}
	}
	/**
	 * delete_body_garment
	 *
	 * 
	 */
	public function delete_body_garment($garment_id) {
		return $this->db->delete('body_garment', array('garment_id' => $garment_id));
	}
	/**
	 * delete_garment_info
	 *
	 * 
	 */

	public function delete_Image_garment($image_id,$garment_id){

		$this->update_garment_image($garment_id, array($image_id => '');
	}


	public function delete_garment_info($garment_id) {
		return $this->db->delete('garment', array('garment_id' => $garment_id));
	}
	/**
	 * delete_garment_criteria
	 *
	 * 
	 */
	public function delete_garment_criteria($garment_id) {
		return $this->db->delete('garment_criteria', array('garment_id' => $garment_id));
	}
	/**
	 * delete_garment_specs
	 *
	 * 
	 */
	public function delete_garment_specs($garment_id) {
		return $this->db->delete('garment_specs', array('garment_id' => $garment_id));
	}
	/**
	 * delete_user_garment
	 *
	 * 
	 */
	public function delete_user_garment($garment_id) {
		return $this->db->delete('user_garment', array('garment_id' => $garment_id));
	}
	/**
	 * delete_user
	 *
	 * 
	 */
	public function delete_user($user_id) {
		return $this->db->delete(array('user_garment', 'user_info', 'user_infusionsoft', 'user_specs'), array('user_id' => $user_id));
	}
	/**
	 * get_detailed_question_comments
	 *
	 * 
	 */
	public function get_detailed_question_comments($garment_id) {
		$query = $this->db->get_where('assessment_comment', array('garment_id' => $garment_id));
		if ($query->num_rows() == 0){
			return FALSE;
		}
		$result = $query->row_array();
		$decoded_comments = json_decode($result['comment']);
		$detailed_comments = array();
		$field_ids = array();
		$criteria_ids = array();
		//get overall comment, field_ids & criteria_ids
		foreach ($decoded_comments as $key=>$value) {
			if ($value->field_id == -1){
				$detailed_comments['overall'] = $value->content;
			} else {
				$field_ids[] = $value->field_id;
				$criteria_ids[] = $value->new_criteria_id;
				if (isset($value->old_criteria_id)){
					$criteria_ids[] = $value->old_criteria_id;
					$detailed_comments['individuals'][] = array('field_id' => $value->field_id, 'new_criteria_id' => $value->new_criteria_id, 'content' => $value->content, 'old_criteria_id' => $value->old_criteria_id);
				} else {
					$detailed_comments['individuals'][] = array('field_id' => $value->field_id, 'new_criteria_id' => $value->new_criteria_id, 'content' => $value->content);
				}
			}
		}
		//get field & criteria information
		$field_detail = $this->db->select('field_id, name, position')->from('field')->where_in('field_id', $field_ids)->get()->result_array();
		$criteria_detail = $this->db->select('criteria_id, name, image_path')->from('criteria')->where_in('criteria_id', $criteria_ids)->get()->result_array();
		//map field& criteria information to 
		foreach($field_detail as $field_key=>$field_value){
			foreach($detailed_comments['individuals'] as $comment_key=>$comment_value){
				if (empty($detailed_comments['individuals'][$comment_key]['field_name'])){
					if ($field_value['field_id'] == $comment_value['field_id']){
						$detailed_comments['individuals'][$comment_key]['field_name'] = $field_value['name'];
						$detailed_comments['individuals'][$comment_key]['position'] = $field_value['position'];
					}
				}
			}
		}
		foreach($criteria_detail as $criteria_key=>$criteria_value){
			foreach($detailed_comments['individuals'] as $comment_key=>$comment_value){
				if (empty($detailed_comments['individuals'][$comment_key]['new_criteria_name'])){
					if ($criteria_value['criteria_id'] == $comment_value['new_criteria_id']){
						$detailed_comments['individuals'][$comment_key]['new_criteria_name'] = $criteria_value['name'];
						$detailed_comments['individuals'][$comment_key]['new_criteria_image_path'] = $criteria_value['image_path'];
					}
				}
				if (isset($detailed_comments['individuals'][$comment_key]['old_criteria_id'])){
					if (empty($detailed_comments['individuals'][$comment_key]['old_criteria_name'])){
						if ($criteria_value['criteria_id'] == $comment_value['old_criteria_id']){
							$detailed_comments['individuals'][$comment_key]['old_criteria_name'] = $criteria_value['name'];
							$detailed_comments['individuals'][$comment_key]['old_criteria_image_path'] = $criteria_value['image_path'];
						}
					}
				}
			}
		}
		//reorder individuals field by position
		usort($detailed_comments['individuals'], function($a, $b) {
			return $a['position'] - $b['position'];
		});
		
		return $detailed_comments;
	}
	/**
	 * update_comment_email_sent
	 *
	 * 
	 */
	public function update_comment_email_sent($garment_id) {
		$this->db->set(array('email_sent' => 1, 'email_date' => date('Y-m-d H:i:s')))->where('garment_id', $garment_id)->update('assessment_comment');
	}



	public function insert_user_login($data){

		$this->db->insert('user_logins',$data);

	}
}
/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */
