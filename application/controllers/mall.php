<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Name: PAS Mall Controller
*
* Author: 
* Jifeng Sun
* rob@asmex.com.au
*
* Copyright 2014 Jifeng Sun
*
* Description: Prêt à Styler 2.0 Main Mall Controller.
* Released: 28/10/2014
* Requirements: PHP5 or above and Codeigniter 2.0+
*/
class Mall extends CI_Controller {
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
		$this->load->helper('url');
		$this->load->helper('form');
		
		$this->data = array(
			'colours' => $this->colour_model->get_available_colours('full'),
			'occasions' => $this->occasion_model->get_available_occasions(),
			'categories' => $this->category_model->get_available_categories(),
			'topstores' =>  $this->garment_model->get_top_stores(0, 10)
		);
		if ($this->flexi_auth->is_logged_in()){
			$this->session->unset_userdata('initial_user_profile');
			$this->data['first_name'] = $this->user_model->get_user_name($this->flexi_auth->get_user_id())['first_name'];
		}
	}
	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$this->load->library('user_check');
		$data = $this->data;
		$data['title'] = "My Fashion Mall";
		$data['extraJS'] = '<script src="/js/mall.js?v=2.2.0.6"></script>';
		
		$data['extraJS'] .= '<script src="/js/jTour.min.js"></script>';
		$data['extraJS'] .= '<script src="/js/mall.tour.js?v=2.2.0.4"></script>';
		$data['extraCSS'] = '<link href="/css/jTour.css" rel="stylesheet">';
		
		$data['breadcrumb'] = array('MALL');
		$data['getBook'] =true;
		$data['deep_category'] = $this->deep_search_model->get_available_categories();
		$data['extraMeta'] = '<meta name="keyword" content="PRÊT À STYLER makes clothes shopping easy. Your 24/7 online stylist. Sing up today!">
							  <meta name="description" content="PRÊT À STYLER makes clothes shopping easy. Your 24/7 online stylist. Sing up today!">
		';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('mall/index', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * Index Page for this controller.
	 */
	public function mall_by_profile()
	{
		$this->load->library('user_check');
		$data = $this->data;
		$data['title'] = "My Fashion Mall";
		//$data['extraJS'] = '<script src="/js/mall.js?v=2.2.0.0"></script>';
		$data['breadcrumb'] = array('MALL');
		$data['getBook'] =true;
		$data['deep_category'] = $this->deep_search_model->get_available_categories();
		$data['extraMeta'] = '<meta name="keyword" content="PRÊT À STYLER makes clothes shopping easy. Your 24/7 online stylist. Sing up today!">
							  <meta name="description" content="PRÊT À STYLER makes clothes shopping easy. Your 24/7 online stylist. Sing up today!">
		';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('catalog/mallclone', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * Garments Service for this controller.
	 */
	public function garments(){
		if (!$this->input->post()){
			show_404();
		}
		$offset = $this->input->post('offset', TRUE);
		$limit = $this->input->post('limit', TRUE);
		$keyword = $this->input->post('keyword', TRUE);
		$occasion = $this->input->post('occasion', TRUE);
		$occasion_home = $this->input->post('occasion_home', TRUE);
		$colour = $this->input->post('colour', TRUE);
		$store = $this->input->post('store', TRUE);
		$category = $this->input->post('category', TRUE);
		$price_range = $this->input->post('price_range', TRUE);
		$criteria = $this->input->post('criteria', TRUE);
		$favorite = $this->input->post('favorite', TRUE);
		$wardrobe = $this->input->post('wardrobe', TRUE);
		$dressing_room = $this->input->post('dressing_room', TRUE);
		$find = $this->input->post('find', TRUE);
		$history = $this->input->post('history', TRUE);
		$similar = $this->input->post('similar', TRUE);
		$body = $this->input->post('body', TRUE);
		$star = $this->input->post('star', TRUE);
		$order_by = $this->input->post('order_by', TRUE);
		$star_range = $this->input->post('star_range', TRUE);
		$length = $this->input->post('length', TRUE);
		$show_premium = FALSE;
		$user_profile_done = FALSE;
		if ($this->flexi_auth->is_logged_in()){
			$user_id = $this->flexi_auth->get_user_id();
			$show_premium = TRUE; /* $this->flexi_auth->in_group(array('Administrators', 'Uploaders', 'PremiumUsers')) */
			$user_profile_done = $this->user_model->get_user_specs($user_id);
		} else {
			$user_id = FALSE;
			$user_profile_done = TRUE;
		}
		$data['user_profile_done'] = $user_profile_done;
		
		if ($favorite){
			$data['garments'] = $this->garment_model->get_batch_garment_info_by_favorite($offset, $limit, $user_id);
		} else if ($wardrobe){
			$data['garments'] = $this->garment_model->get_batch_garment_info_by_wardrobe($offset, $limit, $user_id);
		} else if ($find){
			$data['garments'] = $this->garment_model->get_batch_garment_info_by_find($offset, $limit, $user_id);
		} else if ($dressing_room){
			$data['garments'] = $this->garment_model->get_batch_garment_info_by_dressing_room($offset, $limit, $user_id);
		} else if ($history){
			$data['garments'] = $this->garment_model->get_batch_garment_info_by_history($offset, $limit, $user_id);
		} else if ($similar){
			$data['garments'] = $this->garment_model->get_batch_garment_info_by_similar_garment_id($offset, $limit, $user_id, $similar);
		} else if ($body){
			$data['garments'] = $this->garment_model->get_batch_garment_info_by_body($offset, $limit, $user_id, $body);
		} else if ($occasion_home){
			$occasion_ids = array();
			if ($occasion_home == 'at_work'){
				$occasion_ids = array(15, 4, 18);
				$category_ids = array(22);
				$criteria_ids = array(
									'1479',
									'1557,1724',
									'1484,2404,4363,1483,1485,1486,3778,1488,4290',
									'1490,1500,1489,1491,1492,1493',
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
			} else if ($occasion_home == 'casual_wear'){
				$occasion_ids = array(15, 5);
				$category_ids = FALSE;
				$criteria_ids = FALSE;
			} else if ($occasion_home == 'active_wear'){
				$occasion_ids = array(2);
				$category_ids = FALSE;
				$criteria_ids = FALSE;
			} else {
				$occasion_ids = array(8);
				$category_ids = array(22);
				$criteria_ids = FALSE;
			}
			$data['garments'] = $this->garment_model->get_batch_garment_info_by_occasion_category_and_criteria_ids($offset, $limit, $user_id, $occasion_ids, $category_ids, $criteria_ids);
		} 
		else { 
			$data['garments'] = $this->garment_model->get_batch_garment_info_from_quick_search($offset, $limit, $user_id, $keyword, $occasion, $colour, $category, $store, $price_range, $criteria, $show_premium, $star, $order_by, $star_range, $length);
		}
		
		
		/* if ($occasion){
			$data['garments'] = $this->garment_model->get_batch_garment_info_by_occasion_name($this->input->post('offset', TRUE), $this->input->post('limit', TRUE), $this->flexi_auth->get_user_id(), $this->input->post('occasion', TRUE));
		} else if ($brand){
			$data['garments'] = $this->garment_model->get_batch_garment_info_by_brand($this->input->post('offset', TRUE), $this->input->post('limit', TRUE), $this->flexi_auth->get_user_id(), $this->input->post('brand', TRUE));
		} else {
			$data['garments'] = $this->garment_model->get_batch_garment_info($this->input->post('offset', TRUE), $this->input->post('limit', TRUE), $this->flexi_auth->get_user_id());
		} */
		
		$this->load->view('mall/garments', $data);
	}
	/**
	 * Garments Search Service for this controller.
	 */
	public function search($slug = FALSE) {
		$keyword = array();
		$occasion = array();
		$colour = array();
		$price_range = array();
		
		$slug = str_replace('%2F', '/', $slug);
		$slugs = explode('_', $slug);
		
		
		
		$occasion_map = $this->occasion_model->get_occasion_map();
		$colour_map = $this->colour_model->get_colour_map();
		$data = $this->data;
		$data['title'] = $title_string." - Mall Search";
		$data['breadcrumb'] = array('MALL SEARCH');
		$data['extraJS'] = '<script src="/js/mall.js?v=2.2.0.3"></script>';
		$data['extraDiv'] = '<div id="hiddenKeyword" style="display:none">'.$keyword.'</div>'.
							'<div id="hiddenOccasion" style="display:none">'.$occasion.'</div>'.
							'<div id="hiddenColour" style="display:none">'.$colour.'</div>'.
							'<div id="hiddenCategory" style="display:none">'.$category.'</div>'.
							'<div id="hiddenType" style="display:none">'.$type.'</div>'.
							'<div id="hiddenBrand" style="display:none">'.$brand.'</div>'.
							'<div id="hiddenPriceRange" style="display:none">'.$price_range.'</div>';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('mall/index', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * Garments Similar Page for this controller.
	 */
	public function similar($slug = FALSE) {
		$this->load->library('user_check');
		if (!$slug) {
			$this->not_found();
			return;
		}
		$slugs = explode("_", $slug);
		if (!isset($slugs[0])) {
			$this->not_found();
			return;
		}
		$garment_id = intval($slugs[0]);
		$data = $this->data;
		$garment = $this->garment_model->get_garment_info($garment_id, $this->flexi_auth->get_user_id());
		$data['title'] = "Similar Items - ".ucwords($garment['name']);
		$data['breadcrumb'] = array( '<a href="/mall.html">MALL</a>', 'SIMILAR ITEMS', strtoupper($garment['name']));
		$data['extraJS'] = '<script src="/js/mall-similar.js?v=2.2.0.0"></script>';
		$data['extraDiv'] = '<div id="hiddenGarmentId" style="display:none">'.$garment_id.'</div>';
		$data['getBook']= true;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('mall/similar', $data);
		$this->load->view('templates/footer', $data);
	}
	public function occasion($occasion = FALSE) {
		$this->load->library('user_check');
		$data = $this->data;
		$data['title'] = "Occasion - ".ucwords(str_replace('_', ' ', $occasion));
		$data['breadcrumb'] = array( '<a href="/mall.html">MALL</a>', 'OCCASION', strtoupper(str_replace('_', ' ', $occasion)));
		$data['extraJS'] = '<script src="/js/mall-occasion.js?v=2.2.0.0"></script>';
		$data['extraDiv'] = '<div id="hiddenOccasion" style="display:none">'.strtolower($occasion).'</div>';
		$data['getBook']= true;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('mall/occasion', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * Brand Page for this controller.
	 */
	public function brand($brand = FALSE)
	{
		$this->load->library('user_check');
		$brand = str_replace('_', ' ', $brand);
		$data = $this->data;
		$data['title'] = "Brand - ".ucwords($brand);
		$data['breadcrumb'] = array( '<a href="/mall.html">MALL</a>', 'BRAND', strtoupper($brand));
		$data['extraJS'] = '<script src="/js/mall-brand.js?v=2.2.0.0"></script>';
		$data['extraDiv'] = '<div id="hiddenBrand" style="display:none">'.$brand.'</div>';
		$data['brand'] = $brand;
		$data['getBook']= true;
		
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('mall/brand', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * Body Page for this controller.
	 */
	public function body($body = FALSE)
	{
		$this->load->library('user_check');
		$data = $this->data;
		$data['title'] = "Body - ".ucwords($body);
		$data['breadcrumb'] = array( '<a href="/mall.html">MALL</a>', 'BODY', strtoupper($body));
		$data['extraJS'] = '<script src="/js/mall-body.js?v=2.2.0.0"></script>';
		$data['extraDiv'] = '<div id="hiddenBody" style="display:none">'.$body.'</div>';
		$data['getBook']= true;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('mall/body', $data);
		$this->load->view('templates/footer', $data);
	}
	public function garment_by_profile( )
	{
		if (!$this->input->post()){
			show_404();
		}
		$offset = $this->input->post('offset', TRUE);
		$limit = $this->input->post('limit', TRUE);
		$uservalue = $this->input->post('uservalue', TRUE);
		//$pagelayout = $this->input->post('pagelayout', TRUE);

		$required_profile_elements = array(
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
		if ($this->flexi_auth->is_logged_in()){
			
		} else {
			$this->session->set_userdata('initial_user_profile', $uservalue);
		}


		$data['user_profile_done'] = true;
		$user_specs = $this->user_model->generate_user_specs( FALSE, $required_profile_elements);
		$data['garments'] = $this->garment_model->get_batch_garment_score_by_user_specs($user_specs, $offset, $limit);
		
		$this->load->view('mall/user_profile_garments', $data);
		
		
	}
	/**
	 * Deep Search Initial Service for this controller.
	 */
	public function deep_search_initial() {

		header( 'Content-Type: application/json' );
		header( 'Access-Control-Allow-Origin: *' );

		$category_id = intval( $this->input->post( 'category_id' ) );

		if( $category_id > 0 ){
			$deep_fields = $this->deep_search_model->get_initial_field_criteria( $category_id );
		}
		if(!empty( $deep_fields )){
			echo json_encode( $deep_fields );
		}else {
			echo json_encode(array());
		}
	}
	/**
	 * Deep Search Update Service for this controller.
	 */
	public function deep_search_update() {

		header( 'Content-Type: application/json' );
		header( 'Access-Control-Allow-Origin: *' );

		$category_id = $this->input->post( 'category_id', TRUE );
		$field_id = $this->input->post( 'field_id', TRUE );
		$criteria_ids = $this->input->post( 'criteria_ids', TRUE );
		$array_criteria_ids = $this->input->post( 'array_criteria_ids', TRUE );
		$is_button = $this->input->post( 'is_button', TRUE );

		if( $category_id > 0 )
		{
			$deep_fields = $this->deep_search_model->get_new_field_criteria( $category_id, $field_id, $criteria_ids, $is_button, $array_criteria_ids );
		}

		if(!empty( $deep_fields )){
			echo json_encode( $deep_fields );
		}else {
			echo json_encode(array());
		}

	}
	/**
	 * Search Store for this controller.
	 */
	public function search_store(){
		if (!$this->input->post()){
			show_404();
		}
		$offset = $this->input->post('offset', TRUE);
		$limit = $this->input->post('limit', TRUE);
		$store = $this->input->post('store', TRUE);
		if( $store ) {
			$data['store_result'] = $this->garment_model->get_search_stores($offset, $limit, $store);
		}
		$this->load->view('mall/search_store', $data);
	}
	
	/**
	* Targeted Search or Deep search for this controller
	*/
	public function targetsearch() {
		
		$data = $this->data;
		$data['title'] = "Detailed Search";
		$data['extraJS'] = '<script src="/js/mall-target.js?v=2.2.0.1"></script>';
		$data['breadcrumb'] = array('<a href="/mall.html">MALL</a>','Detailed Search');
		$data['getBook'] = true;
		$data['deep_category'] = $this->deep_search_model->get_available_categories();
		$data['extraMeta'] = '<meta name="keyword" content="PRÊT À STYLER makes clothes shopping easy. Your 24/7 online stylist. Sing up today!">
							  <meta name="description" content="PRÊT À STYLER makes clothes shopping easy. Your 24/7 online stylist. Sing up today!">
		';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('mall/targetsearch', $data);
		$this->load->view('templates/footer', $data);
		
	}

	/**
	 * Quick Search Category's length for Criteria for this controller
	 */
	public function quicksearch_categorylength() {

		$category_id = $this->input->post( 'category_id', TRUE );
		
		if( $category_id > 0 )
		{
			if( $category_id == 31 || $category_id == 22 || $category_id == 25 || 
				$category_id == 23 || $category_id == 37 || 
				$category_id == 29 || $category_id == 24 || $category_id == 28 || $category_id == 34 ){

				$data['category_lengths'] = $this->category_model->get_length( $category_id );

				$this->load->view('mall/quicksearch_length', $data );

			}
		}

	}
}

/* End of file mall.php */
/* Location: ./application/controllers/mall.php */