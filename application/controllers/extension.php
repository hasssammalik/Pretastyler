<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Name: PAS Extension Controller
*
* Author: 
* Jifeng Sun
* rob@asmex.com.au
*
* Copyright 2014 Jifeng Sun
*
* Description: Prêt à Styler 2.0 User Controller.
* Released: 18/12/2014
* Requirements: PHP5 or above and Codeigniter 2.0+
*/
class Extension extends CI_Controller {
	/**
	 * Constructor.
	 */
	public function __construct(){
		parent::__construct();
		$this->auth = new stdClass;
		$this->load->library('flexi_auth');
		$this->load->model('garment_model');
		$this->load->model('category_model');
		$this->load->model('colour_model');
		$this->load->model('occasion_model');
		$this->load->model('category_model');
		$this->load->model('deep_search_model');
		$this->load->model('assessment_model');
		$this->load->model('user_model');
		$this->load->model('size_model');
		$this->load->model('infusionsoft_model');
		$this->load->helper(array('url','form'));
		$this->data = array(
			'colours1' => $this->colour_model->get_available_colours(),
			'colours2' => $this->colour_model->get_available_colours(TRUE),
			'occasions' => $this->occasion_model->get_available_occasions(),
			'categories' => $this->category_model->get_available_categories()
		);
		if ($this->flexi_auth->is_logged_in()){
			$this->data['first_name'] = $this->user_model->get_user_name($this->flexi_auth->get_user_id())['first_name'];
		}
	}
	/**
	 * Extension Import Page for this controller.
	 */
	public function import_garment()
	{
		$type = $this->input->post( 'type', TRUE );
		$url = $this->input->post( 'url', TRUE );
		$garment_name = $this->input->post( 'garment_name', TRUE );
		$images = $this->input->post( 'images', TRUE );
		$selected_image = $this->input->post( 'selected_image', TRUE );
		$this->load->library('session');
		$this->session->set_userdata('type', $type);
		$this->session->set_userdata('url', $url);
		$this->session->set_userdata('garment_name', $garment_name);
		$this->session->set_userdata('images', $images);
		$this->session->set_userdata('selected_image', $selected_image);
		redirect('/garment/import-extension','refresh');
	}
	/**
	 * Page Not Found Page for this controller.
	 */
	public function not_found()
	{
		set_status_header(404);
		$data = $this->data;
		$data['title'] = "Page Not Found";		
		$data['extraJS'] = '<style>.content {background-image:url(/images/404.jpg);}</style>';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('errors/not_found', $data);
	}
	/**
	 * Infusionsoft Service for this controller.
	 */
	public function infusionsoft_create_login(){
		//this is the portal for infusionsoft campaign to communicate with, contactID, FirstName, LastName, Email, Password, Country, ZipCode, InfusionsoftEmail will be the post fields.
		//Written by Jifeng Sun at 30 July 2014
		//Modified by Jifeng Sun at 08 August 2014 for additional email address if the email that doesn't contain anything.
		//Modified by Jifeng Sun at 11 August 2014 for bug fixes on previous change.
		
		//firstly to determine the password is empty or not
		$password = $this->input->post( 'Password', TRUE );
		$email = $this->input->post( 'Email', TRUE );
		$infusionsoft_email = $this->input->post( 'InfusionsoftEmail', TRUE );
		$country = $this->input->post( 'Country', TRUE );
		//Assign the rest post info to local variable
		$user_first_name = $this->input->post( 'FirstName', TRUE );
		$user_last_name = $this->input->post( 'LastName', TRUE );
		$user_infusionsoft_id = $this->input->post( 'contactID', TRUE );
		$user_zipcode = $this->input->post( 'ZipCode', TRUE );
		
		
		
		if ($password){
			//already existed pre-defined password, assign it to local variable
			$user_password = $password;
		}
		else{
			//no pre-defined password, randomly generate one.
			$user_password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);
		}
		//Determine the email address is empty, if empty, will use InfusionsoftEmail instead.
		if ($email){
			//already existed email
			$user_email = $email;
		} else{
			//no pre-defined email, use InfusionsoftEmail instead
			$user_email = $infusionsoft_email;
		}
		//Assign a default country short code for wrong country
		$user_country_id = "AU";
		//Match Country from database to find out the short code. eg. Australia -> AU
		$countries = $this->user_model->get_all_countries();
		foreach ($countries as $country_key => $country_value) {
			if ($country == $country_value['country']) {
				$user_country_id = $country_value['country_id'];
				break;
			}
		}
		
		//create user in database and lead the CreatePage info to step 1
		$query_rem = "INSERT INTO `Users` (`email`, `password`, `name`, `surname`, `CreatePage`, `InfusionSoftId`, `country`, `zip`) VALUES ('".mysql_real_escape_string($Email)."', '".mysql_real_escape_string($Password)."', '".mysql_real_escape_string($FirstName)."', '".mysql_real_escape_string($LastName)."', '1','".mysql_real_escape_string($contactID)."', '".mysql_real_escape_string($Country)."', '".mysql_real_escape_string($ZipCode)."')";
		mysql_query($query_rem, $db);
		if ($user_id = $this->flexi_auth->insert_user($user_email, FALSE, $user_password, FALSE, 3, TRUE)) {
			//do nothing
		} else {
			$user_id = $this->flexi_auth->get_users('uacc_id as user_id',array('uacc_email' => $user_email))->row()->user_id;
		}
		//Send back info to infusionsoft
		$this->load->helper('infusionsoft/infusionsoft');
		CreateInfusionsoftUser($user_first_name, $user_email, $user_password, TRUE);
		$this->infusionsoft_model->insert_user_infusionsoft($user_id, $user_infusionsoft_id);
	}
	/**
	 * Test pages
	 */
	public function test($slug = FALSE, $param1 = FALSE, $param2 = FALSE, $param3 = FALSE)
	{
		if (!$this->flexi_auth->in_group('Administrators')) {
			$this->not_found();
			return;
		}
		if ($slug) {
			$data['title'] = "Test";
			$data['breadcrumb'] = array('TEST');
			if ($slug == "get_initial_field_criteria_for_edit"){
				$result = $this->assessment_model->get_initial_field_criteria_for_edit($param1, $param2);
				$data['test_str'] = $result;
			} else if ($slug == "get_user_size_list"){
				$result = $this->user_model->get_user_size_list('TOP', NULL, TRUE, 99);
				$data['test_str'] = $result;
			} else if ($slug == "generate_user_specs"){
				$result = $this->user_model->generate_user_specs(99);
				$data['test_str'] = $result;
			} else if ($slug == "length"){
				$result = $this->category_model->get_length($param1);
				$data['test_str'] = $result;
			} else {
				$data['test_str'] = $slug;
			}
			$this->load->view('catalog/test', $data);
		} else {
			show_404();
		}
	}
}

/* End of file extension.php */
/* Location: ./application/controllers/extension.php */