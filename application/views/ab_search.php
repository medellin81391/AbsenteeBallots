<?php
echo form_open("ab/search");
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
    ?>

<table  align="center">
    <tr>
        <th>Voter #</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Middle</th>
        <th>Home #</th>
        <th>Street</th>
        <th>Apt</th>
        <th>Zip</th>
        <th>DOB</th>
        <th>District</th>
        <th>Issue Ballot</th>
        
    </tr>
    <?php 
    foreach($query as $voter){
        $voter_id = $voter['voterNum'];
        ?>
    <tr align="center">
        <td><?php echo $voter['voterNum'] ?></td>
        <td><?php echo $voter['firstName'] ?></td>
        <td><?php echo $voter['lastName'] ?></td>
        <td><?php echo $voter['midInitial'] ?></td>
        <td><?php echo $voter['homeNum'] ?></td>
        <td><?php echo $voter['street'] ?></td>
        <td><?php echo $voter['apt'] ?></td>
        <td><?php echo $voter['zip'] ?></td>
        <td><?php echo $voter['dob'] ?></td>
        <td><?php echo $voter['district'] ?></td>
        <td><?php echo anchor("ab/issue_ballot/{$voter_id}", 'Issue') ?></td>
        </td>
    </tr>
    <?php
    }
    ?>
    </table>



    
    
    