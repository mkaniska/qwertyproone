<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        
        parent::__construct();
        $this->load->model('RideModel'); 
        $this->load->model('UserModel'); 
        $this->load->model('CommonModel'); 
        $this->load->model('AdminModel'); 
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
		$this->load->view('admin_login_layout', $data);
	}
	
	public function settings() {
		$this->load->model('CommonModel');
		$data['page_name'] = "admin/settings";
		$rows = $this->AdminModel->get_setting();
		$data['setting'] = $rows[0];
		$data['menu'] = "settings";
		$data['title'] = SITE_TITLE." :: Global Settings";
		$this->load->view('admin_layout', $data);
	}

	public function edit_offer() {
		$this->load->model('CommonModel');
		$data['page_name'] = "admin/edit_offer";
		$offer_id = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$rows = $this->AdminModel->get_this_offer($offer_id);
		$data['offer_types'] = $this->AdminModel->get_offer_types();
		$data['offer'] = $rows[0];
		$data['menu'] = "edit_offer";
		$data['title'] = SITE_TITLE." :: Edit Offer";
		$this->load->view('admin_layout', $data);
	}

	public function delete_offer() {
		$offer_id = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$isDeleted = $this->AdminModel->deleteOffer($offer_id);
		if($isDeleted) {
			$this->session->set_flashdata('flash_message', 'Offer Deleted Successfully!');
		}else {
			$this->session->set_flashdata('flash_message', 'Error on Deleting Offer!');
		}
		redirect('admin/offer_list');
	}
	
	public function assign_company() {
	
		if($this->session->userdata('admin_user_id')==''){redirect('admin/login');}
		if($this->input->post('editOffer')=='Update') {
			$inp_data['offer_title'] = $this->input->post('selectedCompanies');
			$inp_data['offer_type'] = $this->input->post('selectedOffer');
			$isUpdated = $this->AdminModel->assignCompanyOffer($inp_data, $offer_id);
		}
	}
	
	public function prcess_updateoffer() {
	
		if($this->session->userdata('admin_user_id')==''){redirect('admin/login');}
		$offer_id = $this->input->post('offer_id');
		if($this->input->post('editOffer')=='Update') {
			
			$inp_data['offer_title'] 		= $this->input->post('offer_title');
			$inp_data['offer_type'] 		= $this->input->post('offer_type');
			$fDates							= explode("/",$this->input->post('valid_from'));
			$tDates							= explode("/",$this->input->post('valid_to'));
			$inp_data['offer_valid_from'] 	= strtotime($fDates[2].'-'.$fDates[1].'-'.$fDates[0]);
			$inp_data['offer_valid_until']	= strtotime($tDates[2].'-'.$tDates[1].'-'.$tDates[0]);
			$inp_data['offer_notes']		= $this->input->post('notes');
			$inp_data['offer_created_by'] 	= $this->session->userdata('admin_user_id');
			$inp_data['offer_status'] 		= $this->input->post('status');
			$inp_data['offer_modified_on'] 	= time();
			
			$isUpdated = $this->AdminModel->updateOffer($inp_data, $offer_id);
			
			if($isUpdated) {
				$this->session->set_flashdata('flash_message', 'Offer Updated Successfully!');
				redirect('admin/offer_list');
			}else {
				$this->session->set_flashdata('flash_message', 'Invalid Details Entered!');
				//$this->session->set_flashdata('flash_data', $inp_data);
				redirect('admin/edit_offer/'.$offer_id);
			}
		}else {
			$this->session->set_flashdata('flash_message', 'Invalid Request!');
			redirect('admin/edit_offer/'.$offer_id);
		}
	}
	
	public function update_setting() {
	
		if($this->session->userdata('admin_user_id')==''){redirect('admin/login');}
		
		if($this->input->post('updateSetting')=='Update') {
			
			$inp_data['from_email'] 		= $this->input->post('from_email');
			$inp_data['contact_phone'] 		= $this->input->post('contact_phone');
			$inp_data['contact_person']		= $this->input->post('contact_person');
			$inp_data['contact_email'] 		= $this->input->post('contact_email');
			$inp_data['office_phone'] 		= $this->input->post('office_phone');
			$inp_data['email_enabled'] 		= $this->input->post('email_enabled');
			$inp_data['last_modified'] 		= time();
			
			$isUpdated = $this->AdminModel->updateSettings($inp_data);
			
			if($isUpdated>0) {
				$this->session->set_flashdata('flash_message', 'Settings Updated Successfully!');
				redirect('admin/settings');
			}else {
				$this->session->set_flashdata('flash_message', 'Invalid Details Entered!');
				$this->session->set_flashdata('flash_data', $inp_data);
				redirect('admin/settings');
			}
		}else {
			$this->session->set_flashdata('flash_message', 'Invalid Request!');
			redirect('admin/settings');
		}
	}
	
	public function addoffer() {
		$this->load->model('CommonModel');
		$data['page_name'] = "admin/addoffer";
		$data['offer_types'] = $this->AdminModel->get_offer_types();
		$data['menu'] = "addoffer";
		$data['title'] = SITE_TITLE." :: Add Offer";
		$this->load->view('admin_layout', $data);
	}

	public function prcess_addoffer() {
	
		if($this->session->userdata('admin_user_id')==''){redirect('admin/login');}
		
		if($this->input->post('addOffer')=='Submit') {
			
			$inp_data['offer_title'] 		= $this->input->post('offer_title');
			$inp_data['offer_type'] 		= $this->input->post('offer_type');
			$fDates							= explode("/",$this->input->post('valid_from'));
			$tDates							= explode("/",$this->input->post('valid_to'));
			$inp_data['offer_valid_from'] 	= strtotime($fDates[2].'-'.$fDates[1].'-'.$fDates[0]);
			$inp_data['offer_valid_until']	= strtotime($tDates[2].'-'.$tDates[1].'-'.$tDates[0]);
			$inp_data['offer_notes']		= $this->input->post('notes');
			$inp_data['offer_created_by'] 	= $this->session->userdata('admin_user_id');
			$inp_data['offer_status'] 		= $this->input->post('status');
			$inp_data['offer_created_on'] 	= time();
			
			$isValidOfferID = $this->AdminModel->insertOffer($inp_data);
			
			if($isValidOfferID>0) {
				$this->session->set_flashdata('flash_message', 'Offer Added Successfully!');
				redirect('admin/offer_list');
			}else {
				$this->session->set_flashdata('flash_message', 'Invalid Details Entered!');
				$this->session->set_flashdata('flash_data', $inp_data);
				redirect('admin/addoffer');
			}
		}else {
			$this->session->set_flashdata('flash_message', 'Invalid Request!');
			redirect('admin/addoffer');
		}
	}
	
	public function addcompany() {
		$this->load->model('CommonModel');
		$data['page_name'] = "admin/addcompany";
		$data['cities_list'] = $this->CommonModel->cities_list('Tamil Nadu');
		$data['state_list'] = $this->CommonModel->states_list();
		$data['company_types'] = $this->AdminModel->get_company_types();
		$data['menu'] = "addcompany";
		$data['title'] = SITE_TITLE." :: Add Company";
		$this->load->view('admin_layout', $data);
	}

	public function prcess_addcompany() {
	
		if($this->session->userdata('admin_user_id')==''){redirect('admin/login');}
		
		if($this->input->post('addCompany')=='Submit') {
			
			$isExist = $this->AdminModel->isCompanyExists(trim($this->input->post('company_name')));
			$inp_data['company_name'] 		= $this->input->post('company_name');
			$inp_data['company_type'] 		= $this->input->post('company_type');
			$inp_data['contact_person'] 	= $this->input->post('contact_person');
			$inp_data['contact_email'] 		= $this->input->post('contact_email');
			$inp_data['company_address']	= $this->input->post('company_address');
			$inp_data['company_city'] 		= $this->input->post('city');
			$inp_data['company_zipcode'] 	= $this->input->post('zipcode');
			$inp_data['company_state'] 		= $this->input->post('state');
			$inp_data['company_phone'] 		= $this->input->post('phone');
			$inp_data['company_status'] 	= $this->input->post('status');	
			
			if($isExist==0){

			$inp_data['company_added'] 		= time();
			
			$isValidCompID = $this->AdminModel->insertCompany($inp_data);
			
			if($isValidCompID>0) {
				$this->session->set_flashdata('flash_message', 'Company Added Successfully!');
				redirect('admin/company_list');
			}else {
				$this->session->set_flashdata('flash_message', 'Invalid Details Entered!');
				redirect('admin/addcompany');
			}
			}else{
				$this->session->set_flashdata('flash_message', 'Company Name Already Exists!');
				$this->session->set_flashdata('flash_data', $inp_data);
				redirect('admin/addcompany');
			}
		}else {
			$this->session->set_flashdata('flash_message', 'Invalid Request!');
			redirect('admin/addcompany');
		}
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
			$password 	= $this->input->post('password_value');
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
		}else {
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
		$config['per_page'] 		= 5;
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
		
		$data['total']     = $config['total_rows'];
		$data['page_name'] = "admin/ride_list";
		$data['menu'] = "ride_list";		
		$data['ride_list'] = $this->RideModel->get_rides_posted($config["per_page"], $page, false, true);
		$data['title'] = SITE_TITLE." :: List of Rides";
		
		//$config['page_query_string'] = TRUE;
		
		$this->pagination->initialize($config); 
		$data['pagelink'] = $this->pagination->create_links();
		
		$this->load->view('admin_layout', $data);
	}

	
	public function type_list() {
	
		if($this->session->userdata('admin_user_id')==''){redirect('admin/login');}
		$this->load->library('pagination');		
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;	
		$config['uri_segment'] 		= 3;
		$config['num_links']		= 3;
		$config['per_page'] 		= 15;
		$config['base_url'] 		= base_url().'admin/type_list/';
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

		$config['total_rows'] 		= $this->AdminModel->get_total_company_types();
		
		$data['total']     = $config['total_rows'];
		$data['page_name'] = "admin/type_list";
		$data['menu'] = "type_list";		
		$data['type_list'] = $this->AdminModel->list_company_types($config["per_page"], $page);
		$data['title'] = SITE_TITLE." :: List of Industry Types";
		
		$this->pagination->initialize($config); 
		$data['pagelink'] = $this->pagination->create_links();
		
		$this->load->view('admin_layout', $data);
	}

	public function offer_list() {
		if($this->session->userdata('admin_user_id')==''){redirect('admin/login');}
		$this->load->library('pagination');		
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;	
		$config['uri_segment'] 		= 3;
		$config['num_links']		= 3;
		$config['per_page'] 		= 5;
		$config['base_url'] 		= base_url().'admin/offer_list/';
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

		$config['total_rows'] 		= $this->AdminModel->get_total_offers();
		
		$data['total']     = $config['total_rows'];
		$data['page_name'] = "admin/offer_list";
		$data['menu'] = "offer_list";		
		$data['offer_list'] = $this->AdminModel->get_offers($config["per_page"], $page);
		$data['title'] = SITE_TITLE." :: List of Offers";
		
		$data['company_list'] = $this->AdminModel->get_companies(1, 1, false);
		
		$this->pagination->initialize($config); 
		$data['pagelink'] = $this->pagination->create_links();
		
		$this->load->view('admin_layout', $data);
	}
	
	public function company_list() {
		if($this->session->userdata('admin_user_id')==''){redirect('admin/login');}
		$this->load->library('pagination');		
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;	
		$config['uri_segment'] 		= 3;
		$config['num_links']		= 3;
		$config['per_page'] 		= 5;
		$config['base_url'] 		= base_url().'admin/company_list/';
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

		$config['total_rows'] 		= $this->AdminModel->get_total_companies();
		
		$data['total']     = $config['total_rows'];
		$data['page_name'] = "admin/company_list";
		$data['menu'] = "company_list";		
		$data['company_list'] = $this->AdminModel->get_companies($config["per_page"], $page);
		$data['title'] = SITE_TITLE." :: List of Companies";
		
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
		$config['per_page'] 		= 5;
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
		
		$data['total']     = $config['total_rows'];
		$data['page_name'] = "admin/user_list";
		$data['menu'] = "user_list";		
		$data['user_list'] = $this->UserModel->get_users_registered($config["per_page"], $page);
		$data['title'] = SITE_TITLE." :: List of Users";
		
		$this->pagination->initialize($config); 
		$data['pagelink'] = $this->pagination->create_links();
		
		$this->load->view('admin_layout', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */