<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Name: PAS Catalog Controller
*
* Author: 
* Jifeng Sun
* rob@asmex.com.au
*
* Copyright 2014 Jifeng Sun
*
* Description: Prêt à Styler 2.0 Main Catalog Controller.
* Released: 28/10/2014
* Requirements: PHP5 or above and Codeigniter 2.0+
*/
class Catalog extends CI_Controller {
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
		$this->load->model('deep_search_model');
		$this->load->model('size_model');
		$this->load->model('user_model');
		$this->load->helper('url');
		$this->load->helper('form');
		
		$this->data = array(
			'colours1' => $this->colour_model->get_available_colours(),
			'colours2' => $this->colour_model->get_available_colours(TRUE),
			'occasions' => $this->occasion_model->get_available_occasions()
			);
		if ($this->flexi_auth->is_logged_in()){
			$this->data['first_name'] = $this->user_model->get_user_name($this->flexi_auth->get_user_id())['first_name'];
		}
	}
	/**
	 * Index Page for this controller.
	 */
	public function index_old_home()
	{
		$data = $this->data;
		$data['title'] = "PretaStyler Where style and fashion Unite";
		$data['no_background_image'] = TRUE;
		$data['content_class'] = "content2";
		$data['extraFooter'] = TRUE;
		$data['extraMeta'] = '<meta name="keyword" content="PRÊT À STYLER makes clothes shopping easy. The future of shopping has arrived.">
		<meta name="description" content="PRÊT À STYLER makes clothes shopping easy. The future of shopping has arrived.">
		';
		
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/slider_index', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('catalog/index', $data);
	}
	public function index()
	{
		$this->load->library('user_check');
		if ($this->flexi_auth->is_logged_in()){
			redirect('/mall', 'refresh');
		}
		
		$data = $this->data;
		$data['title'] = "PretaStyler Where style and fashion Unite";
		$data['no_background_image'] = TRUE;
		$data['content_class'] = "full_width_page";
		$data['extraFooter'] = TRUE;
		
		$data['extraMeta'] = '<meta name="keyword" content="PRÊT À STYLER makes clothes shopping easy. The future of shopping has arrived.">
		<meta name="description" content="PRÊT À STYLER makes clothes shopping easy. The future of shopping has arrived.">
		';
		$data['extraCSS'] = '
		<link rel="stylesheet" href="/css/jquery-ui.css?v=2.2.0.2">
		<link href="/css/jquery-ui-slider-pips.css?v=2.2.0.2" rel="stylesheet">
		';
		$data['extraJS'] = '
		<script src="https://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
		<script src="/js/jquery-ui-slider-pips.js?v=2.2.0.2"></script>
		<script src="/js/circular-progress.js"></script>
		<script type="text/javascript">$(function(){ preload_all_img_tags(); });</script>
		';
		$data['similar_garments'] = $this->garment_model->get_similar_products();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('catalog/home', $data);
	}

	public function welcome(){
		$this->load->library('user_check');
		if ($this->flexi_auth->is_logged_in()){
			
			
			$data = $this->data;
			$data['title'] = "Welcome to PretAStyler";
			$data['content_class'] = "welcome_full_page";
			$data['extraFooter'] = TRUE;

			$this->load->view('templates/header', $data);
			$this->load->view('catalog/welcome', $data);
		}
		else{
			redirect('/index');
		}

	}
	
	public function your_mall()
	{
		$this->load->library('user_check');
		if ($this->flexi_auth->is_logged_in()){
			redirect('/mall', 'refresh');
		}
		
		$data = $this->data;
		$data['title'] = "Your Mall";
		$data['content_class'] = "full_width_page";
		$data['extraFooter'] = TRUE;
		$data['extraMeta'] = '<meta name="keyword" content="PRÊT À STYLER makes clothes shopping easy. The future of shopping has arrived.">
		<meta name="description" content="PRÊT À STYLER makes clothes shopping easy. The future of shopping has arrived.">
		';
		
		$data['extraCSS'] = '
		<link rel="stylesheet" href="/css/jquery-ui.css?v=2.2.0.2">
		<link href="/css/jquery-ui-slider-pips.css?v=2.2.0.2" rel="stylesheet">
		';
		$data['extraJS'] = '
		<script src="https://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
		<script src="/js/jquery-ui-slider-pips.js?v=2.2.0.2"></script>
		<script src="/js/circular-progress.js"></script>
		<script type="text/javascript">$(function(){ preload_all_img_tags(); });</script>
		';
		

		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('catalog/yourmall', $data);
		
	}
	
	/**
	 * Product Page for this controller.
	 */
	public function product($slug = FALSE)
	{
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
		$data['garment'] = $this->garment_model->get_garment_info($garment_id, $this->flexi_auth->get_user_id());
		if (!$data['garment']){
			$this->not_found();
			return;
		}
		if ($this->flexi_auth->is_logged_in()) {
			$data['garment'] = $this->garment_model->get_garment_info($garment_id, $this->flexi_auth->get_user_id());
			$data['advise'] = $this->garment_model->get_garment_advise($garment_id, $this->flexi_auth->get_user_id(), $this->flexi_auth->in_group('Administrators'));
		} else {
			$data['garment'] = $this->garment_model->get_garment_info($garment_id);
		}
		$data['product_page'] = "product-container";
		$this->garment_model->update_garment_click($garment_id);
		$data['colour'] = $this->colour_model->get_garment_colour($garment_id);
		$data['size'] = $this->size_model->get_garment_size($garment_id);
		$data['title'] = $data['garment']['name'];
		$data['breadcrumb'] = array('<a href="/mall.html">MALL</a>', $data['title'] );
		$data['extraJS'] = '<script src="/js/actual_product.js?v=2.2.0.0"></script>
		<meta itemprop="name" content="'.$data['garment']['name'].'">
		<meta itemprop="description" content="'.$data['garment']['name'].'">
		<meta itemprop="image" content="http://pretastyler.com/images/garment/'.$data['garment']['image_path'].'">
		
		<meta property="og:url" content="'. current_url() .'">
		<meta property="og:title" content="Prêt à Styler">

		<meta property="og:description" content="'.$data['garment']['name'].'" />
		<meta property="og:site_name" content="Prêt à Styler " />
		<meta property="og:image"            content="http://pretastyler.com/images/garment/'.$data['garment']['image_path'].'">
		<meta property="og:image:secure_url" content="http://pretastyler.com/images/garment/'.$data['garment']['image_path'].'">
		<meta property="og:image:type"       content="image/jpg">
		<meta property="og:image:width"      content="200">
		<meta property="og:image:height"     content="700">
		';
		$data['extraDiv'] = '
		<script>
		window.fbAsyncInit = function() {
			FB.init({
				appId      : "838075186234157",
				xfbml      : true,
				version    : "v2.2"
			});
};

(function(d, s, id){
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=838075186234157&version=v2.0";
	fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>
';

$data['similar_garments'] = $this->garment_model->get_batch_garment_info_by_similar_garment_id(0, 10, $this->flexi_auth->get_user_id(), $garment_id);
$data['extraMeta'] = '<meta name="keyword" content="PRÊT À STYLER, YOUR PERSONALIZED FASHION FEED.">
<meta name="description" content="PRÊT À STYLER eliminates "shopping noise" so you can focus on only the styles that are perfect for YOU.">
';

$data['extraFooterJS'] = '<script type="text/javascript">
setTimeout(function(){var a=document.createElement("script");
	var b=document.getElementsByTagName("script")[0];
	a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0027/7573.js?"+Math.floor(new Date().getTime()/3600000);
	a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>';

$this->load->view('templates/header', $data);
$this->load->view('templates/menu', $data);
$this->load->view('templates/menu_mall', $data);
$this->load->view('catalog/product', $data);
$this->load->view('templates/footer', $data);
}
	/**
	 * How It Works Page for this controller.
	 */
	public function how_it_works()
	{
		$data = $this->data;
		$data['title'] = "How It Works - MANAGE YOUR STYLE PREFERENCES";
		$data['breadcrumb'] = array('HOW IT WORKS');
		$data['extraMeta'] = '<meta name="keyword" content="PRÊT À STYLER, YOUR PERSONALIZED FASHION FEED.">
		<meta name="description" content="With our preference tool you can quickly tweak your Personalized Fashion Feed to show only clothing and accessories with colors, price and brands you love.">
		';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('catalog/how_it_works', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * Our Story Page for this controller.
	 */
	public function our_story()
	{
		$data = $this->data;
		$data['title'] = "Our Story - PRETSTYLER";
		$data['breadcrumb'] = array('OUR STORY');
		$data['extraMeta'] = '<meta name="keyword" content="PRÊT À STYLER, our story">
		<meta name="description" content="The launch of PrêtàStyler is the culmination of years of experience, research and hard work.">
		';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('catalog/our_story', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * FAQ Page for this controller. 
	 */
	public function faq()
	{
		$data = $this->data;
		$data['title'] = "FAQ PRÊT À STYLER - MAKES STYLE YOUR OWN";
		$data['breadcrumb'] = array('FAQ');
		$data['extraMeta'] = '<meta name="keyword" content="PRÊT À STYLER - MAKES STYLE YOUR OWN">
		<meta name="description" content="Find the right clothes every time you go shopping, ones which flatter your figure, get you noticed for the right reasons, and make you feel your best.">
		';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('catalog/faq', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * Packages Page for this controller.
	 */
	public function packages( $slug = FALSE )
	{
		$req_referrer = ( !empty( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : FALSE );
		if( !empty($req_referrer) || $slug == 'paid' ) {
			if( (strpos( $req_referrer, 'paypal.com') !== FALSE) || $slug == 'paid' ) {
				$user = $this->flexi_auth->get_user_by_identity()->result()[0];
				
				if( $user->uacc_group_fk > 2 ){
					$this->load->model('ipn_order_model');
					$ordered = $this->ipn_order_model->get_order_details( $user->uacc_email );
					
					if( !empty($ordered)){
						$this->load->model('admin_model');
						$updateUser = $this->admin_model->update_user_group($user->uacc_id, 2);
						if( $updateUser ){
							$flex = $this->session->userdata('flexi_auth');
							$flex['group'] = array( '2' => 'PremiumUsers');
							$this->session->set_userdata('flexi_auth', $flex );
							redirect('success/premium', 'refresh');
						}
					}
				} else if ( $user->uacc_group_fk == 2 ){
					redirect('success/premium', 'refresh');
				}
			}
		}
		
		if( $slug == 'index' ){
			$this->load->model('admin_model');

			$user = $this->flexi_auth->get_user_by_identity()->result()[0];
			$this->flexi_auth->logout();
			$result = $this->admin_model->delete_user($user->uacc_id);
			$result = $this->flexi_auth->delete_user($user->uacc_id);
			if ($result){
				redirect('packages', 'refresh');
			}
			
		}
		
		$data = $this->data;
		$data['title'] = "Packages - PRÊT À STYLER";
		$data['breadcrumb'] = array('PACKAGES');
		$data['extraMeta'] = '<meta name="keyword" content="Personal Style Program with My Private Stylist">
		<meta name="description" content="PRÊT À STYLER provides differents packages, basic, personalized and ultimate. Sing up today!">
		';
		$data['premium_mem'] = FALSE;
		if ( $this->flexi_auth->in_group(array('Administrators', 'Uploaders', 'PremiumUsers')) ) {
			$data['premium_mem'] = TRUE;
		}
		$data['id'] = $this->flexi_auth->get_user_identity();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('catalog/packages', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * Styling Board Page for this controller.
	 */
	public function styling_board()
	{
		redirect('coming-soon', 'refresh');
	}
	/**
	 * Coming Soon Page for this controller.
	 */
	public function coming_soon()
	{
		$data = $this->data;
		$data['title'] = "Coming Soon";
		$data['extraJS'] = '<style>.content {background-image:url(/images/stylingBoard.jpg);margin:0;padding:0;height:100%;} .container { margin-top: 20px; }</style>';
		$data['breadcrumb'] = array('COMING SOON');
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('errors/coming_soon', $data);
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
		$data['breadcrumb'] = array('NOT FOUND');
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('errors/not_found', $data);
	}
	/**
	 * About Us Page for this controller.
	 */
	public function about_us()
	{
		
		$data = $this->data;
		$data['title'] = "About Us - PRÊT À STYLER";
		$data['breadcrumb'] = array('ABOUT US');
		$data['extraMeta'] = '<meta name="keyword" content="PRÊT À STYLER - shopping online easily">
		<meta name="description" content="Pretastyler makes clothes shopping easy, personalized fahsion, manage your style and more. Visite us today! ">
		';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('catalog/about_us', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * Terms and Conditions Page for this controller.
	 */
	public function terms()
	{
		$data = $this->data;
		$data['title'] = "Terms and conditions";
		$data['breadcrumb'] = array('TERMS AND CONDITIONS');
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('catalog/termandcondition', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * Contact Us Page for this controller.
	 */
	public function contact_us()
	{
		$data = $this->data;
		$data['title'] = "Contact Us - PRÊT À STYLER";
		$data['breadcrumb'] = array('CONTACT US');
		
		$data['countries'] = $this->user_model->get_all_countries();
		$data['extraMeta'] = '<meta name="keyword" content="PRÊT À STYLER - shopping online easily">
		<meta name="description" content="Pretastyler is a shopping center where you can customize your profile and manage your style preference. Contact us today! ">
		';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('catalog/contact_us', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * Retailer Page for this controller.
	 */
	public function retailer()
	{
		$data = $this->data;
		$data['title'] = "Retailer - PRÊT À STYLER";
		$data['breadcrumb'] = array('RETAILER');
		$data['countries'] = $this->user_model->get_all_countries();
		$data['extraMeta'] = '<meta name="keyword" content="PRÊT À STYLER - shopping online easily">
		<meta name="description" content="Do you want to join to PRÊT À STYLER retailer program? Contact us today! ">
		';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('catalog/retailer', $data);
		$this->load->view('templates/footer', $data);
	}
	/**
	 * Thank You Page for this controller.
	 */
	public function success( $premium = false )
	{
		if ($this->flexi_auth->is_logged_in()){
			$image		= 'signup_normal';
			if ( $this->flexi_auth->in_group(array('Administrators', 'Uploaders', 'PremiumUsers')) ) {
				$image 		= 'signup_premium';
				if ( $premium == false ) {
					redirect('success/premium');
				}
			}
			else {
				$user = $this->flexi_auth->get_user_by_identity()->result()[0];
				$flex = $this->session->userdata('flexi_auth');
				if( $user->uacc_group_fk != key( $flex['group']) ){
					$flex['group'] = array( '2' => 'PremiumUsers');
					$this->session->set_userdata('flexi_auth', $flex );
					redirect('success/premium', 'refresh');
				}
			}
		} else {
			redirect('', 'refresh');
		}
		$data = $this->data;
		$data['title'] = "Thank You for signing up";
		$data['breadcrumb'] = array('THANK YOU');
		
		$data['extraJS'] = "<style>.headPageTitle { display:none;}.content {background-image:url(/images/'.
			$image.'.jpg);margin:0;padding:0;height:100%;} .container { margin-top: 20px; }</style> <script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', '6022631669625', {'value':'0.00','currency':'AUD'}]);
</script>
<noscript><img height=\"1\" width=\"1\" alt=\"\" style=\"display:none\" src=\"https://www.facebook.com/tr?ev=6022631669625&amp;cd[value]=0.00&amp;cd[currency]=AUD&amp;noscript=1\" /></noscript>";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall', $data);
		$this->load->view('catalog/success', $data);
}
	/* removed from the main website
	public function thankyou(){
		
		if($this->input->post('test-form')=='01ae3785a5fde11d3e8a29fd1f6e9400'){
			$data['title'] = "Thank You for signing up";
			$this->load->view('templates/header', $data);
			$this->load->view('templates/menu', $data);
			$this->load->view('templates/menu_mall', $data);
			$this->load->view('thankyou');
		}
		else{
			redirect("/index");
		}


	} 
	*/
	/**
	* User login and signup 
	*/
	public function useraccount($slug = FALSE){
		
		if (!$this->flexi_auth->is_logged_in()){

			$data = $this->data;
			$data['title'] = "Customer Login";
			$data['no_background_image'] = TRUE;
			$data['content_class'] = "full_width_page";
			$data['extraFooter'] = TRUE;
			
			$data['extraMeta'] = '<meta name="keyword" content="Login to PRÊT À STYLER. PRÊT À STYLER makes clothes shopping easy. The future of shopping has arrived.">
			<meta name="description" content="PRÊT À STYLER makes clothes shopping easy. The future of shopping has arrived.">
			';
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/menu_mall', $data);
			$this->load->view('catalog/useraccount', $data);

		} else {
			redirect("/mall", "refresh");
		}

	}
	/**
	 * Test pages
	 */
	public function test($slug = FALSE, $param1 = FALSE, $param2 = FALSE, $param3 = FALSE)
	{
		if ($slug) {
			$data['title'] = "Test";
			if ($slug == "show_username"){
				$username = $this->flexi_auth->get_user_identity();
				$data['test_str'] = $username ? "Username: ".$username : "Not Logged In";
			} else if ($slug == "show_user_id"){
				$user_id = $this->flexi_auth->get_user_id();
				$data['test_str'] = $user_id ? "User id: ".$user_id : "Not Logged In";
			} else if ($slug == "insert-user"){
				$user_id = $this->flexi_auth->insert_user("test@test.com", FALSE, "password123",FALSE,3,TRUE);
				$data['test_str'] = $user_id ? "User id: ".$user_id : "Failed";
			} else if ($slug == "log_in"){
				$user_id = $this->flexi_auth->login("test@test.com", "password123", TRUE);
				$username = $this->flexi_auth->get_user_identity();
				$data['test_str'] = $username ? "Username: ".$username : "Not Logged In";
			} else if ($slug == "log_out"){
				$user_id = $this->flexi_auth->logout();
				$username = $this->flexi_auth->get_user_identity();
				$data['test_str'] = $username ? "Username: ".$username : "Logged Out";
			} else if ($slug == "insert-group-admin"){
				$group_id = $this->flexi_auth->insert_group("Administrators", "Site Administrators", TRUE);
				$data['test_str'] = $group_id ? "Group id: ".$group_id : "Failed";
			} else if ($slug == "insert-group-premium"){
				$group_id = $this->flexi_auth->insert_group("PremiumUsers", "Premium Users");
				$data['test_str'] = $group_id ? "Group id: ".$group_id : "Failed";
			} else if ($slug == "insert_group_standard"){
				$group_id = $this->flexi_auth->insert_group("StandardUsers", "Standard Users");
				$data['test_str'] = $group_id ? "Group id: ".$group_id : "Failed";
			} else if ($slug == "get_garment_info"){
				$result = $this->garment_model->get_garment_info($param1, $this->flexi_auth->get_user_id());
				$data['test_str'] = $result;
			} else if ($slug == "get_batch_garment_info"){
				$result = $this->garment_model->get_batch_garment_info($param1, $param2, $this->flexi_auth->get_user_id());
				$data['test_str'] = $result;
			} else if ($slug == "get_category"){
				$result = $this->category_model->get_category($param1);
				$data['test_str'] = $result;
			} else if ($slug == "get_batch_garment_info_by_occasion_name"){
				$result = $this->garment_model->get_batch_garment_info_by_occasion_name(0, 140, FALSE, $param1);
				$data['test_str'] = $result;
			} else if ($slug == "colour_occasion"){
				$data['test_str'] = $this->data;
			} else if ($slug == "get_available_categories"){
				$result = $this->deep_search_model->get_available_categories();
				$data['test_str'] = $result;
			} else if ($slug == "get_initial_field_criteria"){
				$result = $this->deep_search_model->get_initial_field_criteria($param1);
				$data['test_str'] = $result;
			} else if ($slug == "get_new_field_criteria"){
				$result = $this->deep_search_model->get_new_field_criteria($param1, $param2, array('3429'), $param3);
				$data['test_str'] = $result;
			} else if ($slug == "judge_field_by_criteria_id"){
				$result = $this->deep_search_model->judge_field_by_criteria_id("/3434/", "", array('3434','3447'));
				$data['test_str'] = $result;
			} else if ($slug == "get_batch_garment_info_from_quick_search"){
				$result = $this->garment_model->get_batch_garment_info_from_quick_search(0, 140, 99, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE);
				$data['test_str'] = $result;
			} else if ($slug == "get_batch_garment_info_by_favorite"){
				$result = $this->garment_model->get_batch_garment_info_by_favorite(0, 140, 99);
				$data['test_str'] = $result;
			} else if ($slug == "encode_url"){
				$this->load->helper(array('url_encode'));
				$result = base64_encode_url('http://slimages.macys.com/is/image/MCY/products/5/optimized/2356675_fpx.tif?$filterlrg$&wid=370');
				$data['test_str'] = $result;
			} else if ($slug == "insert_garment_image"){
				$this->load->helper(array('url_encode'));
				$result = $this->garment_model->insert_garment_image(base64_decode_url($param1));
				$data['test_str'] = $result;
			} else if ($slug == "get_initial_field_criteria_for_assessment"){
				$result = $this->deep_search_model->get_initial_field_criteria_for_assessment($param1, $param2);
				$data['test_str'] = $result;
			} else if ($slug == "insert_garment_specs"){
				$result = $this->deep_search_model->insert_garment_specs(24994, array(2120, 2126, 2247, 2169, 2252, 2194, 3859, 2138, 2199, 2871, 2202, 2220, 2230));
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

/* End of file catalog.php */
/* Location: ./application/controllers/catalog.php */