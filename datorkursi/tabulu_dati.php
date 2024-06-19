<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dati, pievienošana un dzēšana</title>
    <link rel="stylesheet" href="tabulu_dati.css">
</head>
<body>
<div class="container">
<h1>Dati, pievienošana un dzēšana</h1>
<?php
require_once("config.php");
// +++++++++++++++++++++++
if(!empty($_POST["pievienot"])){
    $tabula=$_POST["tabula"];
    $kolonu_skaits=$_POST["kolonu_skaits"];
    $sql='insert into '.$tabula.' values (null';
    $i=2;
    while($i<=$kolonu_skaits){
        $sql=$sql.',"'.$_POST["lauks$i"].'"';
        $i++;
    }
    $sql=$sql.')';
    $result=$conn->query($sql);
    // echo "<br>sql= ".$sql;
    // echo "<br>Tabula: ".$tabula;
    // echo "<br>Dati pievienoti tabulā: ".$tabula;

    }
// ++++++++++++++++++++++++
// ------------------------
if(!empty($_POST["dzest"])){
    //delete from kabinets where idkabinets=3
    $tabula=$_POST["tabula"];
    $lauks_id=$_POST["lauks1"];
    $r_numurs=$_POST["rindasnumurs"];
    // echo "<br>Tabula: ".$tabula;
    $sql="delete from ".$tabula.' where '.$lauks_id.'='.$r_numurs;
    // echo "<br>sql: ".$sql;
    $conn->query($sql);
    // echo "<br>Ieraksts tika nodzēst no tabulas ".$tabula;
}
// ------------------------
$sql="show tables";
$result=$conn->query($sql);
if(empty($_POST["submitPoga"])){
echo '<div>Izvēlaties tabulu<span class=>*</span>:</div>';
echo '<form method="post">';
echo '<select name ="tabula" required>';
echo '<option value="" hidden></option>';
while ($row=$result->fetch_assoc()) {
echo '<option value="'.$row["Tables_in_asins_donoru_centrs_parventa"].'">'.$row["Tables_in_asins_donoru_centrs_parventa"].'</option>';
}
echo '</select>';
echo ' &nbsp;&nbsp;<input type="submit" name="submitPoga" value="Apskatīt tabulas izveides skriptu">';
echo '</form>';
}
else{
    $tabula=$_POST["tabula"];
    echo '<h3>Tabula: '.$tabula.'</h3>';
    $sql = "select * from ".$tabula;
    $result=$conn->query($sql);
    $nosaukumi= $result->fetch_fields();
    echo '
    <table>
        <tr>';
          foreach ($nosaukumi as $lauks) { //virsraksti
              echo '<th>'.$lauks->name.'</th>';
          }
        echo '</tr>';
        
        while($row = $result->fetch_assoc()){ //dati
            echo '<tr>';
              //cikls veido kolonnas
            foreach ($row as $vertiba) {  
                    echo '<td>'.$vertiba.'</td>';
            }
            $lauksid=$nosaukumi[0]->name;   //tabulas 1. lauka nosaukums
            echo '<td>
            <form method="post">
            <input type="hidden" name="rindasnumurs" value="'.$row["$lauksid"].'">
            <input type="hidden" name="tabula" value="'.$tabula.'">
            <input type="hidden" name="lauks1" value="'.$lauksid.'">
            <input type="submit" name="dzest" value="Dzēst"></form></td>
            </tr>';
            
        }

        echo '<tr><td></td>'; //rinda datu ievadam
        
        //$kolonu_skaits=$result->field_count;
        $i=2;
        echo '<form method="post">';
        while($i<=$result->field_count){
            echo '<td><input type="text" name="lauks'.$i.'"></td>'; 
            $i++;
      }
      echo '<td>
      <input type="hidden" name="kolonu_skaits" value="'.$result->field_count.'">
      <input type="hidden" name="tabula" value="'.$tabula.'">
      <input type="submit" name="pievienot" value="Pievienot"></td>';
      echo '</form>';
      echo '</tr>';       
     echo '
     </table>';
    
}
?>
<button><a href="datorkursi.html">Atpakaļ</a></button>
</div>
</body>
</html>