<?php
echo form_open("reg/search");
   //first name 
    echo form_label("First Name: ", "firstName");
    
    $data = array(
        "name" => "firstName",
        "id" => "firstName",
        "value" => set_value("firstName")
    );    
    echo form_input($data);
    
    //last name
    echo form_label("Last Name: ", "lastName");
    
    $data = array(
        "name" => "lastName",
        "id" => "lastName",
        "value" => set_value("lastName")
    );    
    echo form_input($data);
    
    echo form_label("Street: ", "street");
    
    $data = array(
        "name" => "street",
        "id" => "street",
        "value" => set_value("street")
    );    
    echo form_input($data);
    
    echo form_label("Date of Birth: ", "dob");
    
    $data = array(
        "name" => "dob",
        "id" => "dob",
        "value" => set_value("dob")
    );    
    echo form_input($data);
    
    echo form_submit("searchSubmit", "Search");
    
    echo form_close();
    
    
    
    
    $this->table->set_heading(array('', 'Voter Number', 'First Name', 'Last Name',
                                    'mid Initial', 'Home Number', 'Street',
                                    'Apt', 'Zip', 'DOB',
                                    'Local District', 'State District'));
    
    foreach ($query as $row){
        
        $this->table->add_row($row);       
    }
    
    echo $this->table->generate();
    
    ?>