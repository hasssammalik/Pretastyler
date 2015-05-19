<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Name: PAS Notification Model
*
* Author: 
* Anil Prajapati
* anil@asmex.com.au
*
* Copyright 2015 Anil Prajapati
*
* Description: Prêt à Styler 2.0 Notification model, contains methods to CRUD Notification in Admin.
* Released: 18/05/2015
* Requirements: PHP5 or above and Codeigniter 2.0+
*/

class Notification_model extends CI_Model
{

	private $notification_level = array( 'INFO', 'CRITICAL', 'ERROR', 'WARN', 'INFO');
	private $notification_group = array( 'admin' );

	public function __construct() 
	{
		$this->load->database();
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Read Notifications
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * get_all_notifications
	 * Read all notifications sorted by date inserted
	 *
	 * @return notification array()
	 */
	public function get_all_notifications()
	{
		$query = $this->db->get_where('notification');
		//check if any notification exists
		if ($query->num_rows() == 0){
			return FALSE;
		} else {
			return $query->row_array();
		}
	}
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Update Notifications
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * update_notification
	 * Update notification that already existed
	 *
	 * @return boolean
	 */
	public function update_notification( $notification_id, $data )
	{
		if( !empty( $notification_id )){
			return $this->db->where('notify_id', $notification_id)->update('notifications', $data);
		} else {
			return false;
		}
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Insert Notifications
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	/**
	 * insert_notification
	 * insert notification
	 *
	 * @return boolean
	 */
	public function insert_notification( $data )
	{
		if ( !empty( $data )){ 
			$querydata = array(
				'notify_date' => date('Y-m-d H:i:s'),                 // Static
				'notify_group' => $this->notification_group[0],             // Opt
				'notify_level' => $this->notification_level[2],             // Required
				'notify_title' => $data['title'],                     // Required
				'notify_description' => $data['description'],         // Required
				'notify_status' => 1                                  // Opt
			);
			return $this->db->insert('notifications', $querydata);
		} else {
			return FALSE;
		}
	}
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Update Status of Notifications
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	/**
	 * update_notification_status
	 * Update the status of particular notification id 
	 *
	 * @return boolean
	 */
	public function update_notification_status( $notification_id, $status )
	{
		if( !empty( $notification_id )){
			return $this->db->where('notify_id', $notification_id)->update('notifications', array('notify_status' => $status ) );
		} else if( $status == 'all' ) {
			return $this->db->where('notify_status', '1')->update('notifications', array('notify_status' => '0' ) );
		} else {
			return false;
		}
	}
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Get Summary of Notifications
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	/**
	 * get_summary_notifications
	 * Update the status of particular notification id 
	 *
	 * @return notification data array()
	 */
	public function get_summary_notifications()
	{
		$query = $this->db->select('notify_id, notify_title, notify_level')->from('notifications')->where(array('notify_status' => 1))->get();
		if ($query->num_rows >= 1){
			return $query->result_array();
		} else {
			return FALSE;
		}
		
	}
}

/* End of file notification_model.php */
/* Location: ./application/models/notification_model.php */