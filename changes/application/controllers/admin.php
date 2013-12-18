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

	public function fileuploadtest(){
		if($this->input->post('doupload')=='Upload'){
			
			/*
			// File uploading here
			$fconfig['upload_path'] = '../offer_pictures/';
			$fconfig['allowed_types'] = 'gif|jpg|png|GIF|JPG|JPEG|PNG';
			$fconfig['max_size']	= '1000';
			$fconfig['max_width']  = '1024';
			$fconfig['max_height']  = '1024';
			$fconfig['remove_spaces']  = TRUE;
            $fconfig['upload_url'] = base_url()."offer_pictures/";			
			$ext = end(explode('.', $_FILES['userfile']['name']));
			//$findExt = explode(basename($this->input->post('userfile')));
			//$filename = 'mypic.gif';
			//$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$fconfig['file_name']  = time().'.'.$ext;
			$this->load->library('upload', $fconfig);
			if ( ! $this->upload->do_upload()){
				echo 'Error';
			} else{
				echo 'Success';
			}			
			*/
			//$this->load->helper(array('form', 'url'));
            $fconfig = array();
            $fconfig['upload_path'] = "./offer_pictures/";
            $fconfig['allowed_types'] = 'gif|jpg|png|JPG|JPEG|PNG|GIF';
            $fconfig['max_size'] = '5000';
            $fconfig['max_width'] = '3024';
            $fconfig['max_height'] = '3024';
            $fconfig['max_filename'] = '2000';
            $fconfig['file_name'] = 'x.jpg';

            $this->load->library('upload',$fconfig);
			$this->upload->initialize($fconfig);
            if ($this->upload->do_upload()) {
                print_r($this->upload->data());
            } else {
                echo $datas['error'] = $this->upload->display_errors();                
            }
		}
		
		$data['page_name'] = "admin/testupload";
		$data['menu'] = "home";
		$data['title'] = SITE_ADMIN_TITLE." :: Dashboard";		
		$this->load->view('layouts/admin_layout', $data);
	}
	
	public function home() {
		if($this->session->userdata('admin_user_id')==''){redirect('admin/login');}
		$data['page_name'] = "admin/home";
		$data['menu'] = "home";
		$data['title'] = SITE_ADMIN_TITLE." :: Dashboard";
		$this->load->view('layouts/admin_layout', $data);
	}

	public function login() {
		if($this->session->userdata('admin_user_id')!=''){redirect('admin/home');}
		$this->load->model('CommonModel');
		$data['page_name'] = "admin/login";
		$data['menu'] = "login";
		$data['title'] = SITE_ADMIN_TITLE." :: Login";
		$this->load->view('layouts/admin_login_layout', $data);
	}
	
	public function settings() {
		$this->load->model('CommonModel');
		$data['page_name'] = "admin/settings";
		$rows = $this->AdminModel->get_setting();
		$data['setting'] = $rows[0];
		$data['menu'] = "settings";
		$data['title'] = SITE_ADMIN_TITLE." :: Global Settings";
		$this->load->view('layouts/admin_layout', $data);
	}

	public function edit_offer() {
		$this->load->model('CommonModel');
		$data['page_name'] = "admin/edit_offer";
		$offer_id = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$rows = $this->AdminModel->get_this_offer($offer_id);
		$data['offer_types'] = $this->AdminModel->get_offer_types();
		$data['offer'] = $rows[0];
		$data['menu'] = "edit_offer";
		$data['title'] = SITE_ADMIN_TITLE." :: Edit Offer";
		$this->load->view('layouts/admin_layout', $data);
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
		if(1) {
			$comp_ids = $inp_data['company_ids'] = $this->input->post('selectedCompanies');
			$offer_id = $inp_data['offer_id'] = $this->input->post('selectedOffer');
			//$isDone = $this->AdminModel->assignCompanyOffer($inp_data, $offer_id);
			$isThere = $this->AdminModel->isThisOfferAssigned($inp_data, $offer_id);
			
			if($isThere) {
				$isDone = $this->AdminModel->updateAssignment($inp_data, $offer_id);
			}else {
			
				$isDone = $this->AdminModel->insertAssignment($inp_data, $offer_id);
				$company_info = $this->AdminModel->getTheseCompanyDetails($comp_ids);
				$offers_info  = $this->AdminModel->get_this_offer($offer_id);

				$mconfig['protocol'] = 'mail';
				$mconfig['wordwrap'] = FALSE;
				$mconfig['mailtype'] = 'html';
				$mconfig['charset'] = 'utf-8';
				$mconfig['crlf'] = "\r\n";
				$mconfig['newline'] = "\r\n";
				$this->load->library('email',$mconfig);

				
				foreach($company_info as $row) {
					$this->email->from('admin@ideasdiary.com', 'Murugesan P');
					$this->email->to($row['contact_email']);
					$this->email->subject('Commute Easy: New Offer Posted!');
					
					$tmp_str ="Offer Title : ".$offers_info['offer_name']." <br />";
					$tmp_str.= "Offer Type : ".$offers_info['OType']." <br />";
					$tmp_str.= "Offer Provider : ".$offers_info['offer_provider']." <br />";
					$tmp_str.= "Offer Provider Address : ".$offers_info['provider_address']." <br />";
					$tmp_str.= "Contact Person : ".$offers_info['contact_person']." <br />";
					$tmp_str.= "Contact Phone Type : ".$offers_info['contact_phone']." <br />";
					$tmp_str.= "Contact Email : ".$offers_info['contact_email']." <br />";
					$tmp_str.= "Minimum Purchase Price : ".$offers_info['minimum_purchase_amount']." <br />";
					$tmp_str.= "Minimum Purchase Quantity : ".$offers_info['minimum_purchase_quantity']." <br />";
					$tmp_str.= "Offer Percentage : ".$offers_info['offer_percentage']." <br />";
					$tmp_str.= "Offer Amount : ".$offers_info['offer_amount']." <br />";
					$tmp_str.= "Offer Type : ".$offers_info['conditions_apply']." <br />";
					$tmp_str.= "Offer Notes : ".$offers_info['offer_notes']." <br />";
					$tmp_str.= "Valid From : ".date("d M 'y",$offers_info['offer_valid_from'])." <br />";
					$tmp_str.= "Valid Upto : ".date("d M 'y",$offers_info['offer_valid_until'])." <br />";
					
					$mail_data['ItemDetails'] = $tmp_str;
					
					$mail_data['HelloTo'] 		= $row['contact_person'];
					
					$mail_template = $this->load->view('templates/new_offer_template', $mail_data, true);
					
					if($this->config->item('is_email_enabled')) {
						$this->email->message($mail_template);
						$this->email->send();				
					}
				}
			}
			
			if($isDone) {
				$this->session->set_flashdata('flash_message', 'Offer Assigned Successfully!');
				redirect('admin/offer_list');
			}else {
				$this->session->set_flashdata('flash_message', 'Error On Offer Assignment!');
				redirect('admin/offer_list');
			}
		}else{
			$this->session->set_flashdata('flash_message', 'Invalid Request!');
			redirect('admin/offer_list');
		}
	}

	public function select_company() {
	
		if($this->session->userdata('admin_user_id')==''){redirect('admin/login');}
		$offer_id = $this->input->post('offer_id');
		$data['company_list']  = $this->AdminModel->get_companies(1, 1, false);
		$assigned = $this->AdminModel->get_companies_assigned($offer_id);
		$data['list_string'] = $assigned;
		$data['assigned_list'] = explode(",", $assigned);
		$data['offer_id'] = $offer_id;
		$data['page_name'] = "admin/ajax_company_list";
		echo $this->load->view('layouts/ajax_layout', $data, true);
		exit;
	}

	public function selected_companies() {
	
		if($this->session->userdata('admin_user_id')==''){redirect('admin/login');}
		$offer_id = $this->input->post('offer_id');
		$data['company_list']  = $this->AdminModel->get_companies(1, 1, false);
		$assigned = $this->AdminModel->get_companies_assigned($offer_id);
		$data['company_list'] = $this->AdminModel->getTheseCompanyDetails($assigned);
		$data['page_name'] = "admin/selected_company_list";
		echo $this->load->view('layouts/ajax_layout', $data, true);
		exit;
	}
	
	public function process_updateoffer() {
	
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
			$inp_data['offer_status'] 		= 1;//$this->input->post('status');
			$inp_data['offer_modified_on'] 	= time();
			
			// File uploading here
			if($_FILES['userfile']['name']!='') {			
				$fconfig['upload_path'] = 'offer_pictures/';
				$fconfig['allowed_types'] = 'gif|jpg|png|GIF|JPG|JPEG|PNG';
				$fconfig['max_size']	= '4000';
				$fconfig['max_width']  = '2024';
				$fconfig['max_height']  = '2024';
				$fconfig['remove_spaces']  = TRUE;            
				$ext = end(explode('.', $_FILES['userfile']['name']));
				$fconfig['file_name']  = time().'.'.$ext;
				
				$this->load->library('upload', $fconfig);
				$this->upload->initialize($fconfig);
				if(!$this->upload->do_upload()) {
					$this->session->set_flashdata('flash_message', 'Invalid Picture Uploaded!');
					$this->session->set_flashdata('flash_data', $inp_data);
					redirect('admin/edit_offer/'.$offer_id);
				} else {
					$inp_data['offer_picture'] = $fconfig['file_name'];
					$upload_data =$this->upload->data();
					$rconfig['image_library'] = 'gd2';
					$rconfig['source_image'] = $upload_data['full_path'];
					$rconfig['create_thumb'] = TRUE;
					$rconfig['maintain_ratio'] = TRUE;
					$rconfig['width'] = 100;
					$rconfig['height'] = 100;
					$rconfig['thumb_marker'] = '_thumb';
					$this->load->library('image_lib', $rconfig);
					$this->image_lib->initialize($rconfig);
					$this->image_lib->resize();
					
					// One More to resize
					
					list($Iwidth, $Iheight, $Itype, $Iattr) = getimagesize($upload_data['full_path']);
					if($Iwidth>464 && $Iheight>260) {
						if($Iwidth>464) { $rconfig['width'] = 464; }else{$rconfig['width'] = $Iwidth;}
						if($Iheight>260) { $rconfig['height'] = 260; }else{$rconfig['width'] = $Iheight;}
						$rconfig['thumb_marker'] = '_normal_thumb';
						$this->image_lib->initialize($rconfig);
						$this->image_lib->resize();
					}else{
						copy($upload_data['full_path'],str_replace(".","_normal_thumb.",$upload_data['full_path']));
					}
				}
			}
			// File upload completed 
			
			$inp_data['offer_provider'] 			= $this->input->post('offer_provider');
			$inp_data['provider_address'] 			= $this->input->post('provider_address');
			$inp_data['contact_person'] 			= $this->input->post('contact_person');
			$inp_data['contact_phone'] 				= $this->input->post('contact_phone');
			$inp_data['contact_email'] 				= $this->input->post('contact_email');
			
			$inp_data['minimum_purchase_amount'] 	= $this->input->post('minimum_purchase_amount');
			$inp_data['minimum_purchase_quantity'] 	= $this->input->post('minimum_purchase_quantity');
			$inp_data['offer_percentage'] 			= $this->input->post('offer_percentage');
			$inp_data['offer_amount'] 				= $this->input->post('offer_amount');
			$inp_data['conditions_apply'] 			= $this->input->post('conditions_apply');
			$temp_details = $this->AdminModel->get_this_offer($offer_id);
			$isUpdated = $this->AdminModel->updateOffer($inp_data, $offer_id);
			
			if($isUpdated) {
				if($_FILES['userfile']['name']!='') {
					unlink('offer_pictures/'.$temp_details[0]->offer_picture);
					unlink('offer_pictures/'.str_replace(".","_thumb.",$temp_details[0]->offer_picture));
					unlink('offer_pictures/'.str_replace(".","_normal_thumb.",$temp_details[0]->offer_picture));
				}
				$this->session->set_flashdata('flash_message', 'Offer Updated Successfully!');
				redirect('admin/offer_list');
			}else {
				$this->session->set_flashdata('flash_message', 'Invalid Details Entered!');
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

	public function newads() {
		$data['page_name'] = "admin/newads";
		$data['offer_types'] = $this->AdminModel->get_offer_types();
		$data['menu'] = "newads";
		$data['title'] = SITE_ADMIN_TITLE." :: Post New Ads";
		$this->load->view('layouts/admin_layout', $data);
	}

	public function process_newads() {
	
		if($this->session->userdata('admin_user_id')==''){redirect('admin/login');}
		
		if($this->input->post('addAds')=='Submit') {
			
			$inp_data['ads_title'] 		= $this->input->post('ads_title');
			$inp_data['ads_status'] 	= $this->input->post('ads_status');
			$inp_data['ads_url'] 		= $this->input->post('ads_url');
			$inp_data['ads_comments']	= $this->input->post('ads_comments');
			$inp_data['ads_posted_on'] 	= time();
			
			// Image uploading here
			$fconfig['upload_path'] = 'ads_images/';
			$fconfig['allowed_types'] = 'gif|jpg|png|GIF|JPG|JPEG|PNG';
			$fconfig['max_size']	= '4000';
			$fconfig['max_width']  = '2024';
			$fconfig['max_height']  = '2024';
			$fconfig['remove_spaces']  = TRUE;            
			$ext = end(explode('.', $_FILES['userfile']['name']));
			$fconfig['file_name']  = time().'.'.$ext;
			
			$this->load->library('upload', $fconfig);
			$this->upload->initialize($fconfig);
			if(!$this->upload->do_upload()) {
				$this->session->set_flashdata('flash_message', 'Invalid Picture Uploaded!');
				$this->session->set_flashdata('flash_data', $inp_data);
				redirect('admin/newads');
			} else {
				$inp_data['ads_image'] = $fconfig['file_name'];
				$upload_data =$this->upload->data();
				$rconfig['image_library'] = 'gd2';
				$rconfig['source_image'] = $upload_data['full_path'];
				$rconfig['create_thumb'] = TRUE;
				$rconfig['maintain_ratio'] = TRUE;
				$rconfig['width'] = 75;
				$rconfig['height'] = 75;
				$rconfig['thumb_marker'] = '_thumb';
				$this->load->library('image_lib', $rconfig);
				$this->image_lib->initialize($rconfig);
				$this->image_lib->resize();
			}
			
			// Image upload completed
			
			$isValidAdsID = $this->AdminModel->insertAds($inp_data);
			
			if($isValidAdsID>0) {
				$this->session->set_flashdata('flash_message', 'Ads Posted Successfully!');
				redirect('admin/ads_list');
			}else {
				$this->session->set_flashdata('flash_message', 'Invalid Details Entered!');
				redirect('admin/newads');
			}
		}else {
			$this->session->set_flashdata('flash_message', 'Invalid Request!');
			redirect('admin/newads');
		}
	}

	public function edit_ads() {
		$data['page_name'] = "admin/edit_ads";
		$ads_id = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$resultSet = $this->AdminModel->get_this_ads($ads_id);
		$rows = $resultSet[0];
		$data['ads_title'] 		= $rows->ads_title;		
		$data['ads_image'] 		= $rows->ads_image;
		$data['ads_url'] 		= $rows->ads_url;
		$data['ads_comments'] 	= $rows->ads_comments;
		$data['ads_status'] 	= $rows->ads_status;
		$data['ads_id'] 		= $ads_id;
		
		$data['menu'] 		= "edit_ads";
		$data['title'] = SITE_ADMIN_TITLE." :: Edit Ads";
		$this->load->view('layouts/admin_layout', $data);
	}	

	public function delete_ads() {
		$ads_id = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$isDeleted = $this->AdminModel->deleteAds($ads_id);
		if($isDeleted) {
			$this->session->set_flashdata('flash_message', 'Ads Deleted Successfully!');
		}else {
			$this->session->set_flashdata('flash_message', 'Error on Deleting Ads!');
		}
		redirect('admin/ads_list');
	}
	
	public function process_updateads() {
	
		if($this->session->userdata('admin_user_id')==''){redirect('admin/login');}
		$ads_id = $this->input->post('id');
		if($this->input->post('updateAds')=='Update') {
			
			$inp_data['ads_title'] 		= $this->input->post('ads_title');
			$inp_data['ads_status'] 	= $this->input->post('ads_status');
			$inp_data['ads_url'] 		= $this->input->post('ads_url');
			$inp_data['ads_comments']	= $this->input->post('ads_comments');
			
			// File uploading here
			if($_FILES['userfile']['name']!='') {			
				$fconfig['upload_path'] = 'ads_images/';
				$fconfig['allowed_types'] = 'gif|jpg|png|GIF|JPG|JPEG|PNG';
				$fconfig['max_size']	= '4000';
				$fconfig['max_width']  = '2024';
				$fconfig['max_height']  = '2024';
				$fconfig['remove_spaces']  = TRUE;            
				$ext = end(explode('.', $_FILES['userfile']['name']));
				$fconfig['file_name']  = time().'.'.$ext;
				
				$this->load->library('upload', $fconfig);
				$this->upload->initialize($fconfig);
				if(!$this->upload->do_upload()) {
					$this->session->set_flashdata('flash_message', 'Invalid Picture Uploaded!');
					$this->session->set_flashdata('flash_data', $inp_data);
					redirect('admin/edit_ads/'.$ads_id);
				} else {
					$inp_data['ads_image'] = $fconfig['file_name'];
					$upload_data =$this->upload->data();
					$rconfig['image_library'] = 'gd2';
					$rconfig['source_image'] = $upload_data['full_path'];
					$rconfig['create_thumb'] = TRUE;
					$rconfig['maintain_ratio'] = TRUE;
					$rconfig['width'] = 75;
					$rconfig['height'] = 75;
					$rconfig['thumb_marker'] = '_thumb';
					$this->load->library('image_lib', $rconfig);
					$this->image_lib->initialize($rconfig);
					$this->image_lib->resize();
				}
			}
			// File upload completed 
			
			$temp_details = $this->AdminModel->get_this_ads($ads_id);
			$isUpdated = $this->AdminModel->updateAds($inp_data, $ads_id);
			
			if($isUpdated) {
				if($_FILES['userfile']['name']!='') {
					unlink('ads_pictures/'.$temp_details[0]->ads_image);
					unlink('ads_pictures/'.str_replace(".","_thumb.",$temp_details[0]->ads_image));
				}
				$this->session->set_flashdata('flash_message', 'Ads Updated Successfully!');
				redirect('admin/ads_list');
			}else {
				$this->session->set_flashdata('flash_message', 'Invalid Details Entered!');
				redirect('admin/edit_ads/'.$ads_id);
			}
		}else {
			$this->session->set_flashdata('flash_message', 'Invalid Request!');
			redirect('admin/edit_ads/'.$ads_id);
		}
	}
	
	public function ads_list() {
	
		if($this->session->userdata('admin_user_id')==''){redirect('admin/login');}
		$this->load->library('pagination');		
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;	
		$config['uri_segment'] 		= 3;
		$config['num_links']		= 3;
		$config['per_page'] 		= 5;
		$config['base_url'] 		= base_url().'admin/ads_list/';
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

		$config['total_rows'] 		= $this->AdminModel->get_total_ads();
		
		$data['total']     = $config['total_rows'];
		$data['page_name'] = "admin/ads_list";
		$data['menu'] = "ads_list";
		if($page!=0) {$start = ($page*5)-5;}else{$start = 0;}
		$data['ads_list'] = $this->AdminModel->list_ads($config["per_page"], $start);
		$data['title'] = SITE_ADMIN_TITLE." :: List of Ads Posted";
		
		$this->pagination->initialize($config); 
		$data['pagelink'] = $this->pagination->create_links();
		
		$this->load->view('layouts/admin_layout', $data);
	}
	
	public function addoffer() {
		$data['page_name'] = "admin/addoffer";
		$data['offer_types'] = $this->AdminModel->get_offer_types();
		$data['menu'] = "addoffer";
		$data['title'] = SITE_ADMIN_TITLE." :: Add Offer";
		$this->load->view('layouts/admin_layout', $data);
	}

	public function process_addoffer() {
	
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
			$inp_data['offer_status'] 		= 1;//$this->input->post('status');
			$inp_data['offer_created_on'] 	= time();
			
			$inp_data['offer_provider'] 			= $this->input->post('offer_provider');
			$inp_data['provider_address'] 			= $this->input->post('provider_address');
			$inp_data['contact_person'] 			= $this->input->post('contact_person');
			$inp_data['contact_phone'] 				= $this->input->post('contact_phone');
			$inp_data['contact_email'] 				= $this->input->post('contact_email');
			
			$inp_data['minimum_purchase_amount'] 	= $this->input->post('minimum_purchase_amount');
			$inp_data['minimum_purchase_quantity'] 	= $this->input->post('minimum_purchase_quantity');
			$inp_data['offer_percentage'] 			= $this->input->post('offer_percentage');
			$inp_data['offer_amount'] 				= $this->input->post('offer_amount');
			$inp_data['conditions_apply'] 			= $this->input->post('conditions_apply');
			
			
			// File uploading here
			$fconfig['upload_path'] = 'offer_pictures/';
			$fconfig['allowed_types'] = 'gif|jpg|png|GIF|JPG|JPEG|PNG';
			$fconfig['max_size']	= '4000';
			$fconfig['max_width']  = '2024';
			$fconfig['max_height']  = '2024';
			$fconfig['remove_spaces']  = TRUE;            
			$ext = end(explode('.', $_FILES['userfile']['name']));
			$fconfig['file_name']  = time().'.'.$ext;
			
			$this->load->library('upload', $fconfig);
			$this->upload->initialize($fconfig);
			if(!$this->upload->do_upload()) {
				$this->session->set_flashdata('flash_message', 'Invalid Picture Uploaded!');
				$this->session->set_flashdata('flash_data', $inp_data);
				redirect('admin/addoffer');
			} else {
				$inp_data['offer_picture'] = $fconfig['file_name'];
				$upload_data =$this->upload->data();
				$rconfig['image_library'] = 'gd2';
				$rconfig['source_image'] = $upload_data['full_path'];
				$rconfig['create_thumb'] = TRUE;
				$rconfig['maintain_ratio'] = TRUE;
				$rconfig['width'] = 100;
				$rconfig['height'] = 100;
				$rconfig['thumb_marker'] = '_thumb';
				$this->load->library('image_lib', $rconfig);
				//$this->upload->initialize($fconfig);
				$this->image_lib->initialize($rconfig);
				$this->image_lib->resize();

				// One More to resize
				
				list($Iwidth, $Iheight, $Itype, $Iattr) = getimagesize($upload_data['full_path']);
				if($Iwidth>464 && $Iheight>260) {
					if($Iwidth>464) { $rconfig['width'] = 464; }else{$rconfig['width'] = $Iwidth;}
					if($Iheight>260) { $rconfig['height'] = 260; }else{$rconfig['width'] = $Iheight;}
					$rconfig['thumb_marker'] = '_normal_thumb';
					$this->image_lib->initialize($rconfig);
					$this->image_lib->resize();
				}else{
					copy($upload_data['full_path'],str_replace(".","_normal_thumb.",$upload_data['full_path']));
				}
			}
			// File upload completed 
			
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
		$data['title'] = SITE_ADMIN_TITLE." :: Add Company";
		$this->load->view('layouts/admin_layout', $data);
	}

	public function process_addcompany() {
	
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
		$data['title'] = SITE_ADMIN_TITLE." :: Retrive Password";
		$this->load->view('layouts/admin_layout', $data);
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
		if($page!=0) {$start = ($page*5)-5;}else{$start = 0;}
		$data['ride_list'] = $this->RideModel->get_rides_posted($config["per_page"], $start, false, true);
		$data['title'] = SITE_ADMIN_TITLE." :: List of Rides";
		
		//$config['page_query_string'] = TRUE;
		
		$this->pagination->initialize($config); 
		$data['pagelink'] = $this->pagination->create_links();
		
		$this->load->view('layouts/admin_layout', $data);
	}

	public function offertype_list() {
	
		if($this->session->userdata('admin_user_id')==''){redirect('admin/login');}
		$this->load->library('pagination');		
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;	
		$config['uri_segment'] 		= 3;
		$config['num_links']		= 3;
		$config['per_page'] 		= 15;
		$config['base_url'] 		= base_url().'admin/offertype_list/';
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

		$config['total_rows'] 		= $this->AdminModel->get_total_offer_types();
		
		$data['total']     = $config['total_rows'];
		$data['page_name'] = "admin/offertype_list";
		$data['menu'] = "offertype_list";
		if($page!=0) {$start = ($page*15)-15;}else{$start = 0;}
		$data['offertype_list'] = $this->AdminModel->list_offer_types($config["per_page"], $start);
		$data['title'] = SITE_ADMIN_TITLE." :: List of Offer Types";
		
		$this->pagination->initialize($config); 
		$data['pagelink'] = $this->pagination->create_links();
		
		$this->load->view('layouts/admin_layout', $data);
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
		if($page!=0) {$start = ($page*15)-15;}else{$start = 0;}
		$data['type_list'] = $this->AdminModel->list_company_types($config["per_page"], $start);
		$data['title'] = SITE_ADMIN_TITLE." :: List of Industry Types";
		
		$this->pagination->initialize($config); 
		$data['pagelink'] = $this->pagination->create_links();
		
		$this->load->view('layouts/admin_layout', $data);
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
		if($page!=0) {$start = ($page*5)-5;}else{$start = 0;}
		$data['offer_list'] = $this->AdminModel->get_offers($config["per_page"], $start);
		$data['title'] = SITE_ADMIN_TITLE." :: List of Offers";
		
		$data['company_list'] = $this->AdminModel->get_companies(1, 1, false);
		
		$this->pagination->initialize($config); 
		$data['pagelink'] = $this->pagination->create_links();
		
		$this->load->view('layouts/admin_layout', $data);
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
		if($page!=0) {$start = ($page*5)-5;}else{$start = 0;}
		$data['company_list'] = $this->AdminModel->get_companies($config["per_page"], $start);
		$data['title'] = SITE_ADMIN_TITLE." :: List of Companies";
		
		//$config['page_query_string'] = TRUE;
		
		$this->pagination->initialize($config); 
		$data['pagelink'] = $this->pagination->create_links();
		
		$this->load->view('layouts/admin_layout', $data);
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
		if($page!=0) {$start = ($page*5)-5;}else{$start = 0;}
		$data['user_list'] = $this->UserModel->get_users_registered($config["per_page"], $start);
		$data['title'] = SITE_ADMIN_TITLE." :: List of Users";
		
		$this->pagination->initialize($config); 
		$data['pagelink'] = $this->pagination->create_links();
		
		$this->load->view('layouts/admin_layout', $data);
	}
	
	public function addhruser() {
		
		$data['cities_list'] = $this->CommonModel->cities_list('Tamil Nadu');
		$data['state_list'] = $this->CommonModel->states_list();
		$data['page_name'] = "admin/addhruser";
		$data['menu'] = "addhruser";		
		$data['title'] = SITE_ADMIN_TITLE." :: Add New HR User";
		$this->load->view('layouts/admin_layout', $data);
	}

	public function process_addhruser() {
		
		if($this->input->post('addUser')=='Submit') {
			$posted_data['pro_user_type'] 		= 3; // HR
			$posted_data['pro_user_full_name'] 	= $this->input->post('full_name');
			$posted_data['pro_user_email'] 		= $this->input->post('email_address');
			$domainAddress 						= explode("@",$this->input->post('email_address'));
			$posted_data['pro_user_domain'] 	= $domainAddress[1];
			$posted_data['pro_user_gender'] 	= $this->input->post('gender');
			$randomPassword = chr(rand(65,74)).rand(1,3).chr(rand(75,83)).chr(rand(84,90)).rand(4,6).chr(rand(97,107)).chr(rand(108,122)).rand(7,9);
			$posted_data['pro_user_password'] 	= $randomPassword;
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
			$posted_data['pro_user_status'] 	= '1'; // Self Approval
			$posted_data['pro_corporate_id'] 	= $this->input->post('selected_company')==''?$this->session->userdata('selected_company'):$this->input->post('selected_company');
			
			$isValidID = $this->UserModel->insertSingup($posted_data);
			
			if($isValidID>0) {
				// Sending Email Activation Link
				$mconfig['protocol'] = 'mail';
				$mconfig['wordwrap'] = FALSE;
				$mconfig['mailtype'] = 'html';
				$mconfig['charset'] = 'utf-8';
				$mconfig['crlf'] = "\r\n";
				$mconfig['newline'] = "\r\n";
				$this->load->library('email',$mconfig);

				$this->email->from('murugesanme@yahoo.com', 'Murugesan P');
				//$this->email->to('murugdev.eee@gmail.com');
				$this->email->to($posted_data['pro_user_email']);

				$this->email->subject('Commute Easy: New Account Created!');

				$email_data['HelloTo'] 			= $posted_data['pro_user_full_name'];

				$email_data['activateLink'] 	= 'http://work.ideasdiary.com';
				$email_data['userName'] 		= $this->input->post('email_address');
				$email_data['passWord'] 		= $randomPassword;
				$email_data['url'] 				= base_url();
				
				$email_template = $this->load->view('templates/new_account_created', $email_data, true);
				
				if($this->config->item('is_email_enabled')) {
					$this->email->message($email_template);
					$this->email->send();				
				}				
				
				$this->session->set_flashdata('flash_message', 'Successfully Added the HR Account !');
				redirect('admin/company_details/'.$posted_data['pro_corporate_id']);
			} else {
				$this->session->set_flashdata('data_back', $posted_data);
				$this->session->set_flashdata('flash_message', 'Please enter all the details');
				redirect('admin/addhruser');
			}
		}else{
			$this->session->set_flashdata('flash_message', 'Invalid Request!');
			redirect('admin/addhruser');
		}
	}
	
	public function company_details(){
	
		$company_id = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		if($company_id>0) {
			$selection = array('selected_company' => $company_id);
			$this->session->set_userdata($selection);
		}else if($this->session->userdata('selected_company')!='') {
			$company_id = $this->session->userdata('selected_company');
		}else {
			redirect('admin/company_list');
		}
		//echo $this->session->userdata('selected_company');
		//exit;
		$data['company_info'] = $this->AdminModel->getTheseCompanyDetails($company_id, false);
		
		$data['page_name'] = "admin/company_details";
		$data['menu'] = "company_details";
		
		$this->load->library('pagination');		
		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;	
		$config['uri_segment'] 		= 4;
		$config['num_links']		= 4;
		$config['per_page'] 		= 5;
		$config['base_url'] 		= base_url().'admin/company_details/'.$company_id.'/';
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
		
		$config['total_rows'] 		= $this->AdminModel->get_total_hrusers($company_id);		
		
		$data['total']     = $config['total_rows'];
		$data['title'] = SITE_ADMIN_TITLE." :: Details of Company & List of HR";
		if($page!=0) {$start = ($page*5)-5;}else{$start = 0;}
		$data['user_list'] = $this->AdminModel->getThisCompanyUsers($config["per_page"], $start, $company_id);
		
		$this->pagination->initialize($config); 
		$data['pagelink'] = $this->pagination->create_links();		
		$this->load->view('layouts/admin_layout', $data);
	}
	
	
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */