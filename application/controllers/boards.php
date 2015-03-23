<?php
	/**
	 * This is the Style Boards endpoint maintained
	 * by Gennady Kovshenin. Do not edit without permission.
	 *
	 */
	if ( !defined( 'BASEPATH' ) ) exit;

	class Boards extends CI_Controller {
		public function __construct() {
			parent::__construct();

			$this->data = array();

			$this->auth = new stdClass;
			$this->load->library('flexi_auth');
			$this->load->model('user_model');
			$this->load->model('colour_model');
			$this->load->helper('url');
			$this->load->helper('form');

			if ($this->flexi_auth->is_logged_in()){
				$this->data['first_name'] = $this->user_model->get_user_name($this->flexi_auth->get_user_id())['first_name'];
			}
		}

		public function index() {
			$data = $this->data;
			$data['title'] = "Coming Soon";
			$data['extraJS'] = '<style>.content {background-image:url(/images/stylingBoard.jpg);margin:0;padding:0;height:100%;} .container { margin-top: 20px; }</style>';
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/menu', $data);
			//$this->load->view('templates/menu_mall', $data);
			$this->load->view('boards/index', $data);
		}

		public function create() {

			$data = $this->data;
			$data['title'] = "Styleboards";
			$data['extraCSS'] = '<link rel="stylesheet" href="/css/boards.css">';
			$data['extraJS'] = implode( "\n", array(
				'<script src="http://fb.me/react-with-addons-0.12.0.js"></script>',
				'<script src="http://fb.me/JSXTransformer-0.12.0.js"></script>',

				'<script type="text/javascript" src="/js/boards/browser.js"></script>',
				'<script type="text/javascript" src="/js/boards/generics.js"></script>',
				'<script type="text/javascript" src="/js/boards/array.js"></script>',
				'<script type="text/javascript" src="/js/boards/collections.js"></script>',
				'<script type="text/javascript" src="/js/boards/geometry.js"></script>',
				'<script type="text/javascript" src="/js/boards/dom.js"></script>',
				'<script type="text/javascript" src="/js/boards/events.js"></script>',
				'<script type="text/javascript" src="/js/boards/matrix.js"></script>',
				'<script type="text/javascript" src="/js/boards/dragdrop.js"></script>',
				'<script type="text/javascript" src="/js/boards/item.js"></script>',
				'<script type="text/javascript" src="/js/boards/handles.js"></script>',
				'<script type="text/javascript" src="/js/boards/select.js"></script>',

				'<script type="text/javascript" src="/js/boards/ui/dropkick.jquery.js"></script>',
				'<script type="text/javascript" src="/js/boards/ui/dropkick.min.js"></script>',

				'<link href="/js/boards/ui/select2/select2.css" rel="stylesheet"/>',
				'<script type="text/javascript" src="/js/boards/ui/select2/select2.js"></script>',

				'<script type="text/javascript" src="/js/boards/canvas.js"></script>',
				'<script type="text/jsx" src="/js/boards/toolbars.js"></script>',
				'<script type="text/jsx" src="/js/boards/palette.js"></script>',
			) );

			$data['colours'] = $this->colour_model->get_colour_map();
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/menu', $data);
			//$this->load->view('templates/menu_mall', $data);
			$this->load->view('boards/create', $data);
			$this->load->view('templates/footer', $data);
		}

		public function loved() {
			$data = $this->data;
			$data['title'] = "Coming Soon";
			$data['extraJS'] = '<style>.content {background-image:url(/images/stylingBoard.jpg);}</style>';
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/menu', $data);
			//$this->load->view('templates/menu_mall', $data);
			$this->load->view('errors/coming_soon', $data);
		}

		public function my() {
			$data = $this->data;
			$data['title'] = "Coming Soon";
			$data['extraJS'] = '<style>.content {background-image:url(/images/stylingBoard.jpg);}</style>';
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/menu', $data);
			//$this->load->view('templates/menu_mall', $data);
			$this->load->view('errors/coming_soon', $data);
		}
	}
?>
