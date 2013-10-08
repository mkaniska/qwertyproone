<?php
class UserModel extends CI_Model {

    private $tbl_users = 'pro_users';
    
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'pro_users';
        $this->primary_key = 'pro_user_id';
    }
    
    function read_user_with_name($name){
        $this->db->where('name', $name);
        $query = $this->db->get($this->tbl_users);
        return $query->row();
    }
    function is_valid_login($user,$pass){
	
        $this->db->select('city');
        $this->db->where('random_string', $random_string);
        $query = $this->db->get($this->table_name);
        return $query->row();  
    }	
	function insertSingup($data) {
        $this->db->insert($this->table_name, $data);
        $inserted_id = $this->db->insert_id();
        return $inserted_id;
	}
}

?>
