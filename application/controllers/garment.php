<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Name: PAS User Controller
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
class Garment extends CI_Controller {
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
		$this->load->helper(array('url','form'));
		$this->data = array();
		if ($this->flexi_auth->is_logged_in()){
			$this->data['first_name'] = $this->user_model->get_user_name($this->flexi_auth->get_user_id())['first_name'];
		}
	}
	/**
	 * Extension Import Page for this controller.
	 */
	public function import_extension()
	{
		$this->load->library('user_check');
		$this->load->library('session');
		$type = $this->session->userdata('type');
		$url = $this->session->userdata( 'url');
		$garment_name = $this->session->userdata( 'garment_name');
		$images = $this->session->userdata( 'images');
		$selected_image = $this->session->userdata( 'selected_image');
		if ($this->flexi_auth->is_logged_in()){
			$this->session->unset_userdata('type');
			$this->session->unset_userdata('url');
			$this->session->unset_userdata('garment_name');
			$this->session->unset_userdata('images');
			$this->session->unset_userdata('selected_image');
		}
		if (!$type) {
			$this->not_found();
			return;
		} else {
			$this->load->helper(array('url_encode', 'string'));
			$decoded_url = prep_url(base64_decode_url($url));
			if (!$this->assessment_model->check_existed_garment($decoded_url)){
				$this->general_error("It's a duplicate garment!", "It's a duplicate garment!");
				return;
			}
			$garment_name = base64_decode_url($garment_name);
			$filtered_images = json_decode(base64_decode_url($images));
			usort($filtered_images, function($a, $b) {
				return $b->height + $b->width - $a->height - $a->width;
			});
			$data = $this->data;
			$data['title'] = "Import Garment";
			$data['extraJS'] = '<script src="/js/garment-import.js?v=2.2.0.4"></script><script src="/js/jquery-ui.min.js"></script><script src="/js/jquery.multiselect.min.js"></script><link href="/css/jquery.multiselect.css" rel="stylesheet">';
			if ($type == 2){
				$selected_image = base64_decode_url($selected_image);
				foreach ($filtered_images as $key => $value){
					if ($value->src == $selected_image) {
						unset($filtered_images[$key]);
					}
				}
				$data['extraJS'].="<script>$(function(){extension_import('".$selected_image."');});</script>";
			}
			if (!$this->flexi_auth->is_logged_in()){
				$data['extraJS'].="<script>$(function(){login_click('/garment/import-extension.html');});</script>";
			}
			$data['extraDiv'] = '<div id="hiddenURL" style="display:none">'.$url.'</div>';
			
			$data_images = array_slice($filtered_images, 0, 10);
			$this->session->set_userdata( 'upload_data_images', $data_images );

			$ch = curl_init(site_url() . 'garment/upload-image-path.html');
			curl_setopt($ch, CURLOPT_URL, "example.com");
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,2);
			curl_setopt($ch, CURLOPT_TIMEOUT, 1);
			curl_exec($ch);
			curl_close($ch);

			$data['garment_name'] = $garment_name;
			$data['colours1'] = $this->colour_model->get_available_colours();
			$data['colours2'] = $this->colour_model->get_available_colours(TRUE);
			$data['occasions'] = $this->occasion_model->get_available_occasions();
			$data['categories'] = $this->category_model->get_available_categories();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/menu', $data);
			$this->load->view('templates/menu_mall', $data);
			$this->load->view('garment/import_extension', $data);
			$this->load->view('templates/footer', $data);
		}
	}
	/**
	 * Import Page for this controller.
	 */
	public function import($url = FALSE)
	{
		$this->load->library('user_check');
		if (!$url) {
			$this->not_found();
			return;
		} else {
			$this->load->helper(array('get_images', 'url_encode', 'string'));
			$decoded_url = prep_url(base64_decode_url($url));
			if (!$this->assessment_model->check_existed_garment($decoded_url)){
				$this->general_error("It's a duplicate garment!", "It's a duplicate garment!");
				return;
			}
			list($filtered_images, $garment_name) = get_image_from_url($decoded_url);
			
			$data = $this->data;
			$data['title'] = "Import Garment";
			$data['extraJS'] = '<script src="/js/garment-import.js?v=2.2.0.4"></script><script src="/js/jquery-ui.min.js"></script><script src="/js/jquery.multiselect.min.js"></script><link href="/css/jquery.multiselect.css" rel="stylesheet">';
			$data['extraDiv'] = '<div id="hiddenURL" style="display:none">'.$url.'</div>';
			
			$data['images'] = array_slice($filtered_images, 0, 7);
			$data['garment_name'] = $garment_name;
			$data['colours1'] = $this->colour_model->get_available_colours();
			$data['colours2'] = $this->colour_model->get_available_colours(TRUE);
			$data['occasions'] = $this->occasion_model->get_available_occasions();
			$data['categories'] = $this->category_model->get_available_categories();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/menu', $data);
			$this->load->view('templates/menu_mall', $data);
			$this->load->view('garment/import', $data);
			$this->load->view('templates/footer', $data);
		}
	}
	/**
	 * Edit General Info Page for this controller.
	 */
	public function edit_general($slug = FALSE)
	{
		$this->load->library('user_check');
		if (!$slug || !$this->flexi_auth->is_logged_in()) {
			$this->not_found();
			return;
		}
		$slugs = explode("_", $slug);
		if (!isset($slugs[0])) {
			$this->not_found();
			return;
		}
		$garment_id = intval($slugs[0]);
		
		$user_id = $this->flexi_auth->get_user_id();
		$data = $this->data;
		$data['garment'] = $this->garment_model->get_garment_info($garment_id);
		if (!$this->flexi_auth->in_group('Administrators') && $data['garment']['import_user_id'] != $user_id) {
			$this->general_error('Not Permitted', 'Sorry, it seems you don\'t have the permission to edit this garment.');
			return;
		}
		$data['title'] = "Edit Garment General Information - ".$data['garment']['name'];
		$data['extraJS'] = '<script src="/js/garment-edit-general.js?v=2.2.0.0"></script><script src="/js/jquery-ui.min.js"></script><script src="/js/jquery.multiselect.min.js"></script><link href="/css/jquery.multiselect.css" rel="stylesheet">';
		$data['extraDiv'] = '<div id="hiddenID" style="display:none">'.$garment_id.'</div>';
		
		$data['colours1'] = $this->colour_model->get_garment_colours($garment_id);
		$data['colours2'] = $this->colour_model->get_garment_colours($garment_id, TRUE);
		$data['category'] = $this->category_model->get_category($data['garment']['category_id']);
		$data['occasions'] = $this->occasion_model->get_garment_occasions($garment_id);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('garment/edit_general', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * Update Garment General Information Service for this controller.
	 */
	public function update_general() {
		$garment_id = $this->input->post('garment_id', TRUE);
		$name = $this->input->post('name', TRUE);
		$brand = $this->input->post('brand', TRUE);
		$store = $this->input->post('store', TRUE);
		$price_range = $this->input->post('price_range', TRUE);
		$season = $this->input->post('season', TRUE);
		$occasion_ids = $this->input->post('occasions', TRUE);
		$colour_ids = $this->input->post('colours', TRUE);
		$size_region = $this->input->post('size_region', TRUE);
		$size_sizes = $this->input->post('size_sizes', TRUE);
		$description = $this->input->post('description', TRUE);
		$is_pattern = $this->input->post('pattern', TRUE);
		$garment_data = array(
						'name' => $name,
						'brand' => $brand,
						'store' => $store,
						'price_range' => $price_range,
						'description' => $description,
						'is_pattern' => $is_pattern,
						'date_modified' => date('Y-m-d H:i:s'),
		);
		if ($this->flexi_auth->is_logged_in()){
			$garment = $this->garment_model->get_garment_info($garment_id);
			$user_id = $this->flexi_auth->get_user_id();
			if ($this->flexi_auth->in_group(array('Administrators')) || ($user_id == $garment['import_user_id'])) {
				if ($this->flexi_auth->in_group(array('Administrators'))){
					$garment_data['date_admin_modified'] = date('Y-m-d H:i:s');
				}
			} else {
				return "You don't have the permission to change this garment.";
			}
		} else {
			return "You're not logged in, please try again when you log in.";
		}
		//insert garment
		$this->garment_model->update_garment_info($garment_id, $garment_data);
		//insert occasions
		$this->occasion_model->delete_garment_occasion($garment_id);
		$this->occasion_model->insert_garment_occasion($garment_id, $occasion_ids);
		//insert colours
		$this->colour_model->delete_garment_colour($garment_id);
		$this->colour_model->insert_garment_colour($garment_id, $colour_ids);
		//insert sizes
		if (!empty($size_region)){
			$this->size_model->delete_garment_size($garment_id);
			$this->size_model->insert_garment_size($garment_id, $size_region, $size_sizes);
		}
		print '1';
	}
	/**
	 * Garment Import Service for this controller.
	 */
	public function garment_import()
	{
		$this->load->helper('url_encode');
		
		$name = $this->input->post('name', TRUE);
		$brand = $this->input->post('brand', TRUE);
		$store = $this->input->post('store', TRUE);
		$price_range = $this->input->post('price_range', TRUE);
		$season = $this->input->post('season', TRUE);
		$category_id = $this->input->post('category', TRUE);
		$occasion_ids = $this->input->post('occasions', TRUE);
		$colour_ids = $this->input->post('colours', TRUE);
		$image_url = $this->input->post('image_url', TRUE);
		$extra_image1_url = $this->input->post('extra_image1_url', TRUE);
		$extra_image2_url = $this->input->post('extra_image2_url', TRUE);
		$image_url = $this->input->post('image_url', TRUE);
		$size_region = $this->input->post('size_region', TRUE);
		$size_sizes = $this->input->post('size_sizes', TRUE);
		$url = prep_url(base64_decode_url($this->input->post('url', TRUE)));
		$description = $this->input->post('description', TRUE);
		$is_standard = FALSE;
		$is_pattern = $this->input->post('pattern', TRUE);
		if ($this->flexi_auth->is_logged_in()){
			$user_id = $this->flexi_auth->get_user_id();
			$is_standard = $this->flexi_auth->in_group(array('Administrators', 'Uploaders'));
		} else {
			redirect('/', 'refresh');
		}
		//validation
		$errors = TRUE;
		//save image
		$image_path = $this->garment_model->insert_garment_image($image_url);
		//save extra image
		$extra_image1_path = NULL;
		$extra_image2_path = NULL;
		if (!empty($extra_image1_url)) {
			$extra_image1_path = $this->garment_model->insert_garment_image($extra_image1_url);
		}
		if (!empty($extra_image2_url)) {
			$extra_image2_path = $this->garment_model->insert_garment_image($extra_image2_url);
		}
		//insert garment
		$garment_id = $this->garment_model->insert_garment($user_id, $name, $brand, $store, $url, $image_url, $price_range, $category_id, $image_path, $extra_image1_path, $extra_image2_path, $description, $is_standard, $is_pattern);
		//insert occasions
		$this->occasion_model->insert_garment_occasion($garment_id, $occasion_ids);
		//insert colours
		$this->colour_model->insert_garment_colour($garment_id, $colour_ids);
		//insert dresing_room
		$this->garment_model->insert_garment_dressing_room($garment_id, $user_id);
		//insert sizes
		if (!empty($size_region)){
			$this->size_model->insert_garment_size($garment_id, $size_region, $size_sizes);
		}
		print $garment_id;
	}
	/**
	 * Assess Page for this controller.
	 */
	public function assess($slug = FALSE)
	{
		$this->load->library('user_check');
		if (!$slug || !$this->flexi_auth->is_logged_in()) {
			$this->not_found();
			return;
		}
		$slugs = explode("_", $slug);
		if (!isset($slugs[0])) {
			$this->not_found();
			return;
		}
		$garment_id = intval($slugs[0]);
		
		$user_id = $this->flexi_auth->get_user_id();
		$data = $this->data;
		$data['garment'] = $this->garment_model->get_garment_info($garment_id, $user_id);
		if (!$this->flexi_auth->in_group('Administrators') && $data['garment']['import_user_id'] != $user_id) {
			$this->not_found();
			return;
		}
		$data['title'] = "Assess Garment";
		$data['extraJS'] = '<script src="/js/garment-assess.js?v=2.2.0.0"></script>';
		$data['initial_data'] = $this->assessment_model->get_initial_field_criteria_for_assessment($garment_id, $data['garment']['category_id']);
		$data['extraDiv'] = '<div class="hiddenCategory" style="display:none" category_id="'.$data['garment']['category_id'].'"></div>';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('garment/assess', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * Assess Page for this controller.
	 */
	public function edit($slug = FALSE)
	{
		$this->load->library('user_check');
		if (!$slug || !$this->flexi_auth->is_logged_in()) {
			$this->not_found();
			return;
		}
		$slugs = explode("_", $slug);
		if (!isset($slugs[0])) {
			$this->not_found();
			return;
		}
		$garment_id = intval($slugs[0]);
		
		$user_id = $this->flexi_auth->get_user_id();
		$data = $this->data;
		$data['garment'] = $this->garment_model->get_garment_info($garment_id, $user_id);
		if (!$this->flexi_auth->in_group('Administrators') && $data['garment']['import_user_id'] != $user_id) {
			$this->general_error('Not Permitted', 'Sorry, it seems you don\'t have the permission to edit this garment.');
			return;
		}
		$data['title'] = "Edit Garment - ".$data['garment']['name'];
		$data['extraJS'] = '<script src="/js/garment-edit.js?v=2.2.0.3"></script>';
		$data['initial_data'] = $this->assessment_model->get_initial_field_criteria_for_edit($garment_id, $data['garment']['category_id']);
		$data['extraDiv'] = '<div class="hiddenCategory" style="display:none" category_id="'.$data['garment']['category_id'].'"></div>';
		if ($this->flexi_auth->in_group('Administrators')){
			$data['admin_comment'] = $this->assessment_model->get_assessment_comment($garment_id);
			$user_name = $this->user_model->get_user_name($data['garment']['import_user_id']);
			$data['user_name'] = $user_name['first_name'].' '.$user_name['last_name'];
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('garment/edit', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * Garment Edit New Data Service for this controller.
	 */
	public function garment_edit_new_data()
	{
		if (!$this->flexi_auth->is_logged_in()){
			return "You didn't log in!";
		}
		header( 'Content-Type: application/json' );
		header( 'Access-Control-Allow-Origin: *' );

		$category_id = $this->input->post( 'category_id', TRUE );
		$field_id = $this->input->post( 'field_id', TRUE );
		$criteria_ids = $this->input->post( 'criteria_ids', TRUE );
		$is_button = $this->input->post( 'is_button', TRUE );

		if( $category_id > 0 )
		{
			$deep_fields = $this->assessment_model->get_new_field_criteria_for_edit( $category_id, $field_id, $criteria_ids, $is_button);
		}

		if(!empty( $deep_fields )){
			echo json_encode( $deep_fields );
		}else {
			echo json_encode(array());
		}
	}
	/**
	 * Garment Assess New Data Service for this controller.
	 */
	public function garment_assess_new_data()
	{
		if (!$this->flexi_auth->is_logged_in()){
			return "You didn't log in!";
		}
		header( 'Content-Type: application/json' );
		header( 'Access-Control-Allow-Origin: *' );

		$category_id = $this->input->post( 'category_id', TRUE );
		$field_id = $this->input->post( 'field_id', TRUE );
		$criteria_ids = $this->input->post( 'criteria_ids', TRUE );
		$is_button = $this->input->post( 'is_button', TRUE );

		if( $category_id > 0 )
		{
			$deep_fields = $this->assessment_model->get_new_field_criteria_for_assessment( $category_id, $field_id, $criteria_ids, $is_button);
		}

		if(!empty( $deep_fields )){
			echo json_encode( $deep_fields );
		}else {
			echo json_encode(array());
		}
	}
	/**
	 * Disable Garment Service for this controller.
	 */
	public function disable()
	{
		if (!$this->flexi_auth->is_logged_in()) {
			$this->not_found();
			return;
		}
		if (!$this->flexi_auth->in_group('Administrators') && $data['garment']['import_user_id'] != $user_id) {
			$this->not_found();
			return;
		}
		$garment_id = $this->input->post( 'garment_id', TRUE );
		$user_id = $this->flexi_auth->get_user_id();
		$update_data = array('enabled' => 0);
		$data['garment'] = $this->garment_model->update_garment_info($garment_id, $update_data);
		return TRUE;
	}
	/**
	 * Update Garment Specs  Service for this controller.
	 */
	public function update_admin_comment(){
		if (!$this->flexi_auth->is_logged_in()){
			return "You didn't log in!";
		}
		$garment_id = $this->input->post( 'garment_id', TRUE );
		$admin_comment = $this->input->post( 'admin_comment', TRUE );
		if (!$this->flexi_auth->in_group('Administrators')) {
			$this->general_error('Not Permitted', 'Sorry, it seems you don\'t have the permission to edit this garment.');
			return;
		}
		$this->assessment_model->set_assessment_comment($garment_id, $admin_comment);
	}
	/**
	 * Update Garment Specs  Service for this controller.
	 */
	public function update_specs()
	{
		if (!$this->flexi_auth->is_logged_in()){
			return "You didn't log in!";
		}
		$user_id = $this->flexi_auth->get_user_id();
		$garment_id = $this->input->post( 'garment_id', TRUE );
		$criteria_ids = $this->input->post( 'criteria_ids', TRUE );
		$garment = $this->garment_model->get_garment_info($garment_id, $user_id);
		if (!$this->flexi_auth->in_group('Administrators') && $garment['import_user_id'] != $user_id) {
			$this->general_error('Not Permitted', 'Sorry, it seems you don\'t have the permission to edit this garment.');
			return;
		}
		$date_update_array = array('date_modified' => date('Y-m-d H:i:s'));
		if ($this->flexi_auth->in_group(array('Administrators'))){
			$date_update_array['date_admin_modified'] = date('Y-m-d H:i:s');
		}
		//update modified info
		$this->garment_model->update_garment_info($garment_id, $date_update_array);
		//insert criteria info
		$this->assessment_model->insert_garment_criteria( $garment_id, $criteria_ids);
		//delete from dressing room and mark as expired(means need to update the score after they log in again)
		$this->garment_model->update_garment_dressing_room($garment_id);
		//inser garment specs
		if($this->assessment_model->insert_garment_specs( $garment_id, $criteria_ids,  $this->flexi_auth->get_user_id())){
			print 1;
		} else {
			$this->not_found(404);
			return;
		}
	}
	/**
	 * Insert Garment Specs  Service for this controller.
	 */
	public function insert_specs()
	{
		
		if (!$this->flexi_auth->is_logged_in()){
			return "You didn't log in!";
		}
		$user_id = $this->flexi_auth->get_user_id();
		$garment_id = $this->input->post( 'garment_id', TRUE );
		$criteria_ids = $this->input->post( 'criteria_ids', TRUE );
		$garment = $this->garment_model->get_garment_info($garment_id, $user_id);
		if (!$this->flexi_auth->in_group('Administrators') && $garment['import_user_id'] != $user_id) {
			$this->general_error('Not Permitted', 'Sorry, it seems you don\'t have the permission to edit this garment.');
			return;
		}
		$date_update_array = array('date_modified' => date('Y-m-d H:i:s'));
		if ($this->flexi_auth->in_group(array('Administrators'))){
			$date_update_array['date_admin_modified'] = date('Y-m-d H:i:s');
		}
		//update modified info
		$this->garment_model->update_garment_info($garment_id, $date_update_array);
		//insert criteria info
		$this->assessment_model->insert_garment_criteria( $garment_id, $criteria_ids);
		//delete from dressing room
		$this->garment_model->update_garment_dressing_room($garment_id, $this->flexi_auth->get_user_id());
		//inser garment specs
		if($this->assessment_model->insert_garment_specs( $garment_id, $criteria_ids,  $this->flexi_auth->get_user_id())){
			print 1;
		} else {
			$this->not_found(404);
			return;
		}
	}
	/**
	 * Garment Size Initial Service for this controller.
	 */
	public function size_initial()
	{
		header( 'Content-Type: application/json' );
		header( 'Access-Control-Allow-Origin: *' );

		$category_id = $this->input->post( 'category_id', TRUE );

		if( $category_id > 0 )
		{
			$deep_fields = $this->size_model->get_import_size_initial($category_id);
		}

		if(!empty( $deep_fields )){
			echo json_encode( $deep_fields );
		}else {
			echo json_encode(array());
		}
	}
	/**
	 * Garment Size Initial Service for general edit page.
	 */
	public function edit_size_initial()
	{
		header( 'Content-Type: application/json' );
		header( 'Access-Control-Allow-Origin: *' );
		$garment_id = $this->input->post( 'garment_id', TRUE );
		$category_id = $this->input->post( 'category_id', TRUE );

		if( $category_id > 0 && $garment_id > 0)
		{
			$deep_fields = $this->size_model->get_import_size_initial($category_id, $garment_id);
		}

		if(!empty( $deep_fields )){
			echo json_encode( $deep_fields );
		}else {
			echo json_encode(array());
		}
	}

	/**
	 * Garment Size New Data Service for this controller.
	 */
	public function size_new_data()
	{
		header( 'Content-Type: application/json' );
		header( 'Access-Control-Allow-Origin: *' );

		$region = $this->input->post( 'region', TRUE );
		$type = $this->input->post( 'type', TRUE );

		if( !empty($region))
		{
			$deep_fields = $this->size_model->get_import_size_new_data($region, $type);
		}

		if(!empty( $deep_fields )){
			echo json_encode( $deep_fields );
		}else {
			echo json_encode(array());
		}
	}
	/**
	 * Garment Assessment Popup for this controller.
	 */
	public function garment_assess_popup($garment_id = FALSE)
	{
		if (empty($garment_id)) {
			return "Something went wrong!";
		}
		if (!$this->flexi_auth->is_logged_in()){
			return "You didn't log in!";
		}
		$data['garment'] = $this->garment_model->get_garment_info($garment_id, $this->flexi_auth->get_user_id() );
		$this->load->view('garment/garment_assessment_popup', $data);
		
	}
	/**
	 * Page Not Found Page for this controller.
	 */
	public function not_found()
	{
		set_status_header(404);
		$data = $this->data;
		$data['title'] = "Page Not Found";		
		$data['extraJS'] = '<style>.content {background-image:url(/images/404.jpg);margin:0;padding:0;height:100%;} .container { margin-top: 45px; }</style>';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('errors/not_found', $data);
	}
	/**
	 * General Error Page for this controller.
	 */
	public function general_error($error_title, $error_info)
	{
		$data = $this->data;
		$data['title'] = $error_title;
		$data['error_info'] = $error_info;
		$data['extraJS'] = '<style>.content {background-image:url(/images/505.jpg);margin:0;padding:0;height:100%;} .container { margin-top: 45px; }</style>';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('errors/general_error', $data);
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
			} else {
				$data['test_str'] = $slug;
			}
			$this->load->view('catalog/test', $data);
		} else {
			show_404();
		}
	}
	/**
	 * The Image Convert for Real Path
	 */
	public function upload_image_path( $imagedata = false )
	{
		$this->load->library('user_check');
		$images = $this->session->userdata( 'upload_data_images');
		if( !empty( $images )) {
			if ( $imagedata == 'get' ){
				//$this->load->view('garment/import_garment_images', array('images' => $images) );
				$this->session->unset_userdata('upload_data_images'); 

				foreach ($images as $image_key => $image) {
					if (strpos( $image->src,'static.theiconic.com.au%2Fp%2F') !== false) {
						$imageNew = explode( 'static.theiconic.com.au%2Fp%2F', $image->src );
						$images[$image_key]->src = 'http://static.theiconic.com.au/p/'.$imageNew[1];
					    $imageProp = getimagesize( $images[$image_key]->src );
					    $images[$image_key]->width = $imageProp[0];
					    $images[$image_key]->height   = $imageProp[1];
					}
					echo '<div class="item"><div class="itemName"><span><strong>SIZE:</strong>';
					echo  $image->height.' x '. $image->width .'</span></div><div class="imgWrap"><div><a href="#"><img src="';
					echo  $image->src .'" alt="" class="image-choice"></a></div>';
					if ($this->flexi_auth->in_group(array('Administrators', 'Uploaders'))) { 
						echo '<div class="choiceText"></div>';
					}
					 echo '</div></div>';
				}

			} else {
				
				foreach ($images as $image_key => $image) {
					if (strpos( $image->src,'static.theiconic.com.au%2Fp%2F') !== false) {
						$imageNew = explode( 'static.theiconic.com.au%2Fp%2F', $image->src );
						$images[$image_key]->src = 'http://static.theiconic.com.au/p/'.$imageNew[1];
				        $imageProp = getimagesize( $images[$image_key]->src );
				        $images[$image_key]->width = $imageProp[0];
				        $images[$image_key]->height   = $imageProp[1];
					}
				}
				$this->session->unset_userdata('upload_data_images');
				$this->session->set_userdata( 'upload_data_images', $images );
			}
		} else {
			return false;
		}
	}


	public function ImageEdit($slug = FALSE){
		$this->load->library('user_check');
		if (!$slug || !$this->flexi_auth->is_logged_in()) {
			$this->not_found();
			return;
		}
		$slugs = explode("_", $slug);
		if (!isset($slugs[0])) {
			$this->not_found();
			return;
		}
		$garment_id = intval($slugs[0]);
		
		$user_id = $this->flexi_auth->get_user_id();
		$data = $this->data;
		$data['garment'] = $this->garment_model->get_garment_info($garment_id, $user_id);
		if (!$this->flexi_auth->in_group('Administrators') && $data['garment']['import_user_id'] != $user_id) {
			$this->general_error('Not Permitted', 'Sorry, it seems you don\'t have the permission to edit this garment.');
			return;
		}
		
		//if post
			if ($this->input->post()){
					//if this is a edit request.
					$this->load->model('admin_model');
					$data['error_messages'] = array();
					$garment_id = $this->input->post('garment_id', TRUE);
					$name = $this->input->post('name', TRUE);
					$ori_image = $this->input->post('ori_image', TRUE);
					$ori_image2 = $this->input->post('ori_image2', TRUE);
					$ori_image3 = $this->input->post('ori_image3', TRUE);
					$image_no = $this->input->post('image_no', TRUE);	
					$firstImageDD= $this->input->post ('firstImageDD', TRUE);

					//Upload first image	
					if (!empty($_FILES['new_image']['name'])) {
						print_r("first file" . $_FILES['new_image']['name'] . "</br>");
						$config['upload_path'] = $this->config->item('base_upload_path') . '/public_html/images/garment/';
						$config['allowed_types'] = 'jpg|png|tif';
						$config['file_name'] = random_string('unique').'.jpg';
						$image_path="";	
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


					//update DB
						if ($this->admin_model->update_garment_image($garment_id, array('image_path' => $image_path))){	
							$data['success_messages'] = array();
							array_push($data['success_messages'], array('type' => 'Congratulations',  'content' => 'This category has been successfully updated!'));
						} else {
							array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00002 Something went error. Please contact programmer!'));
					}
					} 

					//Upload first image	
					if (!empty($_FILES['new_image2']['name'])) {
						print_r("second file" . $_FILES['new_image2']['name'] . "</br>");

						$config['upload_path'] = $this->config->item('base_upload_path') . '/public_html/images/garment/';
						$config['allowed_types'] = 'jpg|png|tif';
						$config['file_name'] = random_string('unique').'.jpg';
						$image_path="";
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('new_image2')) {
							array_push($data['error_messages'], array('type' => 'Error',  'content' => $this->upload->display_errors()));	
						} else {
							$image = $this->upload->data();
							$image_path = $image['file_name'];
							$is_image = $image['is_image'];
							if (!$is_image) {
								array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Your uploaded file is not an image!'));
							}
						}

						//update db
						if ($this->admin_model->update_garment_image($garment_id, array('extra_image1_path' => $image_path))){
							$data['success_messages'] = array();
							array_push($data['success_messages'], array('type' => 'Congratulations',  'content' => 'This category has been successfully updated!'));
						} else {
							array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00002 Something went error. Please contact programmer!'));
					}
					} 

					//Upload first image	
					if (!empty($_FILES['new_image3']['name'])) {
						print_r("third file" . $_FILES['new_image3']['name'] . "</br>");
						$config['upload_path'] = $this->config->item('base_upload_path') . '/public_html/images/garment/';
						$config['allowed_types'] = 'jpg|png|tif';
						$config['file_name'] = random_string('unique').'.jpg';
						$image_path="";
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('new_image3')) {							
							array_push($data['error_messages'], array('type' => 'Error',  'content' => $this->upload->display_errors()));
						} else {
							$image = $this->upload->data();
							$image_path = $image['file_name'];
							$is_image = $image['is_image'];
							if (!$is_image) {
								array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Your uploaded file is not an image!'));
							}
						}

						//UPDATE DB
						if ($this->admin_model->update_garment_image($garment_id, array('extra_image2_path' => $image_path))){	
							$data['success_messages'] = array();
							array_push($data['success_messages'], array('type' => 'Congratulations',  'content' => 'This category has been successfully updated!'));
						} else {
							array_push($data['error_messages'], array('type' => 'Error',  'content' => 'Code: 00002 Something went error. Please contact programmer!'));
					}
					} 

			// Swap Images		

			if($firstImageDD!='0'){
					if($firstImageDD=="1"){
							$this->admin_model->update_garment_image($garment_id, array('extra_image2_path' => $ori_image);
							$this->admin_model->update_garment_image($garment_id, array('image_path' => $ori_image3);	
					}elseif ($firstImageDD=="2") {
							$this->admin_model->update_garment_image($garment_id, array('extra_image1_path' => $ori_image);
							$this->admin_model->update_garment_image($garment_id, array('image_path' => $ori_image2);
						}
			}		
					
	}///	
		$data['initial_data'] = $this->assessment_model->get_initial_field_criteria_for_edit($garment_id, $data['garment']['category_id']);
		$data['title'] = $data['garment']['name'];
		$data['title_description'] = "update images for ".$data['garment']['name'];
		//$data['extraJS'] = '<script src="/js/admin/AdminLTE/category.js?v=2.2.0.0" type="text/javascript"></script>';
		$this->load->view('admin/header', $data);
		$this->load->view('garment/edit_Images', $data);
		$this->load->view('admin/footer', $data);

	}	



}

/* End of file garment.php */
/* Location: ./application/controllers/garment.php */