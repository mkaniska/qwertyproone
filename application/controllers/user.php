<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    function __construct() {
        
        parent::__construct();

        /* Load libraries */
        //$this->load->library('PHPMailer');

        /* Load helpers */
        //$this->load->helper('captcha');
        
        /* Load helpers */
        $this->load->model('UserModel'); 
    }	 
	public function signup(){
	
		$data['page_name'] = "signup";
		$data['menu'] = "signup";
		$this->load->view('layout', $data);
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */