<a href="<?php echo base_url(); ?>ab/get_ballots"> <img src="<?php echo base_url(); ?>images/back_button.png" /></a>
<div id="form">
<?php
$ballot_id = $ballot['ballotNum'];
echo form_open("ab/edit_ballot/$ballot_id");

echo form_label("Election #: ", "electionID");
echo form_input($electionID);

echo form_label("Voter #: ", "voterNum");
echo form_input($voterNum);

echo form_label("Ballot #: ", "ballotNum");
echo form_input($ballotNum);

echo form_label("Voter Type: ", "voterType");
echo form_dropdown('voterType', $voterType, $ballot['voterType']);

echo form_label("first Name: ", "firstName");
echo form_input($firstName);

echo form_label("Last Name: ", "lastName");
echo form_input($lastName);

echo form_label("Middle Initial: ", "midInitial");
echo form_input($midInitial);

echo form_label("Home #: ", "homeNum");
echo form_input($homeNum);

echo form_label("Street: ", "street");
echo form_input($street);

echo form_label("Zip: ", "zip");
echo form_input($zip);

echo form_label("District: ", "district");
echo form_input($district);

echo form_label("Date Issued: ", "dateIssued");
echo form_input($dateIssued);

echo form_submit('editBallot', 'Edit');
 
echo form_close();
?>
</div>
