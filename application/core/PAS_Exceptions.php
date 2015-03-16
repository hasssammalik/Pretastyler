<?php
class PAS_Exceptions extends CI_Exceptions {
	function show_404($page = '', $log_error = TRUE)
	{
		include APPPATH . 'config/routes.php';
		$heading = "404 Page Not Found";
		$message = "The page you requested was not found.";

		// By default we log this, but allow a dev to skip it
		if ($log_error)
		{
			log_message('error', '404 Page Not Found --> '.$page);
		}
		if(!empty($route['404_override']) ){
			set_status_header(404);
			$CI =& get_instance();
			$CI->auth = new stdClass;
			$CI->load->library('flexi_auth');
			$CI->load->helper('url');
			$CI->load->helper('form');
			$data['title'] = "Page Not Found";
			$data['extraJS'] = '<style>.content {background-image:url(/images/404.jpg);}</style>';
			$CI->load->view('templates/header', $data);
			$CI->load->view('templates/menu', $data);
			$CI->load->view('templates/menu_mall', $data);
			$CI->load->view('errors/not_found', $data);
			echo $CI->output->get_output();
			exit;
		} else {
			echo $this->show_error($heading, $message, 'error_404', 404);
			exit;
		}
	}
}