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
            'localDist' => $this->input->post('localDist'),      
            'stateDist' => $this->input->post('stateDist'),      
    );
   $query = $this->db->insert('voterinfo', $data);
   
   if ($query){
       return true;
   }
   else{
       return false;
   }           
       
   }
   
   public function search_voters(){
       
       $query = $this->db->get('voterinfo');
       if($query->num_rows()>0){
           foreach($query->result() as $row){
               $data[]=$row;
           }
           return $data;
       }
       
   }
       
            
}
