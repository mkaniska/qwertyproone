<?php
class RideModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'pro_ride_details';
        $this->primary_key = 'ride_id';
    }
    
	function insertRide($data) {
        $this->db->insert($this->table_name, $data);
        $inserted_id = $this->db->insert_id();
        return $inserted_id;
	}

	function insertJoinRequest($data) {
		$requesting_user_id = $this->session->userdata('_user_id');
		$dataForTable['ride_id'] 			= $data->ride_id;
		$dataForTable['requesting_user_id'] = $requesting_user_id;
		$dataForTable['owner_user_id'] 		= $data->user_id;
		$dataForTable['requested_on'] 		= time();
		$dataForTable['approved_on'] 		= '';
		$dataForTable['request_status']		= '2';
        $this->db->insert('pro_join_request', $dataForTable);
        $inserted_id = $this->db->insert_id();
        return $inserted_id;
	}

	function updateJoinRequest($request_id, $status) {
        $data['request_status'] = $status;
        $data['approved_on'] 	= time();
		$this->db->where('request_id', $request_id);
		$this->db->update('pro_join_request', $data);
        if($this->db->affected_rows()>0) {
			return true;
		}else {
			return false;
		}
	}
	
	function updateRide($data, $RideId) {
        
		$this->db->where('ride_id', $RideId);
		$this->db->update($this->table_name, $data);
        if($this->db->affected_rows()>0) {
			return true;
		}else {
			return false;
		}
	}

    function get_total_requests() {

        $UserID = $this->session->userdata('_user_id');
        $this->db->where('owner_user_id', $UserID);
        $this->db->where('request_status', '2');
		$this->db->order_by("requested_on","DESC");
		$this->db->join('pro_users', 'pro_users.pro_user_id = pro_join_request.requesting_user_id');
		$this->db->select();
		$query = $this->db->get('pro_join_request');
		return $query->num_rows();
	}	
	
    function get_join_requests($cp,$pp) {

        $UserID = $this->session->userdata('_user_id');
        $this->db->where('owner_user_id', $UserID);
        $this->db->where('request_status', '2');
		$this->db->join('pro_users', 'pro_users.pro_user_id = pro_join_request.requesting_user_id');
		$this->db->join('pro_ride_details', 'pro_ride_details.ride_id = pro_join_request.ride_id');
		$this->db->order_by("requested_on","DESC");
		$this->db->select('pro_join_request.*,pro_users.pro_user_full_name,pro_ride_details.*');
        $this->db->limit($cp, $pp);
		$query = $this->db->get('pro_join_request');
		//echo $this->db->last_query();exit; // To Print the SQL Query
		if($query->num_rows() > 0){
			foreach ($query->result() as $row)
			{
				$result_back[] = $row;
			}
			//return array('resultList'=>$result_back,'resultCount'=>$query->num_rows());
			return $result_back;
		}else{ 
			//return array('resultList'=>array(),'resultCount'=>0);
			return array();
		}
    }	
	
    function get_total_rides($user=true) {

        $UserID = $this->session->userdata('_user_id');
		if($user) {
			$this->db->where('user_id', $UserID);
		}
		$this->db->order_by("added_on","DESC");
		$this->db->select('ride_id');
		$query = $this->db->get($this->table_name);
		return $query->num_rows();
	}

	function get_recent_rides() {
	
		$this->db->limit(3);
		$this->db->order_by("added_on","DESC");
		$this->db->select('origin_location,destination_location,start_time,return_time');
		$query = $this->db->get($this->table_name);
		if($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$result_back[] = $row;
			}
		}
		return $result_back;
	}


	
	function request_already_sent_to() {
	
        $UserID = $this->session->userdata('_user_id');
        $this->db->where('requesting_user_id', $UserID);	
		$this->db->select('ride_id');
		$query = $this->db->get('pro_join_request');
		if($query->num_rows() > 0){
			foreach ($query->result() as $row)
			{
				$result_back[] = $row->ride_id;
			}
			return $result_back;
		}else {
			return array();
		}	
	}
	
    function find_matching_rides($data){
	
		$addressString = explode(" ",$data['address']);
		$this->db->like('origin_location', $addressString[0]);
		$this->db->or_like('origin_location', $addressString[1]);
		
		$this->db->or_like('destination_location', $addressString[0]);
		$this->db->or_like('destination_location', $addressString[1]);
		
		$this->db->where('passenger_city', $data['city']);
		
        $this->db->where('start_time_24 >=', $data['startTime']);
        $this->db->where('return_time_24 <=', $data['returnTime']);
		
        $this->db->where('travel_as', $data['search_for']);
		
        $this->db->where('user_id !=', $this->session->userdata('_user_id'));// To ignore his own posts
		
		$this->db->order_by("ride_id","DESC");
		
		$this->db->join('pro_users', 'pro_users.pro_user_id = pro_ride_details.user_id');
		
		$this->db->select("pro_ride_details.*,pro_users.pro_user_full_name");
		
        $query = $this->db->get('pro_ride_details');
		
		//echo $this->db->last_query();exit;
		
		if($query->num_rows()>0) {
		
			foreach ($query->result() as $row) {
				$result_back[] = $row;
			}			
		}else {
			$result_back = array();
		}

		return $result_back;
    }
	
    function get_rides_posted($cp,$pp,$user=true,$userinfo=false) {

        $UserID = $this->session->userdata('_user_id');
		if($user) {
			$this->db->where('user_id', $UserID);
		}
		$join = '';
		if($userinfo) {
			$this->db->join("pro_users","pro_users.pro_user_id=pro_ride_details.user_id");
			$join = ', pro_users.*';
		}
		$this->db->order_by("added_on","DESC");
		$this->db->select('pro_ride_details.*'.$join);
        $this->db->limit($cp, $pp);
		$query = $this->db->get($this->table_name);
		if($query->num_rows() > 0){
			foreach ($query->result() as $row)
			{
				$result_back[] = $row;
			}
			return $result_back;
		}else{ 
			return array();
		}
    }
	
    function get_ride_value($RideID,$forOwner=true){
	
        $UserID = $this->session->userdata('_user_id');
		
		if($forOwner) {
			$this->db->where('user_id', $UserID);
		}
        $this->db->where('ride_id', $RideID);
		$this->db->select();
        $query = $this->db->get($this->table_name);
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return '';
		}
    }

    function get_request_details($request_id) {
        
        $this->db->where('request_id', $request_id);
		$this->db->select();
        $query = $this->db->get('pro_join_request');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return '';
		}
    }	
	
    function is_valid_ride_update($RideID, $UserID) {
        $this->db->where('user_id', $UserID);
        $this->db->where('ride_id', $RideID);
		$this->db->select('ride_id');
        $query = $this->db->get($this->table_name);
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
    }
}

?>
