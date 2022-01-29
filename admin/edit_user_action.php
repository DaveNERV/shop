<?php
    require_once("../handlers/connect.php");
    mysqli_query($connect, 'SET NAMES utf-8');
    $sSQL="UPDATE angajati SET nume='".$_POST['nume']."', prenume='".$_POST['pren']."', gen='".$_POST['gen']."', drepturi='".$_POST['tip']."', data_nasterii='".$_POST['nasc']."', idnp='".$_POST['idnp']."', login='".$_POST['login']."', password='".$_POST['pass']."' WHERE id_angajat=".$_GET['id'];
    mysqli_query($connect, $sSQL) or die(mysqli_error($connect)); 
    header('location: index.php?tip=5');

?>