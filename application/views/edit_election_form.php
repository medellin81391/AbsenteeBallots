<?php
$election_id = $election['electionID'];

echo_form('ab/edit_election/$election_id');

echo form_input($elecType);

echo form_input($party);

echo form_input($elecDate);

echo form_submit('editElection', 'Edit');



$data = array(
    'name' => 'backButton',
    'id' => 'backButton',
    'value' => 'Back',
    'type' => 'button',
);

$js = 'onClick="echo base_url(ab/add_election)"';
echo form_button($data, $js); 
echo form_close();

?>
