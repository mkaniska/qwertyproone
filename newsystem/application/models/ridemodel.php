<?php
class RideModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'pro_portfolio';
        $this->primary_key = 'project_id';
    }
    
    function read_all_gallery(){        
        $query = $this->db->get($this->table_name);
		foreach ($query->result() as $row)
		{
			$result_back[] = $row;
		}
        return $result_back;
    }
}

?>
