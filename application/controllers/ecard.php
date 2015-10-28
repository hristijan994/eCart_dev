<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class ecard extends CI_Controller {
	function __construct() {
		parent::__construct ();
		
		$this->load->database ();
		$this->load->helper ( 'url' );
		$this->load->library ( 'tank_auth' );
		/* ------------------ */
		
	}
	public function index() {
		if (! $this->tank_auth->is_logged_in ()) {
			redirect ( '/auth/login/' );
		} else {
			$this->load->model('images');
			
			$output ['user_id'] = $this->tank_auth->get_user_id ();
			$output ['username'] = $this->tank_auth->get_username ();
			
			$out = array (
					'page' => 'dashboard/selected_card',
					'data' => $output 
			);
			$this->load->view ( 'middle.php', $out );
			$data['images'] = $this->images->get_images();
			
			//load view and pass the data
			$this->load->view('images_view', $data);
			
		}
	}
	
	public function error_no_permissions(){
		die("You don't have permissions for this page, <a href=\"".base_url()."\">Go Back!</a>");
	}

	





	
}
?>