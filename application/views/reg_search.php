<?php 
$this->load->library('table');
foreach ($query as $row){
   echo $this->table->generate($row); 
}
?>