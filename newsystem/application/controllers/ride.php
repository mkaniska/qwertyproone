<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ride extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('UserModel'); 
        $this->load->model('RideModel'); 
        $this->load->model('CommonModel');
    }
	
	public function index() {
		redirect('welcome/home');
	}

	public function ridelist() {
		if($this->session->userdata('_user_id')==''){redirect('user/login');}
		$this->load->library('pagination');		
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;	
		$config['uri_segment'] 		= 3;
		$config['num_links']		= 3;
		$config['per_page'] 		= 3;
		$config['base_url'] 		= base_url().'ride/ridelist/';
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

		$config['total_rows'] 		= $this->RideModel->get_total_rides();
		
		$data['page_name'] = "ride/ridelist";
		$data['menu'] = "ridelist";		
		$data['ride_list'] = $this->RideModel->get_rides_posted($config["per_page"], $page);
		$data['title'] = SITE_TITLE." :: Ride List Posted";
		
		//$config['page_query_string'] = TRUE;
		
		$this->pagination->initialize($config); 
		$data['pagelink'] = $this->pagination->create_links();
		
		$this->load->view('layout', $data);
	}

	public function update_request() {
	
		$request_id     = $this->input->post('request_id');
		//$ride_id    	= $this->input->post('ride_id');
		$status 	    = $this->input->post('status');
		$owner_user_id  = $this->session->userdata('_user_id');
		
		if($request_id>0) {
			
			$isUpdated    			= $this->RideModel->updateJoinRequest($request_id, $status);
			$request_details 		= $this->RideModel->get_request_details($request_id);
			$requested_user_details = $this->UserModel->get_user_details($request_details->requesting_user_id);
			$owner_user_details 	= $this->UserModel->get_user_details($request_details->owner_user_id);
			//insertJoinRequest
			$finalStatus = ($status=='1')?'Approved':'Rejected';
			if($isUpdated) {

				$this->load->library('email');
				$this->email->from('murugesanme@yahoo.com', 'Murugesan P');
				$this->email->to('murugdev.eee@gmail.com');
				$this->email->subject('Commute Easy: Join Request '.$finalStatus.' !');
				
				// Constructing Ride Details Email Notification
				$notificationMessage = "Hello ".$requested_user_details->pro_user_full_name.", <br />";
				
				$notificationMessage.= "Your Join Request has been $finalStatus by ".$owner_user_details->pro_user_full_name." !.. <br />";
				
				$notificationMessage.= "Please connect to Admin or ".$owner_user_details->pro_user_full_name." for any further Details <br />";
				
				$notificationMessage.= " <br />";
				$notificationMessage.= " Thanks, <br />";
				$notificationMessage.= " Administrator";
				
				/*
					$this->email->message($notificationMessage);
					$this->email->send();				
				*/
				echo 'success';exit;
			}else {
				echo 'failed';exit;
			}
		}else {
			echo 'failed';exit;
		}
	}
	
	public function requestlist() {
	
		if($this->session->userdata('_user_id')==''){redirect('user/login');}
		
		$this->load->library('pagination');		
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;	
		$config['uri_segment'] 		= 3;
		$config['num_links']		= 3;
		$config['per_page'] 		= 3;
		$config['base_url'] 		= base_url().'ride/requestlist/';
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

		$config['total_rows'] 		= $this->RideModel->get_total_requests();
		
		$data['page_name'] = "ride/requestlist";
		$data['menu'] = "requestlist";		
		$data['request_list'] = $this->RideModel->get_join_requests($config["per_page"], $page);
		$data['title'] = SITE_TITLE." :: List of Join Requests";
		
		//$config['page_query_string'] = TRUE;
		
		$this->pagination->initialize($config); 
		$data['pagelink'] = $this->pagination->create_links();
		
		$this->load->view('layout', $data);
	}

	
	public function matching_places() {
		$place = $this->input->post('address_string');
		$matching_list = $this->CommonModel->find_matching_places($place);
		echo json_encode($matching_list);
		exit;
	}
	
	public function matching_rides() {
	
		$input['city'] 		= $this->input->post('city');
		$input['address'] 	= $this->input->post('address');
		$input['startTime'] 	= $this->input->post('startTime');
		$input['returnTime'] = $this->input->post('returnTime');
		$input['search_for'] = $this->input->post('search_for');
		
		$matching_list = $this->RideModel->find_matching_rides($input);
		$ignore_list   = $this->RideModel->request_already_sent_to();
		
		$data['matching_list']  = $matching_list;
		$data['ignore_rides']   = $ignore_list;
		//print_r($ignore_list);exit;
		$data['page_name'] = "ride/results";
		
		echo $this->load->view('ajax_layout', $data, true);		
		exit;
	}
	
	public function search() {
		$data['page_name'] = "ride/search";
		$data['menu'] = "search";
		$data['cities_list'] = $this->CommonModel->cities_list('Tamil Nadu');
		$data['time_slots'] = $this->CommonModel->get_time_slot();
		$data['title'] = SITE_TITLE." :: Search for a Ride";
		$this->load->view('simple_layout', $data);
	}
	
	public function thanks() {
		$data['page_name'] = "ride/thanks";
		$data['menu'] = "thanks";
		$data['title'] = SITE_TITLE." :: Thank you !";
		$this->load->view('layout', $data);
	}
	
	public function add() {
		if($this->session->userdata('_user_id')!=''){redirect('ride/postride');}
		$data['page_name'] = "ride/add";
		$data['states_list'] = $this->CommonModel->states_list();
		$data['cities_list'] = $this->CommonModel->cities_list('Tamil Nadu');
		$data['time_slots']  = $this->CommonModel->get_time_slot();
		$data['menu'] = "addride";
		$data['title'] = SITE_TITLE." :: Post a New Ride";
		$this->load->view('layout', $data);
	}

	public function edit($id) {
		if($this->session->userdata('_user_id')==''){redirect('user/login');}
		$data['page_name'] = "ride/edit";
		$data['ride_value'] = $this->RideModel->get_ride_value($id);
		if($data['ride_value']!='') {
			$data['states_list'] = $this->CommonModel->states_list();			
			$data['cities_list'] = $this->CommonModel->cities_list('Tamil Nadu');
			$data['time_slots']  = $this->CommonModel->get_time_slot();
			$data['menu'] = "editride";
			$data['title'] = SITE_TITLE." :: Edit the Ride";
			$this->load->view('layout', $data);
		}else{
			$this->session->set_flashdata('flash_message', 'Invalid Request!');
			redirect('ride/ridelist');
		}
	}
	
	public function postride() {
		if($this->session->userdata('_user_id')==''){redirect('user/login');}
		$data['page_name'] = "ride/postride";		
		$data['states_list'] = $this->CommonModel->states_list();			
		$data['cities_list'] = $this->CommonModel->cities_list('Tamil Nadu');
		$data['time_slots']  = $this->CommonModel->get_time_slot();
		$data['recent_rides'] = $this->RideModel->get_recent_rides();
		$data['recent_joinees'] = $this->UserModel->get_recent_joinees();		
		$data['menu'] = "addride";
		$data['title'] = SITE_TITLE." :: Post a New Ride";
		$this->load->view('layout', $data);
	}	

	public function process_ride() {
		//if($this->session->userdata('_user_id')==''){redirect('user/login');}
		if($this->input->post('submitride')=='Submit') {
			
			// For Signup Process
			$user_data['pro_user_type'] 		= 2;// Commuters
			$user_data['pro_user_full_name'] 	= $this->input->post('full_name');
			$user_data['pro_user_gender'] 		= $this->input->post('gender');
			$user_data['pro_user_email'] 		= $this->input->post('email_address');
			$user_data['pro_user_password'] 	= $this->input->post('password_text');
			$user_data['pro_user_phone']	 	= $this->input->post('phone_number');
			$user_data['pro_user_address'] 		= $this->input->post('address');
			$user_data['pro_user_state'] 		= $this->input->post('state');
			$user_data['pro_user_city'] 		= $this->input->post('city');
			$user_data['pro_user_zipcode'] 		= $this->input->post('zipcode');
			$user_data['pro_user_ip'] 			= $_SERVER['REMOTE_ADDR'];
			$user_data['pro_user_latitude'] 	= '';
			$user_data['pro_user_longitude'] 	= time();
			$user_data['pro_user_joined'] 		= time();
			$user_data['pro_user_updated'] 		= time();
			$user_data['pro_user_status'] 		= '0';
			
			$isValidUserID = $this->UserModel->insertSingup($user_data);
			
			if($isValidUserID>0) {
			
			// Insert the Ride Details & Vehicle Details;

			$ride_data['user_id'] 				= $isValidUserID;
			$ride_data['passenger_city'] 		= $this->input->post('city');
			
			$ride_data['start_time'] 			= $this->CommonModel->get_time_label($this->input->post('start_time'));
			$ride_data['return_time'] 			= $this->CommonModel->get_time_label($this->input->post('return_time'));
			
			$ride_data['start_time_24'] 		= $this->input->post('start_time');
			$ride_data['return_time_24'] 		= $this->input->post('return_time');
			
			$ride_data['origin_location']	 	= $this->input->post('origin_from');
			$ride_data['destination_location']	= $this->input->post('destination_to');
			$ride_data['travel_as'] 			= $this->input->post('travel_type');
			$ride_data['join_alert_needed'] 	= $this->input->post('travel_alert');
			$ride_data['vehicle_type'] 			= $this->input->post('vehicle_type');
			$ride_data['model_type'] 			= $this->input->post('model_type');
			$ride_data['fuel_type'] 			= $this->input->post('fuel_type');
			$ride_data['added_on'] 				= time();
			$ride_data['modified_on'] 			= time();
			$ride_data['active_status'] 		= '1';
	
			$isValidRideID = $this->RideModel->insertRide($ride_data);
			
			// Send an activation email & notifications
			
				// Sending Email Activation Link
				
				$this->load->library('email');

				$this->email->from('murugesanme@yahoo.com', 'Murugesan P');
				$this->email->to('murugdev.eee@gmail.com');
				$this->email->subject('Commute Easy: Registration Email Activation');
				$this->email->message('Testing the email class.');
				$this->email->send();

				$this->email->from('murugesanme@yahoo.com', 'Murugesan P');
				$this->email->to('murugdev.eee@gmail.com');
				$this->email->subject('Commute Easy: Posted Ride Details');
				
				// Constructing Ride Details Email Notification
				$rideMessage = "Hello ".$user_data['pro_user_full_name'].", <br />";
				$rideMessage.= "You have posted the Ride Details successfully !.. <br />";
				$rideMessage.= "Following are the details posted by you. You can review & change it anytime after you logged into the application. <br />";
				$rideMessage.= "City : ".$ride_data['passenger_city'].", <br />";
				$rideMessage.= "Start Time : ".$ride_data['start_time'].", <br />";
				$rideMessage.= "Return Time : ".$ride_data['return_time'].", <br />";
				$rideMessage.= "Origin Location : ".$ride_data['origin_location'].", <br />";
				$rideMessage.= "Destination Location : ".$ride_data['destination_location'].", <br />";
				$rideMessage.= "Travel As : ".$ride_data['travel_as'].", <br />";
				if($ride_data['travel_as']=='driver'){
					$rideMessage.= "Vehicle Type : ".$ride_data['vehicle_type'].", <br />";	
					$rideMessage.= "Model Type : ".$ride_data['model_type'].", <br />";	
					$rideMessage.= "Fuel Type : ".$ride_data['fuel_type'].", <br />";
				}
				$rideMessage.= " <br />";
				$rideMessage.= " Thanks, <br />";
				$rideMessage.= " Administrator";
				/*
					$this->email->message($rideMessage);
					$this->email->send();				
				*/
				$this->session->set_flashdata('flash_message', 'Successfully Added your Ride Details & Registered !');
				$this->session->set_flashdata('flash_url', base_url().'user/login');
				redirect('ride/thanks');
			} else {
				$posted_data = array_merge($ride_data, $user_data); 
				$this->session->set_flashdata('data_back', $posted_data);
				$this->session->set_flashdata('flash_message', 'Please enter all the details');
				redirect('ride/add/error/1');
			}
		}else{
			$this->session->set_flashdata('flash_message', 'Please enter all the details');
			redirect('ride/add/error/1');
		}
	} 

	public function sendrequest(){
		
		$request_ride_id 		= $this->input->post('request_ride_id');
		$requesting_user_id 	= $this->session->userdata('_user_id');
		
		if($request_ride_id>0) {
		
			$ride_details 			 = $this->RideModel->get_ride_value($request_ride_id,false);
			$requesting_user_details = $this->UserModel->get_user_details($requesting_user_id);
			$join_request_id 		 = $this->RideModel->insertJoinRequest($ride_details);
			
			if($join_request_id>0) {

				$this->load->library('email');
				$this->email->from('murugesanme@yahoo.com', 'Murugesan P');
				$this->email->to('murugdev.eee@gmail.com');
				$this->email->subject('Commute Easy: Join Request Sent');
				
				// Constructing Ride Details Email Notification
				$notificationMessage = "Hello ".$requesting_user_details->pro_user_full_name.", <br />";
				
				$notificationMessage.= "Your Join Request has been posted to the user & you will get a Notification once after he approved it !.. <br />";
				
				$notificationMessage.= "Following are the details for which you had Posted your Join Request.<br />";

				$notificationMessage.= "City : ".$ride_details['passenger_city'].", <br />";
				$notificationMessage.= "Start Time : ".$ride_details['start_time'].", <br />";
				$notificationMessage.= "Return Time : ".$ride_details['return_time'].", <br />";
				$notificationMessage.= "Origin Location : ".$ride_details['origin_location'].", <br />";
				$notificationMessage.= "Destination Location : ".$ride_details['destination_location'].", <br />";
				
				$notificationMessage.= " <br />";
				$notificationMessage.= " Thanks, <br />";
				$notificationMessage.= " Administrator";
				
				/*
					$this->email->message($notificationMessage);
					$this->email->send();				
				*/
				echo 'success';exit;
			}else {
				echo 'failed';exit;
			}
		}else {
			echo 'failed';exit;
		}
	}
	
	public function process_newride() {
	
		if($this->session->userdata('_user_id')==''){redirect('user/login');}
		
		if($this->input->post('post_ride')=='Submit') {
			
			//print_r($this->input->post());exit;
			
			$UserID = $this->session->userdata('_user_id');
			$UserName = $this->session->userdata('_user_name');
			
			if($UserID>0) {

			// Insert the Ride Details & Vehicle Details;

			$ride_data['user_id'] 				= $UserID;
			$ride_data['passenger_city'] 		= $this->input->post('city');
			
			$ride_data['start_time'] 			= $this->CommonModel->get_time_label($this->input->post('start_time'));
			$ride_data['return_time'] 			= $this->CommonModel->get_time_label($this->input->post('return_time'));
			
			$ride_data['start_time_24'] 		= $this->input->post('start_time');
			$ride_data['return_time_24'] 		= $this->input->post('return_time');
			
			$ride_data['origin_location']	 	= $this->input->post('origin_from');
			$ride_data['destination_location']	= $this->input->post('destination_to');
			$ride_data['travel_as'] 			= $this->input->post('travel_type');
			$ride_data['join_alert_needed'] 	= $this->input->post('travel_alert');
			$ride_data['vehicle_type'] 			= $this->input->post('vehicle_type');
			$ride_data['model_type'] 			= $this->input->post('model_type');
			$ride_data['fuel_type'] 			= $this->input->post('fuel_type');
			$ride_data['added_on'] 				= time();
			$ride_data['modified_on'] 			= time();
			$ride_data['active_status'] 		= '1';
	
			$isValidRideID = $this->RideModel->insertRide($ride_data);
		
				// Sending Email Activation Link
				$this->load->library('email');

				$this->email->from('murugesanme@yahoo.com', 'Murugesan P');
				$this->email->to('murugdev.eee@gmail.com');
				$this->email->subject('Commute Easy: Posted Ride Details');
				
				// Constructing Ride Details Email Notification
				$rideMessage = "Hello ".$UserName.", <br />";
				$rideMessage.= "You have posted the Ride Details successfully !.. <br />";
				$rideMessage.= "Following are the details posted by you. You can review & change it anytime after you logged into the application. <br />";
				$rideMessage.= "City : ".$ride_data['passenger_city'].", <br />";
				$rideMessage.= "Start Time : ".$ride_data['start_time'].", <br />";
				$rideMessage.= "Return Time : ".$ride_data['return_time'].", <br />";
				$rideMessage.= "Origin Location : ".$ride_data['origin_location'].", <br />";
				$rideMessage.= "Destination Location : ".$ride_data['destination_location'].", <br />";
				$rideMessage.= "Travel As : ".$ride_data['travel_as'].", <br />";
				
				if($ride_data['travel_as']=='driver'){
					$rideMessage.= "Vehicle Type : ".$ride_data['vehicle_type'].", <br />";	
					$rideMessage.= "Model Type : ".$ride_data['model_type'].", <br />";	
					$rideMessage.= "Fuel Type : ".$ride_data['fuel_type'].", <br />";
				}
				
				$rideMessage.= " <br />";
				$rideMessage.= " Thanks, <br />";
				$rideMessage.= " Administrator";
				/*
					$this->email->message($rideMessage);
					$this->email->send();				
				*/
				$this->session->set_flashdata('flash_message', 'Successfully Added your Ride Details !');
				$this->session->set_flashdata('flash_url', base_url().'ride/ridelist');
				redirect('ride/thanks');
			} else {
				$this->session->set_flashdata('data_back', $ride_data);
				$this->session->set_flashdata('flash_message', 'Please enter all the details');
				redirect('ride/postride/error/1');
			}
		}else{
			$this->session->set_flashdata('flash_message', 'Please enter all the details');
			redirect('ride/postride/error/1');
		}
	}
	
	public function update_ride() {
	
		if($this->session->userdata('_user_id')==''){redirect('user/login');}

		$UserID = $this->session->userdata('_user_id');
		
		$UserName = $this->session->userdata('_user_name');
		
		$EditRideID = $this->input->post('ride_id');
		
		$isValid = $this->RideModel->is_valid_ride_update($EditRideID, $UserID);
			
		if($this->input->post('update_ride')=='Update' &&  $isValid) {
			
			if($UserID>0) {

			// Update the Ride Details & Vehicle Details;
			
			$ride_data['passenger_city'] 		= $this->input->post('city');
			
			$ride_data['start_time'] 			= $this->CommonModel->get_time_label($this->input->post('start_time'));
			$ride_data['return_time'] 			= $this->CommonModel->get_time_label($this->input->post('return_time'));
			
			$ride_data['start_time_24'] 		= $this->input->post('start_time');
			$ride_data['return_time_24'] 		= $this->input->post('return_time');
			
			$ride_data['origin_location']	 	= $this->input->post('origin_from');
			$ride_data['destination_location']	= $this->input->post('destination_to');
			$ride_data['travel_as'] 			= $this->input->post('travel_type');
			$ride_data['join_alert_needed'] 	= $this->input->post('travel_alert');
			$ride_data['vehicle_type'] 			= $this->input->post('vehicle_type');
			$ride_data['model_type'] 			= $this->input->post('model_type');
			$ride_data['fuel_type'] 			= $this->input->post('fuel_type');
			$ride_data['modified_on'] 			= time();
	
			$this->RideModel->updateRide($ride_data, $EditRideID);
		
				// Sending Email Activation Link
				$this->load->library('email');

				$this->email->from('murugesanme@yahoo.com', 'Murugesan P');
				$this->email->to('murugdev.eee@gmail.com');
				$this->email->subject('Commute Easy: Updated Ride Details');
				
				// Constructing Ride Details Email Notification
				$rideMessage = "Hello ".$UserName.", <br />";
				$rideMessage.= "You have updated the Ride Details successfully !.. <br />";
				$rideMessage.= "Following are the details updated by you. You can review & change it anytime after you logged into the application. <br />";
				$rideMessage.= "City : ".$ride_data['passenger_city'].", <br />";
				$rideMessage.= "Start Time : ".$ride_data['start_time'].", <br />";
				$rideMessage.= "Return Time : ".$ride_data['return_time'].", <br />";
				$rideMessage.= "Origin Location : ".$ride_data['origin_location'].", <br />";
				$rideMessage.= "Destination Location : ".$ride_data['destination_location'].", <br />";
				$rideMessage.= "Travel As : ".$ride_data['travel_as'].", <br />";
				
				if($ride_data['travel_as']=='driver'){
					$rideMessage.= "Vehicle Type : ".$ride_data['vehicle_type'].", <br />";	
					$rideMessage.= "Model Type : ".$ride_data['model_type'].", <br />";	
					$rideMessage.= "Fuel Type : ".$ride_data['fuel_type'].", <br />";
				}
				
				$rideMessage.= " <br />";
				$rideMessage.= " Thanks, <br />";
				$rideMessage.= " Administrator";
				/*
					$this->email->message($rideMessage);
					$this->email->send();				
				*/
				$this->session->set_flashdata('flash_message', 'Successfully Updated your Ride Details !');
				$this->session->set_flashdata('flash_url', base_url().'ride/ridelist');
				redirect('ride/thanks');
			} else {
				$this->session->set_flashdata('data_back', $ride_data);
				$this->session->set_flashdata('flash_message', 'Please enter all the details');
				redirect('ride/edit/1');
			}
		}else{
			$this->session->set_flashdata('flash_message', 'Invalid Request');
			redirect('ride/edit/1');
		}
	}	
}

/* End of file ride.php */
/* Location: ./application/controllers/ride.php */