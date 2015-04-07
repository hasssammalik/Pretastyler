<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Name: PAS Brand Model
*/

class Brand_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	/**
	 * Returns a lookup for all the distinct brands out there...
	 *
	 * @return brand array ()
	 */
	public function search( $keyword ) {
		$query = $this->db->select( 'brand' )->distinct()->from( 'garment' );
		if ( $keyword ) {
			$this->db->like( 'brand', $keyword );
			
		}
		$query = $this->db->get();
		if ( $query->num_rows() < 1 ) return array();
		return $query->result_array();
	}
	
}
/* End of file brand_model.php */
/* Location: ./application/models/brand_model.php */
