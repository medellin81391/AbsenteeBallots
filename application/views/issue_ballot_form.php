<a href="<?php echo base_url(); ?>ab/search"> <img src="<?php echo base_url(); ?>images/back_button.png" /></a>
<div id="form">
<?php
$voter_id = $voter['voterNum'];
echo form_open("ab/issue_ballot/$voter_id");


echo form_label('Election: ', 'electionID');
echo form_dropdown('electionID', $electionID);


echo form_label('Voter Number: ', 'voterNum');
echo form_input($voterNum);

echo form_label('Ballot #: ', 'ballotNum');

$data = array(
              'name'        => 'ballotNum',
              'id'          => 'ballotNum',
              'value'       => set_value("ballotNum")

            );

echo form_input($data);

echo form_label('Voter Type: ', 'voterType');
$options = array(
                  'B'  => 'Blank',
                  'C'  => 'Civilian',
                  'M'  => 'Military',
                );


echo form_dropdown('voterType', $options, 'C');

echo form_label('First Name: ', 'firstName');
echo form_input($firstName);

echo form_label('Last Name: ', 'lastName');
echo form_input($lastName);

echo form_label('middle initial: ', 'midInitial');
echo form_input($midInitial);

echo form_label('Home #: ', 'homeNum');
echo form_input($homeNum);

echo form_label('Street: ', 'street');
echo form_input($street);

echo form_label('Zip: ', 'zip');
echo form_input($zip);

echo form_label('District: ', 'district');
echo form_input($district);


echo form_label('Date Issued: ', 'dateIssued');

$data = array(
              'name'        => 'dateIssued',
              'id'          => 'dateIssued',
              'value'       => set_value("dateIssued")

            );

echo form_input($data);

echo form_submit('issueBallot', 'Issue');

echo form_close();
?>
</div>
