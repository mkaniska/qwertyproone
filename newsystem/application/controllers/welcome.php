<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('UserModel'); 
        $this->load->model('RideModel'); 
        $this->load->model('CommonModel');
    }
	
	public function index()
	{		 
		$data['page_name'] = "welcome/home"; 
		$data['recent_rides'] = $this->RideModel->get_recent_rides();
		$data['recent_joinees'] = $this->UserModel->get_recent_joinees();
		$data['menu'] = "home";
		$data['title'] = "Welcome to CodeIgniter Sample";		
		$this->load->view('layout', $data);
	}
	public function home(){	

		$data['page_name'] = "welcome/home";
		$data['recent_rides'] = $this->RideModel->get_recent_rides();
		$data['recent_joinees'] = $this->UserModel->get_recent_joinees();
		$data['menu'] = "home"; 
		$data['title'] = "Welcome to CodeIgniter Sample";
		$this->load->view('layout', $data);
	}
	public function thanks(){	

		$data['page_name'] = "welcome/thanks";
		$data['menu'] = "thanks"; 
		$data['title'] = "Thank you !";
		$data['title'] = SITE_TITLE." :: Thanks";
		$this->session->set_flashdata('flash_message', 'Successfully Registered ! <br /> You will receive the email for verification & please confirm that to activate your account!.');
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
			$this->email->subject('User Inquiry');

			$email_data['PAGE_TITLE'] 		= 'Email Notification';
			$email_data['PAGE_HEADING'] 	= 'Contact Inquiry Details !';
			$email_data['ADDRESS_TO'] 		= "Hello Admin,";
			$email_data['ADDRESS_CONTENT'] 	= $full_name." is trying to contact you for the following reason. <br /><br />".$message_text."<br />";
			$email_data['SUCCESS_HEADER'] 	= 'User Details';
			
			$temp_str ="Full Name : ".$full_name." <br />";
			$temp_str.="Email Address : ".$email_address." <br />";
			$temp_str.="Phone Number : ".$phone_number." <br /><br />";
			
			$email_data['SUCCESS_TEXT'] 	= $temp_str;

			
			$email_template = $this->load->view('contact_us_email', $email_data, true);				
			
			if($this->config->item('is_email_enabled')) {
				$this->email->message($email_template);
				$this->email->send();				
			}			

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