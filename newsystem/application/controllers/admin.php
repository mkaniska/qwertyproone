<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        
        parent::__construct();
        $this->load->model('RideModel'); 
        $this->load->model('UserModel'); 
        $this->load->model('CommonModel'); 
    }

	public function index() {
		redirect('admin/home');
	}	

	public function home() {
		if($this->session->userdata('admin_user_id')==''){redirect('admin/login');}
		$data['page_name'] = "admin/home";
		$data['menu'] = "home";
		$data['title'] = SITE_TITLE." :: Dashboard";
		$this->load->view('admin_layout', $data);
	}
	
	public function login() {
		if($this->session->userdata('admin_user_id')!=''){redirect('admin/home');}
		$this->load->model('CommonModel');
		$data['page_name'] = "admin/login";
		$data['menu'] = "login";
		$data['title'] = SITE_TITLE." :: Login";
		$this->load->view('admin_layout', $data);
	}
	
	public function getpassword() {
		$this->load->model('CommonModel');
		$data['page_name'] = "admin/getpassword";
		$data['menu'] = "getpassword";
		$data['title'] = SITE_TITLE." :: Retrive Password";
		$this->load->view('admin_layout', $data);
	}
	
	public function process_login() {
	
		if($this->input->post('submitlogin')=='Login') {
			$username 	= $this->input->post('user_name');
			$password 	= $this->input->post('pass_word');
			$output     = $this->UserModel->is_valid_login($username, $password, 1);
			if($output!=''){
				if($output->pro_user_id>0){
					$newsessdata = array(
									   'admin_user_id'   => $output->pro_user_id,
									   'admin_user_name' => $output->pro_user_full_name
								   );
					$this->session->set_userdata($newsessdata);
					redirect('admin/home');
				}else{
					$this->session->set_flashdata('flash_message', 'Invalid Login Details Entered!');
					redirect('admin/login');
				}
			}else{
				$this->session->set_flashdata('flash_message', 'Invalid Login Details Entered!');
				redirect('admin/login');
			}
		}else{
				$this->session->set_flashdata('flash_message', 'Invalid Request!');
				redirect('admin/login');
		}
	}
	
	public function retrivepassword() {
		$username 	= $this->input->post('user_name');
		$output     = $this->UserModel->is_valid_user($username);
		if($output!=''){
			if($output->pro_user_id>0){
				$newsessdata = array(
								   'admin_user_id'   => $output->pro_user_id,
								   'admin_user_name' => $output->pro_user_full_name
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
		$newsessdata = array('admin_user_id' => '', 'admin_user_name' => '');
		$this->session->unset_userdata($newsessdata);
		$this->session->set_flashdata('flash_message', 'Successfully Logged out !..');
		redirect('admin/login');
	}
	
	public function ride_list() {
		if($this->session->userdata('admin_user_id')==''){redirect('admin/login');}
		$this->load->library('pagination');		
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;	
		$config['uri_segment'] 		= 3;
		$config['num_links']		= 3;
		$config['per_page'] 		= 3;
		$config['base_url'] 		= base_url().'admin/ride_list/';
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

		$config['total_rows'] 		= $this->RideModel->get_total_rides(false);
		
		$data['page_name'] = "admin/ride_list";
		$data['menu'] = "ride_list";		
		$data['ride_list'] = $this->RideModel->get_rides_posted($config["per_page"], $page, false);
		$data['title'] = SITE_TITLE." :: List of Rides";
		
		//$config['page_query_string'] = TRUE;
		
		$this->pagination->initialize($config); 
		$data['pagelink'] = $this->pagination->create_links();
		
		$this->load->view('admin_layout', $data);
	}
	
	public function user_list() {
		if($this->session->userdata('admin_user_id')==''){redirect('admin/login');}
		$this->load->library('pagination');		
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;	
		$config['uri_segment'] 		= 3;
		$config['num_links']		= 3;
		$config['per_page'] 		= 3;
		$config['base_url'] 		= base_url().'admin/user_list/';
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

		$config['total_rows'] 		= $this->UserModel->get_total_users();
		
		$data['page_name'] = "admin/user_list";
		$data['menu'] = "user_list";		
		$data['user_list'] = $this->UserModel->get_users_registered($config["per_page"], $page);
		$data['title'] = SITE_TITLE." :: List of Users";
		
		//$config['page_query_string'] = TRUE;
		
		$this->pagination->initialize($config); 
		$data['pagelink'] = $this->pagination->create_links();
		
		$this->load->view('admin_layout', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */