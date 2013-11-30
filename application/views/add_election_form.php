<?php

echo form_open("ab/addElection");
//electionType
	echo form_label("Election Type: ", "electionType");
	$options = array(
                  'election'  => 'Election',
                  'general'    => 'General',
                  'presidential'   => 'Presidential',
				  'primary'   => 'Primary',
				  'referendum'   => 'Referendum',
                );

	echo form_dropdown('electiontype', $options, 'election');
	
	echo form_label("Party, If Applicable: ", "party");
	$options = array(
                  'r'  => 'Republican',
                  'd'    => 'Democrat'
                );

	echo form_dropdown('party', $options);
        echo form_submit("newElectionSubmit", "submit");
        echo from_close();
        ?>