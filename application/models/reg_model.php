<?php

class Reg_model extends CI_Model {
   
    public function add_voters(){
        
        $data = array(
            'firstName' => $this->input->post('firstName'),
            'lastName' => $this->input->post('lastName'),
            'midInitial' => $this->input->post('midInitial'),
            'homeNum' => $this->input->post('homeNum'),
            'street' => $this->input->post('street'),
            'apt' => $this->input->post('apt'),
            'zip' => $this->input->post('zip'),
            'dob' => $this->input->post('dob'),
            'district' => $this->input->post('district')
    );
        $query = $this->db->insert('voterinfo', $data);
        if ($query){
       return true;
       
        }
        else{
            return false;
            
        }
   }
   
   public function search_voters($search_term){
       $this->db->select('*');
       $this->db->from('voterinfo');
       $this->db->like('firstName', $search_term['firstName']);
       $this->db->like('lastName', $search_term['lastName']);
       $this->db->like('street', $search_term['street']);
       $this->db->like('dob', $search_term['dob']);
       $this->db->group_by('lastName', 'firstName');
       $query = $this->db->get();
       return $query->result_array();
       

       
   }

    public function get_voter($voter_id) {
        $this->db->select('*');
        $this->db->where('voterNum', $voter_id);
        $query = $this->db->get('voterinfo');

        return $query->row_array();
    }
   
    public function update_voter($voter_id, $data)
    {
        $this->db->where('voterNum', $voter_id);
        $this->db->update('voterinfo', $data);
    }
   
    public function del_voter($voter_id)
    {
        $this->db->where('voterNum', $voter_id);
        $this->db->delete('voterinfo');
    }
   
}