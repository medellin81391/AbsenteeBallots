<h1 align="center">Select an Election</h1>
<table  align="center">
    <tr>
        <th>ID</th>
        <th>Type</th>
        <th>Party</th>
        <th>Date</th>

    </tr>
    <?php 
    foreach($elections as $election){
        $election_id = $election['electionID'];
        ?>
    <tr align="center">
        <td><a href="<?php echo base_url(); ?>ab/search" style="color: #000000"><?php echo $election['electionID'] ?></a></td>
        <td><a href="<?php echo base_url(); ?>ab/search" style="color: #000000"><?php echo $election['elecType'] ?></a></td>
        <td><a href="<?php echo base_url(); ?>ab/search" style="color: #000000"><?php echo $election['party'] ?></a></td>
        <td><a href="<?php echo base_url(); ?>ab/search" style="color: #000000"><?php echo $election['elecDate'] ?></a></td>
    </tr>
    <?php
    }
    ?>
    </table>