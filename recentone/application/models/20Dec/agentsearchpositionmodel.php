<?php
class AgentSearchPositionModel extends MY_Model{
    
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'agent_search_position';
        $this->primary_key = 'agent_search_position_id';
    }
    
    public function delete_by_agent_id($agent_id)
    {
        $this->db->where('agent_id', $agent_id);
        $this->db->delete($this->table_name);        
    }
    
    public function get_details_by_agents($agents)
    {
        $this->db->select('city');
        $this->db->where('random_string', $random_string);
        $query = $this->db->get($this->table_name);
        
        return $query->row();        
    }
    
    public function get_agents_by_city($city)
    {
        $this->db->select('agent_search_position_id, agent_id, position, random_string as asp_random_string');
        $this->db->where('city', $city);
        $this->db->order_by('created');
        $query = $this->db->get($this->table_name);
        
        return $query->result();   
    } 
    
    public function get_agents_by_state($state_id)
    {
        $this->db->select('asp.*, ag.first_name, ag.last_name');
        $this->db->from($this->table_name.' as asp');
        $this->db->join('agent as ag', 'ag.agent_id = asp.agent_id');
        $this->db->where('asp.state_id', $state_id);
        $this->db->order_by('asp.created');
        $query = $this->db->get();

        return $query->result();
    }
    
    public function update_view_count($asp_random_string)
    {
        $this->db->set('no_of_times_viewed', 'no_of_times_viewed+1', FALSE);    
        $this->db->where('random_string', $asp_random_string);
        $this->db->update($this->table_name);     
    }
    public function track_profile_click_count($asp_random_string)
    {
        $this->db->set('no_of_times_clicked', 'no_of_times_clicked+1', FALSE);    
        $this->db->where('random_string', $asp_random_string);
        $this->db->update($this->table_name);   
    }
}
?>