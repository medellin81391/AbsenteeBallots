<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ab extends CI_Controller {
    

    public function index(){
        $this->search();
    }
    public function search(){
        $this->load->model('ab_model');
        
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
    public function add_election(){
        $this->load->view("ab_header");
        $this->load->view("ab_nav");
        $this->load->view("add_election_form");
    }
}