<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends CI_Controller {

	 /**
	 * Constructor.
	 */
	 public function __construct(){
		parent::__construct();
		$this->auth = new stdClass;
		$this->load->library('flexi_auth');
		$this->load->model('user_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$data = false;
		if ($this->flexi_auth->is_logged_in()){
			$this->data['first_name'] = $this->user_model->get_user_name($this->flexi_auth->get_user_id())['first_name'];
			$this->data['user'] = $this->user_model->get_user_name($this->flexi_auth->get_user_id());
		}
	}


	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$data = $this->data;
		$data['title'] = "Payment";
		$data['extraJS'] = '<style>.content {background-image:url(/images/payment/pretastylerpayment.jpeg);}</style>';
				
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('payment/index', $data);
		$this->load->view('templates/footer', $data);


	}
	

}
