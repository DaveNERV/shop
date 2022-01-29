<?php 
    require_once("../handlers/connect.php");
    mysqli_query ($connect, "set character_set_client='utf-8'");
    $sql2="UPDATE vanzari SET id_angajat='".$_GET['men']."' where id_chitanta=".$_GET['id'];
    mysqli_query($connect, $sql2) or die(mysqli_error($connect));
    header('location: index.php?act=new&id='.$_GET['tip']);
?>