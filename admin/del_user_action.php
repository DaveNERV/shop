<?php
    require_once("../handlers/connect.php");
    $sSQL="DELETE FROM angajati WHERE id_angajat=".$_GET['id'];
    mysqli_query($connect, $sSQL) or die(mysqli_error($connect));
    header('location: index.php?tip=5');
?>