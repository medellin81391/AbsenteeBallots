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

$this->data['electionID'] = $this->ab_model->get_elec_dropdown();

$this->data['title'] = 'Issue Ballot';

$this->load->library("form_validation");

$this->form_validation->set_rules("electionID", "Election", "required");
$this->form_validation->set_rules("voterNum", "Voter Number", "required");
$this->form_validation->set_rules("ballotNum", "Ballot #", "required");
$this->form_validation->set_rules("firstName", "First Name", "required");
$this->form_validation->set_rules("lastName", "Last Name", "required");
$this->form_validation->set_rules("homeNum", "Home Number", "required");
$this->form_validation->set_rules("street", "Street", "required");
$this->form_validation->set_rules("zip", "Zip Code", "required");
$this->form_validation->set_rules("district", "District", "required");
$this->form_validation->set_rules("dateIssued", "Date Issued", "required");

if (isset($_POST) && !empty($_POST))
{ 	 
$data = array(
'electionID' => $this->input->post('electionID'),
'voterNum' => $this->input->post('voterNum'),
'ballotNum' => $this->input->post('ballotNum'),
'voterType' => $this->input->post('voterType'),
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
}

$this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));

$this->data['voter'] = $voter;



$this->data['voterNum'] = array(
'name' => 'voterNum',
'id' => 'voterNum',
'type' => 'text',
'value' => $this->form_validation->set_value('voterNum', $voter['voterNum'])
);


$this->data['firstName'] = array(
'name' => 'firstName',
'id' => 'firstName',
'type' => 'text',
'value' => $this->form_validation->set_value('firstName', $voter['firstName'])
);

$this->data['lastName'] = array(
'name' => 'lastName',
'id' => 'lastName',
'type' => 'text',
'value' => $this->form_validation->set_value('lastName', $voter['lastName'])
);

$this->data['midInitial'] = array(
'name' => 'midInitial',
'id' => 'midInitial',
'type' => 'text',
'value' => $this->form_validation->set_value('midInitial', $voter['midInitial'])
);

$this->data['homeNum'] = array(
'name' => 'homeNum',
'id' => 'homeNum',
'type' => 'text',
'value' => $this->form_validation->set_value('homeNum', $voter['homeNum'])
);


$this->data['street'] = array(
'name' => 'street',
'id' => 'street',
'type' => 'text',
'value' => $this->form_validation->set_value('street', $voter['street'])
);

$this->data['zip'] = array(
'name' => 'zip',
'id' => 'zip',
'type' => 'text',
'value' => $this->form_validation->set_value('zip', $voter['zip'])
);

$this->data['district'] = array(
'name' => 'district',
'id' => 'district',
'type' => 'text',
'value' => $this->form_validation->set_value('district', $voter['district'])
);

$this->load->view("ab_header");
$this->load->view("ab_nav");
$this->load->view('issue_ballot_form', $this->data);
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
$this->data['elections'] = $this->ab_model->get_all_elections();

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
$this->ab_model->update_election($election_id, $data);

$this->session->set_flashdata('message', "<p>voter updated successfully.</p>");

redirect(base_url().'ab/view_election/'.$election_id);
}
}

$this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));

$this->data['election'] = $election;

$this->data['elecDate'] = array(
'name' => 'elecDate',
'id' => 'elecDate',
'type' => 'text',
'value' => $this->form_validation->set_value('elecDate', $election['elecDate'])
);

$this->data['elecType'] = array(
'election' => 'Election',
'general' => 'General',
'presidential' => 'Presidential',
'primary' => 'Primary',
'referendum' => 'Referendum'
);

$this->data['party'] = array(
'n' => 'none',
'r' => 'Republican',
'd' => 'Democrat'
);

$this->load->view("ab_header");
$this->load->view("ab_nav");
$this->load->view('edit_election_form', $this->data);
}

public function delete_election($election_id) {

$this->ab_model->del_election($election_id);

$this->session->set_flashdata('message', '<p>Product were successfully deleted!</p>');

redirect('ab/view_election');
}

public function get_ballots(){
$this->data['ballots'] = $this->ab_model->get_all_ballots();

$this->load->view("ab_header");
$this->load->view("ab_nav");
$this->load->view("ballot_list", $this->data);

}

public function edit_ballot($ballot_id) {
$ballot = $this->ab_model->get_ballot($ballot_id);

$this->data['title'] = 'Edit Ballot';

$this->load->library("form_validation");

$this->form_validation->set_rules("electionID", "Election", "required");
$this->form_validation->set_rules("voterNum", "Voter Number", "required");
$this->form_validation->set_rules("ballotNum", "Ballot #", "required");
$this->form_validation->set_rules("firstName", "First Name", "required");
$this->form_validation->set_rules("lastName", "Last Name", "required");
$this->form_validation->set_rules("homeNum", "Home Number", "required");
$this->form_validation->set_rules("street", "Street", "required");
$this->form_validation->set_rules("zip", "Zip Code", "required");
$this->form_validation->set_rules("district", "District", "required");
$this->form_validation->set_rules("dateIssued", "Date Issued", "required");

if (isset($_POST) && !empty($_POST))
{ 	 
$data = array(
'electionID' => $this->input->post('electionID'),
'voterNum' => $this->input->post('voterNum'),
'ballotNum' => $this->input->post('ballotNum'),
'voterType' => $this->input->post('voterType'),
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
$this->ab_model->update_ballot($ballot_id, $data);

$this->session->set_flashdata('message', "<p>voter updated successfully.</p>");

redirect(base_url().'ab/get_ballots/'.$ballot_id);
}
}

$this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));

$this->data['ballot'] = $ballot;

$this->data['electionID'] = array(
'name' => 'electionID',
'id' => 'electionID',
'type' => 'text',
'value' => $this->form_validation->set_value('electionID', $ballot['electionID'])
);


$this->data['voterNum'] = array(
'name' => 'voterNum',
'id' => 'voterNum',
'type' => 'text',
'value' => $this->form_validation->set_value('voterNum', $ballot['voterNum'])
);

$this->data['ballotNum'] = array(
'name' => 'ballotNum',
'id' => 'ballotNum',
'type' => 'text',
'value' => $this->form_validation->set_value('ballotNum', $ballot['ballotNum'])
);

$this->data['voterType'] = array(
'C' => 'Civilian',
'B' => 'Blank',
'M' => 'Military'
);


$this->data['firstName'] = array(
'name' => 'firstName',
'id' => 'firstName',
'type' => 'text',
'value' => $this->form_validation->set_value('firstName', $ballot['firstName'])
);

$this->data['lastName'] = array(
'name' => 'lastName',
'id' => 'lastName',
'type' => 'text',
'value' => $this->form_validation->set_value('lastName', $ballot['lastName'])
);

$this->data['midInitial'] = array(
'name' => 'midInitial',
'id' => 'midInitial',
'type' => 'text',
'value' => $this->form_validation->set_value('midInitial', $ballot['midInitial'])
);

$this->data['homeNum'] = array(
'name' => 'homeNum',
'id' => 'homeNum',
'type' => 'text',
'value' => $this->form_validation->set_value('homeNum', $ballot['homeNum'])
);


$this->data['street'] = array(
'name' => 'street',
'id' => 'street',
'type' => 'text',
'value' => $this->form_validation->set_value('street', $ballot['street'])
);

$this->data['zip'] = array(
'name' => 'zip',
'id' => 'zip',
'type' => 'text',
'value' => $this->form_validation->set_value('zip', $ballot['zip'])
);

$this->data['district'] = array(
'name' => 'district',
'id' => 'district',
'type' => 'text',
'value' => $this->form_validation->set_value('district', $ballot['district'])
);

$this->data['dateIssued'] = array(
'name' => 'dateIssued',
'id' => 'dateIssued',
'type' => 'text',
'value' => $this->form_validation->set_value('dateIssued', $ballot['dateIssued'])
);


$this->load->view("ab_header");
$this->load->view("ab_nav");
$this->load->view('edit_ballot_form', $this->data);
}

public function delete_ballot($ballot_id) {

$this->ab_model->del_ballot($ballot_id);

$this->session->set_flashdata('message', '<p>Product were successfully deleted!</p>');

redirect('ab/get_ballots');
}
}