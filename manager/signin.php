<?php
    session_start();
    $s=0;
    if (isset($_POST['login'])){
        require_once("../handlers/connect.php");
        mysqli_query ($connect, "set character_set_client='utf-8'");
        $sql2="SELECT `id_angajat`, `login`, `password` FROM `angajati` WHERE `drepturi` = 'manager'";
        $data2=mysqli_query($connect, $sql2) or die(mysqli_error($connect));
        while ($line2=mysqli_fetch_row($data2)){ 
            if (($line2[1]==$_POST['login']) and ($line2[2]==$_POST['pass'])) {
                $_SESSION['dat']="b";
                $s=$line2[0];
                header('location: index.php?act=new&id='.$s);
                exit;
            } 
        }
        $_SESSION['wrong'] = 'Loginul sau parola incorectă!';
        header("location: pass.php");
    }
?>