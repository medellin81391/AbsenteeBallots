<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ab extends CI_Controller {
    

    public function index(){
        $this->search();
    }
    public function search(){
        $this->load->view("ab_header");
        $this->load->view("ab_nav");
    }
}