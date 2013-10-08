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
	
	public function signup($param=NULL) {
		$this->load->model('CommonModel');
		$data['page_name'] = "user/signup";		
		$data['states_list'] = $this->CommonModel->states_list();			
		$data['cities_list'] = $this->CommonModel->cities_list('Tamil Nadu');
		$data['menu'] = "signup";
		$data['param'] = $param==NULL ?'':$param;
		$this->load->view('layout', $data);
	}

	public function process_signup(){
		//$this->load->model('UserModel');
		$posted_data = $this->input->post(NULL, TRUE);
		//$isValidID = $this->UserModel->insertSingup($posted_data);
		//if($isValidID>0){
		if(1){
		//redirect('user/thanks');
		$this->session->set_flashdata('flash_message', 'Please enter all the details');
		redirect('user/signup/error/1');		
		} else {
		$this->session->set_flashdata('flash_message', 'Please enter all the details');
		redirect('user/signup/error/1');
		}
		//$data['page_name'] = "user/thanks";
		//$data['menu'] = "signup";
		//$this->load->view('layout', $data);
	}
	
	public function newride(){
		$this->load->model('CommonModel');
		$data['page_name'] = "user/newride";		
		$data['states_list'] = $this->CommonModel->states_list();			
		$data['cities_list'] = $this->CommonModel->cities_list('Tamil Nadu');
		$data['menu'] = "newride";
		$this->load->view('layout', $data);
	}
	
	public function get_cities(){
		$this->load->model('CommonModel');
		$cities_list = $this->CommonModel->state_wise_cities($this->input->post('state_name'));
		$resulted_array['values'] = $cities_list;
		echo json_encode($cities_list);
		exit;
	}
	
	public function processlogin() {
		//$this->UserModel->
	}
	
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */