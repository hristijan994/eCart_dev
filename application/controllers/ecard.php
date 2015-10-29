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
		   $this->load->helper('directory'); //load directory helper
           $dir = "images/"; // Your Path to folder
           $map = directory_map($dir); /* This function reads the directory path specified in the first parameter and builds an array representation of it and all its contained files. */

foreach ($map as $k)
{?>
     <img src="<?php echo base_url($dir)."/".$k;?>" alt="">
   
<?php }
			
		}
	}
	
	public function error_no_permissions(){
		die("You don't have permissions for this page, <a href=\"".base_url()."\">Go Back!</a>");
	}

	





	
}
?>