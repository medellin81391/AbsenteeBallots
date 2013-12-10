<a href="<?php echo base_url(); ?>ab/view_election"> <img src="<?php echo base_url(); ?>images/back_button.png" /></a>
<div id="form">
<?php
$election_id = $election['electionID'];
echo form_open("ab/edit_election/$election_id");

echo form_label("Election Type: ", "elecType");
echo form_dropdown('elecType', $elecType, $election['elecType']);
 
echo form_label("Pary, if Applicable: ", "party");
echo form_dropdown('party', $party, $election['party']);

echo form_label("Election Date: ", "elecDate");
echo form_input($elecDate);

echo form_submit('editElection', 'Edit');
 
echo form_close();
?>
</div>