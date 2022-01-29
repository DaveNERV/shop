<?php
    require_once("../handlers/connect.php");

    $sSQL = "DELETE FROM com WHERE id =".$_GET['id'];
    mysqli_query($connect, $sSQL) or die(mysqli_error($connect));
    header('location: korzin.php?id='.$_GET['tip']);
?>