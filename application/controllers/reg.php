<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reg extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('reg_model');
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
                

        $data['query'] = $this->reg_model->search_voters($search_term);

        
        $this->load->view("reg_header");
        $this->load->view("reg_nav");
        $this->load->view("reg_search", $data); 
    }
    
    
    public function add(){    
        
        $this->load->view("reg_header");
        $this->load->view("reg_nav");
        $this->load->view("reg_form"); 
    }
    
    public function send(){
        
        $this->load->library("form_validation");
        
        $this->form_validation->set_rules("firstName", "First Name", "required");
        $this->form_validation->set_rules("lastName", "Last Name", "required");
        $this->form_validation->set_rules("homeNum", "Home Number", "required");
        $this->form_validation->set_rules("street", "Street", "required");
        $this->form_validation->set_rules("zip", "Zip Code", "required");
        $this->form_validation->set_rules("dob", "Date of Birth", 'trim|required|valid_date[d/m/y,/]');
        $this->form_validation->set_rules("district", "District", "required");
        
        //add to database
        if ($this->form_validation->run() == FALSE){
            $this->load->view("reg_header");
            $this->load->view("reg_nav");
            $this->load->view("reg_form");
            
        }
        else{
            $this->reg_model->add_voters();            
            redirect(current_url());          
        }
        
        }
        
        function edit_voter($voter_id) {

        $voter = $this->reg_model->get_voter($voter_id);

        $this->data['title'] = 'Edit Voter';
   
        $this->load->library("form_validation");
       
        $this->form_validation->set_rules("firstName", "First Name", "required");
        $this->form_validation->set_rules("lastName", "Last Name", "required");
        $this->form_validation->set_rules("homeNum", "Home Number", "required");
        $this->form_validation->set_rules("street", "Street", "required");
        $this->form_validation->set_rules("zip", "Zip Code", "required");
        $this->form_validation->set_rules("dob", "Date of Birth", 'trim|required|valid_date[d/m/y,/]');
        $this->form_validation->set_rules("district", "District", "required");
   
        if (isset($_POST) && !empty($_POST))
        {       
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

            if ($this->form_validation->run() === true)
            {
                $this->reg_model->update_voter($voter_id, $data);

                $this->session->set_flashdata('message', "<p>voter updated successfully.</p>");
               
                redirect(base_url().'reg/search/'.$voter_id);
            }           
        }

        $this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
       
        $this->data['voter'] = $voter;
       

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
        
        $this->data['apt'] = array(
            'name'      => 'apt',
            'id'        => 'apt',
            'type'      => 'text',
            'value'     => $this->form_validation->set_value('apt', $voter['apt'])
        );
        
        $this->data['zip'] = array(
            'name'      => 'zip',
            'id'        => 'zip',
            'type'      => 'text',
            'value'     => $this->form_validation->set_value('zip', $voter['zip'])
        );
        
        $this->data['dob'] = array(
            'name'      => 'dob',
            'id'        => 'dob',
            'type'      => 'text',
            'value'     => $this->form_validation->set_value('dob', $voter['dob'])
        );
        
        $this->data['district'] = array(
            'name'      => 'district',
            'id'        => 'district',
            'type'      => 'text',
            'value'     => $this->form_validation->set_value('district', $voter['district'])
        );
        
        $this->load->view("reg_header");
        $this->load->view("reg_nav");
        $this->load->view('edit_voter_form', $this->data);
    }    
    
        function delete_voter($voter_id) {
		$this->reg_model->del_voter($voter_id);
		
		$this->session->set_flashdata('message', '<p>Product were successfully deleted!</p>');
		
		redirect(base_url('reg/search'));
	}
        
}
