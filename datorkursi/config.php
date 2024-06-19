<?php
echo "<meta charset='utf-8'>";
$dblocation='localhost'; 
$dbuser='root';
$dbpasswd="";

// 1. PDO, 2. mysql(), 3. mysqli()
$conn = new mysqli($dblocation, $dbuser, $dbpasswd);
if ($conn->connect_error) {
    echo "Nevar savienoties ar DB: " . $conn->connect_error;
      } 
    //else echo "Savienojums ar DB ir izveidots!";
//kodējums DB
//1. mājas lapa, 2. db , 3. datu plūsma no db_servera uz m.l.
// echo "<br/>Kodējums: ". $conn->character_set_name();//apskatiit kodējumu
// $conn->set_charset("utf8");//uzliek kodējumu utf8
// echo "<br/>Kodējums: ". $conn->character_set_name();
$vaicajums="use asins_donoru_centrs_parventa";
$resultats=$conn->query($vaicajums);
?>