<?php
    $sqlhost="127.0.0.1:3325";
    $sqluser="root";
    $sqlpass="";
    $db="magazin_constructii";
    $connect = mysqli_connect($sqlhost, $sqluser, $sqlpass, $db) or die('Error connect to DataBase');
?>