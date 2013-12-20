<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('AdminModel'); 
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
		$data['title'] = SITE_TITLE." :: Welcome to CodeIgniter Sample";
		
		$data['random_ads'] = $this->AdminModel->get_random_ads();
		
		$this->load->view('layouts/layout', $data);
	}
	public function home(){	

		$data['page_name'] = "welcome/home";
		$data['recent_rides'] = $this->RideModel->get_recent_rides();
		$data['recent_joinees'] = $this->UserModel->get_recent_joinees();
		$data['menu'] = "home"; 
		$data['title'] = SITE_TITLE." :: Welcome to CodeIgniter Sample";
		$data['random_ads'] = $this->AdminModel->get_random_ads();
		$this->load->view('layouts/layout', $data);
	}
	public function thanks(){	

		$data['page_name'] = "welcome/thanks";
		$data['menu'] = "thanks"; 
		$data['title'] = "Thank you !";
		$data['title'] = SITE_TITLE." :: Thanks";
		$this->session->set_flashdata('flash_message', 'Successfully Registered ! <br /> You will receive the email for verification & please confirm that to activate your account!.');
		$this->load->view('layouts/layout', $data);
	}	
	public function show_ads(){

		$data['random_ads'] = $this->AdminModel->get_random_ads();
		$data['page_name'] = "welcome/ads";
		echo $this->load->view('layouts/ajax_layout', $data, true);		
		exit;
	}

	public function pick_ads(){

		$data['random_ads'] = $this->AdminModel->get_random_ads();
		$data['page_name'] = "welcome/ads";
		echo $this->load->view('layouts/ajax_layout', $data, true);		
		exit;
	}
	
	public function contactus(){
	
		$data['page_name'] = "welcome/contactus"; 
		$data['title'] = SITE_TITLE." :: Contact Us";
		$data['recent_rides'] = $this->RideModel->get_recent_rides();
		$data['recent_joinees'] = $this->UserModel->get_recent_joinees();
		$data['menu'] = "contactus";
		$this->load->view('layouts/layout', $data);
	}
	public function faq(){
	
		$data['page_name'] = "welcome/faq";
		$data['menu'] = "faq";
		$data['title'] = SITE_TITLE." :: FAQ";
		$data['recent_rides'] = $this->RideModel->get_recent_rides();
		$data['recent_joinees'] = $this->UserModel->get_recent_joinees();
		$this->load->view('layouts/layout', $data);
	}
 
	public function services(){
	
		$data['page_name'] = "welcome/services";
		$data['menu'] = "services";
		$data['title'] = SITE_TITLE." :: Services";
		$data['recent_rides'] = $this->RideModel->get_recent_rides();
		$data['recent_joinees'] = $this->UserModel->get_recent_joinees();		
		$this->load->view('layouts/simple_layout', $data);
	}
	
	public function process_contact() {
	
		if($this->input->post('doContact')=='Submit') {
		
			$subject 		= $this->input->post('subject');
			$full_name 		= $this->input->post('full_name');
			$email_address 	= $this->input->post('email_address');
			$message_text 	= $this->input->post('message_text');
			$phone_number	= $this->input->post('phone_number');

			$mconfig['protocol'] = 'mail';
			$mconfig['wordwrap'] = FALSE;
			$mconfig['mailtype'] = 'html';
			$mconfig['charset'] = 'utf-8';
			$mconfig['crlf'] = "\r\n";
			$mconfig['newline'] = "\r\n";
			$this->load->library('email',$mconfig);

			$this->email->from('murugesanme@yahoo.com', 'Murugesan P');
			$this->email->to('murugdev.eee@gmail.com');
			$this->email->subject('Customer Inquiry Notification !');

			$email_data['HelloTo'] 		= $full_name;
			$email_data['ToMessage'] 	= $message_text;
			
			$temp_str ="Full Name : ".$full_name." <br />";
			$temp_str.="Email Address : ".$email_address." <br />";
			$temp_str.="Phone Number : ".$phone_number." <br /><br />";
			
			$email_data['ItemDetails'] 	= $temp_str;
			
			$email_template = $this->load->view('templates/contact_us_email', $email_data, true);				
			
			if($this->config->item('is_email_enabled')) {
				$this->email->message($email_template);
				$this->email->send();				
			}			

			$this->session->set_flashdata('flash_message', 'Successfully Registered !');
			redirect('welcome/thanks');
		} else {
			$this->session->set_flashdata('flash_message', 'Please enter all the details');
			redirect('welcome/contactus/error/1');
		}
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */