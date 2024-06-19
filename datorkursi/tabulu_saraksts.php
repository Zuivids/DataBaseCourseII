<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADCP</title>
    <link rel="stylesheet" href="tabulu_saraksts.css">
</head>
<body>
<div class="container">
<h1>ADCP Tabulu saraksts</h1>
<div class="text">
<?php
require_once("config.php");

$sql="show tables";
$result=$conn->query($sql);
$i=1;
while ($row=$result->fetch_assoc()) {
    echo $i.". &nbsp;".$row["Tables_in_asins_donoru_centrs_parventa"]."<br>";
    $i++;
}

?>
</div>
<button><a href="datorkursi.html">Atpakaļ</a></button>
</div>

</body>
</html>