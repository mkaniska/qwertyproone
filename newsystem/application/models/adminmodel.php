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

    function get_total_offers() {
		$this->db->where('is_deleted', '0');
		$this->db->select();
		$query = $this->db->get('pro_offers');
		return $query->num_rows();
	}

    function get_offers($cp, $pp) {
        
		$this->db->order_by("offer_created_on","ASC");
		$this->db->where('is_deleted', '0');
		$this->db->join("pro_offer_types","pro_offer_types.offer_type_id=pro_offers.offer_type");
		$this->db->select('pro_offers.*,pro_offer_types.*');
		$this->db->limit($cp, $pp);
        $query = $this->db->get('pro_offers');
		$result_back = array();
		foreach ($query->result() as $row)
		{
			$result_back[] = $row;
		}
        return $result_back;  
    }

	function updateSettings($data) {
		$this->db->where('setting_id', '1');
		$this->db->update('pro_settings', $data);
        if($this->db->affected_rows()>0) {
			return true;
		}else {
			return false;
		}
	}

	function deleteOffer($offerid) {
		$this->db->where('offer_id', $offerid);
		$this->db->update('pro_offers', array('is_deleted'=>'1'));
        if($this->db->affected_rows()>0) {
			return true;
		}else {
			return false;
		}
	}	
	
	function updateoffer($data,$offerid) {
		$this->db->where('offer_id', $offerid);
		$this->db->update('pro_offers', $data);
        if($this->db->affected_rows()>0) {
			return true;
		}else {
			return false;
		}
	}
	
	function get_this_offer($offer_id) {
		$this->db->where('offer_id', $offer_id);
		$query = $this->db->get('pro_offers');
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
	
	function isCompanyExists($company) {
		$this->db->where('company_name', trim($company));
		$this->db->select();
		$query = $this->db->get('pro_companies');
		return $query->num_rows();
	}	
	
	function insertCompany($data) {
        $this->db->insert('pro_companies', $data);
        $inserted_id = $this->db->insert_id();
        return $inserted_id;
	}

	function insertAssignment($data) {
		$this->db->insert('pro_companies_offers', $data);
		$inserted_id = $this->db->insert_id();
		if($inserted_id>0){return true;}else{return false;}
	}

	function updateAssignment($data, $offer_id) {
		$this->db->where('offer_id', $offer_id);
		$this->db->update('pro_companies_offers', $data);
		return true;
	}
	
	function assignCompanyOffer($data, $offer_id) {
	
		$this->db->where('offer_id', $offer_id);
		$this->db->select();
		$query = $this->db->get('pro_companies_offers');
		if($query->num_rows()>0) {
			return $this->updateAssignment($data, $offer_id);
		}else{
			return $this->insertAssignment($data);
		}
	}

	function insertOffer($data) {
        $this->db->insert('pro_offers', $data);
        $inserted_id = $this->db->insert_id();
        return $inserted_id;
	}
	
    function get_total_company_types() {

		$this->db->order_by("company_type","ASC");
		$this->db->select('company_type_id');
		$query = $this->db->get('pro_company_types');
		return $query->num_rows();
	}

    function list_company_types($cp, $pp) {
 
		$this->db->order_by("company_type","DESC");
		$this->db->select();
        $this->db->limit($cp, $pp);
		$query = $this->db->get('pro_company_types');
		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$result_back[] = $row;
			}
			return $result_back;
		}else {
			return array();
		}
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

    function get_offer_types() {
        
		$this->db->order_by("offer_type","ASC");
		$this->db->select();
        $query = $this->db->get('pro_offer_types');
		foreach ($query->result() as $row)
		{
			$result_back[] = $row;
		}
        return $result_back;  
    }

    function get_setting() {
		
		$this->db->select();
        $query = $this->db->get('pro_settings');
		foreach ($query->result() as $row)
		{
			$result_back[] = $row;
		}
        return $result_back;  
    }
	
    function get_companies($cp,$pp,$onlyLimitted=true) {

		$this->db->order_by("company_added","DESC");
		$this->db->join("pro_company_types","pro_companies.company_type=pro_company_types.company_type_id");
		$this->db->select('pro_companies.*,pro_company_types.*');
        if($onlyLimitted) {
			$this->db->limit($cp, $pp);
		}
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

    function get_companies_assigned($offer_id) {
	
		$this->db->where('offer_id',$offer_id);
		$this->db->select('company_ids');
		$query = $this->db->get('pro_companies_offers');
		if($query->num_rows() > 0) {
			$row = $query->result();
			return $row[0]->company_ids;
		}else {
			return '';
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
}

?>
