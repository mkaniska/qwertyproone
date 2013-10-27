<?php
class AdminModel extends CI_Model {

    public function __construct()
    {

    }

    function get_total_companies() {
		
		$this->db->select();
		$query = $this->db->get('pro_companies');
		return $query->num_rows();
	}

    function get_company_types() {
        
		$this->db->order_by("company_type","ASC");
		$this->db->select();
        $query = $this->db->get('pro_company_types');
		foreach ($query->result() as $row)
		{
			$result_back[] = $row;
		}
        return $result_back;  
    }
	
    function get_companies($cp,$pp) {

		$this->db->order_by("company_added","DESC");
		$this->db->join("pro_company_types","pro_companies.company_type=pro_company_types.company_type_id");
		$this->db->select('pro_companies.*,pro_company_types.*');
        $this->db->limit($cp, $pp);
		$query = $this->db->get('pro_companies');
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
	
	function get_recent_joinees() {
	
		$this->db->limit(5);
		$this->db->order_by("pro_user_joined","DESC");
		$this->db->select('pro_user_full_name,pro_user_city,pro_user_joined');
		$query = $this->db->get($this->table_name);
		if($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$result_back[] = $row;
			}
		}
		return $result_back;
	}    
	
	function insertSingup($data) {
        $this->db->insert($this->table_name, $data);
        $inserted_id = $this->db->insert_id();
        return $inserted_id;
	}
}

?>
