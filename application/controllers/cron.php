<?php 
/*
* Name: PAS Cron Job Controller
*
* Author: 
* Jifeng Sun
* rob@asmex.com.au
*
* Copyright 2014 Jifeng Sun
*
* Description: Prêt à Styler 2.0 Cron Controller.
* Released: 18/12/2014
* Requirements: PHP5 or above and Codeigniter 2.0+
*/
class Cron extends CI_Controller {
	/**
	 * Constructor.
	 */
	public function __construct(){
		parent::__construct();
		if( PHP_SAPI != 'cli') exit('Direct Access is not permitted!');
		$this->load->model('garment_model');
		$this->load->model('assessment_model');
		$this->load->model('cron_model');
	}
	/**
	 * Index Cron Page for this controller.
	 */
	public function index(){
		echo date('Y-m-d H:i:s')."\t"."Getting All User ids...\n";
		$user_ids = $this->garment_model->get_user_list();
		$total = count($user_ids);
		echo date('Y-m-d H:i:s')."\t".$total." user ids got!\n".date('Y-m-d H:i:s')."\t"."Starting update process...\n";
		$index = 1;
		foreach($user_ids as $user_id){
			$this->garment_model->update_all_score($user_id['user_id']);
			echo date('Y-m-d H:i:s')."\t"."(".$index." / ".$total.")\t".$user_id['user_id']."\tis updated!\n";
			$index++;
		}
		echo date('Y-m-d H:i:s')."\tStart Generating All Garment Specs...\n";
		$this->assessment_model->update_all_garment_specs();
		echo date('Y-m-d H:i:s')."\tAll Done!\n";
	}
}

/* End of file cron.php */
/* Location: ./application/controllers/cron.php */