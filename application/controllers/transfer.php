<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transfer extends CI_Controller {

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
		$this->load->model('user_model');
		$this->load->model('deep_search_model');
		$this->load->helper('url');
		$this->load->helper('form');

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
	 * Index Page for this controller.
	 */
	public function mall()
	{
		$data = $this->data;
		$data['title'] = "Mall";
		$data['extraJS'] = '<script src="/js/mall.js"></script>
		    <script src="/js/menu-mall-deep.js"></script>';

		$data['deep_category'] = $this->deep_search_model->get_available_categories();



		$this->load->view('templates/header-deep', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('templates/menu_mall_deep', $data);
		$this->load->view('mall/index', $data);
		$this->load->view('templates/footer', $data);


	}


    public function deep_search_initial() {

        header( 'Content-Type: application/json' );
        header( 'Access-Control-Allow-Origin: *' );

        $category_id = intval( $this->input->post( 'category_id' ) );

        if( $category_id > 0 )
        {
            $deep_fields = $this->deep_search_model->get_initial_field_criteria( $category_id );
        }

        if(!empty( $deep_fields )){
            echo json_encode( $deep_fields );
        }else {
            echo json_encode(array());
        }

    }
    public function deep_search_update() {

        header( 'Content-Type: application/json' );
        header( 'Access-Control-Allow-Origin: *' );

        $category_id = $this->input->post( 'category_id', TRUE );
        $field_id = $this->input->post( 'field_id', TRUE );
        $criteria_ids = $this->input->post( 'criteria_ids', TRUE );
		$is_button = $this->input->post( 'is_button', TRUE );

        if( $category_id > 0 )
        {
            $deep_fields = $this->deep_search_model->get_new_field_criteria( $category_id, $field_id, $criteria_ids, $is_button );
        }

        if(!empty( $deep_fields )){
            echo json_encode( $deep_fields );
        }else {
            echo json_encode(array());
        }

    }








	public function index() {

		echo "<pre>";
		echo '
		<pre>
		public function get_user_list(){
			$this->db->select("user_id, column");
			$query = $this->db->get("user_specs");
			$result = $query->result_array();
			return $result;
		}
		';
		echo "<br>";
		echo "First Make changes in Garment_model.php in line 496 as mentioned function as above";
		die();

		$zom_time = microtime();$zom_time = explode(" ", $zom_time); $zom_time = $zom_time[1] + $zom_time[0]; $zom_starts = $zom_time;
		echo "<pre>";

		$spec_user_ids = $this->garment_model->get_user_list();


		//echo $user_transfer['user_old_id'] . "  ";
		//print_r($spec_user_ids);
		//echo "<br>";

		foreach ( $spec_user_ids as $user ) {
			if( $user['user_id'] == 1 || $user['user_id'] == 99)
			{
				continue;
			}

			$sql	= 'INSERT INTO pas_user_garment (user_id, garment_id, score) SELECT '.$user['user_id'].' AS user_id, scores.garment_id AS garment_id, scores.score AS score FROM (SELECT garment_id, (AVG(LEAST('.$user['column'].')) + MIN(LEAST('.$user['column'].'))) / 2 AS `score` FROM `pas_garment_specs` GROUP BY `garment_id`) AS scores WHERE scores.score IS NOT NULL;';

			echo $sql;
			echo "<br>";


		}

		echo "<br>";
		$zom_time = microtime(); $zom_time = explode(" ", $zom_time); $zom_time = $zom_time[1] + $zom_time[0]; $zom_finish = $zom_time; echo($zom_finish - $zom_starts); echo "<br>";
	}




	/**
	 * Index Page for this controller.
	 */
	public function update_user_spec_with_old( $start_id = 5337, $end_id = 5837 )
	{
		$zom_time = microtime();$zom_time = explode(" ", $zom_time); $zom_time = $zom_time[1] + $zom_time[0]; $zom_starts = $zom_time;
		//die();
		$addition = 500;

		$users_transfers = $this->user_model->get_garment_concat( "pas_user_transfer");
		echo "<pre>";

		foreach ( $users_transfers as $user_transfer )
		{
			if( $user_transfer['user_old_id'] == 5339 || $user_transfer['user_old_id'] == 5999)
			{
				continue;
			}
			$users_old_maps = $this->user_model->get_garment_concat( "pas_oldsite_usermaps", array('Userid' => $user_transfer['user_old_id'] ) );

			if( !empty( $users_old_maps)){
				if( is_array( $users_old_maps))
				{
					$zombie_childs_in_string = implode(',',array_map(function($entry){return $entry['Column'];},$users_old_maps));
					if( substr($zombie_childs_in_string, 0, 1) == ",")
					{ $zombie_childs_in_string = substr($zombie_childs_in_string, 1); }
				}
				else {
					$zombie_childs_in_string = $users_old_maps;
				}

				$data_to_insert_into_user_spec = array(
														'user_id' => $user_transfer['user_id'],
														'column' => $zombie_childs_in_string
														);

				$this->user_model->insert_new_data( 'pas_user_specs', $data_to_insert_into_user_spec );

				echo $user_transfer['user_old_id'] . "  ";
				print_r($data_to_insert_into_user_spec);
				echo "<br>";


			}

		}
		//die();




		/*
		if ($end_id != 24991){
			$start_id += $addition;
			$end_id += $addition;
			if ($end_id > 24991) {
				$end_id = 24991;
			}
			//print 'start:'.$start_id." end:".$end_id;die;
			//redirect('transfer/index/'.$start_id.'/'.$end_id);
		}

		$start_id = 2800, $end_id = 3300

		$addition = 500;

		//print "loading ... .. . <br><br>";
		die();
		$zom_time = microtime();$zom_time = explode(" ", $zom_time); $zom_time = $zom_time[1] + $zom_time[0]; $zom_starts = $zom_time;
		// FETCH garment_specs

		$garment_pissed = $this->user_model->get_garment_concat( "pas_garment_specs", array('garment_id >=' => $start_id, 'garment_id <' => $end_id));
		foreach ( $garment_pissed as $garmentone )
		{
			$where = array (
							'garment_id' => $garmentone['garment_id'],
							'field_id' => $garmentone['field_id'],
							'answer_id' => $garmentone['answer_id']
						);

			$garment_repeatedones = $this->user_model->get_garment_concat( "pas_garment_specs", $where );

			if ( count($garment_repeatedones ) > 1 ) {
				foreach( $garment_repeatedones as $k => $repeated_concat )
				{
					foreach ( $repeated_concat as $field => $value )
					{
						if (!empty($value)) $without_dulicate_values[$field] = $value;
					}
				}

				 echo "<pre>";
				print_r($without_dulicate_values);
				echo "<pre>";
				$this->db->delete('garment_specs', $where);
				$this->db->insert('garment_specs', $without_dulicate_values);
				//print 'delete & insert:'.$where['garment_id'].'<br>';
			}
		}

		if ($end_id != 24991){
			$start_id += $addition;
			$end_id += $addition;
			if ($end_id > 24991) {
				$end_id = 24991;
			}
			//print 'start:'.$start_id." end:".$end_id;die;
			redirect('transfer/index/'.$start_id.'/'.$end_id);
		}






		// Name of Tables
		$table_oldusers			= "pas_oldsite_users";
		$table_oldusermaps			= "pas_oldsite_usermaps";

		$table_user_transfers	= "pas_user_transfer";
		$table_user_info		= "pas_user_info";

		$old_zombies_who_didnot_pass = array(6080,5544,5585,5588,5611,5655,5714,5771,5816,5861,5877,5899,5949,5964,5965,5968,5969,5973,5979,7100,7181,6095,6096,6097,6098,6102,6113,6127,6144,6145,6147,6152,6153,6163,6166,6169,6174,6176,6177,6185,6192,6193,6201,6208,6210,6227,6228,6234,6236,6244,6246,6247,6257,6258,6263,6269,6271,6275,6276,6285,6296,6304,6305,6308,6329,6333,6335,6336,6353,6357,6359,6360,6361,6365,6367,6368,6369,6375,6379,6380,6383,6385,6391,6397,6399,6407,6414,6415,6418,6423,6431,6432,6433,6439,6446,6450,6475,6485,6498,6502,6505,6510,6516,6523,6530,6535,6543,6547,6549,6552,6554,6555,6558,6562,6563,6564,6565,6566,6567,6569,6579,6580,6585,6587,6588,6590,6591,6596,6598,6599,6602,6603,6604,6605,6609,6614,6616,6618,6640,6710,6717,6738,6759,6763,6768,6770,6786,6793,6811,6821,6847,6861,6920,6931,6948,7167,7002,7005,7010,7013,7090,7092,7095,7098,7099,7117,7126,7135,7138,7157,7173,7179,7180,7185,7188,7190,7193,7203,7217,7220,7221,7222,7228,7237,7238,7242,7249,7263,7267,7270,7271,7281,7280,7285,7300,7310,7320,7327);

		// Check FETCHing old table users
		$where_zombie_id_old = array(
				'field' => 'id',
				'value' => $old_zombies_who_didnot_pass
		);
		$world_wide_zombies = $this->user_model->get_old_site_tables( $table_oldusers, false, $where_zombie_id_old  );

		echo "<pre>";
		print_r($world_wide_zombies);
		echo "<pre>";
		die();
		/*
		// Check FETCHing old table usermaps
		//$old_table_data_usermaps = $this->user_model->get_old_site_tables( $table_oldusermaps );

		// Paginator interval of 200
		//$start_from = 1600;
		//$number_of_rows = 127;
		//$world_wide_zombies = array_slice( $old_table_data_users, $start_from );
		//unset($old_table_data_users);
		//
		echo count($world_wide_zombies ) . "<br><br>";
		$x = 0;
		if( !empty( $world_wide_zombies ) )
		{
			if( is_array( $world_wide_zombies ) )
			{
				foreach ( $world_wide_zombies as $old_zombies )
				{
					echo ++$x .". ";
					// 1. Flex insert
					$email = $old_zombies['email'];
					$password = $old_zombies['password'];
					$user_id = $this->flexi_auth->insert_user($email, FALSE, $password, FALSE, 3, TRUE);
					echo "<pre>";
					print_r($user_id);
					echo "<pre>";
					die();




						// 2. First Name and country etc ...
						$new_data = array(
											'user_id' => $user_id,
											'first_name' => $old_zombies['name'],
											'last_name' => $old_zombies['surname'],
											'country_id' => $old_zombies['country'],
											'zipcode' => $old_zombies['zip']
										);
						if ($this->user_model->insert_new_data( $table_user_info, $new_data )){

							// 3. Insert into Transfer new/old id copies
							$new_data = array(
											'user_id' => $user_id,
											'user_old_id' => $old_zombies['id']
										);
							if ($this->user_model->insert_new_data( $table_user_transfers, $new_data )){

								// 4. Get Zombies VOL .... sizes of rows into string separated by comma
								$where_zombie_id = array(
													'field' => 'Userid',
													'value' => $old_zombies['id']
												);
									if ( $zombies_child = $this->user_model->get_old_site_tables( $table_oldusermaps, $where_zombie_id ) ){
										if( is_array( $zombies_child))
										{
											$zombie_childs_in_string = implode(',',array_map(function($entry){return $entry['Column'];},$zombies_child));
										}
										else {
											$zombie_childs_in_string = $zombies_child;
										}

									} else {
										echo "Zombies has no child, no wife, no sex maybe no GF ! " . $old_zombies['id'] . "<br>";
									}
							} else {
								echo "No Transfer log can be created for Zombies. " . $old_zombies['id'] . "<br>";
							}

						} else {
							echo "Zombies does not have any First name and other details to insert into user_info table. " . $old_zombies['id'] . "<br>";
						}
					} else {
						echo "Flex api inserting into Flex table with emails and password KILLED BY zombies. " . $old_zombies['id'] . "<br>";
					}


				}
			}
			else {
				die("Just some Smell of Zombies. ");
			}
		}
		else {
			die("No zombies. ");
		}





		*/


		echo "<br>";
		$zom_time = microtime(); $zom_time = explode(" ", $zom_time); $zom_time = $zom_time[1] + $zom_time[0]; $zom_finish = $zom_time; echo($zom_finish - $zom_starts);

		echo "<br>";


	}
}
