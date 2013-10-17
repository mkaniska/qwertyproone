<?php
class CommonModel extends CI_Model {
  
    public function __construct()
    {
        parent::__construct();
    }
    
    function states_list(){
	
        $this->db->group_by("city_state");
		$this->db->order_by("city_name","ASC");
		$this->db->where('city_state', 'Tamil Nadu');
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
	
}

?>
