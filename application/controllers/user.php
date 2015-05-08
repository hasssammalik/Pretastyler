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
* Released: 28/10/2014
* Requirements: PHP5 or above and Codeigniter 2.0+
*/
class User extends CI_Controller {
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
		$this->load->model('user_model');
		$this->load->model('infusionsoft_model');
		$this->load->helper(array('url','form'));
		$this->data = array(
		);
		if ($this->flexi_auth->is_logged_in()){
			$this->data['first_name'] = $this->user_model->get_user_name($this->flexi_auth->get_user_id())['first_name'];
		}
	}
	/**
	 * Index Page
	 */
	public function index()
	{
		if (!file_exists(APPPATH.'/views/user/index.php')){
			show_404();
		}
		if (!$this->flexi_auth->is_logged_in()) {
			redirect('', 'refresh');
		}
		
		$data = $this->data;
		$data['title'] = $this->data['first_name'] .'\'s Profile';
		$data['breadcrumb'] = array('USER PROFILE');
		
		$data['extraCSS'] = '
							<link rel="stylesheet" href="/css/jquery-ui.css?v=2.2.0.2">
							<link href="/css/jquery-ui-slider-pips.css?v=2.2.0.2" rel="stylesheet">
		';
		
		$data['extraJS'] = '<script src="/js/user-profile.js?v=2.2.0.0"></script>
							<script src="/js/jquery.sticky-kit.min.js"></script>
							<script src="https://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
							<script src="/js/jquery-ui-slider-pips.js?v=2.2.0.2"></script>
							<script src="/js/circular-progress.js?v=2.2.0.0"></script>
							<script type="text/javascript">$(function(){ preload_all_img_tags(); });</script>
		';

		$user_id = $this->flexi_auth->get_user_id();
		$data['countries'] = $this->user_model->get_countries($user_id);
		$data['user_info'] = $this->user_model->get_user_info($user_id);
		$data['user_email'] = $this->flexi_auth->get_user_identity();
		$data['user_selection'] = implode(',',array(
										$data['user_info']["height_select_id"],
										$data['user_info']["weight_select_id" ],
										$data['user_info']["age_select_id" ],
										$data['user_info']["body_shape_select_id" ],
										$data['user_info']["body_ratio_select_id"] ,	
										$data['user_info']["bra_select_id" ],
										$data['user_info']["build_select_id" ],
										
										$data['user_info']["neck_length_select_id"] ,
										$data['user_info']["shoulders_select_id"] ,
										$data['user_info']["face_shape_select_id"] ,	
										
										$data['user_info']["neck_select_id"] ,
										$data['user_info']["back_select_id"] ,
										$data['user_info']["upper_arms_select_id"] ,
										$data['user_info']["midriff_select_id"] ,
										
										$data['user_info']["stomach_select_id" ],
										$data['user_info']["bottom_select_id" ],
										$data['user_info']["inner_thighs_select_id" ],
										$data['user_info']["outer_thighs_select_id"] ,
										$data['user_info']["lower_legs_select_id" ]
										
								));
		$data['minBust'] = $data['user_info']["minBust"];

		$value_array = array('height', 'weight', 'age', 'bra');
		foreach ($value_array as $value_value){
			$data['value_data'][$value_value] = $this->user_model->get_user_values($user_id, $value_value);
		}
		$data['size_info'] = $this->user_model->get_user_size_region_list($user_id);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * Preferences Page for this controller.
	 */
	public function preferences()
	{
		$this->load->library('user_check');
		if (!file_exists(APPPATH.'/views/user/preferences.php')){
			show_404();
		}
		
		$data = $this->data;
		$data['title'] = "Preferences";
		$data['breadcrumb'] = array('PREFERENCES');
		$data['categories'] = $this->deep_search_model->get_available_categories();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('user/preferences', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * New Dressing Room Page for this controller.
	 */
	public function my_dressing_room()
	{
		$this->load->library('user_check');
		if (!file_exists(APPPATH.'/views/user/my_dressing_room.php')){
			show_404();
		}
		if (!$this->flexi_auth->is_logged_in()) {
			redirect('', 'refresh');
		}
		
		$data = $this->data;
		$data['title'] = "My Dressing Room";
		$data['breadcrumb'] = array('MY DRESSING ROOM');
		$data['extraJS'] = '<script src="/js/mall-dressing-room.js?v=2.2.0.1"></script>';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('user/my_dressing_room', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * Add to Favorites button for this controller.
	 */
	public function add_to_favorites()
	{
		if (!$this->input->post()){
			show_404();
		}
		$garment_id = $this->input->post('garment_id', TRUE);
		if ($garment_id && $this->flexi_auth->is_logged_in()) {
			$this->garment_model->update_user_garment_favorite($garment_id, $this->flexi_auth->get_user_id());
		} else {
			show_404();
		}
	}
	/**
	 * History button for this controller.
	 */
	public function history()
	{
		if (!$this->input->post()){
			show_404();
		}
		$garment_id = $this->input->post('garment_id', TRUE);
		if ($garment_id && $this->flexi_auth->is_logged_in()) {
			$this->garment_model->update_user_garment_favorite_history($garment_id, $this->flexi_auth->get_user_id());
		} else {
			show_404();
		}
	}
	/**
	 * Deprecated
	 * Finds Page for this controller.
	 */
	private function my_finds()
	{
		$this->load->library('user_check');
		if (!file_exists(APPPATH.'/views/user/my_finds.php')){
			show_404();
		}
		if (!$this->flexi_auth->is_logged_in()) {
			redirect('', 'refresh');
		}
		
		$data = $this->data;
		$data['title'] = "Finds";
		$data['breadcrumb'] = array('FINDS');
		$data['extraJS'] = '<script src="/js/mall-find.js?v=2.2.0.0"></script>';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('user/my_finds', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * Deprecated
	 * Favorites Page for this controller.
	 */
	private function my_wishlists()
	{
		$this->load->library('user_check');
		if (!file_exists(APPPATH.'/views/user/my_wishlists.php')){
			show_404();
		}
		if (!$this->flexi_auth->is_logged_in()) {
			redirect('', 'refresh');
		}
		$data = $this->data;
		$data['title'] = "Wishlists";
		$data['breadcrumb'] = array('WISHLISTS');
		$data['extraJS'] = '<script src="/js/mall-favorite.js?v=2.2.0.0"></script>';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('user/my_wishlists', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * Deprecated
	 * Add to Wardrobe button for this controller.
	 */
	private function add_to_wardrobe()
	{
		$this->load->library('user_check');
		if (!$this->input->post()){
			show_404();
		}
		$garment_id = $this->input->post('garment_id', TRUE);
		if ($garment_id && $this->flexi_auth->is_logged_in()) {
			$this->garment_model->update_user_garment_wardrobe($garment_id, $this->flexi_auth->get_user_id());
		} else {
			show_404();
		}
	}
	/**
	 * Deprecated
	 * Wardrobe Page for this controller.
	 */
	private function my_wardrobe()
	{
		$this->load->library('user_check');
		if (!file_exists(APPPATH.'/views/user/my_wardrobe.php')){
			show_404();
		}
		if (!$this->flexi_auth->is_logged_in()) {
			redirect('', 'refresh');
		}
		
		$data = $this->data;
		$data['title'] = "Wardrobe";
		$data['breadcrumb'] = array('WARDROBE');
		$data['extraJS'] = '<script src="/js/mall-wardrobe.js?v=2.2.0.0"></script>';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('user/my_wardrobe', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * Deprecated
	 * old Dressing Room Page for this controller.
	 */
	private function my_dressing_room_old()
	{
		if (!file_exists(APPPATH.'/views/user/my_dressing_room.php')){
			show_404();
		}
		if (!$this->flexi_auth->is_logged_in()) {
			redirect('', 'refresh');
		}
		
		$data = $this->data;
		$data['title'] = "Dressing Room";
		$data['breadcrumb'] = array('DRESSING ROOM');
		$data['extraJS'] = '<script src="/js/mall-dressing-room.js?v=2.2.0.0"></script>';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('user/my_dressing_room', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * Register Service
	 */
	public function register()
	{
		$error_string = "Something error!";
		$error_already_existed = "This email has already been registered!";
		$error_already_logged_in = "You have already logged in!";
		$error_password_not_long = "Your password must be at least ".$this->flexi_auth->min_password_length()." characters!";
		$error_password_not_valid = "Your password contains invalid characters!";
		$error_insert_first_name = "Insert first name error!";
		$error_insert_user = "Insert user error!";
		$success_message = TRUE;
		if ($this->flexi_auth->is_logged_in()) {
			print $error_already_logged_in;
		} else if ($this->input->post()){
			$first_name = $this->input->post('first_name', TRUE);
			$last_name = $this->input->post('last_name', TRUE);
			$email = $this->input->post('email', TRUE);
			
			$facebookid = $this->input->post('fbid', TRUE);
			$facebookverify = $this->input->post('fbverify', TRUE);
			if( !empty( $facebookid ) && !empty( $facebookverify ) ) {
				$password = $facebookid . "asmexPretA";
			} else {
				$password = $this->input->post('password', TRUE);
			}
			
			if ($this->flexi_auth->identity_available($email)) {
				if (strlen($password) >= $this->flexi_auth->min_password_length()){
					if ($this->flexi_auth->valid_password_chars($password)){
						if ($user_id = $this->flexi_auth->insert_user($email, FALSE, $password, FALSE, 3, TRUE)) {
							if ($this->user_model->insert_user_name($user_id, $first_name, $last_name)){
								if ($this->flexi_auth->login($email, $password)){
									$this->register_extra($user_id, $email, $password, $first_name);
									print $success_message;
								} else {
									print $error_string;
								}
							} else {
								print $error_insert_first_name;
							}
						} else {
							print $error_insert_user;
						}
					} else {
						print $error_password_not_valid;
					}
				} else {
					print $error_password_not_long;
				}
			} else {
				print $error_already_existed;
			}
		} else {
			show_404();
		}
	}
	private function register_extra($user_id, $email, $password, $first_name){
		//infusionsoft:
		$this->load->helper('infusionsoft/infusionsoft');
		$infusionsoft_id = CreateInfusionsoftUser($first_name, $email, $password);
		$this->infusionsoft_model->insert_user_infusionsoft($user_id, $infusionsoft_id);
	}
	/**
	 * Login Service
	 */
	public function login()
	{
		$error_string = "Wrong combination of email and password!";
		$error_already_logged_in = "You have already logged in!";
		$success_message = TRUE;
		if ($this->flexi_auth->is_logged_in()) {
			print $error_already_logged_in;
		} else if ($this->input->post()){
			$email = $this->input->post('email', TRUE);
			$facebookid = $this->input->post('fbid', TRUE);
			$facebookverify = $this->input->post('fbverify', TRUE);
			if( !empty( $facebookid ) && !empty( $facebookverify ) ) {
				$password = $facebookid . "asmexPretA";
			} else {
				$password = $this->input->post('password', TRUE);
			}
			
			$remember_me = $this->input->post('remember_me', TRUE);
			if ($this->flexi_auth->validate_current_password($password, $email)) {
				if ($this->flexi_auth->login($email, $password, $remember_me)){
					print $success_message;
				} else {
					print $error_string;
				}
			} else {
				print $error_string;
			}
		} else {
			print $error_string;
		}
	}
	/**
	 * Logout Service
	 */
	public function logout()
	{
		if ($this->flexi_auth->is_logged_in()) {
			$this->flexi_auth->logout();
		}
		redirect('', 'refresh');
	}
	/**
	 * Forget Password Service
	 */
	public function forget()
	{
		$error_string = "Unable to reset password.";
		$error_already_logged_in = "You have already logged in!";
		$success_message = TRUE;
		if ($this->flexi_auth->is_logged_in()) {
			print $error_already_logged_in;
		} else if ($this->input->post()){
			$email = $this->input->post('email', TRUE);
			if ($this->flexi_auth->forgotten_password($email)) {
				print $success_message;
			} else {
				print $error_string;
			}
		} else {
			print $error_string;
		}
	}
	/**
	 * Reset Password Service
	 */
	public function reset_password()
	{
		$error_string = "Unable to reset password.";
		$error_expired = "Your link is expired!";
		$error_already_logged_in = "You have already logged in!";
		$success_message = TRUE;
		if ($this->flexi_auth->is_logged_in()) {
			print $error_already_logged_in;
		} else if ($this->input->post()){
			$user_id = $this->input->post('user_id', TRUE);
			$token = $this->input->post('token', TRUE);
			$password = $this->input->post('password', TRUE);
			if ($this->flexi_auth->validate_forgotten_password($user_id, $token)) {
				if ($this->flexi_auth->forgotten_password_complete($user_id, $token, $password, TRUE)) {
					$sql_select = array($this->auth->tbl_col_user_account['email']);
					$sql_where[$this->auth->tbl_col_user_account['id']] = $user_id;
					$user = $this->flexi_auth->get_users($sql_select, $sql_where)->row_array();
					$this->flexi_auth->login($user['uacc_email'], $password, FALSE);
					print $success_message;
				} else {
					print $error_string;
				}
			} else {
				print $error_expired;
			}
		} else {
			print $error_string;
		}
	}
	/**
	 * User Profile Size Service for this controller.
	 */
	public function get_size() {

		header( 'Content-Type: application/json' );
		header( 'Access-Control-Allow-Origin: *' );

		$type = $this->input->post( 'type' , TRUE);
		$region = $this->input->post( 'region' , TRUE);

		$result = $this->user_model->get_user_size_list($type, $region);
		if(!empty( $result )){
			echo json_encode( $result );
		}else {
			echo json_encode(array());
		}
	}
	/**
	 * User Profile Update User Info Service for this controller.
	 */
	public function update_user_info() {
		if (!$this->flexi_auth->is_logged_in()) {
			redirect('', 'refresh');
		}
		$user_id = $this->flexi_auth->get_user_id();
		$saveSection = $this->input->post('pref_type', TRUE);
		
		if( $saveSection == 'account' ) {
			
			$data = array(
				'first_name' => $this->input->post('first_name', TRUE),
				'last_name' => $this->input->post('last_name', TRUE),
				'country_id' => $this->input->post('country_id', TRUE),
				'zipcode' => $this->input->post('zipcode', TRUE)
			);
		} else if( $saveSection == 'general' ) {
			
			$data = array(
				'height_select_id' => $this->input->post('height_select_id', TRUE),
				'weight_select_id' => $this->input->post('weight_select_id', TRUE),
				'age_select_id' => $this->input->post('age_select_id', TRUE),
				'bra_select_id' => $this->input->post('bra_select_id', TRUE),
				
				'ovr_region' => $this->input->post('ovr_region', TRUE),
				'ovr_size' => $this->input->post('ovr_size', TRUE),
				'bot_region' => $this->input->post('bot_region', TRUE),
				'bot_size' => $this->input->post('bot_size', TRUE),
				'top_region' => $this->input->post('top_region', TRUE),
				'top_size' => $this->input->post('top_size', TRUE),
				'shoe_region' => $this->input->post('shoe_region', TRUE),
				'shoe_value' => $this->input->post('shoe_value', TRUE),
				'shoe_size' => $this->input->post('shoe_size', TRUE),
				'hat_size' => $this->input->post('hat_size', TRUE),
				'wrist_size' => $this->input->post('wrist_size', TRUE),
				'minBust' => $this->input->post('minBust', TRUE),
			);
		} else if ( $saveSection == 'feature' ) {
			
			$uservalue = $this->input->post('user_data', TRUE);
			
			$data = array(
						"height_select_id" 		=> ( !empty($uservalue['height_select_id']) ? $uservalue['height_select_id'] : 0 ),
						"weight_select_id" 		=> ( !empty($uservalue['weight_select_id']) ? $uservalue['weight_select_id'] : 0 ),
						"age_select_id" 		=> ( !empty($uservalue['age_select_id']) ? $uservalue['age_select_id'] : 0 ),
						"body_shape_select_id" 	=> ( !empty($uservalue['body_shape_select_id']) ? $uservalue['body_shape_select_id'] : 0 ),
						"body_ratio_select_id" 	=> ( !empty($uservalue['body_ratio_select_id']) ? $uservalue['body_ratio_select_id'] : 0 ),
						"bra_select_id" 		=> ( !empty($uservalue['bra_select_id']) ? $uservalue['bra_select_id'] : 0 ),
						"build_select_id" 		=> ( !empty($uservalue['build_select_id']) ? $uservalue['build_select_id'] : 0 ),
						"minBust" 				=> ( !empty($uservalue['minBust']) ? $uservalue['minBust'] : 0 ),

						"neck_length_select_id" => ( !empty($uservalue['neck_length_select_id']) ? $uservalue['neck_length_select_id'] : 0 ),
						"shoulders_select_id" 	=> ( !empty($uservalue['shoulders_select_id']) ? $uservalue['shoulders_select_id'] : 0 ),
						"face_shape_select_id" 	=> ( !empty($uservalue['face_shape_select_id']) ? $uservalue['face_shape_select_id'] : 0 ),
						
						"neck_select_id" 		=> ( !empty($uservalue['neck_select_id']) ? $uservalue['neck_select_id'] : 0 ),
						"back_select_id" 		=> ( !empty($uservalue['back_select_id']) ? $uservalue['back_select_id'] : 0 ),
						"upper_arms_select_id" 	=> ( !empty($uservalue['upper_arms_select_id']) ? $uservalue['upper_arms_select_id'] : 0 ),
						"midriff_select_id" 	=> ( !empty($uservalue['midriff_select_id']) ? $uservalue['midriff_select_id'] : 0 ),
						
						"stomach_select_id" 	=> ( !empty($uservalue['stomach_select_id']) ? $uservalue['stomach_select_id'] : 0 ),
						"bottom_select_id" 		=> ( !empty($uservalue['bottom_select_id']) ? $uservalue['bottom_select_id'] : 0 ),
						"inner_thighs_select_id"=> ( !empty($uservalue['inner_thighs_select_id']) ? $uservalue['inner_thighs_select_id'] : 0 ),
						"outer_thighs_select_id"=> ( !empty($uservalue['outer_thighs_select_id']) ? $uservalue['outer_thighs_select_id'] : 0 ),
						"lower_legs_select_id" 	=> ( !empty($uservalue['lower_legs_select_id']) ? $uservalue['lower_legs_select_id'] : 0 )
					);

			/*
			$data = array(
				'neck_length_select_id' => $user_data[0],
				'neck_thickness_select_id' => $user_data[1],
				'bone_select_id' => $user_data[2],
				'horizontal_select_id' => $user_data[3],
				'vertical_select_id' => $user_data[4],
				'shoulders_select_id' => $user_data[5],
				'face_select_id' => $user_data[6],
				'prominent_arms_select_id' => $user_data[7],
				'prominent_back_select_id' => $user_data[8],
				'prominent_legs_select_id' => $user_data[9],
				'prominent_stomach_select_id' => $user_data[10]
			);
			*/


			$infusionsoft_id = $this->infusionsoft_model->get_user_infusionsoft($user_id);

			$this->load->helper('infusionsoft/infusionsoft');
			
			NotifyCompleteProfileByInfusionsoftID($infusionsoft_id);
			
		} else if ( $saveSection == 'usersetup' ) {
		    
		    $uservalue = $this->session->userdata('initial_user_profile');
		    
		    $data = array(
		        "height_select_id" 		=> ( !empty($uservalue['height_select_id']) ? $uservalue['height_select_id'] : 0 ),
		        "weight_select_id" 		=> ( !empty($uservalue['weight_select_id']) ? $uservalue['weight_select_id'] : 0 ),
		        "age_select_id" 		=> ( !empty($uservalue['age_select_id']) ? $uservalue['age_select_id'] : 0 ),
		        "body_shape_select_id" 	=> ( !empty($uservalue['body_shape_select_id']) ? $uservalue['body_shape_select_id'] : 0 ),
		        "body_ratio_select_id" 	=> ( !empty($uservalue['body_ratio_select_id']) ? $uservalue['body_ratio_select_id'] : 0 ),
		        "bra_select_id" 		=> ( !empty($uservalue['bra_select_id']) ? $uservalue['bra_select_id'] : 0 ),
		        "build_select_id" 		=> ( !empty($uservalue['build_select_id']) ? $uservalue['build_select_id'] : 0 ),
		        "minBust" 				=> ( !empty($uservalue['minBust']) ? $uservalue['minBust'] : 0 ),
		    
		        "neck_length_select_id" => ( !empty($uservalue['neck_length_select_id']) ? $uservalue['neck_length_select_id'] : 0 ),
		        "shoulders_select_id" 	=> ( !empty($uservalue['shoulders_select_id']) ? $uservalue['shoulders_select_id'] : 0 ),
		        "face_shape_select_id" 	=> ( !empty($uservalue['face_shape_select_id']) ? $uservalue['face_shape_select_id'] : 0 ),
		    
		        "neck_select_id" 		=> ( !empty($uservalue['neck_select_id']) ? $uservalue['neck_select_id'] : 0 ),
		        "back_select_id" 		=> ( !empty($uservalue['back_select_id']) ? $uservalue['back_select_id'] : 0 ),
		        "upper_arms_select_id" 	=> ( !empty($uservalue['upper_arms_select_id']) ? $uservalue['upper_arms_select_id'] : 0 ),
		        "midriff_select_id" 	=> ( !empty($uservalue['midriff_select_id']) ? $uservalue['midriff_select_id'] : 0 ),
		    
		        "stomach_select_id" 	=> ( !empty($uservalue['stomach_select_id']) ? $uservalue['stomach_select_id'] : 0 ),
		        "bottom_select_id" 		=> ( !empty($uservalue['bottom_select_id']) ? $uservalue['bottom_select_id'] : 0 ),
		        "inner_thighs_select_id"=> ( !empty($uservalue['inner_thighs_select_id']) ? $uservalue['inner_thighs_select_id'] : 0 ),
		        "outer_thighs_select_id"=> ( !empty($uservalue['outer_thighs_select_id']) ? $uservalue['outer_thighs_select_id'] : 0 ),
		        "lower_legs_select_id" 	=> ( !empty($uservalue['lower_legs_select_id']) ? $uservalue['lower_legs_select_id'] : 0 )
		    );
		    
		    
		    $infusionsoft_id = $this->infusionsoft_model->get_user_infusionsoft($user_id);
		    
		    $this->load->helper('infusionsoft/infusionsoft');
		    	
		    NotifyCompleteProfileByInfusionsoftID($infusionsoft_id);
		    
		}
		
		/*
		$data = array(
			'first_name' => $this->input->post('first_name', TRUE),
			'last_name' => $this->input->post('last_name', TRUE),
			'country_id' => $this->input->post('country_id', TRUE),
			'zipcode' => $this->input->post('zipcode', TRUE),
			'height_select_id' => $this->input->post('height_select_id', TRUE),
			'weight_select_id' => $this->input->post('weight_select_id', TRUE),
			'age_select_id' => $this->input->post('age_select_id', TRUE),
			'bra_select_id' => $this->input->post('bra_select_id', TRUE),
			'neck_length_select_id' => $user_data[0],
			'neck_thickness_select_id' => $user_data[1],
			'bone_select_id' => $user_data[2],
			'horizontal_select_id' => $user_data[3],
			'vertical_select_id' => $user_data[4],
			'shoulders_select_id' => $user_data[5],
			'face_select_id' => $user_data[6],
			'prominent_arms_select_id' => $user_data[7],
			'prominent_back_select_id' => $user_data[8],
			'prominent_legs_select_id' => $user_data[9],
			'prominent_stomach_select_id' => $user_data[10],
			'ovr_region' => $this->input->post('ovr_region', TRUE),
			'ovr_size' => $this->input->post('ovr_size', TRUE),
			'bot_region' => $this->input->post('bot_region', TRUE),
			'bot_size' => $this->input->post('bot_size', TRUE),
			'top_region' => $this->input->post('top_region', TRUE),
			'top_size' => $this->input->post('top_size', TRUE),
			'shoe_region' => $this->input->post('shoe_region', TRUE),
			'shoe_value' => $this->input->post('shoe_value', TRUE),
			'shoe_size' => $this->input->post('shoe_size', TRUE),
			'hat_size' => $this->input->post('hat_size', TRUE),
			'wrist_size' => $this->input->post('wrist_size', TRUE),
			'minBust' => $this->input->post('minBust', TRUE),
		);
		*/
		
		//update user info record
		$this->user_model->update_user_info($user_id, $data);
		//update user specs
		$this->user_model->generate_user_specs($user_id);
		//update all garment's result
		$this->garment_model->update_all_score($user_id);
	}
	
	/**
	 * Register Sign Up Page for this controller.
	 */
	public function forget_password($user_id = FALSE, $forgotten_password_token = FALSE)
	{
		if (!$this->flexi_auth->validate_forgotten_password($user_id, $forgotten_password_token)){
			$this->general_error("Unable to proceed your request", "Your link may be expired!");
			return;
		}
		$data = $this->data;
		$data['title'] = "New Password";
		$data['breadcrumb'] = array('USER','NEW PASSWORD');
		$data['extraJS'] = '<script src="/js/user-forget-password.js?v=2.2.0.0"></script>';
		$data['extraDiv'] = '<div id="hiddenId" style="display:none">'.$user_id.'</div><div id="hiddenToken" style="display:none">'.$forgotten_password_token.'</div>';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('user/forget_password', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * User Basic Preferences Service for this controller.
	 */
	public function basic_preferences() {

		header( 'Content-Type: application/json' );
		header( 'Access-Control-Allow-Origin: *' );

		$json = $this->input->post( 'json' , TRUE);
		
		if ($this->flexi_auth->is_logged_in()){
			$user_id = $this->flexi_auth->get_user_id();
		} else {
			$this->not_found();
			return;
		}
		if ($json) {
			$result = $this->user_model->update_user_info($user_id, array('preferences' => $json));
		} else {
			$result = $this->user_model->get_basic_preferences($user_id);
		}

		if(!empty( $result )){
			echo json_encode( $result );
		}else {
			echo json_encode(array());
		}
	}
	
	public function basic_user_profile_completion(){
		
		$user_profile_done = 0;
		
		if ($this->flexi_auth->is_logged_in()){
			$user_id = $this->flexi_auth->get_user_id();
			$user_profile_done = $this->user_model->get_user_specs($user_id);
			if( !empty( $user_profile_done ) ){
				$user_profile_done = 1;
			}
		} else {
			$user_id = 0;
			$user_profile_done = 0;
		}
		echo $user_profile_done;
	}
	
	/**
	 * Page Not Found Page for this controller.
	 */
	public function not_found()
	{
		set_status_header(404);
		$data = $this->data;
		$data['title'] = "Page Not Found";		
		$data['extraJS'] = '<style>.content {background-image:url(/images/404.jpg);margin:0;padding:0;height:100%;} .container { margin-top: 20px; }</style>';
		
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
		$data['extraJS'] = '<style>.content {background-image:url(/images/505.jpg);margin:0;padding:0;height:100%;} .container { margin-top: 20px; }</style>';
		
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
		if ($slug) {
			$data['title'] = "Test";
			$data['breadcrumb'] = array('TEST');
			if ($slug == "get_user_size_region_list"){
				$result = $this->user_model->get_user_size_region_list($param1);
				$data['test_str'] = $result;
			} else if ($slug == "get_user_size_list"){
				$result = $this->user_model->get_user_size_list('TOP', NULL, TRUE, 99);
				$data['test_str'] = $result;
			} else if ($slug == "generate_user_specs"){
				$result = $this->user_model->generate_user_specs(1588);
				$data['test_str'] = $result;
			} else if ($slug == "xmlrpc_encode_entitites"){
				if (!function_exists('xmlrpc_encode_entitites')) {
					$data['test_str'] = 'Not existed';
				} else {
					$data['test_str'] = 'Existed';
				}
			} else if ($slug == "insert_user_infusionsoft"){
				$result = $this->infusionsoft_model->insert_user_infusionsoft($param1, $param2);
				$data['test_str'] = $result;
			} else if ($slug == "forget_password"){
				$this->flexi_auth->forgotten_password_complete(5, '19c4a24d5c7074b50c5348220ebb20125e651c23', 'password123');
				$data['test_str'] = $result;
			} else if ($slug == "brand"){
				$result = $this->garment_model->get_search_brands(0, 10, $param1);
				$data['test_str'] = $result;
			} else if ($slug == "sql_test_2"){
				$this->load->database();
				$this->load->model('assessment_model');
				$this->db->select('criteria.showif AS criteria_showif, criteria.hideif AS criteria_hideif, field.showif AS field_showif, field.hideif AS field_hideif')->from('criteria')->join('field', 'field.field_id = criteria.field_id', 'left')->where('criteria_id', $param1);
				$result = $this->db->get()->row_array();
				$results = array('result' => $result, 'field_test' => $this->assessment_model->judge_field_by_criteria_id($result['field_showif'], $result['field_hideif'], array($param2)), 'criteria_test' => $this->assessment_model->judge_criteria_by_criteria_id($result['criteria_showif'], $result['criteria_hideif'], array($param2)));
				$data['test_str'] = $results;
			} else if ($slug == "sql_test"){
				$criteria = array(
								'1479',
								'1557,1724',
								'1501,1502',
								'1570,1571',
								'1589,1604,1593,1590,1579',
								'4375,1610,1611,2959',
								'3883,3861,3801,3804,3802,3808,3811,3812',
								'1668,1669,2886,1670,2887,1671',
								'3885,1678,1681',
								'4267,3662',
								'1690',
								'1685,1687,1692,1697,1693',
								'1716,1717',
								'4324,2879',
								'1730,3587,4345,1729,3588,4346,3589,4347,1728',
								'3894,3895',
								'1732,2858,3759,3849,4349,2669,2675,2672,3824,1733,2673,2676,2670,2859,3760,3850,4350,3825',
								'3897,2155,4288,4008',
								'1741,1742,1743,1744',
								'1747,3851,3891',
								'1699,1708,1703,1709,1704,2390,4274,3766,1702,4084,4083',
								'1761',
							);
				$criterias = array();
				$results = array();
				$index = 0;
				foreach ($criteria as $row){
					$values = explode(',', $row);
					foreach ($values as $value){
						$criterias[$index][] = array('criteria_id' => $value, 'can_use' => TRUE);
					}
					$index++;
				}
				$this->load->database();
				$this->load->model('assessment_model');
				$finished_criterias = array();
				$finished_criterias[] = $criterias[0];
				$results[] = $finished_criterias;
				for ($i = 1; $i < count($criterias); $i++) {
					for ($j = 0; $j < count($criterias[$i]); $j++) {
						$this->db->select('criteria.showif AS criteria_showif, criteria.hideif AS criteria_hideif, field.showif AS field_showif, field.hideif AS field_hideif')->from('criteria')->join('field', 'field.field_id = criteria.field_id', 'left')->where('criteria_id', $criterias[$i][$j]['criteria_id']);
						$result = $this->db->get()->row_array();
						if (!(empty($result['field_showif']) && empty($result['field_hideif']))){
							for ($k = 0; $k < count($finished_criterias); $k++){
								for ($l = 0; $l < count($finished_criterias[$k]); $l++) {
									if ($finished_criterias[$k][$l]['can_use']){
										$finished_criterias[$k][$l]['can_use'] = !$this->assessment_model->judge_field_by_criteria_id($result['field_showif'], $result['field_hideif'], array($finished_criterias[$k][$l]['criteria_id']));
									}
								}
							}
						}
						if (!(empty($result['criteria_showif']) && empty($result['criteria_hideif']))){
							for ($k = 0; $k < count($finished_criterias); $k++){
								for ($l = 0; $l < count($finished_criterias[$k]); $l++) {
									if ($finished_criterias[$k][$l]['can_use']){
										$finished_criterias[$k][$l]['can_use'] = !$this->assessment_model->judge_criteria_by_criteria_id($result['criteria_showif'], $result['criteria_hideif'], array($finished_criterias[$k][$l]['criteria_id']));
									}
								}
							}
						}
					}
					$finished_criterias[] = $criterias[$i];
					$results[] = $finished_criterias;
				}
				/* $this->db->select('criteria.showif AS criteria_showif, criteria.hideif AS criteria_hideif, field.showif AS field_showif, field.hideif AS field_hideif')->from('criteria')->join('field', 'field.field_id = criteria.field_id', 'left')->where('criteria_id', 1501);
				$result = $this->db->get()->row_array();
				$results = array('result' => $result, 'field_test' => $this->assessment_model->judge_field_by_criteria_id($result['field_showif'], $result['field_hideif'], array('1557')), 'criteria_test' => $this->assessment_model->judge_criteria_by_criteria_id($result['criteria_showif'], $result['criteria_hideif'], array('1557'))); */
				$data['test_str'] = $results;
			} else if ($slug == "library_test"){
				$this->load->library('user_check');
				$data['test_str'] = $slug;
			} else {
				$data['test_str'] = $slug;
			}
			$this->load->view('catalog/test', $data);
		} else {
			show_404();
		}
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */