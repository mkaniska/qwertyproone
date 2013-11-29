<?php
class UserModel extends CI_Model {

    private $tbl_users = 'pro_users';
    
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'pro_users';
        $this->primary_key = 'pro_user_id';
    }
	
    function is_valid_login($user, $pass, $userType=2) {
	
        $this->db->select('pro_user_id, pro_user_full_name, pro_user_type'); //'pro_users');
        $this->db->where('pro_user_email', $user);
        $this->db->where('pro_user_password', $pass);
        $this->db->where('pro_user_status', '1');
		if($userType!=2) {
			$this->db->where('pro_user_type', $userType); // $userType =1 is for Admin / 2 is for User / 3 is for HR 
		}
        $query = $this->db->get($this->table_name);
		if($query->num_rows() > 0) {
			return $query->row();  
		}else {
			return '';
		}
    }

	function isUserExists($email) {
		$this->db->where("pro_user_email",$email);
		$this->db->select('pro_user_id');
        $query = $this->db->get('pro_users');
		if($query->num_rows() > 0){
			return true;
		}else {
			return false;
		}
	}
	
    function get_enabled_ips() {
        
		$this->db->where("ip_added_by",$this->session->userdata('_user_id'));
		$this->db->select();
        $query = $this->db->get('pro_allowed_ipaddresses');
		$result_back = array();
		foreach ($query->result() as $row)
		{
			$result_back[] = $row;
		}
        return $result_back;  
    }

    function get_user_settings() {
        
		$this->db->where("pro_user_id",$this->session->userdata('_user_id'));
		$this->db->select();
        $query = $this->db->get('pro_users');
		return $query->result();
    }	
	
	function updateUserSettings($data) {
	
		$this->db->where("pro_user_id",$this->session->userdata('_user_id'));
		$this->db->update('pro_users', $data);
        return true;
	}

	function activate_user($data) {
	
		$this->db->where("pro_user_id",$data['id']);
		$this->db->where("pro_user_email",$data['email']);
		$this->db->where("pro_user_status","0");
		$this->db->update('pro_users', array('pro_user_status'=>'1'));
        if($this->db->affected_rows()>0) {
			return true;
		}else {
			return false;
		}
	}
	
    function get_total_users() {

		$this->db->order_by("pro_user_joined","DESC");
		$this->db->select('pro_user_id');
		$query = $this->db->get($this->table_name);
		return $query->num_rows();
	}	

    function get_users_registered($cp,$pp) {

		$this->db->order_by("pro_user_joined","DESC");
		$this->db->select();
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
	
    function get_user_details($UserID) {
        $this->db->where('pro_user_id', $UserID);
		$this->db->select();
        $query = $this->db->get($this->table_name);
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return '';
		}
    }
	
	function get_recent_joinees() {
	
		$this->db->limit(6);
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
	
    function is_valid_user($user){
	
        $this->db->select('pro_user_id,pro_user_full_name,pro_user_email,pro_user_password'); //'pro_users');
        $this->db->where('pro_user_email', $user);
        $query = $this->db->get($this->table_name);
		if($query->num_rows() > 0) {

			$this->load->library('email');

			$this->email->from('murugesanme@yahoo.com', 'Murugesan P');
			$this->email->to('murugdev.eee@gmail.com');
			$this->email->subject('Commute Easy: Your Password');
			
			// Constructing Ride Details Email Notification
			$emailMessage = "Hello ".$query->row()->pro_user_full_name.", <br /><br />";
			$emailMessage.= "Please check your password below. <br /><br />";
			$emailMessage.= "Password : ".$query->row()->pro_user_password.", <br />";

			$emailMessage.= " <br />";
			$emailMessage.= " Thanks, <br />";
			$emailMessage.= " Administrator";

			$this->email->message($emailMessage);
			$this->email->send();
			
			return 'success';exit;
		}else {
			return 'failure';exit;
		}
    }
	
	function insertSingup($data) {
        $this->db->insert($this->table_name, $data);
        $inserted_id = $this->db->insert_id();
        return $inserted_id;
	}
	
	function insertIPAddress($data) {
        $this->db->insert('pro_allowed_ipaddresses', $data);
        $inserted_id = $this->db->insert_id();
        return $inserted_id;
	}
	
}

?>
