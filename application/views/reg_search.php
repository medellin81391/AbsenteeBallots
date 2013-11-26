<?php 
$this->load->library('table');

foreach ($query as $row){
    $this->table->add_row($row); 
}


?>