<?php
class Ab_model extends CI_Model {
      
    public function search_voters($search_term){
       $this->db->select('*');
       $this->db->from('voterinfo');
       $this->db->like('firstName', $search_term['firstName']);
       $this->db->like('lastName', $search_term['lastName']);
       $this->db->like('street', $search_term['street']);
       $this->db->like('dob', $search_term['dob']);
       $query = $this->db->get();
       return $query->result_array();
       
   }
}