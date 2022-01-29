<?php
    require_once("../handlers/connect.php");
    $sSQL="DELETE FROM grupa WHERE `id_grupa`=".$_GET['id'];
    $images="SELECT foto FROM marfe WHERE `id_grupa`=".$_GET['id'];
    $data=mysqli_query($connect, $images) or die(mysqli_error($connect));
    while($img=mysqli_fetch_row($data)){
        unlink('../img/'.$img[0]);
    }
    mysqli_query($connect, $sSQL) or die(mysqli_error($connect));
    header("location: index.php?tip=1");
?>