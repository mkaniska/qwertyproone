<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        
        parent::__construct();

        /* Load libraries */
        //$this->load->library('PHPMailer');
        /* Load helpers */
        //$this->load->helper('captcha');
        /* Load helpers */
        $this->load->model('RideModel'); 
        $this->load->model('UserModel'); 
        $this->load->model('CommonModel'); 
        $this->load->model('AdminModel'); 
    }

	public function index() {		 
		redirect('welcome/home');
	}	
	
	
	public function testEmail() {

		$mconfig['protocol'] = 'mail';
		$mconfig['wordwrap'] = FALSE;
		$mconfig['mailtype'] = 'html';
		$mconfig['charset'] = 'utf-8';
		$mconfig['crlf'] = "\r\n";
		$mconfig['newline'] = "\r\n";
		$this->load->library('email',$mconfig);
		
		$this->email->from('admin@ideasdiary.com', 'Murugesan P');
		$this->email->to('murugdev.eee@gmail.com');

		$this->email->subject('Commute Easy: Registration Email Activation');

		$email_data['PAGE_TITLE'] 		= 'Email Notification';
		$email_data['PAGE_HEADING'] 	= 'Registration Confirmation & Email Account Activation !';
		$email_data['ADDRESS_TO'] 		= "Hello ";
		$email_data['ADDRESS_CONTENT'] 	= 'Thanks for joining us !..';
		$email_data['SUCCESS_HEADER'] 	= 'Activate Email';
		$email_data['SUCCESS_TEXT'] 	= 'Please contact admin if in case you have any other queries/clarifications.!';
		$email_data['LINK_LABEL'] 		= 'Our Website Link';
		$email_data['LINK_URL'] 		= 'http://mail.yahoo.com';
		$email_data['USER_NAME'] 		= '';
		$email_data['PASS_WORD'] 		= '';
		
		$email_template = $this->load->view('templates/test_email_template', $email_data, true);				
		
		$this->email->message($email_template);
		$this->email->send();				
		echo $this->email->print_debugger();
	}
	
	public function login() {
		if($this->session->userdata('_user_id')!=''){redirect('welcome/home');}
		$this->load->model('CommonModel');
		$data['page_name'] = "user/login";
		$data['menu'] = "login";
		$data['title'] = SITE_TITLE." :: Login";
		$this->load->view('layouts/simple_layout', $data);
	}
	
	public function getpassword() {
		$this->load->model('CommonModel');
		$data['page_name'] = "user/getpassword";
		$data['menu'] = "getpassword";
		$data['title'] = SITE_TITLE." :: Retrive Password";
		$this->load->view('layouts/simple_layout', $data);
	}	

	public function offers() {
		
		if($this->input->post('offer_filter')=='1') {
			$selectedOffer = array('offer_id' => $this->input->post('offer_categories'));
			$selectedCity = array('offer_city' => $this->input->post('offer_city'));
			$this->session->set_userdata($selectedOffer);
			$this->session->set_userdata($selectedCity);
			//echo $this->session->userdata('offer_city');
		}
		$this->load->library('pagination');		
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;	
		$config['uri_segment'] 		= 3;
		$config['num_links']		= 3;
		$config['per_page'] 		= 6;
		$config['base_url'] 		= base_url().'user/offers/';
		$config['use_page_numbers'] = TRUE;
        $config['cur_tag_open'] 	= "<li><span><b>";
        $config['cur_tag_close'] 	= "</b></span></li>";
		$config['full_tag_open'] 	= '<ul>';
		$config['full_tag_close'] 	= '</ul>';
		$config['num_tag_open'] 	= '<li>';
		$config['num_tag_close'] 	= '</li>';
		$config['first_link'] 		= 'First';
		$config['last_link'] 		= 'Last';
		$config['prev_link'] 		= 'Prev';
		$config['next_link'] 		= 'Next';
		$config['first_tag_open'] 	= $config['last_tag_open'] = $config['next_tag_open'] = $config['prev_tag_open'] = '<li>';
        $config['first_tag_close'] 	= $config['last_tag_close'] = $config['next_tag_close'] = $config['prev_tag_close'] = '</li>';
		
		$data['page_name'] = "user/offers";
		$data['menu'] = "offers";
		$data['offer_categories'] 	= $this->AdminModel->get_offer_types();
		$data['recent_rides'] 		= $this->RideModel->get_recent_rides();
		$data['recent_joinees'] 	= $this->UserModel->get_recent_joinees();
		$data['cities_list'] 		= $this->CommonModel->cities_list('Agra');		
		$data['title'] 				= SITE_TITLE." :: Available Offers";
		
		//echo $config["per_page"].'-'.$page;
		if($page!=0) {$start = ($page*6)-6;}else{$start = 0;}
		
		$data['offers_list'] 	= $this->AdminModel->get_offers_posted($config["per_page"], $start);
		$config['total_rows'] 	= $this->AdminModel->get_total_offers();	
		$this->pagination->initialize($config); 
		
		$data['pagelink'] = $this->pagination->create_links();

		$this->load->view('layouts/simple_layout', $data);
	}

	public function discounts() {
		
		if($this->input->post('discount_filter')=='1') {
			$selectedDiscount = array('discount_type' => $this->input->post('discount_type'));
			$selectedCity = array('discount_city' => $this->input->post('discount_city'));
			$this->session->set_userdata($selectedDiscount);
			$this->session->set_userdata($selectedCity);
		}
		$this->load->library('pagination');		
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;	
		$config['uri_segment'] 		= 3;
		$config['num_links']		= 3;
		$config['per_page'] 		= 6;
		$config['base_url'] 		= base_url().'user/discounts/';
		$config['use_page_numbers'] = TRUE;
        $config['cur_tag_open'] 	= "<li><span><b>";
        $config['cur_tag_close'] 	= "</b></span></li>";
		$config['full_tag_open'] 	= '<ul>';
		$config['full_tag_close'] 	= '</ul>';
		$config['num_tag_open'] 	= '<li>';
		$config['num_tag_close'] 	= '</li>';
		$config['first_link'] 		= 'First';
		$config['last_link'] 		= 'Last';
		$config['prev_link'] 		= 'Prev';
		$config['next_link'] 		= 'Next';
		$config['first_tag_open'] 	= $config['last_tag_open'] = $config['next_tag_open'] = $config['prev_tag_open'] = '<li>';
        $config['first_tag_close'] 	= $config['last_tag_close'] = $config['next_tag_close'] = $config['prev_tag_close'] = '</li>';
		
		$data['page_name'] = "user/discounts";
		$data['menu'] = "discounts";
		$data['cities_list'] 		= $this->CommonModel->cities_list('Agra');		
		$data['title'] 				= SITE_TITLE." :: Available Discounts";
		
		if($page!=0) {$start = ($page*6)-6;}else{$start = 0;}
		
		$data['discounts_list'] = $this->AdminModel->get_discounts_posted($config["per_page"], $start);
		$config['total_rows'] 	= $this->AdminModel->get_total_discounts();	
		$this->pagination->initialize($config); 
		
		$data['pagelink'] = $this->pagination->create_links();

		$this->load->view('layouts/simple_layout', $data);
	}	
	
	public function viewoffer() {
		$offer_id = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		if($offer_id==0){
			$this->session->set_flashdata('flash_message', 'Invalid Request!');
			redirect('user/offers');
		}
		$data['page_name'] = "user/viewoffer";
		$data['menu'] = "viewoffer";
		$details = $this->AdminModel->get_this_offer($offer_id);
		$data['offer_details'] = $details[0];
		$data['title'] = SITE_TITLE." :: View Offer Details";
		$this->load->view('layouts/simple_layout', $data);
	}
	
	public function viewdiscount() {
		$discount_id = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		if($discount_id==0){
			$this->session->set_flashdata('flash_message', 'Invalid Request!');
			redirect('user/discounts');
		}
		$data['page_name'] = "user/viewdiscount";
		$data['menu'] = "viewdiscount";
		$details = $this->AdminModel->get_this_discount($discount_id);
		$data['discount_details'] = $details[0];
		$data['title'] = SITE_TITLE." :: View Discount Details";
		$this->load->view('layouts/simple_layout', $data);
	}	
	
	public function register($param=NULL) {
		$this->load->model('CommonModel');
		$data['page_name'] = "user/register";		
		$data['states_list'] = $this->CommonModel->states_list();			
		$data['cities_list'] = $this->CommonModel->cities_list('Agra');
		$data['recent_rides'] = $this->RideModel->get_recent_rides();
		$data['recent_joinees'] = $this->UserModel->get_recent_joinees();
		$data['menu'] = "register";
		$data['title'] = SITE_TITLE." :: Registration";
		$data['param'] = $param==NULL ?'':$param;
		$this->load->view('layouts/simple_layout', $data);
	}

	public function activate() {
		$this->load->helper('common');
		$string = ($this->uri->segment(3))? $this->uri->segment(3) : 0;	
		$actual_data = decryptData($string);
		//print_r($actual_data);exit;
		$isDone = $this->UserModel->activate_user($actual_data);
		if($isDone) {
			$this->session->set_flashdata('flash_message', 'Your Account is activated successfully!');
			redirect('user/login');
		}else {
			$this->session->set_flashdata('flash_message', 'Invalid Request!');
			redirect('user/login');
		}
	}
	
	public function process_signup() {
		
		if($this->input->post('doSignup')=='Submit') {
			$posted_data['pro_user_type'] 		= 2;// Commuters
			$posted_data['pro_user_full_name'] 	= $this->input->post('full_name');
			$posted_data['pro_user_gender'] 	= $this->input->post('gender');
			$posted_data['pro_user_email'] 		= $this->input->post('email_address');
			$domainAddress 						= explode("@",$this->input->post('email_address'));
			$posted_data['pro_user_domain'] 	= $domainAddress[1];
			$posted_data['pro_user_password'] 	= $this->input->post('password_text');
			$posted_data['pro_user_phone']	 	= $this->input->post('phone_number');
			$posted_data['pro_user_address'] 	= $this->input->post('address');
			$posted_data['pro_user_state'] 		= $this->input->post('state');
			$posted_data['pro_user_city'] 		= $this->input->post('city');
			$posted_data['pro_user_zipcode'] 	= $this->input->post('zipcode');
			$posted_data['pro_user_ip'] 		= $_SERVER['REMOTE_ADDR'];
			$posted_data['pro_user_latitude'] 	= '';
			$posted_data['pro_user_longitude'] 	= time();
			$posted_data['pro_user_joined'] 	= time();
			$posted_data['pro_user_updated'] 	= time();
			$posted_data['pro_user_status'] 	= '0';
			
			$isExists = $this->UserModel->isUserExists(trim($this->input->post('email_address')));
			
			if($isExists) {
				$this->session->set_flashdata('data_restore', $posted_data);
				$this->session->set_flashdata('flash_message', 'Email ID is already Exists!');
				redirect('user/register');
			}else {
				$isValidID = $this->UserModel->insertSingup($posted_data);
			}			
			
			if($isValidID>0) {
				// Sending Email Activation Link
				
				$this->load->helper('common');
				$activation_link = base_url().'user/activate/';
				$activation_link.= encryptData(array('email'=>$this->input->post('email_address'),'id'=>$isValidID));
				$mconfig['protocol'] = 'mail';
				$mconfig['wordwrap'] = FALSE;
				$mconfig['mailtype'] = 'html';
				$mconfig['charset'] = 'utf-8';
				$mconfig['crlf'] = "\r\n";
				$mconfig['newline'] = "\r\n";
				$this->load->library('email',$mconfig);

				$this->email->from('murugesanme@yahoo.com', 'Murugesan P');
				//$this->email->to('murugdev.eee@gmail.com');
				$this->email->to($this->input->post('email_address'));

				$this->email->subject('Commute Easy: Registration Email Activation');

				$email_data['HelloTo'] 			= $posted_data['pro_user_full_name'];

				$email_data['activateLink'] 	= $activation_link;
				$email_data['userName'] 		= $this->input->post('email_address');
				$email_data['passWord'] 		= $this->input->post('password_text');
				$email_data['url'] 				= base_url();
				
				$email_template = $this->load->view('templates/signup_email_template', $email_data, true);				
				
				if($this->config->item('is_email_enabled')) {
					$this->email->message($email_template);
					$this->email->send();				
				}				
				
				$this->session->set_flashdata('flash_message', 'Successfully Registered !');
				$this->session->set_flashdata('flash_url', base_url().'user/login');
				redirect('user/thanks');
			} else {
				$this->session->set_flashdata('data_restore', $posted_data);
				$this->session->set_flashdata('flash_message', 'Please enter all the details');
				redirect('user/register/error/1');
			}
		}else{
			$this->session->set_flashdata('flash_message', 'Please enter all the details');
			redirect('user/register/error/1');
		}
	}
	
	public function get_cities(){
		$this->load->model('CommonModel');
		$cities_list = $this->CommonModel->state_wise_cities($this->input->post('state_name'));
		$resulted_array['values'] = $cities_list;
		echo json_encode($cities_list);
		exit;
	}
	
	public function process_login() {
		$username 	= $this->input->post('user_name');
		$password 	= $this->input->post('pass_word');
		$output     = $this->UserModel->is_valid_login($username,$password);
		//print_r($output);exit;
		if($output!=''){
			if($output->pro_user_id>0){
				$newsessdata = array(
								   '_user_id'  	=> $output->pro_user_id,
								   '_user_type' => $output->pro_user_type,
								   '_user_name' => $output->pro_user_full_name
							   );
				$this->session->set_userdata($newsessdata);
				echo 'success';
			}else{
				echo 'failed';
			}
		}else{echo 'failed';}
		exit;
	}
	
	public function isEmailAvailable(){
		$email 	= $this->input->post('email');
		$exists = $this->UserModel->isUserExists($email);
		if($exists){
			echo 'failed';
		}else{
			echo 'success';
		}
		exit;
	}
	
	public function retrivepassword() {
		$username 	= $this->input->post('user_name');
		$output     = $this->UserModel->is_valid_user($username);
		if($output!=''){
			if($output->pro_user_id>0){
				$newsessdata = array(
								   '_user_id'  	=> $output->pro_user_id,
								   '_user_name' => $output->pro_user_full_name
							   );
				$this->session->set_userdata($newsessdata);
				echo 'success';
			}else{
				echo 'failed';
			}
		}else{echo 'failed';}
		exit;
	}	
	
	public function logout() {
		$newsessdata = array('_user_id' => '', '_user_type' => '', '_user_name' => '');
		$this->session->unset_userdata($newsessdata); // Clearing the session values
		$this->session->set_flashdata('flash_message', 'Successfully Logged out !..');
		redirect('user/login');
	}
	
	public function thanks() {
		$data['page_name'] = "user/thanks";
		$data['menu'] = "thanks";
		$data['title'] = SITE_TITLE." :: Thanks";
		$this->load->view('layouts/simple_layout', $data);
	}

	public function settings() {
		if($this->session->userdata('_user_id')==''){redirect('user/login');}
		$data['page_name'] = "user/settings";		
		$data['states_list'] = $this->CommonModel->states_list();			
		$data['cities_list'] = $this->CommonModel->cities_list('Agra');
		//$data['time_slots']  = $this->CommonModel->get_time_slot();
		$data['recent_rides'] = $this->RideModel->get_recent_rides();
		$data['recent_joinees'] = $this->UserModel->get_recent_joinees();		
		$data['ip_list'] = $this->UserModel->get_enabled_ips();
		$returned = $this->UserModel->get_user_settings();
		$data['user_settings'] = $returned[0];
		$data['menu'] = "settings";
		$data['title'] = SITE_TITLE." :: Global Settings";
		$this->load->view('layouts/layout', $data);
	}
	
	public function update_settings() {
		if($this->session->userdata('_user_id')==''){redirect('user/login');}
		if($this->input->post('doUpdate')=='Update') {
			$posted_data['pro_user_domain'] 	= $this->input->post('email_domain');
			$posted_data['pro_user_phone']	 	= $this->input->post('phone_number');
			$posted_data['pro_user_address'] 	= $this->input->post('address');
			$posted_data['pro_user_state'] 		= $this->input->post('state');
			$posted_data['pro_user_city'] 		= $this->input->post('city');
			$posted_data['pro_user_zipcode'] 	= $this->input->post('zipcode');
			$isDone = $this->UserModel->updateUserSettings($posted_data);
			if($isDone){
				$this->session->set_flashdata('flash_message', 'Settings are updated successfully!');
			}else{
				$this->session->set_flashdata('flash_message', 'Error on Updating Settings!');
			}
			redirect('user/settings');
		}else {
			$this->session->set_flashdata('flash_message', 'Invalid Request!');
			redirect('user/settings');
		}
	}
	public function process_addipaddress() {
		
		if($this->input->post('addIP')=='Add') {
			$posted_data['ip_address'] 	= $this->input->post('ip_address');
			$posted_data['ip_added_by'] = $this->session->userdata('_user_id');
			$posted_data['ip_added_on'] = time();
			$isDone = $this->UserModel->insertIPAddress($posted_data);
			if($isDone){
				$this->session->set_flashdata('flash_message', 'IP Address Added Successfully!');
			}else{
				$this->session->set_flashdata('flash_message', 'Error on Adding IP Address!');
			}
			redirect('user/settings');
		}
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */