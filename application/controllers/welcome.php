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
		$data['page_name'] = "welcome/home"; 
		$data['menu'] = "home"; 
		$this->load->view('layout', $data);	
		//$this->load->view('welcome_message');
	}
	public function home(){	

		$data['page_name'] = "welcome/home";
		$data['menu'] = "home"; 
		$this->load->view('layout', $data);
	}
	public function contactus(){
	
		$data['page_name'] = "welcome/contactus"; 
		$data['menu'] = "contactus";
		$this->load->view('layout', $data);
	}
	public function blog(){
	
		$data['page_name'] = "welcome/blog"; 
		$data['menu'] = "blog";
		$this->load->view('layout', $data);
	}
	public function faq(){
	
		$data['page_name'] = "welcome/faq";
		$data['menu'] = "faq";
		$this->load->view('layout', $data);
	}
	public function gallery(){
	
		$this->load->model('GalleryModel');
		$data['page_name'] = "welcome/gallery";
		$data['menu'] = "gallery";
		$data['results'] = $this->GalleryModel->read_all_gallery();
		$this->load->view('layout', $data);
	}
	public function dynamic(){
	
		$data['page_name'] = "user/dynamic";
		$data['menu'] = "dynamic";
		$this->load->view('layout_max', $data);
	}
	public function process_contact(){
		
		if($this->input->post('doContact')=='Submit') {
		
		$full_name 		= $this->input->post('full_name');
		$gender 		= $this->input->post('gender');
		$email_address 	= $this->input->post('email_address');
		$message_text 	= $this->input->post('message_text');
		$phone_number	= $this->input->post('phone_number');

			$this->load->library('email');

			$this->email->from('murugesanme@yahoo.com', 'Murugesan P');
			$this->email->to('murugdev.eee@gmail.com');

			$this->email->subject('User Enquiry');
			
			$textMessage = "Hello Admin, <br />";
			$textMessage.=$full_name." is trying to contact you for the following reason. <br />";
			$textMessage.=$message_text."<br /><br />";
			$textMessage.="Below are the details he has provided. <br />";
			$textMessage.="Full Name : ".$full_name." <br />";
			$textMessage.="Gender : ".$gender." <br />";
			$textMessage.="Email Address : ".$email_address." <br />";
			$textMessage.="Phone Number : ".$phone_number." <br /><br />";
			$textMessage.="Thanks, <br />";
			$textMessage.="Administrator";
			
			$this->email->message($textMessage);

			$this->email->send();
			$this->session->set_flashdata('flash_message', 'Successfully Registered !');
			redirect('welcome/thanks');
		} else {
			$this->session->set_flashdata('data_back', $posted_data);
			$this->session->set_flashdata('flash_message', 'Please enter all the details');
			redirect('welcome/contactus/error/1');
		}
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */