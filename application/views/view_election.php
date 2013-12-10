<div id="navcontainer">
<ul>
     <li><a href="<?php echo base_url(); ?>ab/add_election">Add Elections</a></li>
 </ul>
</div>

<table  align="center">
    <tr>
        <th>Election ID</th>
        <th>Election Type</th>
        <th>Party</th>
        <th>Election Date</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php 
    foreach($elections as $election){
        $election_id = $election['electionID'];
        ?>
    <tr>
        <td><?php echo $election['electionID'] ?></td>
        <td><?php echo $election['elecType'] ?></td>
        <td><?php echo $election['party'] ?></td>
        <td><?php echo $election['elecDate'] ?></td>
        <td><?php echo anchor("ab/edit_election/{$election_id}", 'Edit') ?></td>
        <td><?php echo anchor('ab/delete_election/'.$election_id, 'Delete', 
            array('onClick' => "return confirm('Are you sure you want to delete?')"));
        ?>
        </td>
    </tr>
    <?php
    }
    ?>
</table>