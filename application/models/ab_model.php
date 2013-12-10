<?php
class Ab_model extends CI_Model {
      
    public function search_voters($search_term){
       $this->db->select('*');
       $this->db->from('voterinfo');
       $this->db->like('firstName', $search_term['firstName']);
       $this->db->like('lastName', $search_term['lastName']);
       $this->db->like('street', $search_term['street']);
       $this->db->like('dob', $search_term['dob']);
       $this->db->order_by('lastName', 'firstName');
       $query = $this->db->get();
       return $query->result_array();
       
   }
   
   public function add_election(){
        
        $data = array(
            'elecType' => $this->input->post('elecType'),
            'party' => $this->input->post('party'),
            'elecDate' => $this->input->post('elecDate')
                );
        
        $query = $this->db->insert('election', $data);
        if ($query){
       return true;
       
        }
        else{
            return false;
            
        }
   }
   
   public function get_voter($voter_id) {
        $this->db->select('*');
        $this->db->where('voterNum', $voter_id);
        $query = $this->db->get('voterinfo');

        return $query->row_array();
    }
   
    public function issue_ballots($voter_id, $data){
        $this->db->insert('issuedballots', $data);
    }
    public function get_all_elections() {
	$this->db->select('*');
	$query = $this->db->get('election');
 
	return $query->result_array();
	}

   public function get_election($election_id) {
        $this->db->select('*');
        $this->db->where('electionID', $election_id);
        $query = $this->db->get('election');

        return $query->row_array();
    }
   
    public function update_election($election_id, $data)
    {
        $this->db->where('electionID', $election_id);
        $this->db->update('election', $data);
    }
   
    public function del_election($election_id)
    {
        $this->db->where('electionID', $election_id);
        $this->db->delete('election');
    }  
    
    public function get_all_ballots() {
	$this->db->select('*');
        $this->db->order_by('electionID', 'lastName');
	$query = $this->db->get('issuedballots');
        
 
	return $query->result_array();
	}
	
    public function get_ballot($ballot_id)
	{
        $this->db->select('*');
        $this->db->where('ballotNum', $ballot_id);
        $query = $this->db->get('issuedballots');

        return $query->row_array();
	}
	
    public function update_ballot($ballot_id, $data)
    {
        $this->db->where('ballotNum', $ballot_id);
        $this->db->update('issuedballots', $data);
    }
   
    public function del_ballot($ballot_id)
    {
        $this->db->where('ballotNum', $ballot_id);
        $this->db->delete('issuedballots');
    } 
    
    
    function get_elec_dropdown()
    {
        $query = $this->db->get('election');
            if ($query->num_rows >= 1)
            {
                foreach($query->result_array() as $row)
                {
                    $data[$row['electionID']]= $row['electionID'];
                }
                return $data;
            }
    }
}