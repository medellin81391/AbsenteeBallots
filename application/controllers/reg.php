<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reg extends CI_Controller {
    

    public function index(){
        $this->searchTest();
    }
    
    public function searchTest(){
        $this->load->model('reg_model');
       
    $search_term = array(
        'firstName' => $this->input->post('firstName'),
        'lastName' => $this->input->post('lastName'),
        'street' => $this->input->post('street'),
        'dob' => $this->input->post('dob'));
                

        $data['query'] = $this->reg_model->test($search_term);

        
        $this->load->view("reg_header");
        $this->load->view("reg_nav");
        $this->load->view("reg_search_form", $data);
        $this->load->view("reg_search", $data); 
    }
    public function search(){
        $this->load->model('reg_model');
        $data["query"] = $this->reg_model->search_voters();   
        
        $this->load->view("reg_header");
        $this->load->view("reg_nav");
        $this->load->view("reg_search_form");
        $this->load->view("reg_search", $data); 

    }
    
    
    public function add(){    
        
        $this->load->view("reg_header");
        $this->load->view("reg_nav");
        $this->load->view("reg_form", $data); 
    }
    
    public function send(){
        
        $this->load->library("form_validation");
        
        $this->form_validation->set_rules("firstName", "First Name", "required");
        $this->form_validation->set_rules("lastName", "Last Name", "required");
        $this->form_validation->set_rules("homeNum", "Home Number", "required");
        $this->form_validation->set_rules("street", "Street", "required");
        $this->form_validation->set_rules("zip", "Zip Code", "required");
        $this->form_validation->set_rules("dob", "Date of Birth", 'trim|required|valid_date[d/m/y,/]');
        $this->form_validation->set_rules("localDist", "Local District", "required");
        $this->form_validation->set_rules("stateDist", "State District", "required");
        
        //add to database
        if ($this->form_validation->run() == FALSE){
            $this->load->view("reg_header");
            $this->load->view("reg_nav");
            $this->load->view("reg_form", $data);
            
        }
        else{
            
            
                    
            $this->load->model('reg_model');
            $this->reg_model->add_voters();
            
            
            redirect(current_url());
           
            
        }
        }
            
        
             
        
    }
