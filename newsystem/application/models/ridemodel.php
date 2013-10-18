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

    function get_total_rides() {

        $UserID = $this->session->userdata('_user_id');
        $this->db->where('user_id', $UserID);
		$this->db->order_by("added_on","DESC");
		$this->db->select('ride_id');
		$query = $this->db->get($this->table_name);
		return $query->num_rows();
	}
	
    function get_rides_posted($cp,$pp) {

        $UserID = $this->session->userdata('_user_id');
        $this->db->where('user_id', $UserID);
		$this->db->order_by("added_on","DESC");
		$this->db->select('ride_id,passenger_city,vehicle_type,start_time,return_time,origin_location,destination_location,added_on,active_status');
        $this->db->limit($cp, $pp);
		$query = $this->db->get($this->table_name);
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
	
    function get_ride_value($RideID){
        $UserID = $this->session->userdata('_user_id');
        $this->db->where('user_id', $UserID);
        $this->db->where('ride_id', $RideID);
		$this->db->select();
        $query = $this->db->get($this->table_name);
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return '';
		}
    }	
}

?>
