<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADCP</title>
    <link rel="stylesheet" href="mystyle.css">
</head>
<body>
<div class="container">
<h1>ADCP Tabulu struktūra</h1>
<div class="container2">
<?php
require_once("config.php");

$sql="show tables";
$result=$conn->query($sql);
if(empty($_POST["submitPoga"])){
echo '<div>Izvēlaties tabulu<span class=>*</span>:</div>';
echo '<form method="post">';
echo '<select name ="tabulas" required>';
echo '<option value="" hidden></option>';
while ($row=$result->fetch_assoc()) {
echo '<option value="'.$row["Tables_in_asins_donoru_centrs_parventa"].'">'.$row["Tables_in_asins_donoru_centrs_parventa"].'</option>';
}
echo '</select>';
echo ' &nbsp;&nbsp;<input type="submit" name="submitPoga" value="Apskatīt tabulas izveides skriptu">';
echo '</form>';
}
else{
    $tabula=$_POST["tabulas"];
    $sql="show create table ".$tabula;
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    echo '<pre>'.$row["Create Table"].'</pre>';
    }

?>
</div>
<button><a href="datorkursi.html">Atpakaļ</a></button>
</div>
</body>
</html>