<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Name: PAS Admin Controller
*
* Author: 
* Jifeng Sun
* rob@asmex.com.au
*
* Copyright 2014 Jifeng Sun
*
* Description: Pr¨ºt ¨¤ Styler 2.0 Admin Controller.
* Released: 28/10/2014
* Requirements: PHP5 or above and Codeigniter 2.0+
*/
class Admin extends CI_Controller {
	/**
	 * Contructer.
	 */
	public function __construct(){
		parent::__construct();
		$this->auth = new stdClass;
		$this->load->library('flexi_auth');
		$this->load->library('datatables');
		$this->load->model('garment_model');
		$this->load->model('category_model');
		$this->load->model('colour_model');
		$this->load->model('occasion_model');
		$this->load->model('deep_search_model');
		$this->load->model('size_model');
		$this->load->model('user_model');
		$this->load->model('admin_model');
		$this->load->model('notification_model');
		$this->load->model('assessment_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->data = array(
		);
		if ($this->flexi_auth->is_logged_in()){
			$this->data['first_name'] = $this->user_model->get_user_name($this->flexi_auth->get_user_id())['first_name'];
			$this->data['notifications'] = $this->notification_model->get_summary_notifications();
		}
	}
	private function login_check(){
		if (!$this->flexi_auth->is_logged_in()){
			redirect('/admin/login', 'refresh');
		} else {
			if (!$this->flexi_auth->in_group('Administrators')){
				$this->flexi_auth->logout();
				redirect('/admin/login', 'refresh');
			}
		}
	}
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// General Pages & Services
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	/**
	 * Login Page for this controller.
	 */
	public function login()
	{
		$data = $this->data;
		if ($this->flexi_auth->is_logged_in()){
			if ($this->flexi_auth->in_group('Administrators')) {
				redirect('/admin', 'refresh');
			} else {
				$this->flexi_auth->logout();
				redirect('/admin/login', 'refresh');
			}
		}
		
		if ($this->input->post()){
			//if this is a login request.
			$email = $this->input->post('email', TRUE);
			$password = $this->input->post('password', TRUE);
			$remember_me = $this->input->post('password', TRUE);
			$error_string = "Wrong combination of email and password!";
			$error_not_admin = "You are not in Administrators!";
			if ($this->flexi_auth->validate_current_password($password, $email)) {
				if ($this->flexi_auth->login($email, $password, $remember_me)){
					if ($this->flexi_auth->in_group('Administrators')){

						//---------HM---------------//insert user login in new table
						$record=  array('email' => $email, 'login' => date("Y/m/d")  );
						
						$this->admin_model->insert_user_login($record);
						//---------HM---------------//

						redirect('admin', 'refresh');
					} else {
						$this->flexi_auth->logout();
						$data['error'] = $error_not_admin;
					}
				} else {
					$data['error'] = $error_string;
				}
			} else {
				$data['error'] = $error_string;
			}
		}
		//show login page
		$data['title'] = "Administrator Login";
		$data['body_class'] = 'bg-black';
		$data['no_headers'] = TRUE;
		$this->load->view('admin/header', $data);
		$this->load->view('admin/login', $data);
		$this->load->view('admin/footer', $data);
	}
	/**
	 * Logout Service
	 */
	public function logout()
	{
		if ($this->flexi_auth->is_logged_in()) {
			$this->flexi_auth->logout();
		}
		redirect('/admin', 'refresh');
	}
	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$this->login_check();
		$data = $this->data;
		$data['title'] = "Dashboard";
		$data['title_description'] = "view all stats";
		$data['extraJS'] = '<script src="/js/admin/AdminLTE/dashboard.js?v=2.2.0.0" type="text/javascript"></script>';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('admin/footer', $data);
	}
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// User Pages & Services
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	/**
	 * User Page for this controller.
	 */
	public function user($page = FALSE, $param = FALSE)
	{
		$this->login_check();
		$data = $this->data;
		if (empty($page)){
			redirect('/admin/user/general-users', 'refresh');
		}
		$data['current_folder'] = "User management";
		$data['current_folder_path'] = "user";
		if ($page == 'general'){
			$data['title'] = "All Users";
			$data['title_description'] = "manage all users";
			$data['filters'] = '';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/user/general', $data);
			$this->load->view('admin/footer', $data);
		} else if ($page == 'trial'){
			$data['title'] = "Trial Users";
			$data['title_description'] = "manage all trial users";
			$data['filters'] = 'is_standard: true, ';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/user/general', $data);
			$this->load->view('admin/footer', $data);
		} else if ($page == 'premium'){
			$data['title'] = "Premium Users";
			$data['title_description'] = "manage all premium users";
			$data['filters'] = 'is_premium: true, ';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/user/general', $data);
			$this->load->view('admin/footer', $data);
		} else if ($page == 'uploaders'){
			$data['title'] = "Uploaders / Retailers";
			$data['title_description'] = "manage all uploaders / retailers";
			$data['filters'] = 'is_uploader: true, ';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/user/general', $data);
			$this->load->view('admin/footer', $data);
		} else if ($page == 'administrators'){
			$data['title'] = "Administrators";
			$data['title_description'] = "manage all administrators";
			$data['filters'] = 'is_admin: true, ';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/user/general', $data);
			$this->load->view('admin/footer', $data);
		} else if ($page == 'view'){
			$data['title'] = "User id - ".$param;
			$data['title_description'] = "manage user";
			$data['filters'] = 'user_id: '.$param.', ';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/user/general', $data);
			$this->load->view('admin/footer', $data);
		} else if ($page == 'activate'){
			if ($this->input->post()){
				//if this is a activate request.
				$data['error_messages'] = array();
				$user_id = $this->input->post('user_id', TRUE);
				$this->flexi_auth->activate_user($user_id);
				print '1';
				return;
			}
		} else if ($page == 'deactivate'){
			if ($this->input->post()){
				//if this is a deactivate request.
				$data['error_messages'] = array();
				$user_id = $this->input->post('user_id', TRUE);
				$this->flexi_auth->deactivate_user($user_id);
				print '1';
				return;
			}
		} else if ($page == 'change_group'){
			if ($this->input->post()){
				//if this is a change request.
				$data['error_messages'] = array();
				$user_id = $this->input->post('user_id', TRUE);
				$group_id = $this->input->post('new_group', TRUE);
				if (empty($user_id)){
					array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00019 Something went error. Please contact programmer!'));
				}
				if (empty($data['error_messages'])){
					$result = $this->admin_model->update_user_group($user_id, $group_id);
					if ($result){
						redirect('/admin/user/view/'.$user_id, 'refresh');
					} else {
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00020 Something went error. Please contact programmer!'));
					}
				}
			}
			$data['user'] = $this->admin_model->get_user_group($param);
			$data['groups'] = $this->flexi_auth->get_groups()->result_array();
			$data['title'] = "Change Group for User - ".$data['user']['first_name'];
			$data['title_description'] = "Change Group for User - ".$data['user']['first_name'];
			$this->load->view('admin/header', $data);
			$this->load->view('admin/user/change_group', $data);
			$this->load->view('admin/footer', $data);
		} else if ($page == 'change_infusionsoft'){
			if ($this->input->post()){
				//if this is a change request.
				$data['error_messages'] = array();
				$user_id = $this->input->post('user_id', TRUE);
				$infusionsoft_id = $this->input->post('new_infusionsoft_id', TRUE);
				if (empty($user_id)){
					array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00019 Something went error. Please contact programmer!'));
				}
				if (empty($data['error_messages'])){
					$result = $this->admin_model->update_user_infusionsoft($user_id, $infusionsoft_id);
					if ($result){
						redirect('/admin/user/view/'.$user_id, 'refresh');
					} else {
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00020 Something went error. Please contact programmer!'));
					}
				}
			}
			$data['user'] = $this->admin_model->get_user_infusionsoft($param);
			$data['title'] = "Change Infusionsoft ID for User - ".$data['user']['first_name'];
			$data['title_description'] = "Change Infusionsoft ID for User - ".$data['user']['first_name'];
			$this->load->view('admin/header', $data);
			$this->load->view('admin/user/change_infusionsoft', $data);
			$this->load->view('admin/footer', $data);
		} else if ($page == 'delete'){
			if ($this->input->post()){
				//if this is a delete request.
				$data['error_messages'] = array();
				$user_id = $this->input->post('delete_id', TRUE);
				if (empty($user_id)){
					array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00017 Something went error. Please contact programmer!'));
				}
				if (empty($data['error_messages'])){
					$result = $this->admin_model->delete_user($user_id);
					$result = $this->flexi_auth->delete_user($user_id);
					if ($result){
						redirect('/admin/user/general', 'refresh');
					} else {
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00018 Something went error. Please contact programmer!'));
					}
				}
			}
			$name = $this->user_model->get_user_name($param)['first_name'];
			$data['delete_type'] = 'user';
			$data['delete_id'] = $param;
			$data['title'] = "Delete User - ".$name;
			$data['title_description'] = "Delete user - ".$name;
			$this->load->view('admin/header', $data);
			$this->load->view('admin/matrix/delete', $data);
			$this->load->view('admin/footer', $data);
		}
	}	
	/**
	 * User Service for this controller.
	 */
	public function general_users()
	{
		$this->login_check();
		$is_standard = $this->input->post('is_standard', TRUE);
		$is_premium = $this->input->post('is_premium', TRUE);
		$is_uploader = $this->input->post('is_uploader', TRUE);
		$is_admin = $this->input->post('is_admin', TRUE);
		$user_id = $this->input->post('user_id', TRUE);
		
		//-- HM --------------change select 

		//old //$this->datatables->select("pas_user_info.user_id, first_name, last_name, pas_user_accounts.uacc_email AS email, garment_info.garments, IF (uacc_active = 1, 'fa fa-check-circle', 'glyphicon glyphicon-ban-circle') AS active, pas_user_groups.ugrp_desc AS group_name, infusionsoft_id, pas_user_accounts.uacc_date_added AS creation_date, pas_user_accounts.uacc_date_last_login AS last_login, datediff(sysdate(), pas_user_accounts.uacc_date_last_login) as Days_Since_Last_Login", FALSE)->from('user_info')->join('user_accounts', 'user_info.user_id = user_accounts.uacc_id')->join('user_groups', 'user_groups.ugrp_id = user_accounts.uacc_group_fk')->join('user_infusionsoft', 'user_info.user_id = user_infusionsoft.user_id', 'left')->join('(SELECT import_user_id, COUNT(garment_id) AS garments FROM pas_garment GROUP BY import_user_id) AS garment_info', 'user_info.user_id = garment_info.import_user_id', 'left');

	

 	$this->db->query('Drop table pas_view');

 	$sql="CREATE Table pas_view  select user_id, first_name, last_name, S1.email, garments, active, group_name, infusionsoft_id, creation_date, last_login,login_per_Mnth, Days_Since_Last_Login, uacc_group_fk from ( select pas_user_info.user_id, first_name, last_name, pas_user_accounts.uacc_email AS email, pas_garment_info.garments, IF (uacc_active = 1, 'fa fa-check-circle', 'glyphicon glyphicon-ban-circle') AS active, pas_user_groups.ugrp_desc AS group_name, infusionsoft_id, pas_user_accounts.uacc_date_added AS creation_date, pas_user_accounts.uacc_date_last_login AS last_login, datediff(sysdate(), pas_user_accounts.uacc_date_last_login) as Days_Since_Last_Login, uacc_group_fk from pas_user_info join pas_user_accounts on pas_user_info.user_id = pas_user_accounts.uacc_id join pas_user_groups on pas_user_groups.ugrp_id = pas_user_accounts.uacc_group_fk join pas_user_infusionsoft  on pas_user_info.user_id = pas_user_infusionsoft.user_id left join  (SELECT import_user_id, COUNT(garment_id) AS garments FROM pas_garment GROUP BY import_user_id) as pas_garment_info on pas_user_info.user_id = pas_garment_info.import_user_id ) S1 left join ( select email, count(*) login_per_Mnth from pas_user_logins where Month(Login) = Month ( current_timestamp()) group by email) as S2  on S1.email=S2.email ";

    $this->db->query($sql);

 	$this->datatables->select("user_id, first_name, last_name, email, garments, active, group_name, infusionsoft_id, creation_date, last_login,login_per_Mnth, Days_Since_Last_Login, uacc_group_fk", FALSE);


 	$this->datatables->from('pas_view');

 	
			
		if ($is_standard) {
			$this->datatables->where('pas_view.uacc_group_fk', 3);
		}
		if ($is_premium) {
			$this->datatables->where('pas_view.uacc_group_fk', 2);
		}
		if ($is_uploader) {
			$this->datatables->where('pas_view.uacc_group_fk', 4);
		}
		if ($is_admin) {
			$this->datatables->where('pas_view.uacc_group_fk', 1);
		}
		if ($user_id) {
			$this->datatables->where('pas_view.user_id', $user_id);
		}

	
		$this->datatables->edit_column('garments', '<a href="/admin/garment/user/$1.html">$2</a>', 'user_id, garments');
		$this->datatables->edit_column('group_name', '$1 (<a href="/admin/user/change-group/$2.html">Change</a>)', 'group_name, user_id');
		$this->datatables->edit_column('infusionsoft_id', '<a href="https://om185.infusionsoft.com/Contact/manageContact.jsp?view=edit&ID=$1" target="_blank">$1</a> (<a href="/admin/user/change-infusionsoft/$2.html">Change</a>)', 'infusionsoft_id, user_id');
		$this->datatables->edit_column('active', '<i class="$1"></i>', 'active');
		$this->datatables->add_column('edit', '<a href="/admin/user/edit/$1.html"><i class="fa fa-edit"></i></a>', 'user_id');
		$this->datatables->add_column('delete', '<a href="/admin/user/delete/$1.html"><i class="glyphicon glyphicon-remove"></i></a>', 'user_id');
		$this->datatables->edit_column('user_id', '<a href="/admin/switchuser/$1.html">$1</a>', 'user_id');
		echo $this->datatables->generate();
		
	}
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Garment Pages & Services
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	/**
	 * User Page for this controller.
	 */
	public function garment($page = FALSE, $param1 = FALSE)
	{
		$this->login_check();
		$data = $this->data;
		if (empty($page)){
			redirect('/admin/garment/general', 'refresh');
		}
		$data['current_folder'] = "Garment management";
		$data['current_folder_path'] = "garment";
		if ($page == 'general'){
			$data['title'] = "General Garments";
			$data['title_description'] = "manage all general garments";
			$data['filters'] = '';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/garment/general', $data);
			$this->load->view('admin/footer', $data);
		} else if ($page == 'premium'){
			$data['title'] = "Premium Garments";
			$data['title_description'] = "manage all premium garments";
			$data['filters'] = 'is_premium: true, ';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/garment/general', $data);
			$this->load->view('admin/footer', $data);
		} else if ($page == 'category'){
			$category = $this->category_model->get_category($param1);
			$data['title'] = "Garments of Cateogry - ".$category['name'];
			$data['title_description'] = "manage all garments of category - ".$category['name'];
			$data['filters'] = 'category_id: '.$param1.', ';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/garment/general', $data);
			$this->load->view('admin/footer', $data);
		} else if ($page == 'user'){
			$name = $this->user_model->get_user_name($param1);
			$data['title'] = "Garments of User - ".$name['first_name'].' '.$name['last_name'];
			$data['title_description'] = "manage all garments of user - ".$name['first_name'].' '.$name['last_name'];
			$data['filters'] = 'owner: '.$param1.', ';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/garment/general', $data);
			$this->load->view('admin/footer', $data);
		} else if ($page == 'outdated'){
			$data['title'] = "Outdated Garments";
			$data['title_description'] = "manage all outdated garments";
			$data['filters'] = 'outdated: true, ';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/garment/general', $data);
			$this->load->view('admin/footer', $data);
		} else if ($page == 'delete'){
			if ($this->input->post()){
				//if this is a delete request.
				$data['error_messages'] = array();
				$garment_id = $this->input->post('delete_id', TRUE);
				if (empty($garment_id)){
					array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00015 Something went error. Please contact programmer!'));
				}
				if (empty($data['error_messages'])){
					$result = $this->admin_model->delete_body_garment($garment_id);
					$result = $this->admin_model->delete_garment_info($garment_id);
					$result = $this->colour_model->delete_garment_colour($garment_id);
					$result = $this->admin_model->delete_garment_criteria($garment_id);
					$result = $this->occasion_model->delete_garment_occasion($garment_id);
					$result = $this->size_model->delete_garment_size($garment_id);
					$result = $this->admin_model->delete_garment_specs($garment_id);
					$result = $this->admin_model->delete_user_garment($garment_id);
					if ($result){
						redirect('/admin/garment/general', 'refresh');
					} else {
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00016 Something went error. Please contact programmer!'));
					}
				}
			}
			$name = $this->garment_model->get_garment_info($param1)['name'];
			$data['delete_type'] = 'garment';
			$data['delete_id'] = $param1;
			$data['title'] = "Delete garment - ".$name;
			$data['title_description'] = "Delete garment - ".$name;
			$this->load->view('admin/header', $data);
			$this->load->view('admin/matrix/delete', $data);
			$this->load->view('admin/footer', $data);
		}
	}	
	/**
	 * User Service for this controller.
	 */
	public function general_garments()
	{
		$this->login_check();
		$is_premium = $this->input->post('is_premium', TRUE);
		$category_id = $this->input->post('category_id', TRUE);
		$owner = $this->input->post('owner', TRUE);
		$show_outdated = $this->input->post('outdated', TRUE);
		//<------HM
		$this->datatables->select("garment_id, CONCAT('/images/garment/', pas_garment.image_path) AS image, pas_category.name AS category, pas_category.category_id, pas_garment.name, pas_garment.price_range, pas_garment.store AS retailer, pas_garment.url, CONCAT(first_name, ' ' , last_name) AS owner, pas_user_info.user_id, date_created, date_modified, pas_garment.date_admin_modified, pas_garment.corrections,enabled, pas_garment.click_num", FALSE)->from('garment')->join('user_info', 'user_info.user_id = garment.import_user_id')->join('category', 'category.category_id = garment.category_id');
		if ($show_outdated){
			$this->datatables->where('outdated', 1);
		} else {
			$this->datatables->where('outdated', 0);
		}
		if ($is_premium) {
			$this->datatables->where('is_standard', 0);
		}
		if ($category_id) {
			$this->datatables->where('pas_garment.category_id', $category_id);
		}
		if ($owner) {
			$this->datatables->where('pas_user_info.user_id', $owner);
		}
		

		$this->datatables->edit_column('owner', '$1 (<a href="/admin/user/view/$2.html">User</a>, <a href="/admin/garment/user/$2.html">Garment</a>)', 'owner, user_id,');
		$this->datatables->edit_column('image', '<img class="hoverBigImage" src="$1" height=20 />', 'image');
		$this->datatables->edit_column('retailer', '<a href="$1" target="_blank">$2</a>', 'url, retailer');
		$this->datatables->edit_column('category', '$1 (<a href="/admin/matrix/category/$2.html">Matrix</a>, <a href="/admin/garment/category/$2.html">Garment</a>)', 'category, category_id');
		$this->datatables->add_column('edit_basic', '<a href="/garment/edit-general/$1.html" target="_blank"><i class="fa fa-edit"></i></a>', 'garment_id');
		$this->datatables->add_column('edit', '<a href="/garment/edit/$1.html" target="_blank"><i class="fa fa-edit"></i></a>', 'garment_id');
		$this->datatables->add_column('delete', '<a href="/admin/garment/delete/$1.html"><i class="glyphicon glyphicon-remove"></i></a>', 'garment_id');
		echo $this->datatables->generate();
	}
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Matrix Pages & Services
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	/**
	 * Matrix Page for this controller.
	 */
	public function matrix($page = FALSE, $param1 = FALSE, $param2 = FALSE)
	{
		$this->login_check();
		$data = $this->data;
		if (empty($page)){
			redirect('/admin/matrix/categories', 'refresh');
		}
		$data['current_folder'] = "Matrix management";
		$data['current_folder_path'] = "matrix";
		if ($page == 'categories'){
			$data['title'] = "Categories";
			$data['title_description'] = "manage all categories";
			$data['categories'] = $this->category_model->get_available_categories();
			$data['extraJS'] = '<script src="/js/admin/AdminLTE/categories.js?v=2.2.0.0" type="text/javascript"></script>';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/matrix/categories', $data);
			$this->load->view('admin/footer', $data);
		} else if ($page == 'category'){
			if ($param1 == 'edit'){
				if ($this->input->post()){
					//if this is a edit request.
					$data['error_messages'] = array();
					$category_id = $this->input->post('category_id', TRUE);
					$name = $this->input->post('name', TRUE);
					$order = $this->input->post('order', TRUE);
					$has_new_image = $this->input->post('has_new_image', TRUE);
					$ori_image = $this->input->post('ori_image', TRUE);
					if (empty($category_id)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00001 Something went error. Please contact programmer!'));
					}
					if (empty($name)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'You must enter category NAME!'));
					}
					if (empty($order)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'You must enter category POSITION!'));
					}
					if (!empty($has_new_image)) {
						$config['upload_path'] = $this->config->item('base_upload_path') . '/public_html/images/system/';
						$config['allowed_types'] = 'jpg|png|tif';
						$config['file_name'] = random_string('unique').'.jpg';
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('new_image')) {
							array_push($data['error_messages'], array('type' => 'Error',  'content' => $this->upload->display_errors()));
						} else {
							$image = $this->upload->data();
							$image_path = $image['file_name'];
							$is_image = $image['is_image'];
							if (!$is_image) {
								array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Your uploaded file is not an image!'));
							}
						}
					} else {
						$image_path = $ori_image;
					}
					if (empty($data['error_messages'])){
						if ($this->admin_model->update_category($category_id, array('name' => $name, 'order' => $order, 'image_path' => $image_path, ))){
							$data['success_messages'] = array();
							array_push($data['success_messages'], array('type' => 'Congratulations',  'content' => 'This category has been successfully updated!'));
						} else {
							array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00002 Something went error. Please contact programmer!'));
						}
					}
				}
				$data['category'] = $this->category_model->get_category($param2);
				$data['fields'] = $this->admin_model->get_fields_by_category_id($param2);
				$data['title'] = "Category - ".$data['category']['name'];
				$data['title_description'] = "manage category ".$data['category']['name'];
				$data['extraJS'] = '<script src="/js/admin/AdminLTE/category.js?v=2.2.0.0" type="text/javascript"></script>';
				$this->load->view('admin/header', $data);
				$this->load->view('admin/matrix/category', $data);
				$this->load->view('admin/footer', $data);
			} 
			else if ($param1 == 'add'){
				if ($this->input->post()){
					//if this is a add request.
					$data['error_messages'] = array();
					$name = $this->input->post('name', TRUE);
					$order = $this->input->post('order', TRUE);
					if (empty($name)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'You must enter category NAME!'));
					}
					if (empty($order)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'You must enter category POSITION!'));
					}
					$config['upload_path'] = $this->config->item('base_upload_path') . '/public_html/images/system/';
					$config['allowed_types'] = 'jpg|png|tif';
					$config['file_name'] = random_string('unique').'.jpg';
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('new_image')) {
						array_push($data['error_messages'], array('type' => 'Error',  'content' => $this->upload->display_errors()));
					} else {
						$image = $this->upload->data();
						$image_path = $image['file_name'];
						$is_image = $image['is_image'];
						if (!$is_image) {
							array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Your uploaded file is not an image!'));
						}
					}
					if (empty($data['error_messages'])){
						$category_id = $this->admin_model->insert_category(array('name' => $name, 'order' => $order, 'image_path' => $image_path, ));
						if ($category_id){
							redirect('/admin/matrix/category/edit/'.$category_id, 'refresh');
						} else {
							array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00008 Something went error. Please contact programmer!'));
						}
					}
				}
				$data['category'] = array(
					'page_type' => 'add',
					'category_id' => 'Will be automatic generated.',
					'name' => '',
					'image_path' => '',
					'order' => '',
				);
				$data['fields'] = array();
				$data['title'] = "Add a new category";
				$data['title_description'] = "add a new category";
				$this->load->view('admin/header', $data);
				$this->load->view('admin/matrix/category', $data);
				$this->load->view('admin/footer', $data);
			}
			else if ($param1 == 'delete'){
				if ($this->input->post()){
					//if this is a delete request.
					$data['error_messages'] = array();
					$category_id = $this->input->post('delete_id', TRUE);
					if (empty($category_id)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00015 Something went error. Please contact programmer!'));
					}
					if (empty($data['error_messages'])){
						$result = $this->admin_model->delete_category($category_id);
						if ($result){
							redirect('/admin/matrix/categories', 'refresh');
						} else {
							array_push($data['error_messages'], array('type' => 'Error',  'content' => 'There are garments belong to this category!'));
						}
					}
				}
				$name = $this->admin_model->get_field_by_field_id($param2)['name'];
				$data['delete_type'] = 'field';
				$data['delete_id'] = $param2;
				$data['title'] = "Delete field - ".$name;
				$data['title_description'] = "Delete field - ".$name;
				$this->load->view('admin/header', $data);
				$this->load->view('admin/matrix/delete', $data);
				$this->load->view('admin/footer', $data);
			}
			else {
				redirect('/admin/matrix/category/edit/'.$param1, 'refresh');
			}
		} else if ($page == 'field'){
			if ($param1 == 'edit'){
				if ($this->input->post()){
					//if this is a edit request.
					$data['error_messages'] = array();
					$field_id = $this->input->post('field_id', TRUE);
					$name = $this->input->post('name', TRUE);
					$short_name = $this->input->post('short_name', TRUE);
					$position = $this->input->post('position', TRUE);
					$NormW12 = $this->input->post('NormW12', TRUE);
					$NormW13 = $this->input->post('NormW13', TRUE);
					$deep_search_name = $this->input->post('deep_search_name', TRUE);
					$deep_search_level = $this->input->post('deep_search_level', TRUE);
					$deep_search_parent_field_id = $this->input->post('deep_search_parent_field_id', TRUE);
					$deep_search_required_field_id = $this->input->post('deep_search_required_field_id', TRUE);
					$criteria_ids = $this->input->post('criteria_ids', TRUE);
					$weight = $this->input->post('weight', TRUE);
					$showif = $this->input->post('showif', TRUE);
					$hideif = $this->input->post('hideif', TRUE);
					if (empty($field_id)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00003 Something went error. Please contact programmer!'));
					}
					if (empty($name)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'You must enter field NAME!'));
					}
					if (empty($short_name)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'You must enter field SHORT NAME!'));
					}
					if (empty($position)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'You must enter field POSITION!'));
					}
					if (empty($NormW12)){
						$NormW12 = '0';
					}
					if (empty($NormW13)){
						$NormW13 = '0';
					}
					if ($deep_search_level == 2){
						if (empty($deep_search_name)){
							array_push($data['error_messages'], array('type' => 'Error',  'content' => 'You must enter field DEEP SEARCH NAME!'));
						}
						if (empty($deep_search_parent_field_id)){
							array_push($data['error_messages'], array('type' => 'Error',  'content' => 'You must select field DEEP SEARCH PARENT FIELD!'));
						}
						if (empty($deep_search_required_field_id)){
							$deep_search_required_field_id = 0;
						}
					} else if ($deep_search_level == 1){
						//temporary change, will change back when deep search function online.
						/* if (empty($deep_search_name)){
							array_push($data['error_messages'], array('type' => 'Error',  'content' => 'You must enter field DEEP SEARCH NAME!'));
						} */
						$deep_search_parent_field_id = 0;
						$deep_search_required_field_id = 0;
					} else {
						$deep_search_level = 0;
						$deep_search_name = '';
						$deep_search_parent_field_id = 0;
						$deep_search_required_field_id = 0;
					}
					if (empty($data['error_messages'])){
						$db_criterias = array();
						if (!empty($criteria_ids)){
							foreach($criteria_ids as $key => $value) {
								array_push($db_criterias, array('criteria_id' => $criteria_ids[$key], 'weight' => $weight[$key]));
							}
						}
						$db_showif = '';
						$db_hideif = '';
						if (!empty($showif)) {
							$db_showif = '/'.implode('//', $showif).'/';
						}
						if (!empty($hideif)) {
							$db_hideif = '/'.implode('//', $hideif).'/';
						}
						if (!empty($db_criterias)){
							$this->admin_model->update_field_criterias($db_criterias);
						}
						if ($this->admin_model->update_field($field_id, array(
							'name' => $name, 
							'short_name' => $short_name, 
							'position' => $position, 
							'NormW12' => $NormW12, 
							'NormW13' => $NormW13, 
							'deep_search_name' => $deep_search_name, 
							'deep_search_level' => $deep_search_level, 
							'deep_search_parent_field_id' => $deep_search_parent_field_id, 
							'deep_search_required_field_id' => $deep_search_required_field_id, 
							'showif' => $db_showif, 
							'hideif' => $db_hideif, ))){
							$data['success_messages'] = array();
							array_push($data['success_messages'], array('type' => 'Congratulations',  'content' => 'This field has been successfully updated!'));
						} else {
							array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00005 Something went error. Please contact programmer!'));
						}
					}
				}
				$data['field'] = $this->admin_model->get_field_by_field_id($param2);
				$data['criterias'] = $this->admin_model->get_criterias_by_field_id($param2);
				list($data['showifs'], $data['hideifs']) = $this->admin_model->get_showif_hideif_list($data['field']['category_id'], $data['field']['position'], $data['field']['showif'], $data['field']['hideif']);
				list($data['deep_search_parent_list'], $data['deep_search_required_list']) = $this->admin_model->get_deep_search_list($data['field']['category_id'], $data['field']['position'], $data['field']['deep_search_parent_field_id'], $data['field']['deep_search_required_field_id']);
				$data['title'] = "Field - ".$data['field']['short_name'];
				$data['title_description'] = "manage field ".$data['field']['short_name'];
				$data['extraJS'] = '<script src="/js/admin/AdminLTE/field.js?v=2.2.0.0" type="text/javascript"></script>';
				$this->load->view('admin/header', $data);
				$this->load->view('admin/matrix/field', $data);
				$this->load->view('admin/footer', $data);
			}
			else if ($param1 == 'add'){
				if ($this->input->post()){
					//if this is a add request.
					$data['error_messages'] = array();
					$name = $this->input->post('name', TRUE);
					$short_name = $this->input->post('short_name', TRUE);
					$position = $this->input->post('position', TRUE);
					$NormW12 = $this->input->post('NormW12', TRUE);
					$NormW13 = $this->input->post('NormW13', TRUE);
					if (empty($name)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'You must enter field NAME!'));
					}
					if (empty($short_name)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'You must enter field SHORT NAME!'));
					}
					if (empty($position)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'You must enter field POSITION!'));
					}
					if (empty($NormW12)){
						$NormW12 = '0';
					}
					if (empty($NormW13)){
						$NormW13 = '0';
					}
					if (empty($data['error_messages'])){
						$field_id = $this->admin_model->insert_field($param2, array(
							'name' => $name, 
							'short_name' => $short_name, 
							'position' => $position, 
							'NormW12' => $NormW12, 
							'NormW13' => $NormW13, ));
						if ($field_id){
							redirect('/admin/matrix/field/edit/'.$field_id, 'refresh');
						} else {
							array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00009 Something went error. Please contact programmer!'));
						}
					}
				}
				$category = $this->category_model->get_category($param2);
				$data['field'] = array(
							'page_type' => 'add',
							'field_id' => 'Will be automatic generated.',
							'category_id' => $category['category_id'],
							'name' => '', 
							'short_name' => '', 
							'position' => '', 
							'NormW12' => 0, 
							'NormW13' => 0, );
				$data['title'] = "Add field for category - ".$category['name'];
				$data['title_description'] = "Add field for category - ".$category['name'];
				$this->load->view('admin/header', $data);
				$this->load->view('admin/matrix/field', $data);
				$this->load->view('admin/footer', $data);
			}
			else if ($param1 == 'delete'){
				if ($this->input->post()){
					//if this is a delete request.
					$data['error_messages'] = array();
					$field_id = $this->input->post('delete_id', TRUE);
					if (empty($field_id)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00013 Something went error. Please contact programmer!'));
					}
					if (empty($data['error_messages'])){
						$category_id = $this->admin_model->delete_field($field_id);
						if ($category_id){
							redirect('/admin/matrix/category/edit/'.$category_id, 'refresh');
						} else {
							array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00014 Something went error. Please contact programmer!'));
						}
					}
				}
				$name = $this->admin_model->get_field_by_field_id($param2)['name'];
				$data['delete_type'] = 'field';
				$data['delete_id'] = $param2;
				$data['title'] = "Delete field - ".$name;
				$data['title_description'] = "Delete field - ".$name;
				$this->load->view('admin/header', $data);
				$this->load->view('admin/matrix/delete', $data);
				$this->load->view('admin/footer', $data);
			}
			else {
				redirect('/admin/matrix/field/edit/'.$param1, 'refresh');
			}
		} else if ($page == 'criteria'){
			if ($param1 == 'edit'){
				if ($this->input->post()){
					//if this is a edit request.
					$data['error_messages'] = array();
					$criteria_id = $this->input->post('criteria_id', TRUE);
					$name = $this->input->post('name', TRUE);
					$position = $this->input->post('position', TRUE);
					$tooltip = $this->input->post('tooltip', TRUE);
					$weight = $this->input->post('weight', TRUE);
					$has_new_image = $this->input->post('has_new_image', TRUE);
					$ori_image = $this->input->post('ori_image', TRUE);
					$values = $this->input->post('values', TRUE);
					$showif = $this->input->post('showif', TRUE);
					$hideif = $this->input->post('hideif', TRUE);
					if (empty($criteria_id)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00006 Something went error. Please contact programmer!'));
					}
					if (empty($name)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'You must enter criteria NAME!'));
					}
					if (empty($position)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'You must enter criteria POSITION!'));
					}
					if (empty($tooltip)){
						$tooltip = '';
					}
					if (empty($weight)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'You must enter criteria IMPORTANCE!'));
					}
					if (!empty($has_new_image)) {
						$config['upload_path'] = $this->config->item('base_upload_path') . '/public_html/images/system/';
						$config['allowed_types'] = 'jpg|png|tif';
						$config['file_name'] = random_string('unique').'.jpg';
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('new_image')) {
							array_push($data['error_messages'], array('type' => 'Error',  'content' => $this->upload->display_errors()));
						} else {
							$image = $this->upload->data();
							$image_path = $image['file_name'];
							$is_image = $image['is_image'];
							if (!$is_image) {
								array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Your uploaded file is not an image!'));
							}
						}
					} else {
						$image_path = $ori_image;
					}
					if (empty($data['error_messages'])){
						$db_showif = '';
						$db_hideif = '';
						if (!empty($showif)) {
							$db_showif = '/'.implode('//', $showif).'/';
						}
						if (!empty($hideif)) {
							$db_hideif = '/'.implode('//', $hideif).'/';
						}
						if ($this->admin_model->update_criteria($criteria_id, array(
							'name' => $name, 
							'position' => $position, 
							'tooltip' => $tooltip, 
							'weight' => $weight, 
							'image_path' => $image_path,
							'showif' => $db_showif, 
							'hideif' => $db_hideif, )) && $this->admin_model->update_criteria($criteria_id, $values)){
							$data['success_messages'] = array();
							array_push($data['success_messages'], array('type' => 'Congratulations',  'content' => 'This criteria has been successfully updated!'));
						} else {
							array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00007 Something went error. Please contact programmer!'));
						}
					}
				}
				$data['criteria'] = $this->admin_model->get_criteria_by_criteria_id($param2);
				$data['comment'] = $this->admin_model->get_comment_by_criteria_id($param2);
				list($data['showifs'], $data['hideifs']) = $this->admin_model->get_showif_hideif_list($data['criteria']['category_id'], $data['criteria']['field_position'], $data['criteria']['showif'], $data['criteria']['hideif']);
				$data['title'] = "Criteria - ".$data['criteria']['name'];
				$data['title_description'] = "manage criteria ".$data['criteria']['name'];
				$data['extraJS'] = '<script src="/js/admin/AdminLTE/criteria.js?v=2.2.0.0" type="text/javascript"></script>';
				$this->load->view('admin/header', $data);
				$this->load->view('admin/matrix/criteria', $data);
				$this->load->view('admin/footer', $data);
			}
			else if ($param1 == 'add'){
				if ($this->input->post()){
					//if this is a add request.
					$data['error_messages'] = array();
					$name = $this->input->post('name', TRUE);
					$position = $this->input->post('position', TRUE);
					$tooltip = $this->input->post('tooltip', TRUE);
					$weight = $this->input->post('weight', TRUE);
					if (empty($name)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'You must enter criteria NAME!'));
					}
					if (empty($position)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'You must enter criteria POSITION!'));
					}
					if (empty($tooltip)){
						$tooltip = '';
					}
					if (empty($weight)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'You must enter criteria IMPORTANCE!'));
					}
					$config['upload_path'] = $this->config->item('base_upload_path') . '/public_html/images/system/';
					$config['allowed_types'] = 'jpg|png|tif';
					$config['file_name'] = random_string('unique').'.jpg';
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('new_image')) {
						array_push($data['error_messages'], array('type' => 'Error',  'content' => $this->upload->display_errors()));
					} else {
						$image = $this->upload->data();
						$image_path = $image['file_name'];
						$is_image = $image['is_image'];
						if (!$is_image) {
							array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Your uploaded file is not an image!'));
						}
					}
					if (empty($data['error_messages'])){
						$criteria_id = $this->admin_model->insert_criteria(array(
							'name' => $name, 
							'field_id' => $param2,
							'position' => $position, 
							'tooltip' => $tooltip, 
							'weight' => $weight, 
							'image_path' => $image_path,));
						if ($criteria_id){
							redirect('/admin/matrix/criteria/edit/'.$criteria_id, 'refresh');
						} else {
							array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00010 Something went error. Please contact programmer!'));
						}
					}
				}
				$name = $this->admin_model->get_field_by_field_id($param2)['name'];
				$data['criteria'] = array(
									'page_type' => 'add',
									'field_id' => $param2,
									'criteria_id' => 'Will be automatic generated.',
									'name' => '', 
									'position' => '', 
									'tooltip' => '', 
									'weight' => '',);
				$data['title'] = "Add new criteria for field - ".$name;
				$data['title_description'] = "Add new criteria for field - ".$name;
				$this->load->view('admin/header', $data);
				$this->load->view('admin/matrix/criteria', $data);
				$this->load->view('admin/footer', $data);
			}
			else if ($param1 == 'delete'){
				if ($this->input->post()){
					//if this is a delete request.
					$data['error_messages'] = array();
					$criteria_id = $this->input->post('delete_id', TRUE);
					if (empty($criteria_id)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00011 Something went error. Please contact programmer!'));
					}
					if (empty($data['error_messages'])){
						$field_id = $this->admin_model->delete_criteria($criteria_id);
						if ($field_id){
							redirect('/admin/matrix/field/edit/'.$field_id, 'refresh');
						} else {
							array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00012 Something went error. Please contact programmer!'));
						}
					}
				}
				$name = $this->admin_model->get_criteria_by_criteria_id($param2)['name'];
				$data['delete_type'] = 'criteria';
				$data['delete_id'] = $param2;
				$data['title'] = "Delete criteria - ".$name;
				$data['title_description'] = "Delete criteria - ".$name;
				$this->load->view('admin/header', $data);
				$this->load->view('admin/matrix/delete', $data);
				$this->load->view('admin/footer', $data);
			}
			else {
				redirect('/admin/matrix/criteria/edit/'.$param1, 'refresh');
			}
		} else if ($page == 'comment'){
			if ($param1 == 'edit'){
				if ($this->input->post()){
					//if this is a edit request.
					$data['error_messages'] = array();
					$comment_id = $this->input->post('comment_id', TRUE);
					$comment = $this->input->post('comment', TRUE);
					$labels = $this->input->post('labels', TRUE);
					$plus1 = $this->input->post('plus1', TRUE);
					$plus2 = $this->input->post('plus2', TRUE);
					$plus3 = $this->input->post('plus3', TRUE);
					$plus4 = $this->input->post('plus4', TRUE);
					if (empty($comment_id)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00006 Something went error. Please contact programmer!'));
					}
					if (empty($comment)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'You must enter comment!'));
					}
					if (empty($data['error_messages'])){
						if ($this->admin_model->update_comment($comment_id, array(
							'Comment' => $comment, 
							'LABELS' => $labels, 
							'PLUS1' => $plus1, 
							'PLUS2' => $plus2, 
							'PLUS3' => $plus3, 
							'PLUS4' => $plus4,))){
							$data['success_messages'] = array();
							array_push($data['success_messages'], array('type' => 'Congratulations',  'content' => 'This criteria has been successfully updated!'));
						} else {
							array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00007 Something went error. Please contact programmer!'));
						}
					}
				}
				$data['comment'] = $this->admin_model->get_comment_by_comment_id($param2);
				$data['title'] = "Comment - ".$data['comment']['criteria_comment_id'];
				$data['title_description'] = "manage comment ".$data['comment']['criteria_comment_id'];
				$data['extraJS'] = '<script src="/js/admin/AdminLTE/comment.js?v=2.2.0.0" type="text/javascript"></script>';
				$this->load->view('admin/header', $data);
				$this->load->view('admin/matrix/comment', $data);
				$this->load->view('admin/footer', $data);
			}
			else if ($param1 == 'add'){
				if ($this->input->post()){
					//if this is a add request.
					$data['error_messages'] = array();
					$criteria_id = $this->input->post('criteria_id', TRUE);
					$comment = $this->input->post('comment', TRUE);
					$labels = $this->input->post('labels', TRUE);
					$plus1 = $this->input->post('plus1', TRUE);
					$plus2 = $this->input->post('plus2', TRUE);
					$plus3 = $this->input->post('plus3', TRUE);
					$plus4 = $this->input->post('plus4', TRUE);
					if (empty($comment)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'You must enter comment!'));
					}
					if (empty($data['error_messages'])){
						$comment_id = $this->admin_model->insert_comment(array(
							'criteria_id' => $criteria_id, 
							'Comment' => $comment, 
							'LABELS' => $labels,
							'PLUS1' => $plus1, 
							'PLUS2' => $plus2, 
							'PLUS3' => $plus3, 
							'PLUS4' => $plus4,));
						if ($comment_id){
							redirect('/admin/matrix/criteria/edit/'.$param2, 'refresh');
						} else {
							array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00010 Something went error. Please contact programmer!'));
						}
					}
				}
				$name = $this->admin_model->get_criteria_by_criteria_id($param2)['name'];
				$data['comment'] = array(
									'page_type' => 'add',
									'criteria_id' => $param2, 
									'criteria_comment_id' => 'Will be automatic generated.',
									'Comment' => '', 
									'LABELS' => '',
									'PLUS1' => '',
									'PLUS2' => '',
									'PLUS3' => '',
									'PLUS4' => '',);
				$data['title'] = "Add new comment for criteria - ".$name;
				$data['title_description'] = "Add new comment for criteria - ".$name;
				$this->load->view('admin/header', $data);
				$this->load->view('admin/matrix/comment', $data);
				$this->load->view('admin/footer', $data);
			}
			else if ($param1 == 'delete'){
				if ($this->input->post()){
					//if this is a delete request.
					$data['error_messages'] = array();
					$comment_id = $this->input->post('delete_id', TRUE);
					if (empty($comment_id)){
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00011 Something went error. Please contact programmer!'));
					}
					if (empty($data['error_messages'])){
						$criteria_id = $this->admin_model->delete_comment($comment_id);
						if ($criteria_id){
							redirect('/admin/matrix/criteria/edit/'.$criteria_id, 'refresh');
						} else {
							array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00012 Something went error. Please contact programmer!'));
						}
					}
				}
				$name = $this->admin_model->get_comment_by_comment_id($param2)['criteria_comment_id'];
				$data['delete_type'] = 'comment';
				$data['delete_id'] = $param2;
				$data['title'] = "Delete comment - ".$name;
				$data['title_description'] = "Delete comment - ".$name;
				$this->load->view('admin/header', $data);
				$this->load->view('admin/matrix/delete', $data);
				$this->load->view('admin/footer', $data);
			}
			else {
				redirect('/admin/matrix/criteria/edit/'.$param1, 'refresh');
			}
		} else if ($page == 'question_comments'){
			$data['title'] = "Question Comments";
			$data['title_description'] = "manage question comments";
			$this->load->view('admin/header', $data);
			$this->load->view('admin/matrix/question_comments', $data);
			$this->load->view('admin/footer', $data);
		} else if ($page == 'question_comment'){
			if (empty($param1)){
				redirect('/admin/matrix/question_comments', 'refresh');
			}
			if ($this->input->post()){
				//if this is a edit request.
				/* $data['error_messages'] = array();
				$category_id = $this->input->post('category_id', TRUE);
				$name = $this->input->post('name', TRUE);
				$order = $this->input->post('order', TRUE);
				$has_new_image = $this->input->post('has_new_image', TRUE);
				$ori_image = $this->input->post('ori_image', TRUE);
				if (empty($category_id)){
					array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00001 Something went error. Please contact programmer!'));
				}
				if (empty($name)){
					array_push($data['error_messages'], array('type' => 'Error',  'content' => 'You must enter category NAME!'));
				}
				if (empty($order)){
					array_push($data['error_messages'], array('type' => 'Error',  'content' => 'You must enter category POSITION!'));
				}
				if (!empty($has_new_image)) {
					$config['upload_path'] = $this->config->item('base_upload_path') . '/public_html/images/system/';
					$config['allowed_types'] = 'jpg|png|tif';
					$config['file_name'] = random_string('unique').'.jpg';
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('new_image')) {
						array_push($data['error_messages'], array('type' => 'Error',  'content' => $this->upload->display_errors()));
					} else {
						$image = $this->upload->data();
						$image_path = $image['file_name'];
						$is_image = $image['is_image'];
						if (!$is_image) {
							array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Your uploaded file is not an image!'));
						}
					}
				} else {
					$image_path = $ori_image;
				}
				if (empty($data['error_messages'])){
					if ($this->admin_model->update_category($category_id, array('name' => $name, 'order' => $order, 'image_path' => $image_path, ))){
						$data['success_messages'] = array();
						array_push($data['success_messages'], array('type' => 'Congratulations',  'content' => 'This category has been successfully updated!'));
					} else {
						array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00002 Something went error. Please contact programmer!'));
					}
				} */
			}
			$data['garment'] = $this->garment_model->get_garment_info($param1);
			$data['admin_comment'] = $this->admin_model->get_detailed_question_comments($param1);
			$data['title'] = "Question Comment - ".$data['garment']['name'];
			$data['title_description'] = "manage question comment ".$data['garment']['name'];
			$this->load->view('admin/header', $data);
			$this->load->view('admin/matrix/question_comment', $data);
			$this->load->view('admin/footer', $data);
		} else if ($page == 'comment_email'){
			$data['garment'] = $this->garment_model->get_garment_info($param1);
			$data['user_info'] = $this->user_model->get_user_info($data['garment']['import_user_id']);
			$data['admin_comment'] = $this->admin_model->get_detailed_question_comments($param1);
			$this->load->view('admin/matrix/comment_email', $data);
		}
	}
	/**
	 * Send Email Service for this controller
	 */
	public function send_email($garment_id){
		$this->login_check();
		$data['garment'] = $this->garment_model->get_garment_info($garment_id);
		$data['user_info'] = $this->user_model->get_user_info($data['garment']['import_user_id']);
		$data['admin_comment'] = $this->admin_model->get_detailed_question_comments($garment_id);
		$email_to = $this->input->get('email_to', TRUE);
		if (empty($email_to)){
			$email_to = $this->user_model->get_user_email($data['garment']['import_user_id']);
		}
		$message = $this->load->view('admin/matrix/comment_email', $data, TRUE);
		
		$this->load->library('email');
		$this->email->clear();
		$config['wordwrap'] = FALSE;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from('no-reply@pretastyler.com', 'Prêt à Styler');
		$this->email->to($email_to);
		$this->email->subject('Your item '.$data['garment']['name'].' has been corrected');
		$this->email->message($message);
		$this->email->send();
		//$this->admin_model->update_comment_email_sent($garment_id);
		return $this->admin_model->update_comment_email_sent($garment_id);
	}
	/**
	 * Question comments Service for this controller.
	 */
	public function question_comments(){
		$this->login_check();
		$this->datatables->select("pas_assessment_comment.garment_id, pas_garment.name, pas_assessment_comment.date_created, IF (email_sent = 1, 'fa fa-check-circle', 'glyphicon glyphicon-ban-circle') AS email_sent, email_date", FALSE)->from('assessment_comment')->join('garment', 'pas_garment.garment_id = pas_assessment_comment.garment_id', 'left');
		$this->datatables->edit_column('email_sent', '<i class="$1"></i>', 'email_sent');
		$this->datatables->add_column('edit_basic', '<a href="/garment/edit-general/$1.html" target="_blank"><i class="fa fa-edit"></i></a>', 'garment_id');
		$this->datatables->add_column('edit_criteria', '<a href="/garment/edit/$1.html" target="_blank"><i class="fa fa-edit"></i></a>', 'garment_id');
		$this->datatables->add_column('edit', '<a href="/admin/matrix/question-comment/$1.html"><i class="fa fa-edit"></i></a>', 'garment_id');
		echo $this->datatables->generate();
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// User page Service
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	/**
	 * User Page for this controller.
	 */
	public function switchuser($param1 = FALSE)
	{
		$this->login_check();
		
		$param1 = (int)	$param1;
		
		$id = $this->flexi_auth->get_user_id();

		// Step 1 check permission
		if( $param1 > 0 && ( $id == 1 || $id == 99 ) ) {

			// Load flexi auth model
			$this->load->model('flexi_auth_model');

			// Login with user data from model
			if( $this->flexi_auth_model->custom_login_with_user_data( $param1 ) === false ) {
				redirect('/admin/user/general.html?error=user does not exist&view=page', 'refresh');
			}

			// Step 4 redirect to mall
			redirect('/mall', 'refresh');
		} else {
			redirect('/admin', 'refresh');
		}

	}
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// Notification Page Service
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	/**
	 * Notification Page for this controller.
	 */
	public function notifications()
	{
		$this->login_check();
		$data = $this->data;
		
		$data['current_folder'] = "Notification management";
		$data['current_folder_path'] = "notifications";
		$data['title'] = "All Notification";
		$data['title_description'] = "manage all notification";
		$data['filters'] = '';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/notifications/index', $data);
		$this->load->view('admin/footer', $data);

	}
	/**
	 * Request handler of Notification page for this controller.
	 */
	public function getnotifications()
	{
		
		$this->datatables->select("pas_notifications.notify_id, pas_notifications.notify_date, pas_notifications.notify_level, pas_notifications.notify_title, pas_notifications.notify_description, IF ( pas_notifications.notify_status = 1, 'fa fa-envelope', 'fa fa-envelope-o') AS active", FALSE)->from('notifications');

		$this->datatables->edit_column('active', '<i class="mousehand $1"></i>', 'active');

		echo $this->datatables->generate();
	}
	/**
	 * Request handler for All page in HEADER for this controller.
	 */
	public function set_notification_status()
	{
		$this->login_check();
		$notify_id = (int) $this->input->post('id', TRUE);
		$notify_status = $this->input->post('notify_status', TRUE);
		$notify_status_all = $this->input->post('notify_status_all', TRUE);
		
		if( $notify_id > 0 ){
			if( $notify_status == 'read' ){
				$this->notification_model->update_notification_status( $notify_id, '0' );
				echo 1;
			} 
			else if ( $notify_status == 'unread' ){
				$this->notification_model->update_notification_status( $notify_id, '1' );
				echo 1;
			} else {
				echo 0;
			}
		} else if ( $notify_status_all == 'all' ){
			if( $notify_status == 'read' ){
				$this->notification_model->update_notification_status( null, 'all', '0' );
				echo 1;
			} 
			else if ( $notify_status == 'unread' ){
				$this->notification_model->update_notification_status( null, 'all', '1' );
				echo 1;
			} else {
				echo 0;
			}
		} else {
			echo 0;
		}
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */