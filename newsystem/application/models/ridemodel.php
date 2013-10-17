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
	
    function get_rides_posted(){
        $UserID = $this->session->userdata('_user_id');
        $this->db->where('user_id', $UserID);
		$this->db->order_by("added_on","DESC");
		$this->db->select('ride_id,passenger_city,vehicle_type,start_time,return_time,origin_location,destination_location,added_on,active_status');
        $query = $this->db->get($this->table_name);
		foreach ($query->result() as $row)
		{
			$result_back[] = $row;
		}
        return $result_back;  
    }	
}

?>
