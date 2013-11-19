<div id="form">
    <?php
    
    echo $message;
    
    echo validation_errors();
    
    
    echo form_open("reg/send");
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
    
    //middle initial
    echo form_label("Middle Initial: ", "midInitial");
    
    $data = array(
        "name" => "midInitial",
        "id" => "midInitial",
        "value" => set_value("midInitial")
    );    
    echo form_input($data);
    
    //home number
    echo form_label("Home Number: ", "homeNum");
    
    $data = array(
        "name" => "homeNum",
        "id" => "homeNum",
        "value" => set_value("homeNum")
    );    
    echo form_input($data);
    
    //street
    echo form_label("Street: ", "street");
    
    $data = array(
        "name" => "street",
        "id" => "street",
        "value" => set_value("street")
    );    
    echo form_input($data);
    
    //apartment number
    echo form_label("Apartment Number: ", "apt");
    
    $data = array(
        "name" => "apt",
        "id" => "apt",
        "value" => set_value("apt")
    );    
    echo form_input($data);
    
    //zip code
    echo form_label("Zip Code: ", "zip");
    
    $data = array(
        "name" => "zip",
        "id" => "zip",
        "value" => set_value("zip")
    );    
    echo form_input($data);
    
    //date of birth
    echo form_label("Date of Birth: ", "dob");
    
    $data = array(
        "name" => "dob",
        "id" => "dob",
        "value" => set_value("dob")
    );    
    echo form_input($data);
    
    //local district
    echo form_label("Local District: ", "localDist");
    
    $data = array(
        "name" => "localDist",
        "id" => "localDist",
        "value" => set_value("localDist")
    );    
    echo form_input($data);
    
    //state district
    echo form_label("State District: ", "stateDist");
    
    $data = array(
        "name" => "stateDist",
        "id" => "stateDist",
        "value" => set_value("stateDist")
    );    
    echo form_input($data);
    
    echo form_submit("registrationSubmit", "submit");
    
    
    
    echo form_close();
    ?>
</div>