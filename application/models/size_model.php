<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Name: PAS Size Model
*
* Author: 
* Jifeng Sun
* rob@asmex.com.au
*
* Copyright 2014 Jifeng Sun
*
* Description: Pr¨ºt ¨¤ Styler 2.0 Size model, contains methods to CRUD a size.
* Released: 28/10/2014
* Requirements: PHP5 or above and Codeigniter 2.0+
*/

class Size_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Read Size Info
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * get_garment_size
	 * Get Sizes of a garment
	 * Returning 
	 *
	 * @return size array if existed, if not return FALSE
	 */
	public function get_garment_size($garment_id){
		$this->db->select('region, size')->from('garment_size')->where('garment_id', $garment_id)->order_by('garment_size_id', 'asc');
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return FALSE;
		}
		$return_array = $query->result_array();
		return $return_array;
	}
	/**
	 * get_import_size_initial
	 * Get Sizes of a garment
	 * Returning 
	 *
	 * @return size array if existed, if not return FALSE
	 */
	public function get_import_size_initial($category_id, $garment_id = FALSE){
		$size_data = array();
		switch ($category_id) {
			case 33:
			case 34:
			case 35:
				return array();
				break;
			case 25:
			case 28:
			case 24:
				$type = 'BOT';
				$select_region = 'AUS';
				break;
			case 30:
				$type = 'SHO';
				$select_region = 'AUS';
				break;
			case 36:
				$type = 'HAT';
				$select_region = 'ALL';
				break;
			case 38:
				$type = 'WRI';
				$select_region = 'ALL';
				break;
			default:
				$type = 'OVR';
				$select_region = 'AUS';
		}
		//return back type info
		$size_data['type'] = $type;
		
		if (!empty($garment_id)){
			$query = $this->db->get_where('garment_size', array('garment_id' => $garment_id), 1, 0);
			if ($query->num_rows() >= 1){
				$select_region = $query->row()->region;
			}
		}
		
		//generate region list
		if ($select_region == 'ALL') {
			$size_data['regions'] = array(array('name' => 'ALL', 'selected' => TRUE));
		} else {
			$size_data['regions'] = array(
										array('name' => 'AUS', 'selected' => ($select_region == 'AUS')),
										array('name' => 'EUR', 'selected' => ($select_region == 'EUR')),
										array('name' => 'UK', 'selected' => ($select_region == 'UK')),
										array('name' => 'USA', 'selected' => ($select_region == 'USA')),
									);
		}
		
		//generate sizes list
		
		$size_data['sizes'] = $this->get_import_size_new_data($select_region, $type, $garment_id);
		return $size_data;
	}
	/**
	 * get_import_size_new_data
	 * Get Sizes of a garment
	 * Returning 
	 *
	 * @return size array if existed, if not return FALSE
	 */
	public function get_import_size_new_data($region, $type, $garment_id = FALSE){
		//generate sizes list
		if ($garment_id){
			$size_data = $this->db->select('Value AS name, IF(garment_id IS NOT NULL, 1, 0) AS checked', FALSE)->from('size')->join('garment_size', 'garment_size.size = size.`Value` AND garment_id = '.$garment_id, 'left')->where(array('size.Region' => $region, 'size.Type' => $type))->order_by('order', 'asc')->get()->result_array();
		} else {
			$size_data = $this->db->select('Value AS name')->from('size')->where(array('Region' => $region, 'Type' => $type))->order_by('order', 'asc')->get()->result_array();
		}
		return $size_data;
	}
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Insert Size Info
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * insert_garment_size
	 * Get Sizes of a garment
	 * Returning 
	 *
	 * @return size array if existed, if not return FALSE
	 */
	public function insert_garment_size($garment_id, $region, $sizes){
		$data = array();
		foreach ($sizes as $size){
			$data[] = 	array(
							'garment_id' => $garment_id,
							'region' => $region,
							'size' => $size,
						);
		}
		$this->db->insert_batch('garment_size', $data);
		return TRUE;
	}
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Delete Size Info
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	/**
	 * delete_garment_size
	 *
	 * 
	 */
	public function delete_garment_size($garment_id){
		return $this->db->delete('garment_size', array('garment_id' => $garment_id));
	}
}

/* End of file size_model.php */
/* Location: ./application/models/size_model.php */
