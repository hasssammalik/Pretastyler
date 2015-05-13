<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Name: PAS Garment Model
*
* Author: 
* Jifeng Sun
* rob@asmex.com.au
*
* Copyright 2014 Jifeng Sun
*
* Description: Prêt à Styler 2.0 Garment model, contains methods to CRUD a garment.
* Released: 28/10/2014
* Requirements: PHP5 or above and Codeigniter 2.0+
*/

class Garment_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Read Garment Info
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * get_garment_info
	 * Read garment's info by garment_id 
	 * Returning url, image, ...
	 *
	 * @return garment array if existed, if not return FALSE
	 */
	public function get_garment_info($garment_id, $user_id = FALSE){
		$query = $this->db->get_where('garment', array('garment_id' => $garment_id));
		if ($query->num_rows() == 0){
			return FALSE;
		}
		$return_array = $query->row_array();
		//if user is logged in, add score field.
		if ($user_id){
			$score_array = $this->get_garment_score($user_id, $garment_id);
			$return_array['score'] = $score_array['score'];
			$return_array['wardrobe'] = $score_array['wardrobe'];
			$return_array['favorite'] = $score_array['favorite'];
			$return_array['dressing_room'] = $score_array['dressing_room'];
			
		}
		return $return_array;
	}
	/**
	 * get_garment_score
	 * Read garment's score by garment_id and user_id
	 * Returning score
	 *
	 * @return score
	 */
	private function get_garment_score($user_id, $garment_id){
		//search historical data from user_garment
		$query = $this->db->get_where('user_garment', array('user_id' => $user_id, 'garment_id' => $garment_id));
		if ($query->num_rows() == 0){
			//no historical data
			$query = $this->db->get_where('user_specs', array('user_id' => $user_id));
			//check if user specs exists
			if ($query->num_rows() == 0){
				return FALSE;
			} else {
				//calculate result
				$user_specs_str = $query->row_array()['column'];
				$query_str = "SELECT (AVG(LEAST(".$user_specs_str.")) + MIN(LEAST(".$user_specs_str."))) / 2 AS `score` FROM `pas_garment_specs` WHERE `garment_id` = ? GROUP BY `garment_id`";
				$query = $this->db->query($query_str, array($garment_id));
				$result = $query->row_array();
				
				//store in historical data user_garment table
				$data = array(
						'user_id' => $user_id,
						'garment_id' => $garment_id,
						'score' => $result['score'],
				);
				$query = $this->db->insert('user_garment', $data);
				//return result
				return array('score' => $result['score'], 'wardrobe' => 0, 'favorite' =>0, 'dressing_room' =>0);
			}
		} else {
			//has historical data, return it.
			return $query->row_array();
		}
	}
	/**
	 * get_batch_garment_info_from_quick_search
	 * Read batch garment's info
	 * Returning url, image, ...
	 *
	 * @return garment array ()
	 */
	public function get_batch_garment_info_from_quick_search($offset, $limit, $user_id = FALSE, $keyword, $occasion, $colour, $category, $store, $price_range, $criteria, $show_premium = FALSE, $star = FALSE , $order_by = FALSE, $star_range = FALSE, $length = FALSE) {
		$user_specs_str = FALSE;
		if ($user_id){
			$query = $this->db->get_where('user_specs', array('user_id' => $user_id));
			if ($query->num_rows() == 0){
				$user_specs_str = FALSE;
			} else {
				$user_specs_str = $query->row_array()['column'];
			}
		}
		if ($criteria) {
			$index = 0;
			$criterias = array();
			foreach ($criteria as $row){
				if (!empty($row)){
					$values = explode(',', $row);
					foreach ($values as $value){
						$criterias[$index][] = array('criteria_id' => $value, 'can_use' => TRUE);
					}
					$index++;
				}
			}
			if (!empty($criterias)){
				$finished_criterias = array();
				$finished_criterias[] = $criterias[0];
				for ($i = 1; $i < count($criterias); $i++) {
					for ($j = 0; $j < count($criterias[$i]); $j++) {
						$result = $this->get_showif_hideif_by_criteria_id($criterias[$i][$j]['criteria_id']);
						if (!(empty($result['field_showif']) && empty($result['field_hideif']))){
							for ($k = 0; $k < count($finished_criterias); $k++){
								for ($l = 0; $l < count($finished_criterias[$k]); $l++) {
									if ($finished_criterias[$k][$l]['can_use']){
										$finished_criterias[$k][$l]['can_use'] = !$this->judge_field_by_criteria_id($result['field_showif'], $result['field_hideif'], array($finished_criterias[$k][$l]['criteria_id']));
									}
								}
							}
						}
						if (!(empty($result['criteria_showif']) && empty($result['criteria_hideif']))){
							for ($k = 0; $k < count($finished_criterias); $k++){
								for ($l = 0; $l < count($finished_criterias[$k]); $l++) {
									if ($finished_criterias[$k][$l]['can_use']){
										$finished_criterias[$k][$l]['can_use'] = !$this->judge_criteria_by_criteria_id($result['criteria_showif'], $result['criteria_hideif'], array($finished_criterias[$k][$l]['criteria_id']));
									}
								}
							}
						}
					}
					$finished_criterias[] = $criterias[$i];
				}
				$first_criterias = array();
				$last_criterias = array();
				for ($i = 0; $i < count($finished_criterias); $i++) {
					$first_criterias = array_merge($first_criterias, $last_criterias);
					$last_criterias = array();
					for ($j = 0; $j < count($finished_criterias[$i]); $j++) {
						if ($finished_criterias[$i][$j]['can_use']){
							$last_criterias[] = $finished_criterias[$i][$j]['criteria_id'];
						}
					}
				}
				if (empty($first_criterias)){
					$criteria = array($last_criterias);
				} else {
					$criteria = array($first_criterias, $last_criterias);
				}
				
				$sql_query = 'SELECT distinct(d0.garment_id) FROM pas_garment_criteria AS d0';
				if (count($criteria) == 1){
					if (count($criteria[0]) == 1){
						$sql_query.= ' WHERE d0.criteria_id = '.$criteria[0][0];
					} else {
						$sql_query.= ' WHERE d0.criteria_id IN ('.implode(', ', $criteria[0]).')';
					}
				} else {
					$where_clause = array();
					if (count($criteria[0]) == 1){
						$where_clause[] = 'd0.criteria_id = '.$criteria[0][0];
					} else {
						$where_clause[] = 'd0.criteria_id IN ('.implode(', ', $criteria[0]).')';
					}
					for ($i = 1; $i < count($criteria); $i++){
						$sql_query .= ', pas_garment_criteria AS d'.$i;
						$where_clause[] = 'd0.garment_id = d'.$i.'.garment_id';
						if (count($criteria[$i]) == 1){
							$where_clause[] = 'd'.$i.'.criteria_id = '.$criteria[$i][0];
						} else {
							$where_clause[] = 'd'.$i.'.criteria_id IN ('.implode(', ', $criteria[$i]).')';
						}
					}
					$sql_query.= ' WHERE '.implode(' AND ', $where_clause);
				}
				$this->db->join('('.$sql_query.') AS criteria', 'garment.garment_id = criteria.garment_id', 'right');
			}
		}
		$this->db->distinct('garment_id')->from('garment');
		if ($occasion) {
			if (count($occasion) == 1){
				$where_occasion = 'occasion_id = '.$occasion[0];
			} else {
				$where_occasion = '(occasion_id = '.$occasion[0];
			}
			for ($i=1;$i<count($occasion);$i++){
				$where_occasion .= ' OR occasion_id = '.$occasion[$i];
			}
			if (count($occasion) > 1){
				$where_occasion .= ')';
			}
			$this->db->join('garment_occasion', 'garment.garment_id = garment_occasion.garment_id', 'left')->where($where_occasion);
		}
		
		if ($colour) {
			if (count($colour) == 1){
				$where_colour = 'colour_id = '.$colour[0];
			} else {
				$where_colour = '(colour_id = '.$colour[0];
			}
			for ($i=1;$i<count($colour);$i++){
				$where_colour .= ' OR colour_id = '.$colour[$i];
			}
			if (count($colour) > 1){
				$where_colour .= ')';
			}
			$this->db->join('garment_colour', 'garment.garment_id = garment_colour.garment_id', 'left')->where($where_colour);
		}
		
		
		if ($keyword) {
			$keywords = array_map('trim', explode(" ", $keyword));
			foreach ($keywords as $row) {
				$this->db->like('name', $row);
			}
		}
		
		if ($price_range) {
			if ($price_range[0] == 0.00) {
				$low = 1;
			} else if ($price_range[0] == 99.00) {
				$low = 2;
			} else if ($price_range[0] == 199.00) {
				$low = 3;
			} else if ($price_range[0] == 499.00) {
				$low = 4;
			} else if ($price_range[0] == 999.00) {
				$low = 5;
			}
			
			if ($price_range[1] == 99.00) {
				$high = 1;
			} else if ($price_range[1] == 199.00) {
				$high = 2;
			} else if ($price_range[1] == 499.00) {
				$high = 3;
			} else if ($price_range[1] == 999.00) {
				$high = 4;
			} else if ($price_range[1] == 1000.00) {
				$high = 5;
			}
			if (isset($low) && isset($high)) {
				$db_price_range = array(
					'price_range >=' => $low,
					'price_range <=' => $high
				);
				$this->db->where($db_price_range);
			}
		}
		if ($category) {
			if (count($category) == 1){
				$where_category = 'category_id = '.$category[0];
			} else {
				$where_category = '(category_id = '.$category[0];
			}
			for ($i=1;$i<count($category);$i++){
				$where_category .= ' OR category_id = '.$category[$i];
			}
			if (count($category) > 1){
				$where_category .= ')';
			}
			$this->db->where($where_category);
		}
		
		if ($store) {
			if (count($store) == 1){
				$where_store = 'store LIKE "%'.$store[0].'%"';
			} else {
				$where_store = '(store LIKE "%'.$store[0].'%"';
			}
			for ($i=1;$i<count($store);$i++){
				$where_store .= ' OR store LIKE "%'.$store[$i].'%"';
			}
			if (count($store) > 1){
				$where_store .= ')';
			}
			$this->db->where($where_store);
		}
		
		if($star) {
			if( $star == 5 ) {
				$this->db->where(array('score >' =>7.3));
			} else if( $star == 4 ) {
				$this->db->where(array('score >' => 6, 'score <=' => 7.3));
			} else if( $star == 3 ) {
				$this->db->where(array('score >' => 5, 'score <=' => 6));
			} else if( $star == 2 ) {
				$this->db->where(array('score >' => 3, 'score <=' => 5));
			} else {
				$this->db->where('score <=', 3);
			}
		}

		
		
		if ($user_specs_str){

			if( empty($star)){
				$this->db->order_by('user_garment.score desc');
			}

			if ($star_range) {
				if ($star_range[0] == 2) {
					$low_star = 3;
				} else if ($star_range[0] == 3) {
					$low_star = 5;
				} else if ($star_range[0] == 4) {
					$low_star = 6;
				} else if ($star_range[0] == 5) {
					$low_star = 7.3;
				}
				
				if ($star_range[1] == 1) {
					$high_star = 3;
				} else if ($star_range[1] == 2) {
					$high_star = 5;
				} else if ($star_range[1] == 3) {
					$high_star = 6;
				} else if ($star_range[1] == 4) {
					$high_star = 7.3;
				}
				if (isset($low_star) && isset($high_star)) {
					$db_star_range = array(
						'score >' => $low_star,
						'score <=' => $high_star
					);
					$this->db->where($db_star_range);
				} else if (!isset($low_star) && isset($high_star)){
					$db_star_range = array(
						'score <=' => $high_star
					);
					$this->db->where($db_star_range);
				} else if (isset($low_star) && !isset($high_star)){
					$db_star_range = array(
						'score >' => $low_star,
					);
					$this->db->where($db_star_range);
				}
			}
			$this->db->join('user_garment','garment.garment_id = user_garment.garment_id','left')->where(array('user_garment.user_id' => $user_id));
			if (!empty($order_by)){
				if ($order_by == 'latest') {
					$this->db->order_by('garment.garment_id desc');
				} else if ($order_by == 'trending') {
					$this->db->order_by('garment.click_num desc, garment.garment_id desc');
				}
			} else {
				$this->db->order_by('user_garment.score desc, garment.garment_id desc');
			}
		} else {
			if (!empty($order_by)){
				if ($order_by == 'latest') {
					$this->db->order_by('garment.garment_id desc');
				} else if ($order_by == 'trending') {
					$this->db->order_by('garment.click_num desc, garment.garment_id desc');
				}
			} else {
				$this->db->order_by('garment.garment_id', 'desc');
			}
		}
		
		if (!$show_premium){
			$this->db->where('is_standard', 1);
		}
		if ($length) {
			$this->db->join('garment_criteria', 'garment.garment_id = garment_criteria.garment_id')->where_in('garment_criteria.criteria_id', $length);
		}
		$this->db->where(array('enabled' => 1, 'is_pattern' => 0));
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		//print_r($this->db);die;
		return $query->result_array();
	}
	private function get_showif_hideif_by_criteria_id($criteria_id){
		$this->db->select('criteria.showif AS criteria_showif, criteria.hideif AS criteria_hideif, field.showif AS field_showif, field.hideif AS field_hideif')->from('criteria')->join('field', 'field.field_id = criteria.field_id', 'left')->where('criteria_id', $criteria_id);
		return $this->db->get()->row_array();
	}
	/**
	 * get_garment_advise
	 * Read garment's info by garment_id 
	 * Returning url, image, ...
	 *
	 * @return garment array if existed, if not return FALSE
	 */
	public function get_garment_advise($garment_id, $user_id, $is_admin = FALSE){
		$query = $this->db->get_where('user_specs', array('user_id' => $user_id));
		if ($query->num_rows() == 0){
			return FALSE;
		} else {
			$user_specs_str = $query->row_array()['column'];
		}
		$query_str = "SELECT garment_id, field_score.field_id, short_name AS area, criteria_info.name AS style_item, score, criteria_info.criteria_id FROM (SELECT garment_id, field_id, LEAST(".$user_specs_str.") AS score FROM pas_garment_specs WHERE garment_id = ?) as field_score LEFT JOIN pas_field ON (field_score.field_id = pas_field.field_id) LEFT JOIN (SELECT `pas_criteria`.* FROM `pas_garment_criteria` LEFT JOIN `pas_criteria` on (pas_criteria.criteria_id = pas_garment_criteria.criteria_id) WHERE `garment_id` = ?) AS criteria_info ON (criteria_info.field_id = field_score.field_id) ORDER BY pas_field.position";
		$query = $this->db->query($query_str, array($garment_id, $garment_id));
		$result = $query->result_array();
		foreach ($result as $key => $value) {
			if ($value['score']>=7.3){
				$result[$key]['result'] = 5;
			} else if ($value['score']>=6){
				$result[$key]['result'] = 4;
			} else if ($value['score']>=5){
				$result[$key]['result'] = 3;
			} else if ($value['score']>=3){
				$result[$key]['result'] = 2;
				$result[$key]['reason'] = $this->get_garment_criteria_reason($garment_id, $value['field_id'], $user_specs_str, $value['score'], $is_admin);
			} else {
				$result[$key]['result'] = 1;
				$result[$key]['reason'] = $this->get_garment_criteria_reason($garment_id, $value['field_id'], $user_specs_str, $value['score'], $is_admin);
			}
			$result[$key]['comment'] = $this->get_garment_criteria_comment($value['criteria_id'], $user_specs_str);
		}
		return $result;
	}
	/**
	 * get_garment_criteria_comment
	 * Read garment's info by garment_id 
	 * Returning url, image, ...
	 *
	 * @return garment array if existed, if not return FALSE
	 */
	private function get_garment_criteria_comment($criteria_id, $user_specs_str){
		$query = $this->db->select('Comment, LABELS, PLUS1, PLUS2, PLUS3, PLUS4')->get_where('criteria_comment', array('LABELS <>' => 99, 'LABELS <>' => 100, 'criteria_id' => $criteria_id));
		$comments = array();
		foreach ($query->result() as $row){
			$user_specs = explode(',', $user_specs_str);
			$user_specs[] = 'X101';
			$user_specs[] = 'X102';
			if ((trim($row->LABELS) != '') && $this->check_label_exists($row->LABELS, $user_specs)) {
				$comments[] = $row->Comment;
			} else {
				if ((trim($row->PLUS1) != '')||((trim($row->PLUS2) != ''))||((trim($row->PLUS3) != ''))||((trim($row->PLUS4) != ''))){
					if ($this->check_label_exists($row->PLUS1, $user_specs)&&$this->check_label_exists($row->PLUS2, $user_specs)&&$this->check_label_exists($row->PLUS3, $user_specs)&&$this->check_label_exists($row->PLUS4, $user_specs)) {
						$comments[] = $row->Comment;
					}
				}
			}
			/* $plus = '';
			$labels = array($row->PLUS1, $row->PLUS2, $row->PLUS3, $row->PLUS4);
			foreach ($labels as $label) {
				if (trim($label) != ''){
					$plus = $label;
					break;
				}
			}
			$final_label = $row->LABELS.','.$plus;
			$user_specs = explode(',', $user_specs_str);
			$user_specs[] = 'X101';
			$user_specs[] = 'X102';
			$need_comment = FALSE;
			foreach ($user_specs as $user_spec){
				$user_spec_without_char = substr($user_spec, -2);
				if (strpos($final_label, $user_spec_without_char) !== FALSE) {
					$need_comment = TRUE;
					break;
				}
			} */
			/* if ($need_comment) {
				$comments[] = $row->Comment;
			} */
		}
		if (!empty($comments)) {
			return $comments;
		} else {
			return FALSE;
		}
	}
	/**
	 * get_garment_criteria_reason
	 * Read garment's info by garment_id 
	 * Returning url, image, ...
	 *
	 * @return garment array if existed, if not return FALSE
	 */
	private function check_label_exists($label, $user_specs) {
		if (trim($label) == '') {
			return TRUE;
		} else {
			foreach ($user_specs as $user_spec){
				$user_spec_without_char = substr($user_spec, -2);
				if (strpos($label, $user_spec_without_char) !== FALSE) {
					return TRUE;
					break;
				}
			}
			return FALSE;
		}
	}
	/**
	 * get_garment_criteria_reason
	 * Read garment's info by garment_id 
	 * Returning url, image, ...
	 *
	 * @return garment array if existed, if not return FALSE
	 */
	private function get_garment_criteria_reason($garment_id, $field_id, $user_specs_str, $score, $is_admin = FALSE){
		$this->db->select($user_specs_str);
		$query = $this->db->get_where('garment_specs', array('garment_id' => $garment_id, 'field_id' => $field_id));
		$result = $query->row_array();
		$min = array();
		foreach ($result as $key => $value) {
			if ($value == $score) {
				$min[] = $key;
			}
		}
		$this->db->select('Desc, Column')->from('taiccol_w08')->where_in('Column', $min);
		$query = $this->db->get();
		$reasons = array();
		foreach ($query->result() as $row){
			if ($is_admin){
				$reasons[] = $row->Desc.'('.$row->Column.')';
			} else {
				$reasons[] = $row->Desc;
			}
		}
		$result = implode(', ', $reasons);
		return $result;
	}
	/**
	 * get_batch_garment_info_by_favorite
	 * Read batch garment's info
	 * Returning url, image, ...
	 *
	 * @return garment array ()
	 */
	public function get_batch_garment_info_by_favorite($offset, $limit, $user_id = FALSE){
		if ($user_id) {
			$this->db->select('*')->from('garment')->join('user_garment','garment.garment_id = user_garment.garment_id')->where(array('user_garment.user_id' => $user_id, 'favorite' => 1, 'enabled' => 1, 'expired' => 0))->order_by('garment.garment_id desc')->limit($limit, $offset);
			$query = $this->db->get();
			if ($query->num_rows() == 0){
				return FALSE;
			}
			return $query->result_array();
		} else {
			return FALSE;
		}
	}
	/**
	 * get_batch_garment_info_by_occasion_name
	 * Read batch garment's info
	 * Returning url, image, ...
	 *
	 * @return garment array ()
	 */
	public function get_batch_garment_info_by_wardrobe($offset, $limit, $user_id = FALSE){
		if ($user_id) {
			$this->db->select('*')->from('garment')->join('user_garment','garment.garment_id = user_garment.garment_id')->where(array('user_garment.user_id' => $user_id, 'wardrobe' => 1))->order_by('garment.garment_id desc')->limit($limit, $offset);
			$query = $this->db->get();
			if ($query->num_rows() == 0){
				return FALSE;
			}
			return $query->result_array();
		} else {
			return FALSE;
		}
	}
	/**
	 * get_batch_garment_info_by_history
	 * Read batch garment's info
	 * Returning url, image, ...
	 *
	 * @return garment array ()
	 */
	public function get_batch_garment_info_by_history($offset, $limit, $user_id = FALSE){
		if ($user_id) {
			$this->db->select('*')->from('garment')->join('user_garment','garment.garment_id = user_garment.garment_id')->where(array('user_garment.user_id' => $user_id, 'expired' => 1, 'enabled' => 1))->order_by('garment.garment_id desc')->limit($limit, $offset);
			$query = $this->db->get();
			if ($query->num_rows() == 0){
				return FALSE;
			}
			return $query->result_array();
		} else {
			return FALSE;
		}
	}
	/**
	 * get_batch_garment_info_by_find
	 * Read batch garment's info
	 * Returning url, image, ...
	 *
	 * @return garment array ()
	 */
	public function get_batch_garment_info_by_find($offset, $limit, $user_id = FALSE){
		if ($user_id) {

			$this->db->select('*')->from('garment')->join('user_garment','garment.garment_id = user_garment.garment_id')->where(array('user_garment.user_id' => $user_id,'garment.import_user_id' => $user_id, 'enabled' => 1, 'expired' => 0))->order_by('garment.garment_id desc')->limit($limit, $offset);
			
			$query = $this->db->get();
			if ($query->num_rows() == 0){
				return FALSE;
			}
			return $query->result_array();
		} else {
			return FALSE;
		}
	}
	/**
	 * get_batch_garment_info_by_dressing_room
	 * Read batch garment's info
	 * Returning url, image, ...
	 *
	 * @return garment array ()
	 */
	public function get_batch_garment_info_by_dressing_room($offset, $limit, $user_id = FALSE){
		if ($user_id) {
			$this->db->select('*')->from('garment')->join('user_garment','garment.garment_id = user_garment.garment_id')->where(array('user_garment.user_id' => $user_id, 'dressing_room' => 1, 'enabled' => 1, 'expired' => 0))->order_by('garment.garment_id desc')->limit($limit, $offset);
			$query = $this->db->get();
			if ($query->num_rows() == 0){
				return FALSE;
			}
			return $query->result_array();
		} else {
			return FALSE;
		}
	}
	/**
	 * get_batch_garment_info_by_occasion_id
	 * Read batch garment's info
	 * Returning url, image, ...
	 *
	 * @return garment array ()
	 */
	public function get_batch_garment_info_by_occasion_id($offset, $limit, $user_id = FALSE, $occasion_id = FALSE){
		if ($occasion_id) {
			$this->db->select('*')->from('garment')->join('garment_occasion', 'garment.garment_id = garment_occasion.garment_id', 'left')->where(array('occasion_id' => $occasion_id))->order_by('garment.garment_id', 'desc')->limit($limit, $offset);
			$query = $this->db->get();
			if ($query->num_rows() == 0){
				return FALSE;
			}
			$return_array = $query->result_array();
			return $return_array;
		} else {
			return FALSE;
		}
	}
	/**
	 * get_batch_garment_info_by_similar_garment_id
	 * Read batch garment's info
	 * Returning url, image, ...
	 *
	 * @return garment array ()
	 */
	public function get_batch_garment_info_by_similar_garment_id($offset, $limit, $user_id = FALSE, $garment_id = FALSE){
		if ($garment_id) {
			//get current garment criteria_ids
			$query_criteria_ids = 'SELECT GROUP_CONCAT(criteria_id) AS criteria_ids FROM pas_garment_criteria WHERE garment_id = ?';
			$criteria_ids = $this->db->query($query_criteria_ids, array($garment_id))->row()->criteria_ids;
			//get similar garments
			$this->db->select('*, COUNT(criteria_id) as similarity')->from('garment')->join('garment_criteria', 'garment.garment_id = garment_criteria.garment_id', 'left')->where('garment.garment_id <>', $garment_id)->where_in('criteria_id', explode(',', $criteria_ids))->group_by('garment.garment_id')->order_by('similarity', 'desc')->limit($limit, $offset);
			if ($user_id) {
				$this->db->join('user_garment','garment.garment_id = user_garment.garment_id','left')->where(array('user_garment.user_id' => $user_id, 'user_garment.score >' => 6));
			}
			$query = $this->db->get();
			if ($query->num_rows() == 0){
				return FALSE;
			}
			$return_array = $query->result_array();
			return $return_array;
		} else {
			return FALSE;
		}
	}
	/**
	 * get_batch_garment_info_by_similar_garment_id
	 * Read batch garment's info
	 * Returning url, image, ...
	 *
	 * @return garment array ()
	 */
	public function get_batch_garment_info_by_body($offset, $limit, $user_id = FALSE, $body = FALSE){
		if ($body) {
			$user_specs_str = FALSE;
			if ($user_id){
				$query = $this->db->get_where('user_specs', array('user_id' => $user_id));
				if ($query->num_rows() == 0){
					$user_specs_str = FALSE;
				} else {
					$user_specs_str = $query->row_array()['column'];
				}
			}
			$this->db->distinct('garment_id')->from('garment');
			if ($user_specs_str){
				$this->db->join('user_garment','garment.garment_id = user_garment.garment_id','left')->join('body_garment','garment.garment_id = body_garment.garment_id','left')->join('body_type','body_garment.body_type_id = body_type.body_type_id','left')->where(array('user_garment.user_id' => $user_id, 'body_type.body_type_name' => $body))->order_by('body_garment.body_score', 'random');
				
			} else {
				$this->db->join('body_garment','garment.garment_id = body_garment.garment_id','left')->join('body_type','body_garment.body_type_id = body_type.body_type_id','left')->where(array('body_type.body_type_name' => $body))->order_by('body_garment.body_score', 'random');
			}
			$this->db->where(array('enabled' => 1, 'is_pattern' => 0, 'body_garment.body_score >=' => 7.3));
			$this->db->where_not_in('garment.category_id', array(33, 34, 35, 30, 38, 36));
			$this->db->limit($limit, $offset);
			$query = $this->db->get();
			if ($query->num_rows() == 0){
				return FALSE;
			}
			$return_array = $query->result_array();
			return $return_array;
		} else {
			return FALSE;
		}
	}
	/**
	 * get_batch_garment_info_by_occasion_category_and_criteria_ids
	 * Read batch garment's info
	 * Returning url, image, ...
	 *
	 * @return garment array ()
	 */
	public function get_batch_garment_info_by_occasion_category_and_criteria_ids($offset, $limit, $user_id = FALSE, $occasion_ids = FALSE, $category_ids = FALSE, $criteria_ids = FALSE){
		if ($occasion_ids) {
			$user_specs_str = FALSE;
			if ($user_id){
				$query = $this->db->get_where('user_specs', array('user_id' => $user_id));
				if ($query->num_rows() == 0){
					$user_specs_str = FALSE;
				} else {
					$user_specs_str = $query->row_array()['column'];
				}
			}
			if ($criteria_ids) {
				$index = 0;
				$criterias = array();
				foreach ($criteria_ids as $row){
					if (!empty($row)){
						$values = explode(',', $row);
						foreach ($values as $value){
							$criterias[$index][] = array('criteria_id' => $value, 'can_use' => TRUE);
						}
						$index++;
					}
				}
				$finished_criterias = array();
				$finished_criterias[] = $criterias[0];
				for ($i = 1; $i < count($criterias); $i++) {
					for ($j = 0; $j < count($criterias[$i]); $j++) {
						$result = $this->get_showif_hideif_by_criteria_id($criterias[$i][$j]['criteria_id']);
						if (!(empty($result['field_showif']) && empty($result['field_hideif']))){
							for ($k = 0; $k < count($finished_criterias); $k++){
								for ($l = 0; $l < count($finished_criterias[$k]); $l++) {
									if ($finished_criterias[$k][$l]['can_use']){
										$finished_criterias[$k][$l]['can_use'] = !$this->judge_field_by_criteria_id($result['field_showif'], $result['field_hideif'], array($finished_criterias[$k][$l]['criteria_id']));
									}
								}
							}
						}
						if (!(empty($result['criteria_showif']) && empty($result['criteria_hideif']))){
							for ($k = 0; $k < count($finished_criterias); $k++){
								for ($l = 0; $l < count($finished_criterias[$k]); $l++) {
									if ($finished_criterias[$k][$l]['can_use']){
										$finished_criterias[$k][$l]['can_use'] = !$this->judge_criteria_by_criteria_id($result['criteria_showif'], $result['criteria_hideif'], array($finished_criterias[$k][$l]['criteria_id']));
									}
								}
							}
						}
					}
					$finished_criterias[] = $criterias[$i];
				}
				$first_criterias = array();
				$last_criterias = array();
				for ($i = 0; $i < count($finished_criterias); $i++) {
					$first_criterias = array_merge($first_criterias, $last_criterias);
					$last_criterias = array();
					for ($j = 0; $j < count($finished_criterias[$i]); $j++) {
						if ($finished_criterias[$i][$j]['can_use']){
							$last_criterias[] = $finished_criterias[$i][$j]['criteria_id'];
						}
					}
				}
				$criteria = array($first_criterias, $last_criterias);
				
				$sql_query = 'SELECT distinct(d0.garment_id) FROM pas_garment_criteria AS d0';
				if (count($criteria) == 1){
					if (count($criteria[0]) == 1){
						$sql_query.= ' WHERE d0.criteria_id = '.$criteria[0][0];
					} else {
						$sql_query.= ' WHERE d0.criteria_id IN ('.implode(', ', $criteria[0]).')';
					}
				} else {
					$where_clause = array();
					if (count($criteria[0]) == 1){
						$where_clause[] = 'd0.criteria_id = '.$criteria[0][0];
					} else {
						$where_clause[] = 'd0.criteria_id IN ('.implode(', ', $criteria[0]).')';
					}
					for ($i = 1; $i < count($criteria); $i++){
						$sql_query .= ', pas_garment_criteria AS d'.$i;
						$where_clause[] = 'd0.garment_id = d'.$i.'.garment_id';
						if (count($criteria[$i]) == 1){
							$where_clause[] = 'd'.$i.'.criteria_id = '.$criteria[$i][0];
						} else {
							$where_clause[] = 'd'.$i.'.criteria_id IN ('.implode(', ', $criteria[$i]).')';
						}
					}
					$sql_query.= ' WHERE '.implode(' AND ', $where_clause);
				}
				$this->db->join('('.$sql_query.') AS criteria', 'garment.garment_id = criteria.garment_id', 'right');
			}
			$this->db->distinct('garment_id')->from('garment');
			if ($user_specs_str){
				$this->db->join('user_garment','garment.garment_id = user_garment.garment_id','left')->join('body_garment','garment.garment_id = body_garment.garment_id','left')->where(array('user_garment.user_id' => $user_id, 'body_garment.body_type_id' => 9))->order_by('body_garment.body_score', 'random');
				
			} else {
				$this->db->join('body_garment','garment.garment_id = body_garment.garment_id','left')->where(array('body_garment.body_type_id' => 9))->order_by('body_garment.body_score', 'random');
			}
			$this->db->where(array('enabled' => 1, 'is_pattern' => 0, 'body_garment.body_score >=' => 7.3));
			$this->db->join('garment_occasion', 'garment.garment_id = garment_occasion.garment_id', 'left');
			if (count($occasion_ids) == 1) {
				$this->db->where('garment_occasion.occasion_id', $occasion_ids[0]);
			} else {
				$this->db->where_in('garment_occasion.occasion_id', $occasion_ids);
			}
			if ($category_ids){
				if (count($category_ids) == 1) {
					$this->db->where('garment.category_id', $category_ids[0]);
				} else {
					$this->db->where_in('garment.category_id', $category_ids);
				}
			}
			$this->db->limit($limit, $offset);
			$query = $this->db->get();
			if ($query->num_rows() == 0){
				return FALSE;
			}
			$return_array = $query->result_array();
			return $return_array;
		} else {
			return FALSE;
		}
	}
	/**
	 * get_batch_garment_info
	 * Read batch garment's info
	 * Returning url, image, ...
	 *
	 * @return garment array ()
	 */
	public function get_batch_garment_info($offset, $limit, $user_id = FALSE){
		if ($user_id){
			//if user has logged in
			$return_array = $this->get_batch_garment_score($user_id, $offset, $limit);
		} else {
			//if user has not logged in
			$this->db->select('*')->from('garment')->order_by('garment_id', 'desc')->limit($limit, $offset);
			$query = $this->db->get();
			if ($query->num_rows() == 0){
				return FALSE;
			}
			$return_array = $query->result_array();
		}
		return $return_array;
	}
	/**
	 * get_batch_garment_score
	 * Read batch garment's with score 
	 * Returning url, image, ...
	 *
	 * @return garment array ()
	 */
	private function get_batch_garment_score($user_id, $offset, $limit){
		//need rewrite
		
		
		/* //$this->db->select('*')->from('garment')->join('user_garment','garment.garment_id = user_garment.garment_id', 'left')->order_by('score', 'desc')->limit($limit, $offset);
		//read historical data
		$this->db->select('*')->from('user_garment')->join('garment','garment.garment_id = user_garment.garment_id', 'right')->order_by('score', 'desc');
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return FALSE;
		}
		$return_array = $query->result_array();
		$need_create_cache = FALSE;
		foreach ($return_array as $row){
			if (null == $row['score']){
				//no historical data for this garment, try recreate
				$this->get_garment_score($user_id, $row['garment_id']);
				$need_create_cache = TRUE;
			}
		}
		if ($need_create_cache){
			//if no historical data, re-order.
			$this->db->select('*')->from('user_garment')->join('garment','garment.garment_id = user_garment.garment_id', 'right')->order_by('score', 'desc')->limit($limit, $offset);
			$query = $this->db->get();
			if ($query->num_rows() == 0){
				return FALSE;
			}
			return $query->result_array();
		} else {
			return array_slice($return_array, $offset, $limit);
		}
		return FALSE; */
		
		return $this->get_batch_garment_score_no_cache($user_id, $offset, $limit);
	}
	/**
	 * get_batch_garment_score_no_cache
	 * Read batch garment's with score with no cache
	 * Returning url, image, ...
	 *
	 * @return garment array ()
	 */
	private function get_batch_garment_score_no_cache($user_id, $offset, $limit){
		$query = $this->db->get_where('user_specs', array('user_id' => $user_id));
		//check if user specs exists
		if ($query->num_rows() == 0){
			return FALSE;
		} else {
			//calculate result
			$user_specs_str = $query->row_array()['column'];
			$query_str = "SELECT * FROM pas_garment RIGHT JOIN (SELECT garment_id, (AVG(LEAST(".$user_specs_str.")) + MIN(LEAST(".$user_specs_str."))) / 2 AS `score` FROM `pas_garment_specs` GROUP BY `garment_id` ) AS Scores ON (`pas_garment`.garment_id = Scores.garment_id) ORDER BY score DESC, date_created DESC LIMIT ".$offset.",".$limit;
			$query = $this->db->query($query_str);
			$result = $query->result_array();
			return $result;
		}
	}
	/**
	 * get_batch_garment_score_by_user_specs
	 * Read batch garment's with score with no cache
	 * Returning url, image, ...
	 *
	 * @return garment array ()
	 */
	public function get_batch_garment_score_by_user_specs($user_specs_str, $offset, $limit){
		//calculate result
		$query_str = "SELECT * FROM pas_garment RIGHT JOIN (SELECT garment_id, (AVG(LEAST(".$user_specs_str.")) + MIN(LEAST(".$user_specs_str."))) / 2 AS `score` FROM `pas_garment_specs` GROUP BY `garment_id` ) AS Scores ON (`pas_garment`.garment_id = Scores.garment_id) WHERE score > 7.3 AND (category_id = 31 OR category_id = 22 OR category_id = 23 OR category_id = 37 OR category_id = 21 OR category_id = 29) AND enabled = 1 AND is_pattern = 0 AND is_standard = 1 ORDER BY RAND() LIMIT ".$offset.",".$limit;
		$query = $this->db->query($query_str);
		$result = $query->result_array();
		return $result;
	}
	/**
	 * update_all_score
	 * Read batch garment's with score with no cache
	 * Returning url, image, ...
	 *
	 * @return garment array ()
	 */
	public function update_all_score($user_id){
		$query = $this->db->get_where('user_specs', array('user_id' => $user_id));
		//check if user specs exists
		if ($query->num_rows() == 0){
			return FALSE;
		} else {
			//calculate result
			$user_specs_str = $query->row_array()['column'];
			$query_str = 'INSERT INTO pas_user_garment (user_id, garment_id, score, expired) SELECT '.$user_id.' AS user_id, scores.garment_id AS garment_id, scores.score AS score, 0 AS expired FROM (SELECT garment_id, (AVG(LEAST('.$user_specs_str.')) + MIN(LEAST('.$user_specs_str.'))) / 2 AS `score` FROM `pas_garment_specs` GROUP BY `garment_id`) AS scores WHERE scores.score IS NOT NULL ON DUPLICATE KEY UPDATE score = VALUES(score)';
			$query = $this->db->query($query_str);
		}
	}
	public function get_user_list(){
		$this->db->select('user_id');
		$query = $this->db->get('user_specs');
		$result = $query->result_array();
		return $result;
	}
	/**
	 * get_occasion_id
	 *
	 * @return occasion_id
	 */
	public function get_occasion_id($garment_id = FALSE){
		if (!$garment_id) {
			return FALSE;
		} else {
			$query = $this->db->get_where('garment_occasion', array('garment_id' => $garment_id));
			if ($query->num_rows() == 0){
				return FALSE;
			} else {
				return $query->row_array()['occasion_id'];
			}
		}
	}
	/**
	 * get_top_stores
	 *
	 * @return stores
	 */
	public function get_top_stores($offset, $limit){
		$query = $this->db->select('store, COUNT(garment_id) AS store_count')->from('garment')->group_by('store')->order_by('store_count desc')->where('store <>', '')->limit($limit, $offset)->get();
		if ($query->num_rows() == 0){
			return FALSE;
		} else {
			return $query->result_array();
		}
	}
	/**
	 * get_search_stores
	 *
	 * @return stores
	 */
	public function get_search_stores($offset, $limit, $store){
		$query = $this->db->select('store, COUNT(garment_id) AS store_count')->from('garment')->group_by('store')->order_by('store_count desc')->like('store', $store)->limit($limit, $offset)->get();
		if ($query->num_rows() == 0){
			return FALSE;
		} else {
			return $query->result_array();
		}
	}
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Update Garment Info
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	/**
	 * update_garment_dressing_room
	 *
	 * 
	 */
	public function update_garment_dressing_room($garment_id, $user_id = FALSE, $dressing_room_value = 0)
	{
		if ($user_id) {
			$data = array(
				'dressing_room' => $dressing_room_value,
			);
			$this->db->where(array('garment_id' => $garment_id, 'user_id' => $user_id))->update('user_garment', $data);
		} else {
			$data = array(
				'dressing_room' => $dressing_room_value,
			);
			$this->db->where(array('garment_id' => $garment_id))->update('user_garment', $data);
		}
	}
	/**
	 * update_garment_info
	 *
	 * @return 
	 */
	public function update_garment_info($garment_id, $data)
	{
		$this->db->where('garment_id', $garment_id)->update('garment', $data);
	}
	/**
	 * update_garment_click
	 *
	 * @return 
	 */
	public function update_garment_click($garment_id)
	{
		$this->db->where('garment_id', $garment_id)->set('click_num', 'click_num + 1', FALSE)->update('garment');
	}
	
	/**
	 * update_user_garment_favorite
	 *
	 * @return 
	 */
	public function update_user_garment_favorite($garment_id, $user_id) {
		if ($user_id) {
			$current_favorite = $this->db->get_where('user_garment', array('user_id' => $user_id, 'garment_id' => $garment_id))->row()->favorite;
			if ($current_favorite == 1){
				$data = array('favorite' => -1);
			} else {
				$data = array('favorite' => 1);
			}
			return $this->db->where(array('garment_id' => $garment_id, 'user_id' => $user_id))->update('user_garment', $data);
		} else {
			return FALSE;
		}
	}
	/**
	 * update_user_garment_favorite_history
	 *
	 * @return 
	 */
	public function update_user_garment_favorite_history($garment_id, $user_id) {
		if ($user_id) {
			$this->db->set('expired', 'NOT `expired`', FALSE)->where(array('garment_id' => $garment_id, 'user_id' => $user_id))->update('user_garment');
		} else {
			return FALSE;
		}
	}
	/**
	 * update_user_garment_wardrobe
	 *
	 * @return 
	 */
	public function update_user_garment_wardrobe($garment_id, $user_id) {
		if ($user_id) {
			$this->db->set('wardrobe', 'NOT `wardrobe`', FALSE)->where(array('garment_id' => $garment_id, 'user_id' => $user_id))->update('user_garment');
		} else {
			return FALSE;
		}
	}
	/**
	 * update_user_garment_clear_history
	 *
	 * @return 
	 */
	public function update_user_garment_clear_history($user_id) {
		if ($user_id) {
			$data = array('favorite' => 0);
			return $this->db->where(array('user_id' => $user_id, 'favorite' => -1))->update('user_garment', $data);
		} else {
			return FALSE;
		}
	}
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Insert Garment Info
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	/**
	 * insert_garment
	 *
	 * 
	 */
	public function insert_garment($user_id, $name, $brand, $store, $url, $image_url, $price_range, $category_id, $image_path, $extra_image1_path, $extra_image2_path, $description, $is_standard = FALSE, $is_pattern)
	{
		$data = array(
			'import_user_id' => $user_id,
			'name' => $name,
			'brand' => $brand,
			'store' => $store,
			'url' => $url,
			'image_url' => $image_url,
			'price_range' => $price_range,
			'category_id' => $category_id,
			'image_path' => $image_path,
			'extra_image1_path' => $extra_image1_path,
			'extra_image2_path' => $extra_image2_path,
			'date_created' => date('Y-m-d H:i:s'),
			'new_system' => 1,
			'description' => $description,
			'is_standard' => $is_standard,
			'is_pattern' => $is_pattern,
		);
		$this->db->insert('garment', $data);
		return $this->db->insert_id();
	}
	/**
	 * insert_garment_image
	 *
	 * 
	 */
	public function insert_garment_image($image_url)
	{
		$image_url = prep_url($image_url);
		$image_path = random_string('unique').'.jpg';
		$path = $this->config->item('base_upload_path') . '/public_html/images/garment/';
		file_put_contents($path.$image_path, file_get_contents($image_url));
		return $image_path;
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
	/**
	 * insert_garment_dressing_room
	 *
	 * 
	 */
	public function insert_garment_dressing_room($garment_id, $user_id = FALSE)
	{
		if ($user_id) {
			$data = array(
				'garment_id' => $garment_id,
				'user_id' => $user_id,
				'dressing_room' => 1,
			);
			$this->db->insert('user_garment', $data);
			return $this->db->insert_id();
		} else {
			return FALSE;
		}
	}
	/**
	 * @return a collection of garments
	 */
	public function get( $parameters, $limit, $offset, $count = false ) {
		$this->db->select( '*' )->from( 'garment' );
		foreach ( $parameters as $key => $values ) {
			if ( $key == 'colour_id' ) $this->db->join( 'garment_colour', 'garment.garment_id = garment_colour.garment_id', 'left' );
			foreach ( $values as $value )
				$this->db->where( array( $key => $value ) );
		}

		if ( !$count ) $this->db->limit( $limit, $offset );
		$query = $this->db->get();

		if ( $count ) return $query->num_rows();

		if ( $query->num_rows() < 1 ) return array();
		return $query->result_array();
	}

	/**
	 * @return the total amount of garments available
	 */
	public function count_all( $parameters ) {
		return $this->get( $parameters, 0, 0, true );
	}
	
	public function get_similar_products(){
		$this->db->select('*')->from('garment')->limit('10');
		$query = $this->db->get();
		return $query->result_array();
		}
	
}

/* End of file garment_model.php */
/* Location: ./application/models/garment_model.php */
