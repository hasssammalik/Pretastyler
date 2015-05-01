<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Name: PAS Category Model
*
* Author: 
* Jifeng Sun
* rob@asmex.com.au
*
* Copyright 2014 Jifeng Sun
*
* Description: Pr¨ºt ¨¤ Styler 2.0 Category model, contains methods to CRUD a category.
* Released: 28/10/2014
* Requirements: PHP5 or above and Codeigniter 2.0+
*/

class Category_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Read Category Info
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * get_category
	 * Read category's info by category_id 
	 * Returning category info
	 *
	 * @return category array if existed, if not return FALSE
	 */
	public function get_category($category_id){
		$query = $this->db->get_where('category', array('category_id' => $category_id));
		if ($query->num_rows() == 0){
			return FALSE;
		}
		$return_array = $query->row_array();
		return $return_array;
	}
	/**
	 * get_available_categories
	 * Read category's
	 * Returning category info
	 *
	 * @return category array if existed, if not return FALSE
	 */
	public function get_available_categories(){
		$this->db->select('*')->from('category')->order_by('order', 'asc');
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return FALSE;
		}
		$return_array = $query->result_array();
		return $return_array;
	}

	/**
	 * @return an array of all the categories present in the database.
	 */
	public function get_categories() {
		$this->db->order_by( 'order', 'asc' );
		$query = $this->db->get( 'category' );
		if ( $query->num_rows() < 1 ) return array();
		return $query->result_array();
	}
	/**
	 * get_length
	 * Read category's
	 * Returning category info
	 *
	 * @return an array of all the categories present in the database.
	 */
	public function get_length($category_id) {
		$query = $this->db->select('category.category_id AS id, category.`name`, category_field.field_id')->from('category')->join('category_field', 'category.category_id = category_field.category_id', 'left')->join('field', 'category_field = field.field_id', 'left')->where('category.category_id', $category_id)->order_by('field.position DESC')->limit(1)->get();
		$length = $query->row_array();
		
		$query = $this->db->select('criteria_id AS id, `name`')->from('criteria')->where('field_id', $length['field_id'])->order_by('position')->get();
		$length['criterias'] = $query->result_array();
		unset($length['field_id'])
		return $length;
	}	
}

/* End of file category_model.php */
/* Location: ./application/models/category_model.php */
