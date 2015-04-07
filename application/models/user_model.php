<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Name: PAS User Model
*
* Author: 
* Jifeng Sun
* rob@asmex.com.au
*
* Copyright 2014 Jifeng Sun
*
* Description: Prêt à Styler 2.0 User  model, contains methods to CRUD user spec.
* Released: 28/10/2014
* Requirements: PHP5 or above and Codeigniter 2.0+
*/

class User_model extends CI_Model
{
	public function __construct() 
	{
		$this->load->database();
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Read User Specs
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * get_user_specs
	 * Read user's spec by user_id 
	 * Returning url, image, ...
	 *
	 * @return garment array ()
	 */
	public function get_user_specs($user_id)
	{
		$query = $this->db->get_where('user_specs', array('user_id' => $user_id));
		//check if user specs exists
		if ($query->num_rows() == 0){
			return FALSE;
		} else {
			return $query->row_array();
		}
	}
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Update User Specs
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * update_user_specs
	 * Read user's spec by user_id 
	 * Returning url, image, ...
	 *
	 * @return garment array ()
	 */
	public function update_user_specs($user_id, $data)
	{
		
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Insert User Specs
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	/**
	 * insert_user_specs
	 * Read user's info by user_id 
	 * Returning url, image, ...
	 *
	 * @return garment array ()
	 */
	public function insert_user_specs($user_id, $data)
	{
		
	}
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Read User Info
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	/**
	 * get_basic_preferences
	 * Read user's spec by user_id 
	 * 
	 *
	 * @return garment array ()
	 */
	public function get_basic_preferences($user_id = FALSE)
	{
		if ($user_id) {
			$query = $this->db->select('preferences')->from('user_info')->where(array('user_id' => $user_id))->get();
			if ($query->num_rows >= 1){
				return $query->row_array()['preferences'];
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}
	/**
	 * get_user_info
	 * Read user's spec by user_id 
	 * 
	 *
	 * @return garment array ()
	 */
	public function get_user_info($user_id = FALSE)
	{
		if ($user_id) {
			$query = $this->db->get_where('user_info',array('user_id' => $user_id));
			if ($query->num_rows >= 1){
				return $query->row_array();
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}
	/**
	 * get_all_user_info
	 * Read user's spec by user_id 
	 * 
	 *
	 * @return garment array ()
	 */
	public function get_all_user_info()
	{
		$query = $this->db->order_by('user_id')->get('user_info');
		$query = $this->db->select('user_id, first_name, last_name, user_accounts.uacc_email AS email, garment_info.garments, uacc_active AS active')->from('user_info')->join('user_accounts', 'user_info.user_id = user_accounts.uacc_id')->join('(SELECT import_user_id, COUNT(garment_id) AS garments FROM pas_garment GROUP BY import_user_id) AS garment_info', 'user_info.user_id = garment_info.import_user_id', 'left')->order_by('user_id')->get();
		if ($query->num_rows >= 1){
			return $query->result_array();
		} else {
			return FALSE;
		}
	}
	
	/**
	 * get_user_name
	 * Read user's spec by user_id 
	 * 
	 *
	 * @return user array ()
	 */
	public function get_user_name($user_id = FALSE)
	{
		$error_array = array('first_name' => 'Something Wrong', 'last_name' => 'Something Wrong');
		if ($user_id){
			$query = $this->db->get_where('user_info', array('user_id' => $user_id));
			if ($query->num_rows() == 0){
				return $error_array;
			} else {
				return $query->row_array();
			}
		} else {
			return $error_array;
		}
	}
	/**
	 * get_all_countries
	 * Read All countries
	 * 
	 *
	 * @return user array ()
	 */
	public function get_all_countries()
	{
		$query = $this->db->get('country');
		if ($query->num_rows >= 1){
			$country_info = $query->result_array();
		} else {
			return FALSE;
		}
		return $country_info;
	}
	/**
	 * get_countries
	 * Read countries
	 * 
	 *
	 * @return user array ()
	 */
	public function get_countries($user_id = FALSE)
	{
		$country_info = $this->get_all_countries();
		if ($user_id) {
			$user_info = $this->get_user_info($user_id);
			$country_info[12]['default'] = 0;
			foreach ($country_info as $country_key => $country_value) {
				if ($user_info['country_id'] == $country_value['country_id']) {
					$country_info[$country_key]['default'] = 1;
					break;
				}
			}
		}
		return $country_info;
	}
	/**
	 * get_user_values
	 * Read countries
	 * 
	 *
	 * @return user array ()
	 */
	public function get_user_values($user_id = FALSE, $type)
	{
		if ($type == 'height' || $type == 'weight' || $type == 'age' || $type == 'bra'){
			$query = $this->db->select('*')->from('user_value')->where(array('type' => $type, 'select_id <>' => -1))->order_by('select_id','asc')->get();
			if ($query->num_rows() >= 1){
				$value_data = $query->result_array();
				
				$query = $this->db->select($type.'_select_id')->from('user_info')->where(array('user_id' => $user_id))->get();
				if ($query->num_rows() >= 1){
					$select_id = $query->row_array()[$type.'_select_id'];
					
					foreach($value_data as $value_key => $value_value) {
						if ($value_value['select_id'] == $select_id){
							$value_data[$value_key]['selected'] = TRUE;
						} else {
							$value_data[$value_key]['selected'] = FALSE;
						}
					}
					return $value_data;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}
	/**
	 * get_user_size_region_list
	 * Read countries
	 * 
	 *
	 * @return user array ()
	 */
	public function get_user_size_region_list($user_id = FALSE)
	{
		$region_list = array();
		$types = array('OVR', 'BOT', 'TOP', 'SHO', 'HAT', 'WRI');
		foreach ($types as $type) {
			list($select_region, $region_list[$type]['size_list']) = $this->get_user_size_list($type, NULL, TRUE, $user_id);
			$region_list[$type]['regions'] = array(
				array('name' => 'AUS', 'selected'=> ($select_region == 'AUS')), 
				array('name' => 'EUR', 'selected'=> ($select_region == 'EUR')), 
				array('name' => 'UK', 'selected'=> ($select_region == 'UK')), 
				array('name' => 'USA', 'selected'=> ($select_region == 'USA'))
			);
			
		}
		return $region_list;
	}
	/**
	 * get_user_size_list
	 * Read countries
	 * 
	 *
	 * @return user array ()
	 */
	public function get_user_size_list($type, $select_region, $initial = FALSE, $user_id = FALSE) {
		if ($type == 'OVR' || $type == 'BOT' || $type == 'TOP' || $type == 'SHO' || $type == 'HAT' || $type == 'WRI'){
			if ($type == 'TOP') {
				$type = 'OVR';
			}
			$size_array = array();
			if ($initial){
				$size_array[0] = array('value' => 0 , 'name' => 'Please Select','selected'=> FALSE);
				$query = $this->db->select('ovr_region, ovr_size, bot_region, bot_size, top_region, top_size, shoe_region, shoe_value, shoe_size, hat_size, wrist_size')->from('user_info')->where(array('user_id' => $user_id))->get();
				$selected_data = $query->row_array();
				switch($type){
					case 'OVR': {
						$select_region = $selected_data['ovr_region'];
						$select_size = $selected_data['ovr_size'];
						break;
					}
					case 'BOT': {
						$select_region = $selected_data['bot_region'];
						$select_size = $selected_data['bot_size'];
						break;
					}
					case 'TOP': {
						$select_region = $selected_data['top_region'];
						$select_size = $selected_data['top_size'];
						break;
					}
					case 'SHO': {
						$select_region = $selected_data['shoe_region'];
						$select_size = $selected_data['shoe_size'];
						$select_value = $selected_data['shoe_value'];
						break;
					}
					case 'HAT': {
						$select_region = NULL;
						$select_size = $selected_data['hat_size'];
						break;
					}
					case 'WRI': {
						$select_region = NULL;
						$select_size = $selected_data['wrist_size'];
						break;
					}
					default: {
						$select_region = NULL;
						$select_size = NULL;
						break;
					}
				}
			} else {
				$size_array[0] = array('value' => 0 , 'name' => 'Please Select', 'selected'=> TRUE);
			}
			if ($type == 'OVR' || $type == 'BOT' || $type == 'TOP'){
				$query = $this->db->select('name')->from('size_group')->where('thetype', $type)->order_by('position', 'asc')->get();
				$i = 0;
				foreach ($query->result_array() as $line) {
					$sql_max = "SELECT Value, `order` FROM pas_size WHERE Region = ? AND `Type` = ? AND `order` = (SELECT MAX(`order`) FROM pas_size WHERE `order` < 100 and Region = ? AND `Type` = ? AND sizegroups LIKE '%|".$line['name']."|%')";
					$sql_min = "SELECT Value, `order` FROM pas_size WHERE Region = ? AND `Type` = ? AND `order` = (SELECT MIN(`order`) FROM pas_size WHERE `order` < 100 and Region = ? AND `Type` = ? AND sizegroups LIKE '%|".$line['name']."|%')";
					if ($i == 0) {
						$query_max = $this->db->query($sql_max, array($select_region, $type, $select_region, $type));
						$text = "up to Size " . $query_max->row_array()['Value'];
					} else if ($i == 8) {
						$query_min = $this->db->query($sql_min, array($select_region, $type, $select_region, $type));
						$text = "Size " . $query_min->row_array()['Value'] . " and larger";
					} else {
						$query_min = $this->db->query($sql_min, array($select_region, $type, $select_region, $type));
						$query_max = $this->db->query($sql_max, array($select_region, $type, $select_region, $type));
						if ($query_min->row_array()['Value'] == $query_max->row_array()['Value']) {
							$text = "Size " . $query_max->row_array()['Value'];
						} else {
							$text = "Size " . $query_min->row_array()['Value'] . " to " . $query_max->row_array()['Value'];
						}
					}
					$size_array[] = array('value' =>$line['name'], 'name' => $text, 'selected'=> ($initial && $select_size == $line['name']));
					$i++;
				}
			} else if ($type == 'HAT' || $type == 'WRI'){
				$query = $this->db->select('name, displayname')->from('size_group')->where('thetype', $type)->order_by('position', 'asc')->get();
				foreach ($query->result_array() as $line) {
					$size_array[] = array('value' =>$line['name'], 'name' => $line['displayname'], 'selected'=> ($initial && $select_size == $line['name']));
				}
			} else if ($type == 'SHO'){
				$query = $this->db->select('Value, SizeMM')->from('size')->where(array('Region' => $select_region, 'Type' => $type, 'order <' => 100))->order_by('order', 'asc')->get();
				foreach ($query->result_array() as $line) {
					$size_array[] = array('value' =>$line['SizeMM'], 'name' => $line['Value'], 'selected'=> ($initial && ($select_size == $line['SizeMM'] || $select_value == $line['Value'])));
				}
			}
			return array($select_region, $size_array);
		} else {
			return FALSE;
		}
	}
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Update User Info
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * update_user_info
	 * Update user's spec by user_id 
	 * 
	 *
	 * @return garment array ()
	 */
	public function update_user_info($user_id, $data)
	{
		$this->db->where('user_id', $user_id)->update('user_info', $data);
		return TRUE;
	}
	/**
	 * generate_user_specs
	 * Update user's spec by user_id 
	 * 
	 *
	 * @return garment array ()
	 */
	public function generate_user_specs($user_id)
	{
		$user_info = $this->get_user_info($user_id);
		$user_spec = array();
		//P34 - P47, P73 Prominent
		//H11 - H16 Horizontal
		//N17 - N21 Neck Length
		//N22 - N24 Neck Thickness
		//S27 - S28 Shoulder
		//W58 - W52, W69 Weight
		//B53 - B55 Bone
		//F60 - F70 Face
		//A56 - A59, A71 - A72 Age
		$sql_others = "SELECT user_spec FROM pas_user_value WHERE select_id = ? AND type = 'prominent_arms' UNION SELECT user_spec FROM pas_user_value WHERE select_id = ? AND type = 'prominent_back' UNION SELECT user_spec FROM pas_user_value WHERE select_id = ? AND type = 'prominent_legs' UNION SELECT user_spec FROM pas_user_value WHERE select_id = ? AND type = 'prominent_stomach' UNION SELECT user_spec FROM pas_user_value WHERE select_id = ? AND type = 'horizontal' UNION SELECT user_spec FROM pas_user_value WHERE select_id = ? AND type = 'neck_length' UNION SELECT user_spec FROM pas_user_value WHERE select_id = ? AND type = 'neck_thickness' UNION SELECT user_spec FROM pas_user_value WHERE select_id = ? AND type = 'shoulders' UNION SELECT user_spec FROM pas_user_value WHERE select_id = ? AND type = 'weight' UNION SELECT user_spec FROM pas_user_value WHERE select_id = ? AND type = 'bone' UNION SELECT user_spec FROM pas_user_value WHERE select_id = ? AND type = 'face' UNION SELECT user_spec FROM pas_user_value WHERE select_id = ? AND type = 'age'";
		$sql_ids = array(
			$user_info['prominent_arms_select_id'],
			$user_info['prominent_back_select_id'],
			$user_info['prominent_legs_select_id'],
			$user_info['prominent_stomach_select_id'],
			$user_info['horizontal_select_id'],
			$user_info['neck_length_select_id'],
			$user_info['neck_thickness_select_id'],
			$user_info['shoulders_select_id'],
			$user_info['weight_select_id'],
			$user_info['bone_select_id'],
			$user_info['face_select_id'],
			$user_info['age_select_id'],
		);
		$query = $this->db->query($sql_others, $sql_ids);
		$results = $query->result_array();
		foreach ($results as $result) {
			$user_spec[] = $result['user_spec'];
		}
		//V01 - V10 Vertical + Height
		if ($user_info['vertical_select_id'] == 1){
			//vertical is balanced
			if ($user_info['height_select_id'] == 1) {
				//height is short
				if ($user_info['weight_select_id'] >=4) {
					//weight is overweight, 4 5 6
					$user_spec[] = 'V09';
				} else {
					$user_spec[] = 'V10';
				}
			} else if ($user_info['height_select_id'] == 5) {
				//height is tall
				$user_spec[] = 'V07';
			} else {
				//else height, medium short, medium, medium tall
				$user_spec[] = 'V08';
			}
		} else if ($user_info['vertical_select_id'] == 2){
			//veritcal is long
			if ($user_info['height_select_id'] == 1) {
				//height is short
				$user_spec[] = 'V03';
			} else if ($user_info['height_select_id'] == 5) {
				//height is tall
				$user_spec[] = 'V01';
			} else {
				//else height, medium short, medium, medium tall
				$user_spec[] = 'V02';
			}
		} else if ($user_info['vertical_select_id'] == 3){
			//vertical is short
			if ($user_info['height_select_id'] == 1) {
				//height is short
				$user_spec[] = 'V06';
			} else if ($user_info['height_select_id'] == 5) {
				//height is tall
				$user_spec[] = 'V04';
			} else {
				//else height, medium short, medium, medium tall
				$user_spec[] = 'V05';
			}
		}
		//B29 - B33, B74 Bra + minBust + Height
		if ($user_info['bra_select_id'] == 1){
			$user_spec[] = 'B29';
		} else if ($user_info['bra_select_id'] == 2){
			$user_spec[] = 'B30';
		} else if ($user_info['bra_select_id'] == 3){
			if ($user_info['height_select_id'] == 1 && $user_info['minBust']){
				$user_spec[] = 'B32';
			} else {
				$user_spec[] = 'B31';
			}
		} else if ($user_info['bra_select_id'] == 4){
			if ($user_info['height_select_id'] == 1 && $user_info['minBust']){
				$user_spec[] = 'B33';
			} else {
				$user_spec[] = 'B32';
			}
		} else if ($user_info['bra_select_id'] == 5){
			if ($user_info['height_select_id'] == 1 && $user_info['minBust']){
				$user_spec[] = 'B74';
			} else {
				$user_spec[] = 'B33';
			}
		} else if ($user_info['bra_select_id'] == 6){
			$user_spec[] = 'B74';
		}
		//update or insert
		$user_spec_data = array(
			'user_id' => $user_id, 
			'column' => implode(',', $user_spec),
		);
		$this->db->from('user_specs')->where('user_id', $user_id);
		if ($this->db->count_all_results() == 0){
			$query = $this->db->insert('user_specs', $user_spec_data);
		} else {
			$query = $this->db->update('user_specs', $user_spec_data, array('user_id' => $user_id));
		}
	}
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Insert User Info
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	/**
	 * insert_user_first_name
	 * Insert User's info by user_id 
	 * Returning url, image, ...
	 *
	 * @return garment array ()
	 */
	public function insert_user_name($user_id, $first_name, $last_name)
	{
		if ($user_id){
			$data = array(
				'user_id' => $user_id,
				'first_name' => $first_name,
				'last_name' => $last_name,
			);
			return $this->db->insert('user_info', $data);
		} else {
			return FALSE;
		}
	}
	
	/**
	 * get_old_site_tables
	 * get all row of specified table
	 * $where1		= array ( 'field' => 'first_name', 'value' => 'Anil' )
	 * $where_in	= array ( 'field' => 'first_name', 'value' => array( 'Anil', 'Robert', 'Leo', 'Olivier' ) )
	 * Returning array
	 *
	 * @return boolean|array
	 */
	public function get_old_site_tables( $table = false, $where1 = array(), $where_in = array(), $limit, $offset )
	{

		if ( !empty( $table ) ){
			
			if( !empty($where1))
			{
				$query = $this->db->get_where( $table, array( $where1['field'] => $where1['value'] ) );
			}
			else if( !empty( $where_in ))
			{
				$this->db->select('*')->from($table)->where_in( $where_in['field'], $where_in['value'] );
				$query = $this->db->get();
				// $table, array( $where1['field'] => $where1['value']
			} 
			else {
				$query = $this->db->get( $table );
			}
			if ($query->num_rows() == 0){
				return false;
			}
			return $query->result_array();
			
		}
		return false;
		
	
	}
	
	
	
	public function get_garment_concat( $table, $where=false )
	{
		if ( !empty( $table ) ){
			
			if( !empty($where))
			{
				$query = $this->db->get_where( $table, $where);
			}
			else {
				$query = $this->db->get( $table);
			}
			if ($query->num_rows() == 0){
				return false;
			}
			return $query->result_array();
			
		}
		return false;
	
	}
	
	/**
	 * insert_new_data
	 * insert new data to specified table
	 * Returning id
	 *
	 * @return int
	 */
	public function insert_new_data( $table, $new_data )
	{
		if ( !empty( $table ) & !empty($new_data) ){
			
			/*
			$data = array(
				'user_id' => $user_id,
				'first_name' => $first_name,
			);
			*/
			return $this->db->insert( $table, $new_data);
			
		}
		return false;
	}
	
	public function get_user_acc ( $user_id ){
		if ($user_id) {
			$query = $this->db->get_where('user_accounts',array('uacc_id' => $user_id));
			if ($query->num_rows >= 1){
				return $query->row_array();
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
