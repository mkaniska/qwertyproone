<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		$data['page_name'] = "home"; 
		$data['menu'] = "home"; 
		$this->load->view('layout', $data);	
		//$this->load->view('welcome_message');
	}
	public function home(){
	
		$data['page_name'] = "home"; 
		$data['menu'] = "home"; 
		$this->load->view('layout', $data);
	}
	public function contactus(){
	
		$data['page_name'] = "contactus"; 
		$data['menu'] = "contactus";
		$this->load->view('layout', $data);
	}
	public function blog(){
	
		$data['page_name'] = "blog"; 
		$data['menu'] = "blog";
		$this->load->view('layout', $data);
	}
	public function products(){
	
		$data['page_name'] = "products";
		$data['menu'] = "products";
		$this->load->view('layout', $data);
	}
	public function gallery(){
	
		$data['page_name'] = "gallery";
		$data['menu'] = "gallery";
		$this->load->view('layout', $data);
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */