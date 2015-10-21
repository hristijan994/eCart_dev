<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Main extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
 
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('tank_auth');
        /* ------------------ */
        
        $this->load->library('grocery_CRUD');
 
    }
 
    public function index()
    {
    	if (!$this->tank_auth->is_logged_in()) {
    		redirect('/auth/login/');
    	} else {
    	
    		$output['user_id']	= $this->tank_auth->get_user_id();
    		$output['username']   = $this->tank_auth->get_username();
    	
    		$out = array(
    				'page' => 'dashboard/index',
    				'data' => $output,
    		);
    	
    		$this->load->view('middle.php',$out);
    	}
       
    }
    
    public function users()
    {
    	if (!$this->tank_auth->is_logged_in()) {
    		redirect('/auth/login/');
    	} else {
	    	$this->grocery_crud->set_table('users_temp');
	    	$output = $this->grocery_crud->render();

	    	$output->user_id	= $this->tank_auth->get_user_id();
	    	$output->username   = $this->tank_auth->get_username();
	    	
	    	$out = array(
	    			'page' => 'users/index',
	    			'data' => $output,
	    	);
	    	
	    	$this->load->view('middle.php',$out);
    	}
    	
    }
    
    public function users_page2()
    {
    	if (!$this->tank_auth->is_logged_in()) {
    		redirect('/auth/login/');
    	} else {
//     		$this->grocery_crud->set_table('users_temp');
//     		$output = $this->grocery_crud->render();
    
    		$output['user_id']	= $this->tank_auth->get_user_id();
    		$output['username']   = $this->tank_auth->get_username();
    
    		$out = array(
    				'page' => 'users/permissions',
    				'data' => $output,
    		);
    
    		$this->load->view('middle.php',$out);
    	}
    	 
    }
    
    
    function _example_output($output = null, $out)
    
    {
//     	$out = array(
//     			'page' => '',
//     			'data' => [],
//     	);
    	$this->load->view('middle.php',$output);
    }
    public function type_contacts()
    {
    	$this->grocery_crud->set_table('contacts_type');
    	$output5 = $this->grocery_crud->render();
    	 
    	$this->_example_output5($output5);
    	 
    }
    function _example_output5($output5 = null)
    
    {
    	$this->load->view('our_template.php',$output5);
    }
    
    public function groups()
    {
    	
    	$output1  = $this->grocery_crud->render();
    	$this->_example_output1($output1);
    }
    function _example_output1($output1 = null)
    
    {
    	$this->load->view('our_template.php',$output1);
    }
    
    
    public function user_groups(){
    
    $this->grocery_crud->set_table('user_group');
    $this->grocery_crud->set_relation('id_group','groups','name_group');
    $this->grocery_crud->set_relation('id_user','users','username');
    	
    	$output2 = $this->grocery_crud->render();
    	
    	$this->_example_output2($output2);
    	
    
    }
    function _example_output2($output2 = null)
    
    {
    	$this->load->view('our_template.php',$output2);
    }
    public function email_settings()
    {
    	 
    	
    	$this->grocery_crud->set_table('email_settings');
    	$this->grocery_crud->set_relation('id_user','users','username');
    	$output3 = $this->grocery_crud->render();
    	$this->_example_output3($output3);
    }
    function _example_output3($output3 = null)
    
    {
    	$this->load->view('our_template.php',$output3);
    }
    public function contacts()
    {
    	
    	$this->grocery_crud->set_table('contacts_user');
    	$this->grocery_crud->set_relation('id_user','users','username');
    	$this->grocery_crud->set_relation('id_contact','contacts_type','type_contact');
    	$output10 = $this->grocery_crud->render();
    	$this->_example_output10($output10);
    }
    function _example_output10($output10 = null)
    
    {
    	$this->load->view('our_template.php',$output10);
    }
} ?>