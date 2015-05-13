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
		$sql_query = 'UPDATE `pas_garment` SET `outdated` = 1 WHERE (DATE_SUB(CURDATE(), INTERVAL 4 MONTH) > date_created AND category_id IN (36, 30, 34, 33, 35, 38)) OR (DATE_SUB(CURDATE(), INTERVAL 3 MONTH) > date_created AND category_id IN (31, 22, 25, 23, 37, 21, 29, 24, 28, 32));';
		$this->db->query($sql_query);
	}
}
/* End of file cron_model.php */
/* Location: ./application/models/cron_model.php */
