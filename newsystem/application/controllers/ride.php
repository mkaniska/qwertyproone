<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ride extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('UserModel'); 
        $this->load->model('RideModel'); 
        $this->load->model('CommonModel');
    }
	
	public function index(){
		redirect('welcome/home');
	}

	public function ridelist() {
		$data['page_name'] = "ride/ridelist";
		$data['menu'] = "ridelist";
		$data['ride_list'] = $this->RideModel->get_rides_posted();
		$data['title'] = SITE_TITLE." :: Ride List Posted";
		$this->load->view('layout', $data);
	}
	
	public function thanks() {
		$data['page_name'] = "ride/thanks";
		$data['menu'] = "thanks";
		$data['title'] = SITE_TITLE." :: Thank you !";
		$this->load->view('layout', $data);
	}
	
	public function add(){
		$data['page_name'] = "ride/add";		
		$data['states_list'] = $this->CommonModel->states_list();			
		$data['cities_list'] = $this->CommonModel->cities_list('Tamil Nadu');
		$data['menu'] = "addride";
		$data['title'] = SITE_TITLE." :: Post a New Ride";
		$this->load->view('layout', $data);
	}
	public function postride(){
		$data['page_name'] = "ride/postride";		
		$data['states_list'] = $this->CommonModel->states_list();			
		$data['cities_list'] = $this->CommonModel->cities_list('Tamil Nadu');
		$data['menu'] = "addride";
		$data['title'] = SITE_TITLE." :: Post a New Ride";
		$this->load->view('layout', $data);
	}	

	public function process_ride() {
	
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
			$ride_data['start_time'] 			= $this->input->post('start_time');
			$ride_data['return_time'] 			= $this->input->post('return_time');
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

				$this->email->message($rideMessage);
				$this->email->send();				
				
				$this->session->set_flashdata('flash_message', 'Successfully Added your Ride Details & Registered !');
				redirect('ride/thanks');
			} else {
				$this->session->set_flashdata('data_back', $posted_data);
				$this->session->set_flashdata('flash_message', 'Please enter all the details');
				redirect('ride/add/error/1');
			}
		}else{
			$this->session->set_flashdata('flash_message', 'Please enter all the details');
			redirect('ride/add/error/1');
		}
	} 

	public function process_newride() {
	
		if($this->input->post('post_ride')=='Submit') {
			
			$UserID = $this->session->userdata('_user_id');
			$UserName = $this->session->userdata('_user_name');
			
			if($UserID>0) {
			
			// Insert the Ride Details & Vehicle Details;

			$ride_data['user_id'] 				= $UserID;
			$ride_data['passenger_city'] 		= $this->input->post('city');
			$ride_data['start_time'] 			= $this->input->post('start_time');
			$ride_data['return_time'] 			= $this->input->post('return_time');
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
					$rideMessage.= "Vehicle Type : ".$ride_data['pro_user_type'].", <br />";	
					$rideMessage.= "Model Type : ".$ride_data['pro_user_type'].", <br />";	
					$rideMessage.= "Fuel Type : ".$ride_data['pro_user_type'].", <br />";
				}
				$rideMessage.= " <br />";
				$rideMessage.= " Thanks, <br />";
				$rideMessage.= " Administrator";

				$this->email->message($rideMessage);
				$this->email->send();				
				
				$this->session->set_flashdata('flash_message', 'Successfully Added your Ride Details !');
				redirect('ride/thanks');
			} else {
				$this->session->set_flashdata('data_back', $posted_data);
				$this->session->set_flashdata('flash_message', 'Please enter all the details');
				redirect('ride/postride/error/1');
			}
		}else{
			$this->session->set_flashdata('flash_message', 'Please enter all the details');
			redirect('ride/postride/error/1');
		}
	} 
	
}

/* End of file ride.php */
/* Location: ./application/controllers/ride.php */