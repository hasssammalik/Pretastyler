<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Name: PAS Garment Assessment Model
*
* Author: 
* Jifeng Sun
* rob@asmex.com.au
*
* Copyright 2014 Jifeng Sun
*
* Description: Prêt à Styler 2.0 Garment Assessment Model.
* Released: 23/12/2014
* Requirements: PHP5 or above and Codeigniter 2.0+
*/

class Assessment_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	/**
	 * get_assessment_comment
	 * Read category's
	 * Returning category info
	 *
	 * @return category array if existed, if not return FALSE
	 */
	public function get_assessment_comment($garment_id){
		$query = $this->db->get_where('assessment_comment', array('garment_id' => $garment_id));
		if ($query->num_rows() == 0){
			return FALSE;
		}
		$result = $query->row_array();
		return json_decode($result['comment']);
	}
	/**
	 * set_assessment_comment
	 * Read category's
	 * Returning category info
	 *
	 * @return category array if existed, if not return FALSE
	 */
	public function set_assessment_comment($garment_id, $comments){
		//prepare old_criteria_ids
		$decoded_comments = json_decode($comments);
		$query = $this->db->select('criteria.field_id, criteria.criteria_id')->from('garment_criteria')->join('criteria','garment_criteria.criteria_id = criteria.criteria_id', 'left')->where('garment_id', $garment_id)->get();
		$result = $query->result_array();
		foreach ($decoded_comments as $comment_key => $comment_value) {
			foreach ($result as $old_key => $old_value){
				if ($comment_value->field_id == $old_value['field_id']){
					$decoded_comments[$comment_key]->old_criteria_id = $old_value['criteria_id'];
					unset($result[$old_key]);
				}
			}
			if (empty($comment_value->new_criteria_id)){
				if ($comment_value->field_id !=-1){
					unset($decoded_comments[$comment_key]);
				}
			}
		}
		foreach ($result as $old_key => $old_value){
			$decoded_comments[] = (object) array('field_id' => $old_value['field_id'], 'old_criteria_id' => $old_value['criteria_id'], 'new_criteria_id' => '-1', 'content' => '');
		}
		$comments = json_encode($decoded_comments);
		$data = array(
					'garment_id' => $garment_id,
					'comment' => $comments,
					'date_created' => date('Y-m-d H:i:s'));
		//determine update or insert
		$do_update = TRUE;
		if (!$this->get_assessment_comment($garment_id)){
			$do_update = FALSE;
		}
		$this->db->set($data);
		if ($do_update) {
			$this->db->where('garment_id', $garment_id)->update('assessment_comment');
		} else {
			$this->db->insert('assessment_comment');
		}
		return TRUE;
	}
	/**
	 * insert_garment_criteria
	 * Read category's
	 * Returning category info
	 *
	 * @return category array if existed, if not return FALSE
	 */
	public function check_existed_garment($url){
		$match_num = $this->db->where('url', $url)->count_all_results('garment');
		if ($match_num > 0){
			return FALSE;
		} else {
			//can be inserted
			return TRUE;
		}
	}
	/**
	 * insert_garment_criteria
	 * Read category's
	 * Returning category info
	 *
	 * @return category array if existed, if not return FALSE
	 */
	public function insert_garment_criteria($garment_id, $selected_criteria_ids){
		$this->db->delete('garment_criteria', array('garment_id' => $garment_id));
		$data = array();
		foreach ($selected_criteria_ids as $criteria_id){
			$data[] = array(
				'garment_id' => $garment_id,
				'criteria_id' => $criteria_id,
			);
		}
		$this->db->insert_batch('garment_criteria', $data);
	}
	/**
	 * insert_garment_specs
	 * Read category's
	 * Returning category info
	 *
	 * @return category array if existed, if not return FALSE
	 */
	public function insert_garment_specs($garment_id, $selected_criteria_ids, $user_id){
		//get criteria info
		$this->db->select('*')->from('criteria')->where_in('criteria_id', $selected_criteria_ids)->where(array('`weight` <>' => 'NA', 'weight <>' => 'CT'));
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return FALSE;
		}
		$criterias = $query->result_array();
		//get scores
		$this->db->select('*')->from('score');
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return FALSE;
		}
		$db_scores = $query->result_array();
		$scores = array();
		
		
		foreach ($db_scores as $db_score){
			$scores[$db_score['Type']] = array_slice($db_score, 1);
		}
		//drop existing data
		$this->db->delete('garment_specs', array('garment_id' => $garment_id));
		
		//calculate new data
		
		$data = array();
		foreach ($criterias as $criteria) {
			$weight = $criteria['weight'];
			$field_id = $criteria['field_id'];
			$criteria_id = $criteria['criteria_id'];
			$data[$criteria_id] = array();
			$data[$criteria_id]['garment_id'] = $garment_id;
			$data[$criteria_id]['field_id'] = $field_id;
			$data[$criteria_id]['criteria_id'] = $criteria_id;
			foreach($criteria as $criteria_key => $criteria_value){
				if (strlen($criteria_key) == 3){
					if ($criteria_value){
						$trimed_score_key = substr($criteria_value, 0, 1);
						$data[$criteria_id][$criteria_key] = $scores[$weight][$trimed_score_key];
					}
				}
			}
			$this->db->insert('garment_specs', $data[$criteria_id]);
		}
		
		$query = $this->db->get_where('user_specs', array('user_id' => $user_id));
		//check if user specs exists
		if ($query->num_rows() == 0){
			return TRUE;
		} else {
			//calculate result
			$user_specs_str = $query->row_array()['column'];
			$query_str = "SELECT (AVG(LEAST(".$user_specs_str.")) + MIN(LEAST(".$user_specs_str."))) / 2 AS `score` FROM `pas_garment_specs` WHERE `garment_id` = ? GROUP BY `garment_id`";
			$query = $this->db->query($query_str, array($garment_id));
			$result = $query->row_array();
			//store in historical data user_garment table
			$data_score = array(
					'score' => $result['score'],
			);
			$query = $this->db->where(array('user_id' => $user_id, 'garment_id' => $garment_id))->update('user_garment', $data_score);
		}
		return TRUE;
	}
	/**
	 * get_initial_field_criteria_for_edit
	 * Read category's
	 * Returning category info
	 *
	 * @return category array if existed, if not return FALSE
	 */
	public function get_initial_field_criteria_for_edit($garment_id, $category_id){
		$this->db->select('field.field_id, short_name AS field_name, criteria.criteria_id, criteria.name AS criteria_name')->from('field')->join('criteria','field.field_id = criteria.field_id', 'left')->join('garment_criteria','criteria.criteria_id = garment_criteria.criteria_id', 'left')->where('garment_criteria.garment_id', $garment_id)->order_by('field.position','asc');
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			$this->db->select('category_field.field_id')->from('category_field')->join('field', 'category_field.field_id = field.field_id', 'right')->where(array('category_id' => $category_id))->order_by('position', 'asc');
			$query = $this->db->get();
			$initial_field_id = $query->row()->field_id;
			
			return $this->get_new_field_criteria_for_edit($category_id, $initial_field_id, array(), FALSE);
		} else {
			$count_current_data = $query->num_rows();
			$current_data = $query->result_array();
			$current_criteria_ids = array();
			for ($i = 0; $i < $count_current_data; $i++){
				if ($i == ($count_current_data - 1)){
					$current_field_id = $current_data[$i]['field_id'];
				}
				$current_criteria_ids[] = $current_data[$i]['criteria_id'];
			}
			return $this->get_new_field_criteria_for_edit($category_id, $current_field_id, $current_criteria_ids, TRUE);
		}
	}
	/**
	 * get_new_field_criteria_for_edit
	 * Read category's
	 * Returning category info
	 *
	 * @return category array if existed, if not return FALSE
	 */
	public function get_new_field_criteria_for_edit($category_id, $field_id, $selected_criteria_ids, $is_button = FALSE){
		$is_availiable_last_one = FALSE;
		$new_array = array();
		$selected_criteria_ids = array_filter($selected_criteria_ids);
		if ($is_button){
			//need to get new field_id
			$this->db->select('category_field.field_id, showif, hideif, deep_search_level, position')->from('category_field')->join('field', 'category_field.field_id = field.field_id', 'right')->where(array('category_id' => $category_id))->order_by('position', 'asc');
			$query = $this->db->get();
			if ($query->num_rows() == 0){
				return FALSE;
			}
			$fields = $query->result_array();
			//make a big number
			$position = 999;
			$found_next_field = FALSE;
			foreach ($fields as $field_key => $field_value) {
				if ($field_value['field_id'] == $field_id) {
					$position = $field_value['position'];
				}
				if ($this->judge_field_by_criteria_id($field_value['showif'], $field_value['hideif'], $selected_criteria_ids)){
					if ($field_value['position'] > $position){
						$new_array['new_field_id'] = $field_value['field_id'];
						$found_next_field = TRUE;
						break;
					}
				}
			}
			if (!$found_next_field){
				//no next field found
				$new_array['new_field_id'] = $field_id;
				$is_availiable_last_one = TRUE;
			}
		} else {
			//use existing one
			$new_array['new_field_id'] = $field_id;
		}
		//use current field id to generate field
		$this->db->select('field_id, name, short_name, position')->from('field')->where('field_id', $new_array['new_field_id'])->order_by('position', 'asc');
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return FALSE;
		}
		$new_array['field'] = $query->row_array();
		//last one check
		$position = $new_array['field']['position'];
		$this->db->select('max(position) as max_position')->from('category_field')->join('field', 'category_field.field_id = field.field_id', 'right')->where('category_id', $category_id);
		$max_position = $this->db->get()->row()->max_position;
		if ($position >= $max_position) {
			$new_array['last_one'] = TRUE;
		} else {
			$new_array['last_one'] = FALSE;
		}
		//generate current data
		if (empty($selected_criteria_ids)){
			$new_array['current_field_criteria'] = array();
		} else {
			$query_str = 'SELECT pas_category_field.field_id, short_name AS field_name, pas_field.showif AS field_showif, pas_field.hideif AS field_hideif, selected_data.criteria_id, selected_data.criteria_name, selected_data.showif as criteria_showif, selected_data.hideif as criteria_hideif FROM pas_category_field JOIN pas_field ON (pas_category_field.field_id = pas_field.field_id AND pas_category_field.category_id = ?) LEFT JOIN (SELECT pas_field.field_id, pas_criteria.criteria_id, pas_criteria.`name` as criteria_name, pas_criteria.showif, pas_criteria.hideif FROM pas_field RIGHT JOIN pas_criteria ON (pas_field.field_id = pas_criteria.field_id) WHERE pas_criteria.criteria_id in ('.implode(',', $selected_criteria_ids).')) as selected_data ON (selected_data.field_id = pas_field.field_id) ORDER BY position';
			$full_fields = $this->db->query($query_str, array($category_id))->result_array();
			//test showif and hideif
			foreach ($full_fields as $field_key => $field_value){
				//not ok then unset it
				if (!$this->judge_field_by_criteria_id($field_value['field_showif'], $field_value['field_hideif'], $selected_criteria_ids)){
					unset($full_fields[$field_key]);
				} else {
					unset($full_fields[$field_key]['field_showif']);
					unset($full_fields[$field_key]['field_hideif']);
				}
				if (!$this->judge_criteria_by_criteria_id($field_value['criteria_showif'], $field_value['criteria_hideif'], $selected_criteria_ids)){
					$full_fields[$field_key]['criteria_id'] = NULL;
					$full_fields[$field_key]['criteria_name'] = NULL;
				}
				unset($full_fields[$field_key]['criteria_showif']);
				unset($full_fields[$field_key]['criteria_hideif']);
			}
			$new_array['current_field_criteria'] = $full_fields;
			//update selected criteria ids, ignore anything after valid ones
			//todo
		}
		//generate criteria infos
		if ($is_button && ($new_array['last_one'] || (count($new_array['current_field_criteria']) == count($selected_criteria_ids)) || $is_availiable_last_one)){
			//show all selected garment and info
			$this->db->select('field.field_id, short_name AS field_name, criteria.criteria_id, criteria.name AS criteria_name, criteria.tooltip, criteria.image_path')->from('field')->join('criteria','field.field_id = criteria.field_id', 'left')->where_in('criteria.criteria_id', $selected_criteria_ids)->order_by('field.position','asc');
			$query = $this->db->get();
			if ($query->num_rows() == 0){
				return FALSE;
			}
			$criterias = $query->result_array();
			$new_array['new_field_id'] = -1;
			$new_array['field'] = array('field_id' => '-1', 'name' => 'All Field Results: ');
		} else {
			$this->db->select('criteria_id, name, tooltip, image_path, showif, hideif')->from('criteria')->where(array('field_id' => $new_array['new_field_id']))->order_by('position', 'asc');
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
		}
		$new_array['criterias'] = $criterias;
		return $new_array;
	}
	/**
	 * get_initial_field_criteria_for_assessment
	 * Read category's
	 * Returning category info
	 *
	 * @return category array if existed, if not return FALSE
	 */
	public function get_initial_field_criteria_for_assessment($garment_id, $category_id){
		$this->db->select('field.field_id, short_name AS field_name, criteria.criteria_id, criteria.name AS criteria_name')->from('field')->join('criteria','field.field_id = criteria.field_id', 'left')->join('garment_criteria','criteria.criteria_id = garment_criteria.criteria_id', 'left')->where('garment_criteria.garment_id', $garment_id)->order_by('field.position','asc');
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			$this->db->select('category_field.field_id')->from('category_field')->join('field', 'category_field.field_id = field.field_id', 'right')->where(array('category_id' => $category_id))->order_by('position', 'asc');
			$query = $this->db->get();
			$initial_field_id = $query->row()->field_id;
			
			return $this->get_new_field_criteria_for_assessment($category_id, $initial_field_id, array(), FALSE);
		} else {
			$count_current_data = $query->num_rows();
			$current_data = $query->result_array();
			$current_criteria_ids = array();
			for ($i = 0; $i < $count_current_data; $i++){
				if ($i == ($count_current_data - 1)){
					$current_field_id = $current_data[$i]['field_id'];
				}
				$current_criteria_ids[] = $current_data[$i]['criteria_id'];
			}
			return $this->get_new_field_criteria_for_assessment($category_id, $current_field_id, $current_criteria_ids, TRUE);
		}
	}
	/**
	 * get_new_field_criteria_for_assessment
	 * Read category's
	 * Returning category info
	 *
	 * @return category array if existed, if not return FALSE
	 */
	public function get_new_field_criteria_for_assessment($category_id, $field_id, $selected_criteria_ids, $is_button = FALSE){
		$is_availiable_last_one = FALSE;
		$new_array = array();
		if ($is_button){
			//need to get new field_id
			$this->db->select('category_field.field_id, showif, hideif, deep_search_level, position')->from('category_field')->join('field', 'category_field.field_id = field.field_id', 'right')->where(array('category_id' => $category_id))->order_by('position', 'asc');
			$query = $this->db->get();
			if ($query->num_rows() == 0){
				return FALSE;
			}
			$fields = $query->result_array();
			//make a big number
			$position = 999;
			$found_next_field = FALSE;
			foreach ($fields as $field_key => $field_value) {
				if ($field_value['field_id'] == $field_id) {
					$position = $field_value['position'];
				}
				if ($this->judge_field_by_criteria_id($field_value['showif'], $field_value['hideif'], $selected_criteria_ids)){
					if ($field_value['position'] > $position){
						$new_array['new_field_id'] = $field_value['field_id'];
						$found_next_field = TRUE;
						break;
					}
				}
			}
			if (!$found_next_field){
				//no next field found
				$new_array['new_field_id'] = $field_id;
				$is_availiable_last_one = TRUE;
			}
		} else {
			//use existing one
			$new_array['new_field_id'] = $field_id;
		}
		//use current field id to generate field
		$this->db->select('field_id, name, short_name, position, showif, hideif')->from('field')->where('field_id', $new_array['new_field_id'])->order_by('position', 'asc');
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return FALSE;
		}
		$new_array['field'] = $query->row_array();
		unset($new_array['field']['showif']);
		unset($new_array['field']['hideif']);
		//last one check
		$position = $new_array['field']['position'];
		//$this->db->select('max(position) as max_position')->from('category_field')->join('field', 'category_field.field_id = field.field_id', 'right')->where('category_id', $category_id);
		//$max_position = $this->db->get()->row()->max_position;
		//if ($position >= $max_position) {
		//	$new_array['last_one'] = TRUE;
		//} else {
			$new_array['last_one'] = $is_availiable_last_one;
		//}
		//generate current data
		if (empty($selected_criteria_ids)){
			$new_array['current_field_criteria'] = array();
		} else {
			$this->db->select('field.field_id, short_name AS field_name, criteria.criteria_id, criteria.name AS criteria_name')->from('field')->join('criteria','field.field_id = criteria.field_id', 'right')->where_in('criteria_id', $selected_criteria_ids)->where('field.position <=',$position)->order_by('field.position','asc');
			$query = $this->db->get();
			$new_array['current_field_criteria'] = $query->result_array();
			//update selected criteria ids, ignore anything after valid ones
			//todo
		}
		//generate criteria infos
		$this->db->select('criteria_id, name, tooltip, image_path, showif, hideif')->from('criteria')->where(array('field_id' => $new_array['new_field_id']))->order_by('position', 'asc');
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
	public function judge_field_by_criteria_id($showif, $hideif, $selected_criteria_ids, $strict = FALSE){
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
	public function judge_criteria_by_criteria_id($showif, $hideif, $selected_criteria_ids, $strict = FALSE){
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
	
	public function update_all_garment_specs(){
		$query_str = "INSERT INTO pas_garment_specs (garment_id, field_id, criteria_id, V01, V02, V03, V04, V05, V06, V07, V08, V09, V10, H11, H12, H13, H14, H15, H16, N17, N18, N19, N20, N21, N22, N23, N24, S25, S26, S27, S28, B29, B30, B31, B32, B33, P34, P35, P36, P37, P38, P39, P40, P41, P42, P43, P44, P45, P46, P47, W69, W48, W49, W50, W51, W52, B53, B54, B55, A56, A57, A58, A59, A71, A72, F60, F61, F62, F63, F64, F65, F66, F67, F68, F70, P73, B74, P75, P76, P77, P78, P79, P80) SELECT pas_garment_criteria.garment_id, pas_criteria.field_id, pas_criteria.criteria_id, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(V01, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS V01, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(V02, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS V02, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(V03, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS V03, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(V04, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS V04, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(V05, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS V05, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(V06, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS V06, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(V07, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS V07, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(V08, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS V08, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(V09, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS V09, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(V10, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS V10, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(H11, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS H11, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(H12, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS H12, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(H13, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS H13, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(H14, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS H14, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(H15, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS H15, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(H16, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS H16, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(N17, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS N17, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(N18, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS N18, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(N19, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS N19, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(N20, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS N20, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(N21, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS N21, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(N22, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS N22, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(N23, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS N23, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(N24, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS N24, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(S25, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS S25, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(S26, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS S26, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(S27, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS S27, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(S28, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS S28, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(B29, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS B29, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(B30, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS B30, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(B31, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS B31, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(B32, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS B32, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(B33, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS B33, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(P34, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS P34, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(P35, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS P35, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(P36, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS P36, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(P37, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS P37, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(P38, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS P38, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(P39, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS P39, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(P40, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS P40, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(P41, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS P41, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(P42, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS P42, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(P43, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS P43, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(P44, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS P44, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(P45, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS P45, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(P46, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS P46, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(P47, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS P47, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(W69, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS W69, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(W48, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS W48, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(W49, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS W49, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(W50, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS W50, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(W51, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS W51, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(W52, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS W52, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(B53, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS B53, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(B54, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS B54, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(B55, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS B55, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(A56, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS A56, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(A57, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS A57, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(A58, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS A58, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(A59, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS A59, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(A71, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS A71, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(A72, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS A72, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(F60, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS F60, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(F61, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS F61, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(F62, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS F62, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(F63, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS F63, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(F64, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS F64, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(F65, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS F65, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(F66, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS F66, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(F67, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS F67, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(F68, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS F68, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(F70, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS F70, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(P73, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS P73, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(B74, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS B74, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(P75, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS P75, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(P76, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS P76, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(P77, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS P77, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(P78, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS P78, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(P79, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS P79, REPLACE(REPLACE(REPLACE(REPLACE(SUBSTRING(P80, 1, 1), 'S', pas_score.S), 'A', pas_score.A), 'M', pas_score.M), 'X', pas_score.X) AS P80 FROM pas_garment_criteria JOIN pas_criteria ON pas_garment_criteria.criteria_id = pas_criteria.criteria_id JOIN pas_score ON pas_criteria.weight = pas_score.`Type` LEFT JOIN `pas_garment` ON `pas_garment_criteria`.`garment_id` = `pas_garment`.`garment_id` WHERE `outdated` = 0 AND pas_criteria.weight <> 'CT' AND pas_criteria.weight <> 'NA' ON DUPLICATE KEY UPDATE V01 = VALUES(V01), V02 = VALUES(V02), V03 = VALUES(V03), V04 = VALUES(V04), V05 = VALUES(V05), V06 = VALUES(V06), V07 = VALUES(V07), V08 = VALUES(V08), V09 = VALUES(V09), V10 = VALUES(V10), H11 = VALUES(H11), H12 = VALUES(H12), H13 = VALUES(H13), H14 = VALUES(H14), H15 = VALUES(H15), H16 = VALUES(H16), N17 = VALUES(N17), N18 = VALUES(N18), N19 = VALUES(N19), N20 = VALUES(N20), N21 = VALUES(N21), N22 = VALUES(N22), N23 = VALUES(N23), N24 = VALUES(N24), S25 = VALUES(S25), S26 = VALUES(S26), S27 = VALUES(S27), S28 = VALUES(S28), B29 = VALUES(B29), B30 = VALUES(B30), B31 = VALUES(B31), B32 = VALUES(B32), B33 = VALUES(B33), P34 = VALUES(P34), P35 = VALUES(P35), P36 = VALUES(P36), P37 = VALUES(P37), P38 = VALUES(P38), P39 = VALUES(P39), P40 = VALUES(P40), P41 = VALUES(P41), P42 = VALUES(P42), P43 = VALUES(P43), P44 = VALUES(P44), P45 = VALUES(P45), P46 = VALUES(P46), P47 = VALUES(P47), W69 = VALUES(W69), W48 = VALUES(W48), W49 = VALUES(W49), W50 = VALUES(W50), W51 = VALUES(W51), W52 = VALUES(W52), B53 = VALUES(B53), B54 = VALUES(B54), B55 = VALUES(B55), A56 = VALUES(A56), A57 = VALUES(A57), A58 = VALUES(A58), A59 = VALUES(A59), A71 = VALUES(A71), A72 = VALUES(A72), F60 = VALUES(F60), F61 = VALUES(F61), F62 = VALUES(F62), F63 = VALUES(F63), F64 = VALUES(F64), F65 = VALUES(F65), F66 = VALUES(F66), F67 = VALUES(F67), F68 = VALUES(F68), F70 = VALUES(F70), P73 = VALUES(P73), B74 = VALUES(B74), P75 = VALUES(P75), P76 = VALUES(P76), P77 = VALUES(P77), P78 = VALUES(P78), P79 = VALUES(P79), P80 = VALUES(P80)";
		$this->db->query($query_str);
		return TRUE;
	}
}
/* End of file assessment_model.php */
/* Location: ./application/models/assessment_model.php */
?>