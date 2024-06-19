<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADCP</title>
    <link rel="stylesheet" href="proceduras.css">
</head>

<body>
    <div class="container">
    <h1 id="proceduras">Procedūras</h1>
    <ol>
        <li class="li"><a class="astyle" href="#id1">1.Procedūra</a></li>
        <li class="li"><a class="astyle" href="#id2">2.Procedūra</a></li>
        <li class="li"><a class="astyle" href="#id3">3.Procedūra</a></li>
    </ol>

    <form method="post">
        <textarea name="procedura" rows="5" cols="50"></textarea>
        <br><input type="submit" name="submit" value="Izpildīt!">
    </form>

    <h3 id="id1">Procedūra Nr.1 </h3>
    <pre>

        DROP PROCEDURE IF EXISTS visu_kabinetu_vietu_skaits;
        DELIMITER $$
        CREATE PROCEDURE visu_kabinetu_vietu_skaits()
        BEGIN
        DECLARE kopa_vietu_skaits INT;

        SELECT SUM(vietu_skaits) AS kopa_vietu_skaits FROM kabinets;

        -- Set output variable (optional)
        SET kopa_vietu_skaits = @kopa_vietu_skaits ;

        END $$
        DELIMITER ;
        SET @namelist = "";
        CALL visu_kabinetu_vietu_skaits();
   </pre>
    <h3 id="id2">Procedūra Nr.2 </h3>
    <pre>
            DROP PROCEDURE IF EXISTS max_donori_kura_kabineta;
        DELIMITER $$
        CREATE PROCEDURE max_donori_kura_kabineta()
        BEGIN
        DECLARE finished INTEGER DEFAULT 0;
        DECLARE rezultāts VARCHAR(255);

        DECLARE cursor_donors_per_cabinet CURSOR FOR
            SELECT
            CONCAT('Kabineta nr: ', kabinets.numurs, ', Cik donori:', COUNT(donori.iddonori))
            FROM asins_nodosanas_saraksts
            JOIN kabinets ON asins_nodosanas_saraksts.idkabinets = kabinets.idkabinets
            JOIN donori ON donori.iddonori = asins_nodosanas_saraksts.iddonori
            GROUP BY kabinets.numurs
            ORDER BY COUNT(donori.iddonori) DESC;

        OPEN cursor_donors_per_cabinet;

        WHILE finished = 0 DO
            FETCH cursor_donors_per_cabinet INTO rezultāts;
            IF finished = 0 THEN
            SELECT rezultāts;
            END IF;
        END WHILE;

        CLOSE cursor_donors_per_cabinet;
        END $$
        DELIMITER ;

        CALL max_donori_kura_kabineta();
   </pre>
    <h3 id="id3">Procedūra Nr.3 </h3>
    <pre>
            DROP PROCEDURE IF EXISTS donoru_epasti;
        DELIMITER $$
        CREATE PROCEDURE donoru_epasti ()
        BEGIN
        DECLARE finished INTEGER DEFAULT 0;
        DECLARE vards1 varchar(100);
        DECLARE uzvards1 varchar(100);
        DECLARE epasts1 varchar(200);
        DECLARE iddonori1 int;
        -- Corrected cursor name
        DECLARE donori_saraksts CURSOR FOR SELECT vards, uzvards, iddonori FROM donori;
        DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;
        OPEN donori_saraksts;
        WHILE finished = 0 DO
            FETCH donori_saraksts INTO vards1, uzvards1, iddonori1;
            SET epasts1 = CONCAT(LOWER(vards1), ".", LOWER(uzvards1), "@venta.lv");
            UPDATE donori SET donori.epasts = epasts1 WHERE iddonori = iddonori1;
        END WHILE;
        CLOSE donori_saraksts;
        END $$
        DELIMITER ;

        SET @namelist = "";
        CALL donoru_epasti();
   </pre>
    <p><a href="#proceduras">Uz procedūru sarakstu</a></p>
    <button> <a href="datorkursi.html"> Atpakaļ</a></button>

    <?php
require_once("config.php");

if(!empty($_POST["submit"])) {
    $sql=$_POST["proceduras"];
    echo "<br>Procedūras:<br><b> ".$sql."</b>";
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
</div>
</body>

</html>