<?php
    require_once("../handlers/connect.php");
    mysqli_query ($connect, "set character_set_client='utf-8'");
    if (($_POST['nume']!="") and ($_POST['pren']!="") and ($_POST['tel']!="") and ($_POST['email']!="") and ($_POST['adress']!="") and ($_POST['oras']!="")) {
        $cSQL = "INSERT INTO `client`(`id_client`, `Nume`, `Prenume`, `telefon`, `adresa`, `email`, `oras`) VALUES ('', '".$_POST['nume']."', '".$_POST['pren']."', '".$_POST['tel']."', '".$_POST['adress']."', '".$_POST['email']."', '".$_POST['oras']."')";
        mysqli_query($connect, $cSQL) or die(mysqli_error($connect));
        
        $lastSQl1 = "SELECT id_client FROM client ORDER BY id_client DESC LIMIT 1";
        $lastCl = mysqli_query($connect, $lastSQl1) or die(mysqli_error($connect));
        $qlastCl = mysqli_fetch_row($lastCl);
        
        $ql="INSERT INTO vanzari(id_chitanta, data, id_client) VALUES ('', '".date('y-m-d')."', '".$qlastCl[0]."')";
        mysqli_query($connect, $ql) or die(mysqli_error($connect));
        
        $sqql="SELECT c.id_marfa, c.nr, m.pret FROM 
        com c INNER JOIN marfe m 
        ON c.id_marfa = m.id_marfa";
        $roww=mysqli_query($connect, $sqql);

        $lastSQl2="SELECT id_chitanta FROM vanzari ORDER BY id_chitanta DESC LIMIT 1";
        $lastChit = mysqli_query($connect, $lastSQl2) or die(mysqli_error($connect));
        $qlastChit = mysqli_fetch_row($lastChit);
        
        while ($liine=mysqli_fetch_row($roww)){
            $numSQL="SELECT numarul FROM marfe WHERE id_marfa =".$liine[0];
            $min = mysqli_query($connect, $numSQL) or die(mysqli_error($connect));
            $Smin=mysqli_fetch_row($min);
            $qll="INSERT INTO marfa_in_chitanta (id_chitanta, id_marfa, numar, costul) VALUES ('".$qlastChit[0]."','".$liine[0]."','".$liine[1]."','".($liine[1]*$liine[2])."')";
            mysqli_query($connect, $qll) or die(mysqli_error($connect));
            mysqli_query($connect, "UPDATE `marfe` SET numarul ='".($Smin[0]-$liine[1])."' WHERE id_marfa ='".$liine[0]."'") or die(mysqli_error($connect));
        }

        $sql="DROP TABLE `com`";
        mysqli_query($connect, $sql) or die(mysqli_error($connect));
        $sql="CREATE TABLE `com` (
              `id` int auto_increment primary key,
              `id_marfa` smallint NOT NULL default '0',
              `nr` int NOT NULL,
              FOREIGN KEY(id_marfa) REFERENCES marfe(id_marfa))";
        mysqli_query($connect, $sql) or die(mysqli_error($connect));
        header("location: ../index.php");
    }
?>