<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Name: PAS Colour Model
*
* Author: 
* Jifeng Sun
* rob@asmex.com.au
*
* Copyright 2014 Jifeng Sun
*
* Description: Prêt à Styler 2.0 Colour model, contains methods to CRUD a colour.
* Released: 28/10/2014
* Requirements: PHP5 or above and Codeigniter 2.0+
*/

class Colour_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Read Colour Info
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * get_available_colours
	 * Get Available Colours 
	 * Returning 
	 *
	 * @return colour array if existed, if not return FALSE
	 */
	public function get_available_colours($second_half = FALSE){
		if (!$second_half){
			$this->db->select('*')->from('colour')->where('status', 1)->order_by('order', 'asc')->limit(11,0);
		} else if( $second_half == 'full' ) {
			$this->db->select('*')->from('colour')->where('status', 1)->order_by('order', 'asc');
		} else {
			$this->db->select('*')->from('colour')->where('status', 1)->order_by('order', 'asc')->limit(12,11);
		}
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return FALSE;
		}
		$return_array = $query->result_array();
		return $return_array;
	}
	/**
	 * get_colour_map
	 * Get Available Colours Map
	 * Returning 
	 *
	 * @return colour array if existed, if not return FALSE
	 */
	public function get_colour_map(){
		$this->db->select('*')->from('colour')->where('status', 1)->order_by('order', 'asc');
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return FALSE;
		}
		$colour_array = $query->result_array();
		$return_array = array();
		foreach ($colour_array as $row) {
			$return_array[$row['name']] = $row['colour_id'];
		}
		return $return_array;
	}
	/**
	 * get_garment_colour
	 * Get Colours of A garment
	 * Returning 
	 *
	 * @return colour array if existed, if not return FALSE
	 */
	public function get_garment_colour($garment_id){
		$this->db->select('image_path, name')->from('garment_colour')->join('colour','garment_colour.colour_id = colour.colour_id')->where('garment_id', $garment_id)->order_by('order', 'asc');
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return FALSE;
		}
		$return_array = $query->result_array();
		return $return_array;
	}
	/**
	 * get_garment_colours for garment general edit page
	 * Get Colours of A garment
	 * Returning 
	 *
	 * @return colour array if existed, if not return FALSE
	 */
	public function get_garment_colours($garment_id, $second_half = FALSE){
		$this->db->select('pas_colour.*, IF(garment_colour_id IS NOT NULL, 1, 0) AS checked', FALSE)->from('colour')->join('garment_colour','garment_colour.colour_id = colour.colour_id AND garment_id = '.$garment_id, 'left')->order_by('order', 'asc');
		if (!$second_half){
			$this->db->limit(11,0);
		} else {
			$this->db->limit(12,11);
		}
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return FALSE;
		}
		return $query->result_array();
	}
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Insert Colour Info
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	/**
	 * insert_garment_colour
	 *
	 * 
	 */
	public function insert_garment_colour($garment_id, $colour_ids){
		$data = array();
		foreach ($colour_ids as $colour_id){
			$data[] = array(
				'garment_id' => $garment_id,
				'colour_id' => $colour_id,
			);
		}
		$this->db->insert_batch('garment_colour', $data);
	}
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Delete Colour Info
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	/**
	 * delete_garment_colour
	 *
	 * 
	 */
	public function delete_garment_colour($garment_id){
		return $this->db->delete('garment_colour', array('garment_id' => $garment_id));
	}
}

/* End of file colour_model.php */
/* Location: ./application/models/colour_model.php */
