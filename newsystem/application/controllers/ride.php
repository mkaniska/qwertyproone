<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ride extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('UserModel'); 
        $this->load->model('RideModel'); 
        $this->load->model('CommonModel'); 
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
		$data['menu'] = "add";
		$data['title'] = SITE_TITLE." :: Post a New Ride";
		$this->load->view('layout', $data);
	}
	
	public function get_cities(){
		$cities_list = $this->CommonModel->state_wise_cities($this->input->post('state_name'));
		$resulted_array['values'] = $cities_list;
		echo json_encode($cities_list);
		exit;
	}

}

/* End of file ride.php */
/* Location: ./application/controllers/ride.php */