<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADCP</title>
    <link rel="stylesheet" href="datu_ievietosanas_skripti.css">
</head>
<body>
<div class="container">
<h1 id="saraksts">Datu ievietošanas skripti</h1>
<div class="text">
<?php
require_once("config.php");
$sql="show tables";
$result=$conn->query($sql);

$i=1;
while ($row= $result->fetch_assoc()){ 
  echo $i.'. &nbsp;<a class="saraksts" href="#id'.$i.'">'.$row["Tables_in_asins_donoru_centrs_parventa"].'</a><br>';  $i++;     
}
?>
</div>
<h3 id="id1">Arsti</h3>
<pre>INSERT INTO `arsti` VALUES (1,'Jānis','Bērziņš','190779-10506'),
                (2,'Valdis','Slišāns','200189-14329'),
                (3,'Jana','Bērzlape','090375-19345'),
                (4,'Inta','Niedre','150769-47923');
</pre>
<button><a href="#saraksts">Uz tabulu sarakstu</a></button>
<button><a href="datorkursi.html">Atpakaļ</a></button>
<h3 id="id2">Asins nodosanas saraksts</h3>
<pre>INSERT INTO `asins_nodosanas_saraksts` VALUES (1,1,1,1,1,0),
      (2,2,2,1,2,0),(3,3,3,2,2,0),(4,4,4,2,2,0),
      (5,5,1,2,3,0),(6,6,2,2,3,0),(7,7,3,3,3,0),
      (8,8,4,3,4,0),(9,9,1,3,4,0),(10,10,4,4,4,0),
      (11,11,2,4,5,0),(12,12,3,4,5,0),(13,13,2,4,5,0),
      (14,14,2,4,3,0),(15,15,3,3,6,0),(16,16,1,3,6,0),
      (17,17,1,3,6,0),(18,18,1,3,7,0),(19,19,4,2,7,0),
      (20,20,4,2,7,0),(21,21,3,2,8,0),(22,22,3,2,8,0),
      (23,23,3,1,8,0),(24,24,2,1,8,0),(25,25,2,1,1,0),
      (26,26,2,1,1,0),(27,27,2,2,1,0),(28,28,1,2,1,0),
      (29,29,2,1,2,0),(30,30,1,1,2,0),(31,31,3,2,2,0),
      (32,32,3,2,3,0),(33,33,3,2,3,0),(34,34,2,2,3,0),
      (35,35,4,3,4,0),(36,36,4,3,4,0),(37,37,4,3,4,0),
      (38,38,4,4,5,0),(39,39,2,4,6,0),(40,40,2,2,7,0),
      (41,41,2,2,8,0),(42,13,1,1,5,0),(43,4,3,2,2,0),
      (44,15,2,3,6,0),(45,6,4,4,3,0),(46,17,4,4,6,0),
      (47,19,2,2,7,0),(48,2,1,3,2,0),(49,3,3,1,2,0),
      (50,4,2,2,2,0),(51,17,3,3,6,0),(52,19,4,2,7,0),
      (53,41,2,1,8,0),(54,37,1,2,4,0),(55,25,4,2,1,0),
      (56,29,2,3,2,0),(57,22,3,1,8,0),(58,25,1,4,1,0),
      (59,15,3,4,6,0),(60,3,2,2,2,0),(61,5,4,3,3,0),
      (62,19,2,2,7,0),(63,22,2,2,8,0),(64,29,1,1,2,0),
      (65,30,3,2,2,0);
</pre>
<button><a href="#saraksts">Uz tabulu sarakstu</a></button>
<button><a href="datorkursi.html">Atpakaļ</a></button>
<h3 id="id3">Asinsgrupas</h3>
<pre>INSERT INTO `asinsgrupas` VALUES (1,'0+'),
                  (2,'0-'),
                  (3,'A+'),
                  (4,'A-'),
                  (5,'B+'),
                  (6,'B-'),
                  (7,'AB+'),
                  (8,'AB-');
</pre>
<button><a href="#saraksts">Uz tabulu sarakstu</a></button>
<button><a href="datorkursi.html">Atpakaļ</a></button>
<h3 id="id4">Donori</h3>
<pre>
                               INSERT INTO `donori` VALUES 
  (1,'Anna','Bērziņa','011297-42563','Pētera iela 12','Ventspils',0,'Nav norādīts'),
  (2,'Dominiks','Domino','130387-10432','Hipokrātu iela 17-23','Rīga',0,'Nav norādīts'),
  (3,'Lāsma','Kaudze','010598-10223','Rīgas iela 2','Talsi',0,'Nav norādīts'),
  (4,'Izle','Milze','160699-30543','Lielasi prospekts 2','Ventspils',0,'Nav norādīts'),
  (5,'Valters','Rapa','310392-31241','Zilupes iela 43','Kuldīga',0,'Nav norādīts'),
  (6,'Jana','Migla','090994-35123','Inženieru iela 13','Ventspils',0,'Nav norādīts'),
  (7,'Zaiga','Pudiņa','071198-12355','Skrundas iela 8','Ventspils',0,'Nav norādīts'),
  (8,'Velta','Vizma','010370-13215','Aleksandra Čaka iela 78-3','Rīga',0,'Nav norādīts'),
  (9,'Kārlis','Brālis','090292-10530','Lielā iela 22','Valmiera',0,'Nav norādīts'),
  (10,'Pēteris','Sirmais','080698-32151','Kukaiņu iela 4','Rīga',0,'Nav norādīts'),
  (11,'Oskars','Zaguševskis','011295-21333','Liepājas iela 90','Ventspils',0,'Nav norādīts'),
  (12,'Liene','Pūce','150295-92312','Usmas iela 22','Ventspils',0,'Nav norādīts'),
  (13,'Antons','Punktiņš','221090-14532','Baronu iela 33','Kuldīga',0,'Nav norādīts'),
  (14,'Rita','Rudens','091399-15232','Ozola iela 1','Ventspils',0,'Nav norādīts'),
  (15,'Aina','Vaina','120478-71232','Māras iela 13-4','Liepāja',0,'Nav norādīts'),
  (16,'Māris','Lazdiņš','010795-31234','Lidotāju iela 15','Ventspils',0,'Nav norādīts'),
  (17,'Ilze','Paparde','031089-42123','Skolas iela 54','Ventspils',0,'Nav norādīts'),
  (18,'Vija','Vāle','130774-32144','Baltā iela 32','Liepāja',0,'Nav norādīts'),
  (19,'Kirsts','Uguns','011269-15323','Mākoņu iela 30','Ventspils',0,'Nav norādīts'),
  (20,'Jānis','Kālis','111185-23123','Gaujas iela 24','Kuldīga',0,'Nav norādīts'),
  (21,'Viktors','Zaharijs','131089-12463','Ziepju iela 23','Ventspils',0,'Nav norādīts'),
  (22,'Valdis','Mieriņš','190998-16323','Polijas iela 94','Ventspils',0,'Nav norādīts'),
  (23,'Oksana','Petrovska','100199-23123','Sarkanā iela 12','Ventspils',0,'Nav norādīts'),
  (24,'Aleksandrs','Pupols','170390-16323','Dzeguzes iela 20-4','Kuldīga',0,'Nav norādīts'),
  (25,'Baiba','Nakts','190599-13522','Popes iela 7','Rīga',0,'Nav norādīts'),
  (26,'Mārcis','Blaumanis','070777-31223','Mazā iela 2-7','Ventspils',0,'Nav norādīts'),
  (27,'Raimonds','Pestītājs','091189-13612','Akmens iela 9-3','Ventspils',0,'Nav norādīts'),
  (28,'Ēriks','Vasalis','301259-13262','Ziemas iela 20-4','Ventspils',0,'Nav norādīts'),
  (29,'Dāvis','Jolka','150789-32154','Helgas iela 4-58','Kuldīga',0,'Nav norādīts'),
  (30,'Uldis','Caune','291290-13543','Garā iela 23-45','Rīga',0,'Nav norādīts'),
  (31,'Vasīlijs','Priedīts','311099-51223','Straujā iela 12','Ventspils',0,'Nav norādīts'),
  (32,'Genoveva','Petrovskis','280683-15235','Pelēkzilā iela 15-56','Ventspils',0,'Nav norādīts'),
  (33,'Maija','Zute','130982-31523','Griestu iela 33','Rīga',0,'Nav norādīts'),
  (34,'Zaharijs','Pētersons','021190-15123','Nezināmā iela 32','Ventspils',0,'Nav norādīts'),
  (35,'Ralfs','Eilands','071279-31523','Grieztu iela 38','Liepāja',0,'Nav norādīts'),
  (36,'Gabriela','Gromanovska','010469-32113','Tapešu iela 1','Ventspils',0,'Nav norādīts'),
  (37,'Žanis','Žiglais','070189-21342','Lielā iela 90','Kuldīga',0,'Nav norādīts'),
  (38,'Vitnija','Hjūstona','251190-13521','Lidotāju iela 45','Ventspils',0,'Nav norādīts'),
  (39,'Vēsma','Vētra','210967-23534','Skrundas iela 2','Ventspils',0,'Nav norādīts'),
  (40,'Kristaps','Akmens','180495-14332','Kuldīgas iela 11','Ventspils',0,'Nav norādīts'),
  (41,'Krista','Vista','120873-31244','Kalnu iela 1','Ventspils',0,'Nav norādīts');
</pre>
<button><a href="#saraksts">Uz tabulu sarakstu</a></button>
<button><a href="datorkursi.html">Atpakaļ</a></button>
<h3 id="id5">Kabineti</h3>
<pre>
INSERT INTO `kabinets` VALUES 
      (1,'A01','2'),
      (2,'A02','2'),
      (3,'A03','4'),
      (4,'A04','4');
</pre>
<button><a href="#saraksts">Uz tabulu sarakstu</a></button>
<button><a href="datorkursi.html">Atpakaļ</a></button>
<h3 id="id6">Slimnica</h3>
<pre>
  INSERT INTO `slimnica` VALUES 
(0,'Nezināmā iela 32','Ventspils');
</pre>
<button><a href="#saraksts">Uz tabulu sarakstu</a></button>
<button><a href="datorkursi.html">Atpakaļ</a></button>
</div>
</body>
</html>