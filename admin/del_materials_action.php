<?php
    require_once("../handlers/connect.php");

    $sSQL="DELETE FROM marfe WHERE id_marfa=".$_GET['id'];
    $images="SELECT foto FROM marfe WHERE `id_marfa`=".$_GET['id'];
    $data=mysqli_query($connect, $images) or die(mysqli_error($connect));
    
    $img=mysqli_fetch_row($data);
    unlink('../img/'.$img[0]);

    mysqli_query($connect, $sSQL) or die(mysqli_error($connect));
    header("location: index.php?tip=".$_GET['tip']);
?>