<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vaicājumi</title>
    <link rel="stylesheet" href="vaicajumi.css">
</head>
<body>
<div class="container">
<button><a href="datorkursi.html">Atpakaļ</a></button>
<h1 id="saraksts">Vaicājumi</h1>
<ol>
    <li><a href="#id1">1.vaicājums</a></li>
    <li><a href="#id2">2.vaicājums</a></li>
    <li><a href="#id3">3.vaicājums</a></li>
    <li><a href="#id4">4.vaicājums</a></li>
    <li><a href="#id5">5.vaicājums</a></li>
    <li><a href="#id6">6.vaicājums</a></li>
    <li><a href="#id7">7.vaicājums</a></li>
    <li><a href="#id8">8.vaicājums</a></li>
    <li><a href="#id9">9.vaicājums</a></li>
    <li><a href="#id10">10.vaicājums</a></li>
</ol>

<form method="post">
    <textarea name="vaicajums" rows="4" cols="50"></textarea>
    <br>
    <input type="submit" name="submit" value="Vaicajuma rezultāts">
</form>

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
<h3 id="id1">1.Vaicājums: Cik no donoriem ir sievietes?</h3>
<pre>
select count(vards) as "Cik no donoriem ir sievietes?" 
from donori 
where vards like "%e" 
or vards like "%a"
</pre>
<p><a href="#saraksts">Uz tabulu sarakstu</a></p>

<h3 id="id2">2.Vaicājums: Vai ir kāds donors, kas dzīvo uz tās pašas ielas, kur atrodas Asins nodošanas vieta?</h3>
<pre>
select donori.vards, donori.uzvards
from donori, asins_nodosanas_saraksts, slimnica
where donori.iddonori=asins_nodosanas_saraksts.iddonori
and slimnica.idslimnica=asins_nodosanas_saraksts.idslimnica
and donori.adrese like slimnica.adrese
</pre>
<p><a href="#saraksts">Uz tabulu sarakstu</a></p>

<h3 id="id3">3.Vaicājums: Cik donorus ir pieņēmusi ārste Jana Bērzlape?</h3>
<pre>
select count(asins_nodosanas_saraksts.idsaraksts) as "Cik donoru ir pieņēmusi Jana Bērzlape?"
from arsti, asins_nodosanas_saraksts
where arsti.idarsti=asins_nodosanas_saraksts.idarsti
and asins_nodosanas_saraksts.idarsti = 1
</pre>
<p><a href="#saraksts">Uz tabulu sarakstu</a></p>

<h3 id="id4">4.Vaicājums: Cik donoriem ir O- asinsgrupa? </h3>
<pre>
select count(donori.vards) as "Donori ar asinsgrupu O-"
from donori, asins_nodosanas_saraksts , asinsgrupas
where donori.iddonori=asins_nodosanas_saraksts.iddonori 
and asins_nodosanas_saraksts.idasinsgrupas=asinsgrupas.idasinsgrupas
and asins_nodosanas_saraksts.idasinsgrupas = 2  
</pre>
<p><a href="#saraksts">Uz tabulu sarakstu</a></p>

<h3 id="id5">5.Vaicājums: No kurām pilsētām ir donori, kuri nodevuši asinis šajā slimnīcā?</h3>
<pre>
select  donori.pilseta, count(donori.iddonori) as "donoru skaits"
from donori, asins_nodosanas_saraksts, slimnica 
where donori.iddonori=asins_nodosanas_saraksts.iddonori
and slimnica.idslimnica=asins_nodosanas_saraksts.idslimnica
and asins_nodosanas_saraksts.idslimnica = 0
group by donori.pilseta
order by count(donori.iddonori) desc
</pre>
<p><a href="#saraksts">Uz tabulu sarakstu</a></p>

<h3 id="id6">6.Vaicājums: Cik L asins ir saziedotas šājā slimnīcā?</h3>
<pre>
select count(asins_nodosanas_saraksts.idsaraksts)*0.45 as "asinis(L)"
from donori, asins_nodosanas_saraksts, slimnica
where donori.iddonori=asins_nodosanas_saraksts.iddonori
and slimnica.idslimnica=asins_nodosanas_saraksts.idslimnica  
</pre>
<p><a href="#saraksts">Uz tabulu sarakstu</a></p>

<h3 id="id7">7.Vaicājums: Cik donorus ir pieņēmuši visi arsti?</h3>
<pre>
select arsti.vards,arsti.uzvards,count(donori.iddonori) as "donoru skaits"
from donori,asins_nodosanas_saraksts,arsti
where donori.iddonori=asins_nodosanas_saraksts.iddonori
and arsti.idarsti=asins_nodosanas_saraksts.idarsti
group by arsti.vards
order by count(donori.iddonori) desc
</pre>
<p><a href="#saraksts">Uz tabulu sarakstu</a></p>

<h3 id="id8">8.Vaicājums: Kādos vecumos ir donori?</h3>
select donori.vards,donori.uzvards,donori.personaskods,
(year(curdate())-(substr(personaskods,5,2)+if(substr(personaskods,5,2)>23,1900,2000))
-if(substr(personaskods,3,2) >=month(curdate()) and substr(personaskods,1,2)>=day(curdate()),1,0))as "vecums"
from donori 
order by 4 desc
limit 1
<pre>
   
</pre>
<p><a href="#saraksts">Uz tabulu sarakstu</a></p>

<h3 id="id9">9.Vaicājums: Kurā kabinetā ir visvairāk donoru bijuši?</h3>
<pre>
select kabinets.numurs as "Kabineta nr", count(donori.iddonori) as "Cik donori ir bijuši šajā kabinetā"
from asins_nodosanas_saraksts , kabinets , donori
where asins_nodosanas_saraksts.idkabinets = kabinets.idkabinets
and  donori.iddonori = asins_nodosanas_saraksts.iddonori
group by kabinets.numurs
order by count(donori.iddonori) desc
</pre>
<p><a href="#saraksts">Uz tabulu sarakstu</a></p>

<h3 id="id10">10.Vaicājums: Kura asins grupa ir vispopulārākā šajā nodošanas vietā?</h3>
<pre>
select asinsgrupa as "Asins grupa " ,count(distinct donori.iddonori) as "Donori ar atbilstošu asins grupu"  
from asinsgrupas, asins_nodosanas_saraksts , donori
where asinsgrupas.idasinsgrupas = asins_nodosanas_saraksts.idasinsgrupas
and asins_nodosanas_saraksts.iddonori = donori.iddonori
group by asinsgrupa
order by count(donori.iddonori) desc  
</pre>
<p><a href="#saraksts">Uz tabulu sarakstu</a></p>
<button><a href="datorkursi.html">Atpakaļ</a></button>
</div>
</body>
</html>