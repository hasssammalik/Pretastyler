<?php
	/**
	 * This is an API test endpoint created and maintained
	 * by Gennady Kovshenin. Do not edit without permission.
	 *
	 * This API is used mainly with the Style Boards.
	 */
	if ( !defined( 'BASEPATH' ) ) exit;

	class API extends CI_Controller {
		public function __construct() {
			parent::__construct();

			$this->load->model( 'category_model' );
			$this->load->model( 'garment_model' );
			$this->load->model( 'brand_model' );

		}

		public function categories() {
			header( 'Content-Type: application/json' );
			header( 'Access-Control-Allow-Origin: *' );
			echo json_encode( $this->category_model->get_categories() );
		}

		public function garments() {
			header( 'Content-Type: application/json' );
			header( 'Access-Control-Allow-Origin: *' );

			$category_id = intval( $this->input->get( 'category_id' ) );
			$limit = intval( $this->input->get( 'count' ) );
			if ( !$limit || $limit < 1 || $limit > 100 ) $limit = 20;
			$offset = intval( $this->input->get( 'offset' ) );
			if ( !$offset || $offset < 1 ) $offset = 0;

			$garments = $this->garment_model->get( $category_id, $limit, $offset );
			$total = $this->garment_model->count_all( $category_id );

			echo json_encode( array( 'total' => $total, 'garments' => $garments ) );
		}

		public function search() {
			header( 'Content-Type: application/json' );
			header( 'Access-Control-Allow-Origin: *' );

			// Keyword search
			if ( $this->input->get( 'q' ) ) {
				$results = array();

				// Search through brands
				foreach ( $this->brand_model->search( $this->input->get( 'q' ) ) as $brand ) {
					$results []= array(
						'type' => 'brand', 'id'=> $brand['brand'], 'name' => $brand['brand']
					);
				}
				//  Search through categories
				foreach ( $this->category_model->get_categories() as $category ) {
					if ( strpos( strtolower( $category['name'] ), strtolower( $this->input->get( 'q' ) ) ) !== false )
						$results []= array(
							'type' => 'category', 'id'=> $category['category_id'], 'name' => $category['name'],
							'image' => $category['image_path']
						);
				}
			}
			// Parametrized search
			else if ( $this->input->get( 'brand' ) || $this->input->get( 'category' ) || $this->input->get( 'price' ) || $this->input->get( 'colour' ) )  {

				$results = array( 'total' => 0, 'garments' => array() );

				$limit = 8;
				$page = intval( $this->input->get( 'p' ) ) ? intval( $this->input->get( 'p' ) ) : 1;
				$offset = $limit * ( $page - 1 );

				// Build parameter list
				$parameters = array();
				if ( is_array( $this->input->get( 'brand' ) ) )
					$parameters['brand'] = $this->input->get( 'brand' );
				if ( is_array( $this->input->get( 'category' ) ) )
					$parameters['category_id'] = $this->input->get( 'category' );
				if ( is_array( $this->input->get( 'price' ) ) )
					$parameters['price_range'] = $this->input->get( 'price' );
				if ( is_array( $this->input->get( 'colour' ) ) )
					$parameters['colour_id'] = $this->input->get( 'colour' );
				
				$garments = $this->garment_model->get( $parameters, $limit, $offset );
				$total = $this->garment_model->count_all( $parameters );

				$results = array( 'total' => $total, 'garments' => $garments );
			} else {
				$results = -1;
			}

			echo json_encode( $results );
		}

		public function mask() {
			header( 'Content-Type: application/json' );
			header( 'Access-Control-Allow-Origin: *' );

			if ( $this->input->get( 'image' ) ) {
				$image = $this->input->get( 'image' );

				// $image_directory = BASEPATH . '../images/masks/'; // XXX: dev
				$image_directory = BASEPATH . '../../www/images/masks/'; // XXX: staging
				$image_url = '/images/masks/';

				/** Transform it back to an image directory we have */
				{
					/* XXX: Temporary insecure stub! */
					$download = file_get_contents( $image );
					$image = md5( parse_url( $image, PHP_URL_PATH ) ) . '.png';
					$url = $image_url . $image;
					file_put_contents( $image_directory . $image, $download );
				}

				if ( !$image ) return;
				$image = $image_directory . $image;
				if ( !file_exists( $image ) ) return;

				$source_image = new Imagick();
				$source_image->readImage( $image );

				if ( !( $source_image instanceof Imagick ) ) return;

				$extension = pathinfo( $image, PATHINFO_EXTENSION );
				if ( in_array( $extension, array( 'jpg', 'jpeg', 'png', 'gif' ) ) ) {
					$source_image->setFormat( $extension );
				} else break;

				$mask_image = $source_image->clone();

				$mask_image->modulateImage( 100, 100, 130 );
				$background = $mask_image->getImagePixelColor( 3, 3 );
				
				$iQuantumDepth = pow( 3, $mask_image->getQuantumDepth()['quantumDepthLong'] );
				$mask_image->paintOpaqueImage( $background, 'white', 0.2 * $iQuantumDepth );
				$mask_image->negateImage( false );
				$mask_image->thresholdImage( 0 );
				$mask_image->setImageMatte( false );

				$source_image->compositeImage( $mask_image, Imagick::COMPOSITE_COPYOPACITY, 0, 0 );

				$masked_image = preg_replace( sprintf( '#(\.%s)$#', $extension ), '.mask0$1', $image );
				$source_image->writeImage( $masked_image );

				echo json_encode( preg_replace( sprintf( '#(\.%s)$#', $extension ), '.mask0$1', $url ) );
			}
		}
	}
?>
