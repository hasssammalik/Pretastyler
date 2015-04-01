<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/*
* Name: PAS User Check Library
*
* Author: 
* Jifeng Sun
* rob@asmex.com.au
*
* Copyright 2015 Jifeng Sun
*
* Description: Pr¨ºt ¨¤ Styler 2.0 User Check Library, check trial and premium information.
* Released: 01/04/2015
* Requirements: PHP5 or above and Codeigniter 2.0+ and Flexi Auth Library
*/
class User_check
{
	/**
	* Global container variables
	*
	*/

	/**
	* Copies an instance of CI
	*/
	public function __construct()
	{
		$ci =& get_instance();
		//$ci->auth = new stdClass;
		$ci->load->library('flexi_auth');
		
		$user_id = $ci->flexi_auth->get_user_id();
		if (!empty($user_id)) {
			$ci->load->model('user_model');
			$user_info = $ci->user_model->get_user_info($user_id);
			print_r($user_info);
		}
	}

}
/* End of file User_check.php */
/* Location: ./application/libraries/User_check.php */
