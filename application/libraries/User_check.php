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
		$ci->load->helper('url');
		$uri = explode('/', uri_string());
		$is_logout = FALSE;
		if (!empty($uri[1])){
			if (strpos($uri[1], 'logout') !== false){
				$is_logout = TRUE;
			}
		}
		if (!$is_logout){
			$user_id = $ci->flexi_auth->get_user_id();
			if (!empty($user_id)) {
				if ($ci->flexi_auth->in_group(array('StandardUsers'))){
					//this is trial users check process
					$ci->load->model('user_model');
					$user_info = $ci->flexi_auth->get_user_by_id($user_id)->result_array()[0];
					$datetime1 = new DateTime();
					$datetime2 = new DateTime($user_info['uacc_date_added']);
					$interval = $datetime1->diff($datetime2);
					$days = $interval->days;
					if ($days >= 14) {
						redirect('payment');
					}
				} else if ($ci->flexi_auth->in_group(array('PremiumUsers'))){
					//wait for payment system
				}
			}
		}
	}

}
/* End of file User_check.php */
/* Location: ./application/libraries/User_check.php */
