<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Name: PAS Cron Model
*
* Author: 
* Jifeng Sun
* rob@asmex.com.au
*
* Copyright 2015 Jifeng Sun
*
* Description: Pr¨ºt ¨¤ Styler 2.0 Admin model, contains methods to CRUD a garment.
* Released: 21/04/2015
* Requirements: PHP5 or above and Codeigniter 2.0+
*/

class Cron_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	
	/**
	 * delete_outdated_garment
	 *
	 * 
	 */
	public function delete_outdated_garment() {
		$sql_query = '';
		/* $this->db->delete('body_garment', array('garment_id' => $garment_id));
		$this->db->delete('garment', array('garment_id' => $garment_id));
		$this->db->delete('garment_criteria', array('garment_id' => $garment_id));
		$this->db->delete('garment_specs', array('garment_id' => $garment_id));
		$this->db->delete('user_garment', array('garment_id' => $garment_id)); */
	}
}
/* End of file cron_model.php */
/* Location: ./application/models/cron_model.php */
