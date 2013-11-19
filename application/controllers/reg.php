<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reg extends CI_Controller {

    public function index(){
        $this->search();
    }
    
    public function search(){
        $this->load->model('reg_model');
        $data["query"] = $this->reg_model->search_voters();   
        
        $this->load->view("reg_header");
        $this->load->view("reg_nav");
        $this->load->view("reg_search", $data); 

    }
    
    
    public function add(){    
        
        $data["message"] = "";
        $this->load->view("reg_header");
        $this->load->view("reg_nav");
        $this->load->view("reg_form", $data); 
    }
    
    public function send(){
        
        $this->load->library("form_validation");
        
        $this->form_validation->set_rules("firstName", "First Name", "required");
        $this->form_validation->set_rules("lastName", "Last Name", "required");
        $this->form_validation->set_rules("midInitial", "Middle Initial", "required");
        $this->form_validation->set_rules("homeNum", "Home Number", "required");
        $this->form_validation->set_rules("street", "Street", "required");
        $this->form_validation->set_rules("zip", "Zip Code", "required");
        $this->form_validation->set_rules("dob", "Date of Birth", "required");
        $this->form_validation->set_rules("stateDist", "State District", "required");
        $this->form_validation->set_rules("stateDist", "State District", "required");
        
        //add to database
        if ($this->form_validation->run() == FALSE){
            
            $data["message"] = "";
            $this->load->view("reg_header");
            $this->load->view("reg_nav");
            $this->load->view("reg_form", $data); 
        }
        else{
            
            //
            $this->load->model('reg_model');
            $this->reg_model->add_voters();
            
            $data["message"] = "The form has successfully been sent";
            
            $this->load->view("reg_header");
            $this->load->view("reg_nav");
            $this->load->view("reg_form", $data); 
        }    
        }
            
        
             
        
    }
