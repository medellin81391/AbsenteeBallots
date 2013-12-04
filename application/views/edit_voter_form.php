<a href="<?php echo base_url(); ?>reg/search"> <img src="<?php echo base_url(); ?>images/back_button.png" /></a>
<div id="form">
<?php
$voter_id = $voter['voterNum'];

echo form_open("reg/edit_voter/$voter_id");

echo form_label("First Name: ", "firstName");
echo form_input($firstName);

echo form_label("Last Name: ", "lastName");
echo form_input($lastName);

echo form_label("Middle Initial: ", "midInitial");
echo form_input($midInitial);

echo form_label("Middle Initial: ", "midInitial");
echo form_input($homeNum);

echo form_label("Street: ", "street");
echo form_input($street);

echo form_label("Apartment Number: ", "apt");
echo form_input($apt);

echo form_label("Zip Code: ", "zip");
echo form_input($zip);

echo form_label("Date of Birth: ", "dob");
echo form_input($dob);

echo form_label("District: ", "district");
echo form_input($district);

echo form_submit('editVoter', 'Edit');


echo form_close();

?>
</div>