<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Contact extends CI_Controller {
	function __construct() {
		parent::__construct ();
		
		$this->load->database ();
		$this->load->helper ( 'url' );
		$this->load->library ( 'tank_auth' );
		/* ------------------ */
		
		$this->load->library ( 'grocery_CRUD' );
	}
	public function index() {
		if (! $this->tank_auth->is_logged_in ()) {
			redirect ( '/auth/login/' );
		} else {
			
			$output ['user_id'] = $this->tank_auth->get_user_id ();
			$output ['username'] = $this->tank_auth->get_username ();
			
			$out = array (
					'page' => 'dashboard/contact',
					'data' => $output 
			);
			
			$this->load->view ( 'middle.php', $out );
		}
	}
	public function contact(){
		if(! $this->tank_auth->is_logged_in())
		{
			redirect('/auth/login/');
		}
		else {
			
			$output['user_id']= $this->tank_auth->get_user_id();
			$output['username']= $this->tank_auth->get_username();
			$out = array(
			'page' =>'dashboard/contact',
			'data' => $output);
		}
		
		$this->load->view ('middle.php', $out);
		//$this->output->set_header('Content-Type:text/html; charset=UTF-8');
		$this->load->view ('contact.php');
		
		
	}
}