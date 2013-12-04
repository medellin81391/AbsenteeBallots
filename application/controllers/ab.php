<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ab extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('ab_model');
    }
    public function index(){
        $this->search();
    }
    public function search(){
        
        $search_term = array(
        'firstName' => $this->input->post('firstName'),
        'lastName' => $this->input->post('lastName'),
        'street' => $this->input->post('street'),
        'dob' => $this->input->post('dob')
            );
                

        $data['query'] = $this->ab_model->search_voters($search_term);

        
        $this->load->view("ab_header");
        $this->load->view("ab_nav");
        $this->load->view("ab_search", $data); 
    }
    
    function issue_ballot($voter_id) {

        $voter = $this->ab_model->get_voter($voter_id);

        $this->data['title'] = 'Edit Voter';
   
        $this->load->library("form_validation");
       
        $this->form_validation->set_rules("electionID", "Election", "required");
        $this->form_validation->set_rules("voterNum", "Voter Number", "required");
        $this->form_validation->set_rules("firstName", "First Name", "required");
        $this->form_validation->set_rules("lastName", "Last Name", "required");
        $this->form_validation->set_rules("homeNum", "Home Number", "required");
        $this->form_validation->set_rules("street", "Street", "required");
        $this->form_validation->set_rules("zip", "Zip Code", "required");
        $this->form_validation->set_rules("district", "District", "required");
        $this->form_validation->set_rules("dateIssued", "Date Issued", "required");
        
   $data = array(
            'electionID' => $this->input->post('electionID'),
            'voterNum' => $this->input->post('voterNum'),
            'ballotType' => $this->input->post('ballotType'),
            'firstName' => $this->input->post('firstName'),
            'lastName' => $this->input->post('lastName'),
            'midInitial' => $this->input->post('midInitial'),
            'homeNum' => $this->input->post('homeNum'),
            'street' => $this->input->post('street'),
            'zip' => $this->input->post('zip'),
            'district' => $this->input->post('district'),
            'dateIssued' => $this->input->post('dateIssued')
    );

            if ($this->form_validation->run() === true)
            {
                $this->ab_model->issue_ballots($voter_id, $data);

                $this->session->set_flashdata('message', "<p>voter updated successfully.</p>");
               
                redirect(base_url().'ab/search/'.$voter_id);
            }           

        $this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
       
        $this->data['voter'] = $voter;
        
        
        $this->data['electionID'] = array(
            'name'      => 'electionID',
            'id'        => 'electionID',
            'type'      => 'text',
            'value'     => $this->form_validation->set_value('electionID', $voter['electionID'])
        );
        
         $this->data['voterNum'] = array(
            'name'      => 'voterNum',
            'id'        => 'voterNum',
            'type'      => 'text',
            'value'     => $this->form_validation->set_value('voterNum', $voter['voterNum'])
        );
         
         $this->data['ballotType'] = array(
            'name'      => 'ballotType',
            'id'        => 'ballotType',
            'type'      => 'text',
            'value'     => $this->form_validation->set_value('ballotType', $voter['ballotType'])
        );

        $this->data['firstName'] = array(
            'name'      => 'firstName',
            'id'        => 'firstName',
            'type'      => 'text',
            'value'     => $this->form_validation->set_value('firstName', $voter['firstName'])
        );
       
        $this->data['lastName'] = array(
            'name'      => 'lastName',
            'id'        => 'lastName',
            'type'      => 'text',
            'value'     => $this->form_validation->set_value('lastName', $voter['lastName'])
        );
        
        $this->data['midInitial'] = array(
            'name'      => 'midInitial',
            'id'        => 'midInitial',
            'type'      => 'text',
            'value'     => $this->form_validation->set_value('midInitial', $voter['midInitial'])
            );

        $this->data['homeNum'] = array(
            'name'      => 'homeNum',
            'id'        => 'homeNum',
            'type'      => 'text',
            'value'     => $this->form_validation->set_value('homeNum', $voter['homeNum'])
            );
        
        
        $this->data['street'] = array(
            'name'      => 'street',
            'id'        => 'street',
            'type'      => 'text',
            'value'     => $this->form_validation->set_value('street', $voter['street'])
        );
        
        $this->data['zip'] = array(
            'name'      => 'zip',
            'id'        => 'zip',
            'type'      => 'text',
            'value'     => $this->form_validation->set_value('zip', $voter['zip'])
        );
        
        $this->data['district'] = array(
            'name'      => 'district',
            'id'        => 'district',
            'type'      => 'text',
            'value'     => $this->form_validation->set_value('district', $voter['district'])
        );
        
         $this->data['firstName'] = array(
            'name'      => 'firstName',
            'id'        => 'firstName',
            'type'      => 'text',
            'value'     => $this->form_validation->set_value('firstName', $voter['firstName'])
        );
        
        $this->load->view("ab_header");
        $this->load->view("ab_nav");
        $this->load->view('edit_voter_form', $this->data);
    }    
    
    
    
    
    public function add_edit_election(){
        $this->load->view("ab_header");
        $this->load->view("ab_nav");
        $this->load->view("ab_ae_view");
    }
    public function add_election(){        
        $this->load->view("ab_header");
        $this->load->view("ab_nav");
        $this->load->view("add_election_form");
    }
    
    public function send_election(){
        
        $this->load->library("form_validation");
        
        
        $this->form_validation->set_rules("elecDate", "Election Date", 'required');

        
        //add to database
        if ($this->form_validation->run() == FALSE){
            $this->load->view("ab_header");
            $this->load->view("ab_nav");
            $this->load->view("add_election_form");
            
        }
        else{
            $this->ab_model->add_election();
            redirect(current_url());
           
            
        }
        }
        
        public function view_election(){
            $this->data['elections'] = $this->ab_model->get_election($election_id);
            
            $this->load->view("ab_header");
            $this->load->view("ab_nav");
            $this->load->view("view_election", $this->data);
        }
        
        
        function edit_election($election_id) {
        $election = $this->ab_model->get_election($election_id);

        $this->data['title'] = 'Edit Election';
   
        //validate form input
        $this->load->library("form_validation");
       
        $this->form_validation->set_rules("elecDate", "Election Date", "required");
   
        if (isset($_POST) && !empty($_POST))
        {       
            $data = array(
                'elecType' => $this->input->post('elecType'),
                'party' => $this->input->post('party'),
                'elecDate' => $this->input->post('elecDate')
            );

            if ($this->form_validation->run() === true)
            {
                $this->reg_model->update_voter($election_id, $data);

                $this->session->set_flashdata('message', "<p>voter updated successfully.</p>");
               
                redirect(base_url().'ab/view_election/'.$election_id);
            }           
        }

        $this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
       
        $this->data['election'] = $election;
       
        //display the edit product form
        $this->data['elecDate'] = array(
            'name'      => 'elecDate',
            'id'        => 'elecDate',
            'type'      => 'text',
            'value'     => $this->form_validation->set_value('elecDate', $election['elecDate'])
        );
       
        $this->data['elecType'] = array(
            'name'      => 'elecType',
            'id'        => 'elecType',
            'type'      => 'text',
            'value'     => $this->form_validation->set_value('elecType', $election['elecType'])
        );
        
        $this->data['party'] = array(
            'name'      => 'party',
            'id'        => 'party',
            'type'      => 'text',
            'value'     => $this->form_validation->set_value('party', $election['party'])
            );
        

        $this->load->view('edit_election_form', $this->data);
    }    
    
        public function delete_election($election_id) {
                 $this->load->model('ab_model');
		$this->ab_model->del_election($election_id);
		
		$this->session->set_flashdata('message', '<p>Product were successfully deleted!</p>');
		
		redirect('ab/add_election');
	}
        
        public function get_elections(){
            $this->load->model('ab_model');
            $this->data['elections'] = $this->ab_model->get_elections();
            
            $this->load->view("ab_header");
            $this->load->view("ab_nav");
            $this->load->view("elections_list", $this->data);
            
        }
        
        
        
        }