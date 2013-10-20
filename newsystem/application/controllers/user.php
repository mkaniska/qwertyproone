<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        
        parent::__construct();

        /* Load libraries */
        //$this->load->library('PHPMailer');

        /* Load helpers */
        //$this->load->helper('captcha');
        
        /* Load helpers */
        $this->load->model('UserModel'); 
    }

	public function index()
	{		 
		redirect('welcome/home');
	}	
	
	public function login() {
		$this->load->model('CommonModel');
		$data['page_name'] = "user/login";
		$data['menu'] = "login";
		$data['title'] = SITE_TITLE." :: Login";
		$this->load->view('simple_layout', $data);
	}
	
	public function getpassword() {
		$this->load->model('CommonModel');
		$data['page_name'] = "user/getpassword";
		$data['menu'] = "getpassword";
		$data['title'] = SITE_TITLE." :: Retrive Password";
		$this->load->view('simple_layout', $data);
	}	
	
	public function register($param=NULL) {
		$this->load->model('CommonModel');
		$data['page_name'] = "user/register";		
		$data['states_list'] = $this->CommonModel->states_list();			
		$data['cities_list'] = $this->CommonModel->cities_list('Tamil Nadu');
		$data['menu'] = "register";
		$data['title'] = SITE_TITLE." :: Registration";
		$data['param'] = $param==NULL ?'':$param;
		$this->load->view('layout', $data);
	}

	public function process_signup() {
		
		if($this->input->post('doSignup')=='Submit') {
			$posted_data['pro_user_type'] 		= 2;// Commuters
			$posted_data['pro_user_full_name'] 	= $this->input->post('full_name');
			$posted_data['pro_user_gender'] 	= $this->input->post('gender');
			$posted_data['pro_user_email'] 		= $this->input->post('email_address');
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
			$isValidID = $this->UserModel->insertSingup($posted_data);
			if($isValidID>0) {
				// Sending Email Activation Link
				$this->load->library('email');

				$this->email->from('murugesanme@yahoo.com', 'Murugesan P');
				$this->email->to('murugdev.eee@gmail.com');

				$this->email->subject('Commute Easy: Registration Email Activation');
				/*
				$this->email->message('Testing the email class.');
				$this->email->send();
				*/
				$this->session->set_flashdata('flash_message', 'Successfully Registered !');
				$this->session->set_flashdata('flash_url', base_url().'user/login');
				redirect('user/thanks');
			} else {
				$this->session->set_flashdata('data_back', $posted_data);
				$this->session->set_flashdata('flash_message', 'Please enter all the details');
				redirect('user/signup/error/1');
			}
		}else{
			$this->session->set_flashdata('flash_message', 'Please enter all the details');
			redirect('user/signup/error/1');
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
	
	public function retrivepassword() {
		$username 	= $this->input->post('user_name');
		$output     = $this->UserModel->is_valid_user($username);
		//print_r($output);exit;
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
		$newsessdata = array('_user_id'  	=> '', '_user_name' => '');
		$this->session->unset_userdata($newsessdata); // Clearing the session values
		$this->session->set_flashdata('flash_message', 'Successfully Logged out !..');
		redirect('user/login');
	}
	
	public function thanks() {
		$data['page_name'] = "user/thanks";
		$data['menu'] = "thanks";
		$data['title'] = SITE_TITLE." :: Thanks";
		//$this->session->set_flashdata('flash_message', '<p style="text-align:center;">Successfully Registered ! </p> You will receive the email for verification & please confirm that to activate your account!.');
		//$this->session->set_flashdata('flash_url', base_url().'user/login');
		$this->load->view('simple_layout', $data);
	}	
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */