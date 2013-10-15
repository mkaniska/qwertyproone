<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{		 
		$data['page_name'] = "welcome/home"; 
		$data['menu'] = "home";
		$data['title'] = "Welcome to CodeIgniter Sample";		
		$this->load->view('layout', $data);
	}
	public function home(){	

		$data['page_name'] = "welcome/home";
		$data['menu'] = "home"; 
		$data['title'] = "Welcome to CodeIgniter Sample";
		$this->load->view('layout', $data);
	}
	public function contactus(){
	
		$data['page_name'] = "welcome/contactus"; 
		$data['title'] = SITE_TITLE." :: Contact Us";
		$data['menu'] = "contactus";
		$this->load->view('layout', $data);
	}
	public function faq(){
	
		$data['page_name'] = "welcome/faq";
		$data['menu'] = "faq";
		$data['title'] = SITE_TITLE." :: FAQ";
		$this->load->view('layout', $data);
	}
	/*
	public function aboutus(){
	
		$data['page_name'] = "welcome/aboutus";
		$data['menu'] = "aboutus";
		$this->load->view('layout', $data);
	}
	*/
	public function process_contact() {
	
		if($this->input->post('doContact')=='Submit') {
		
		$subject 		= $this->input->post('subject');
		$full_name 		= $this->input->post('full_name');
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
			$textMessage.="Email Address : ".$email_address." <br />";
			$textMessage.="Phone Number : ".$phone_number." <br /><br />";
			$textMessage.="Thanks, <br />";
			$textMessage.="Auto Responder";
			
			$this->email->message($textMessage);

			$this->email->send();
			$this->session->set_flashdata('flash_message', 'Successfully Registered !');
			redirect('welcome/thanks');
		} else {
			//$this->session->set_flashdata('data_back', $posted_data);
			$this->session->set_flashdata('flash_message', 'Please enter all the details');
			redirect('welcome/contactus/error/1');
		}
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */