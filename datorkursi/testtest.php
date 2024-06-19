<?php
require_once("config.php");

if(!empty($_POST["submit"])) {
    $sql=$_POST["vaicajums"];
    echo "<br>Vaicājums:<br><b> ".$sql."</b>";
    $result=$conn->query($sql); 
      //1. rinda lauku nosaukumi
    $nosaukumi=$result->fetch_fields();
    echo '
    <table>
        <tr>';
          foreach ($nosaukumi as $lauks) { //virsraksti
              echo '<th>'.$lauks->name.'</th>';
          }
        echo '</tr>';
      // pārejās rindās dati 
      
        while($row = $result->fetch_assoc()){ //dati
                echo '<tr>';
                  //cikls veido kolonnas
                foreach ($row as $vertiba) {  
                        echo '<td>'.$vertiba.'</td>';
                }
                echo '</tr>';
        }
        echo "</table>";
}
?>