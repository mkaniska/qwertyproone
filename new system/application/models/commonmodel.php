<?php
class CommonModel extends CI_Model {
  
    public function __construct()
    {
        parent::__construct();
    }
    
    function states_list(){
	
        $this->db->group_by("city_state");
		$this->db->order_by("city_state","ASC");
		//$this->db->where('city_state', 'Tamil Nadu');
		$this->db->select('city_state');
		$query = $this->db->get('pro_cities');
		$result_back = array();		
		foreach ($query->result() as $row)
		{
			$result_back[] = $row;
		}
        return $result_back;
    }
	
    function cities_list($state){
        
        $this->db->where('city_state', $state);
		$this->db->order_by("city_name","ASC");
		$this->db->select('city_name');
        $query = $this->db->get('pro_cities');
		foreach ($query->result() as $row)
		{
			$result_back[] = $row->city_name;
		}
        return $result_back;  
    }

    function get_time_slot() {
        
		$this->db->order_by("slot_id","ASC");
		$this->db->select();
        $query = $this->db->get('pro_time_slot');
		foreach ($query->result() as $row)
		{
			$result_back[] = $row;
		}
        return $result_back;  
    }
	
	function get_time_label($time_value) {
		
		$this->db->where('slot_value', $time_value);
		$this->db->select('slot_label');
        $query = $this->db->get('pro_time_slot');
		$slot = $query->row();
		return $slot->slot_label;
	}
	
    function find_matching_places($place){
        
        $this->db->like('origin_location', $place); 
		//$this->db->where('origin_location', $place);
        //$this->db->where('destination_location', $place);
		$this->db->order_by("origin_location","ASC");
		$this->db->group_by("origin_location");
		$this->db->select('origin_location');
        $query = $this->db->get('pro_ride_details');
		if($query->num_rows()>0) {
			foreach ($query->result() as $row)
			{
				$result_back[] = $row->origin_location;
			}
		}else{
			$result_back = array();
		}
        return $result_back;
    }	
	
}

?>
