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
		$data['dir'] = "welcome"; 
		$data['page_name'] = "home"; 
		$data['menu'] = "home"; 
		$this->load->view('layout', $data);	
		//$this->load->view('welcome_message');
	}
	public function home(){
	
		$data['dir'] = "welcome";
		$data['page_name'] = "home";
		$data['menu'] = "home"; 
		$this->load->view('layout', $data);
	}
	public function contactus(){
	
		$data['dir'] = "welcome";
		$data['page_name'] = "contactus"; 
		$data['menu'] = "contactus";
		$this->load->view('layout', $data);
	}
	public function blog(){
	
		$data['dir'] = "welcome";
		$data['page_name'] = "blog"; 
		$data['menu'] = "blog";
		$this->load->view('layout', $data);
	}
	public function products(){
	
		$data['dir'] = "welcome";
		$data['page_name'] = "products";
		$data['menu'] = "products";
		$this->load->view('layout', $data);
	}
	public function gallery(){
	
		$this->load->model('GalleryModel');
		$data['dir'] = "welcome";
		$data['page_name'] = "gallery";
		$data['menu'] = "gallery";
		$data['results'] = $this->GalleryModel->read_all_gallery();
		$this->load->view('layout', $data);
	}
	public function dynamic(){
	
		$data['dir'] = "user";
		$data['page_name'] = "dynamic";
		$data['menu'] = "dynamic";
		$this->load->view('layout_max', $data);
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */