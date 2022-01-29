<?php 
    session_start();
    require_once("../handlers/connect.php");

    $cSQL = "SELECT id_caracteristica, nume_caracteristica FROM caracteristici ORDER BY id_caracteristica";
    $data = mysqli_query($connect, $cSQL) or die(mysqli_error($connect));

    while($lin=mysqli_fetch_row($data)){
    
        if($_POST['caracteristic'.$lin[0]] !== ''){
            $sSQL = "INSERT INTO valoarea_caracteristicii(id_caracteristica, id_marfa, valoarea_caracteristica) VALUES('".$lin[0]."', '".$_SESSION['id_marfa']."', '".$_POST['caracteristic'.$lin[0]]."')";
            mysqli_query($connect, $sSQL) or die(mysqli_error($connect)); 
        }
    }
    header("location: index.php?tip=1");
?>