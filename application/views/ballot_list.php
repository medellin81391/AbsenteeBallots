<h1 align="center">Edit ballots</h1>
<table  align="center">
    <tr>
        <th>Election #</th>
        <th>ballot #</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>
    <?php 
    foreach($ballots as $ballot){
        $ballot_id = $ballot['ballotNum'];
        ?>
    <tr align="center">
        <td><?php echo $ballot['electionID'] ?></a></td>
        <td><?php echo $ballot['ballotNum'] ?></a></td>
        <td><?php echo $ballot['firstName'] ?></a></td>
        <td><?php echo $ballot['lastName'] ?></a></td>
        <td><?php echo anchor("ab/edit_ballot/{$ballot_id}", 'Edit') ?></td>
        <td><?php echo anchor('ab/delete_ballot/'.$ballot_id, 'Delete', 
            array('onClick' => "return confirm('Are you sure you want to delete?')"));
        ?>
    </tr>
    <?php
    }
    ?>
    </table>