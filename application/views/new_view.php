<!DOCTYPE html>
<html lang="eng">
    <head> 
    </head>
    <body>
        <div id='container'>
            <?php
            foreach($query->result() as $row){
                echo"<p>" . $row->voterNum . " : " .$row->lastName . " : " .$row->firstName . " : " .$row->midInitial . "</p>";
            }
            ?>
        </div>
            
    </body>
</html>