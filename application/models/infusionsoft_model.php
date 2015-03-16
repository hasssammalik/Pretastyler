<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Name: PAS Infusionsoft Model
*
* Author: 
* Jifeng Sun
* rob@asmex.com.au
*
* Copyright 2014-2015 Jifeng Sun
*
* Description: Prêt à Styler 2.0 Infusionsoft model
* Released: 09/01/2015
* Requirements: PHP5 or above and Codeigniter 2.0+
*/

class Infusionsoft_model extends CI_Model
{
	public function __construct() 
	{
		$this->load->database();
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Update Infusionsoft Info
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * insert_infusionsoft
	 * Read user's spec by user_id 
	 * Returning url, image, ...
	 *
	 * @return garment array ()
	 */
	public function update_user_infusionsoft($user_id)
	{
		if ($user_id){
			$query = $this->db->get_where('user_infusionsoft', array('user_id' => $user_id));
			if ($query->num_rows() > 0){
				$infusionsoft_id = $query->row()->infusionsoft_id;
				$this->load->helper('infusionsoft/infusionsoft');
				UpdateInfusionsoftUser($infusionsoft_id);
			}
		} else {
			return FALSE;
		}
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Insert Infusionsoft Info
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	/**
	 * insert_infusionsoft
	 * Read user's info by user_id 
	 * Returning url, image, ...
	 *
	 * @return garment array ()
	 */
	public function insert_user_infusionsoft($user_id, $infusionsoft_id)
	{
		if ($user_id){
			$query = $this->db->query('REPLACE INTO pas_user_infusionsoft (user_id, infusionsoft_id) VALUES (?, ?)', array($user_id, $infusionsoft_id));
			return $query;
		} else {
			return FALSE;
		}
	}
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Read Infusionsoft Info
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	/**
	 * insert_infusionsoft
	 * Read user's info by user_id 
	 * Returning url, image, ...
	 *
	 * @return garment array ()
	 */
	public function get_user_infusionsoft($user_id)
	{
		if ($user_id){
			$query = $this->db->get_where('user_infusionsoft', array('user_id' => $user_id));
			return $query->row()->infusionsoft_id;
		} else {
			return FALSE;
		}
	}
}

/* End of file infusionsoft_model.php */
/* Location: ./application/models/infusionsoft_model.php */
