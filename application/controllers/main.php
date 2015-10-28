<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Main extends CI_Controller {
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
					'page' => 'dashboard/index',
					'data' => $output 
			);
			
			$this->load->view ( 'middle.php', $out );
		}
	}
	
	public function error_no_permissions(){
		die("You don't have permissions for this page, <a href=\"".base_url()."\">Go Back!</a>");
	}
	
	public function users() {
		if (! $this->tank_auth->is_admin())
			$this->error_no_permissions();
		
		if (! $this->tank_auth->is_logged_in ()) {
			redirect ( '/auth/login/' );
		} else {
			$this->grocery_crud->set_table ( 'users' );
			$output = $this->grocery_crud->render ();
			
			$output->user_id = $this->tank_auth->get_user_id ();
			$output->username = $this->tank_auth->get_username ();
			
			$out = array (
					'page' => 'users/index',
					'data' => $output 
			);
			
			$this->load->view ( 'middle.php', $out );
		}
	}
	public function groups2() {
		if (! $this->tank_auth->is_logged_in ()) {
			redirect ( '/auth/login/' );
		} else {
			$this->grocery_crud->set_table ( 'groups' );
			$output = $this->grocery_crud->render ();
			
			$output->user_id = $this->tank_auth->get_user_id ();
			$output->username = $this->tank_auth->get_username ();
			
			$out = array (
					'page' => 'groups/index',
					'data' => $output 
			);
			
			$this->load->view ( 'middle.php', $out );
		}
	}
	public function users_page2() {
		if (! $this->tank_auth->is_logged_in ()) {
			redirect ( '/auth/login/' );
		} else {
			// $this->grocery_crud->set_table('users_temp');
			// $output = $this->grocery_crud->render();
			
			$output ['user_id'] = $this->tank_auth->get_user_id ();
			$output ['username'] = $this->tank_auth->get_username ();
			
			$out = array (
					'page' => 'users/permissions',
					'data' => $output 
			);
			
			$this->load->view ( 'middle.php', $out );
		}
	}
	function _example_output($output = null, $out) 

	{
		// $out = array(
		// 'page' => '',
		// 'data' => [],
		// );
		$this->load->view ( 'middle.php', $output );
	}
	public function type_contacts() {
		if (! $this->tank_auth->is_logged_in ()) {
			redirect ( '/auth/login/' );
		} else {
			$this->grocery_crud->set_table ( 'contacts_type' );
			$output = $this->grocery_crud->render ();
			
			$output->user_id = $this->tank_auth->get_user_id ();
			$output->username = $this->tank_auth->get_username ();
			
			$out = array (
					'page' => 'contacts/index',
					'data' => $output 
			);
			
			$this->load->view ( 'middle.php', $out );
		}
	}
	public function user_groups() 

	{
		if (! $this->tank_auth->is_logged_in ()) {
			redirect ( '/auth/login/' );
		} else {
			$this->grocery_crud->set_table ( 'user_group' );
			$output = $this->grocery_crud->render ();
			
			$output->user_id = $this->tank_auth->get_user_id ();
			$output->username = $this->tank_auth->get_username ();
			
			$out = array (
					'page' => 'groups/users_group',
					'data' => $output 
			);
			
			$this->load->view ( 'middle.php', $out );
		}
	}
	public function email_settings() {
		if (! $this->tank_auth->is_logged_in ()) {
			redirect ( '/auth/login/' );
		} else {
			$this->grocery_crud->set_table ( 'email_settings' );
			$this->grocery_crud->set_relation ( 'id_user', 'users_temp', 'username' );
			
			$output = $this->grocery_crud->render ();
				
			$output->user_id = $this->tank_auth->get_user_id ();
			$output->username = $this->tank_auth->get_username ();
				
			$out = array (
					'page' => 'email_settings/index',
					'data' => $output
			);
				
			$this->load->view ( 'middle.php', $out );
		}
	
	}
	function _example_output3($output3 = null) 

	{
		$this->load->view ( 'our_template.php', $output3 );
	}
	public function contacts2() {
	if (! $this->tank_auth->is_logged_in ()) {
			redirect ( '/auth/login/' );
		} else {
			$this->grocery_crud->set_table ( 'contacts_user' );
			$this->grocery_crud->set_relation ( 'id_user', 'users_temp', 'username' );
			$this->grocery_crud->set_relation ( 'id_contact', 'contacts_type', 'type_contact' );
			$output = $this->grocery_crud->render ();
			
			$output->user_id = $this->tank_auth->get_user_id ();
			$output->username = $this->tank_auth->get_username ();
			
			$out = array (
					'page' => 'contacts/contacts_user',
					'data' => $output 
			);
			
			$this->load->view ( 'middle.php', $out );
		}
	}

	
}
?>