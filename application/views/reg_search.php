<?php foreach($query as $row):?>

<h2> <?php echo $row->firstName; ?></h2>
<?php echo $row->lastName; ?>


<?php endforeach;?>