<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Name: PAS Occasion Model
*
* Author: 
* Jifeng Sun
* rob@asmex.com.au
*
* Copyright 2014 Jifeng Sun
*
* Description: Prêt à Styler 2.0 Occasion model, contains methods to CRUD an occasion.
* Released: 28/10/2014
* Requirements: PHP5 or above and Codeigniter 2.0+
*/

class Occasion_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Read Occasion Info
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * get_available_occasions
	 * Get Available Occasion 
	 * Returning 
	 *
	 * @return colour array if existed, if not return FALSE
	 */
	public function get_available_occasions(){
		$this->db->select('*')->from('occasion')->where('status', 1)->order_by('order', 'asc');
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return FALSE;
		}
		$return_array = $query->result_array();
		return $return_array;
	}
	/**
	 * get_garment_occasions
	 * Get Garment Occasion 
	 * Returning 
	 *
	 * @return colour array if existed, if not return FALSE
	 */
	public function get_garment_occasions($garment_id){
		$this->db->select('pas_occasion.*, IF(garment_occasion_id IS NOT NULL, 1, 0) AS checked', FALSE)->from('occasion')->where('status', 1)->join('garment_occasion', 'occasion.occasion_id = garment_occasion.occasion_id AND garment_id = '.$garment_id, 'left')->order_by('order', 'asc');
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return FALSE;
		}
		$return_array = $query->result_array();
		return $return_array;
	}
	/**
	 * get_occasion_map
	 * Get Available Occasion Map
	 * Returning 
	 *
	 * @return colour array if existed, if not return FALSE
	 */
	public function get_occasion_map(){
		$this->db->select('*')->from('occasion')->where('status', 1)->order_by('order', 'asc');
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return FALSE;
		}
		$colour_array = $query->result_array();
		$return_array = array();
		foreach ($colour_array as $row) {
			$return_array[$row['name']] = $row['occasion_id'];
		}
		return $return_array;
	}
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Insert Occasion Info
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	/**
	 * insert_garment_occasion
	 *
	 * 
	 */
	public function insert_garment_occasion($garment_id, $occasion_ids){
		$data = array();
		foreach ($occasion_ids as $occasion_id){
			$data[] = array(
				'garment_id' => $garment_id,
				'occasion_id' => $occasion_id,
			);
		}
		$this->db->insert_batch('garment_occasion', $data);
	}
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Delete Occasion Info
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	/**
	 * delete_garment_occasion
	 *
	 * 
	 */
	public function delete_garment_occasion($garment_id){
		return $this->db->delete('garment_occasion', array('garment_id' => $garment_id));
	}
}

/* End of file occasion_model.php */
/* Location: ./application/models/occasion_model.php */
