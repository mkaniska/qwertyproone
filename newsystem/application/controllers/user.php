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
	
	public function register($param=NULL) {
		$this->load->model('CommonModel');
		$data['page_name'] = "user/register";		
		$data['states_list'] = $this->CommonModel->states_list();			
		$data['cities_list'] = $this->CommonModel->cities_list('Tamil Nadu');
		$data['menu'] = "register";
		$data['param'] = $param==NULL ?'':$param;
		$this->load->view('layout', $data);
	}

	public function process_signup(){
		
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
			$this->email->message('Testing the email class.');

			$this->email->send();
			$this->session->set_flashdata('flash_message', 'Successfully Registered !');
			redirect('user/thanks');
		} else {
			$this->session->set_flashdata('data_back', $posted_data);
			$this->session->set_flashdata('flash_message', 'Please enter all the details');
			redirect('user/signup/error/1');
		}
	}

	public function welcome() {
		$data['page_name'] = "user/welcome";
		$data['menu'] = "home";		
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
		$username 	= $this->input->post('username');
		$password 	= $this->input->post('password');
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
	
	public function logout() {
		$newsessdata = array('_user_id'  	=> '', '_user_name' => '');
		$this->session->unset_userdata($newsessdata); // Clearing the session values
		redirect('welcome/home');
	}
	
	public function thanks() {
		$data['page_name'] = "user/thanks";
		$data['menu'] = "thanks";		
		$this->load->view('layout', $data);
	}	
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */