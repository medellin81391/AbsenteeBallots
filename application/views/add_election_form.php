<div id="navcontainer">
<ul>
     <li><a href="<?php echo base_url(); ?>ab/view_election">Edit Elections</a></li>
 </ul>
</div>

<h1 align="center"> Add Election</h1>
<div align="center">
<?php

echo validation_errors();

echo form_open("ab/send_election");
//electionType
	echo form_label("Election Type: ", "elecType");
	$options = array(
                  'election'  => 'Election',
                  'general'    => 'General',
                  'presidential'   => 'Presidential',
		  'primary'   => 'Primary',
		  'referendum'   => 'Referendum',
                );
        
	echo form_dropdown('elecType', $options, 'election');
	
        //election party
	echo form_label("Party, If Applicable: ", "party");
	$options = array(
            'n' => 'none',
            'r'  => 'Republican',
            'd'    => 'Democrat'
                );

	echo form_dropdown('party', $options, 'n');
        
        //date
        echo form_label("Date: ", "elecDate");
        
        $data = array(
        "name" => "elecDate",
        "id" => "elecDate",
        "value" => set_value("elecDate")
    );    
    echo form_input($data);
        
        echo form_submit("newElectionSubmit", "submit");
        echo form_close();
        

        ?>

</div>