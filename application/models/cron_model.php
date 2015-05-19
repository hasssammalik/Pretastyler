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

	public function update_garment_image_existence_notification(){
		
		$stack_notification = array();

		$this->db->where('enabled' => 1);
		$this->db->where('outdated' => 0 );
		//$this->db->where('date_created < DATE_SUB(NOW(), INTERVAL 1 HOUR)' );

		$this->from('garment');
		$this->db->select('garment_id, import_user_id, name, image_path, extra_image1_path, extra_image2_path');
		
		$query = $this->db->get();
		if ($query->num_rows() > 0){
			$garments = $query->result_array();

			if( !empty( $garments )){

				$garment_image_path = $this->config->item('base_upload_path') . '/public_html/images/garment/';
				$this->load->model('notification_model');

				foreach ($garments as $garment ) {
					$message = '';
					if( !empty( $garment['image_path'] ) ){
						if( !file_exists( $garment_image_path . $garment['image_path'] ) ){
							$message = 'Imported by user id <a href="/admin/user/view/'.$garment['import_user_id'].'.html">'.$garment['import_user_id'].'</a>, Garment id ' . $garment['garment_id'] . ' has missing image name "'.$garment['image_path'].'" ';
						}
					} else {
						$message = 'Imported by user id <a href="/admin/user/view/'.$garment['import_user_id'].'.html">'.$garment['import_user_id'].'</a>, Garment id '.$garment['garment_id'].' has no base image.';
					}
					if( !empty( $garment['extra_image1_path'] ) ){
						if( !file_exists( $garment_image_path . $garment['extra_image1_path'] ) ){
							$message .= ' and missing second image "'.$garment['extra_image1_path'].'" '; 
						}
					}
					if( !empty( $garment['extra_image2_path'] ) ){
						if( !file_exists( $garment_image_path . $garment['extra_image2_path'] ) ){
							$message .= ' and missing third image "'.$garment['extra_image2_path'].'".'; 
						}
					}
					
					if( !empty( $message )){
						$this->notification_model->insert_notification( array('title' => 'Missing Image for garment id '.$garment['garment_id'] .' by user id '.$garment['import_user_id'], 'description' => $message ) );
					}
					
				}
				return true;
			}
		}
		return false;
		
	}
}
/* End of file cron_model.php */
/* Location: ./application/models/cron_model.php */
