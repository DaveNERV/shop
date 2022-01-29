<?php session_start();
if (!isset($_SESSION['dat'])){
    $_SESSION['dat']="a";
}
require_once("../handlers/connect.php");
mysqli_query ($connect, "set character_set_client='utf-8'");
$sql2="SELECT `id_angajat`, `nume`, `prenume`, `gen`, `drepturi`, `data_nasterii`, `idnp`, `login`, `password` FROM `angajati` WHERE `drepturi` = 'admin' ";
$data2=mysqli_query($connect, $sql2);
while($line2=mysqli_fetch_row($data2)){
    if ((isset($_POST['name'])) and ($line2[7]==$_POST['name']) and ($line2[8]==$_POST['pass'])){
        $_SESSION['dat']="b";
    } 
}
if($_SESSION['dat']!="b"){
    $_SESSION['wrong'] = 'Loginul sau parola incorectă!';
    header("location: pass.php");
    die;
} else{ ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv=Content-Type content="text/html;charset=utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="../styles/2col_leftNav.css" type="text/css">
    <link rel="stylesheet" href="../styles/admin-style.css" type="text/css">
    <link rel="stylesheet" href="../styles/admin-in_cat-style.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div id="masthead">
        <table width=100%>
            <tr>
                <td align="left">
                    <h1 id="siteName">Magazin de realizare a materialelor de construcții</h1>
                </td>
                <td align="right">
                   <?php echo '<a class="home_link" href="index.php?tip='.$_GET['tip'].'">'; ?> <img align="middle"src="../1.jpeg" width="100" height="70"></a>
                </td>
            </tr>
        </table>
    </div>
    <h2 class="join-title" align="center">Ați intrat ca admin!</h2><input type="button" class="btn btn-warning" value="Unlog" style="float:right; margin-right: 10px;" onclick="document.location.href='../index.php'"> 
    <br>
    <div id="pageNav">
        <div id="sectionLinks">
            <p><a class='ulink' href="?tip=1">Cataloage materialelor</a><a class='ulink' href="?tip=2">Furnizori</a><a class='ulink' href="?tip=4">Depozit</a><a class='ulink' href="?tip=3">Adaugă catalog</a><a class='ulink' href="?tip=5">Angajați</a></p>
        </div>
        <div id="advert"></div>
    </div>
    <div class="features">
    <?php
        if(($_SERVER['REQUEST_URI']==$_SERVER['PHP_SELF']."?tip=5") or ($_SERVER['REQUEST_URI']==$_SERVER['PHP_SELF']."?tip=55")){
            require_once("user.php");
        }else{
            if(($_SERVER['REQUEST_URI']==$_SERVER['PHP_SELF']."?tip=4") or ($_SERVER['REQUEST_URI']==$_SERVER['PHP_SELF']."?tip=44")){
                require_once("depozit.php");
            }else{
                if(($_SERVER['REQUEST_URI']==$_SERVER['PHP_SELF']."?tip=2") or ($_SERVER['REQUEST_URI']==$_SERVER['PHP_SELF']."?tip=22")){
                    require_once("furnizori.php");
                }else{
                    if($_SERVER['REQUEST_URI']==$_SERVER['PHP_SELF']."?tip=1"){
                        require_once("cat.php");
                    }else{
                        if(($_SERVER['REQUEST_URI']==$_SERVER['PHP_SELF']."?tip=3") or ($_SERVER['REQUEST_URI']==$_SERVER['PHP_SELF']."?tip=33")){
                            require_once("add_cat.php");
                        }else{
                            if(($_SERVER['REQUEST_URI']==$_SERVER['PHP_SELF']."?tip=".$_GET['tip'])."id=".$_GET['id']){
                                require_once("marfa.php");
                            }
                        }
                    }
                }
            }
        }
                
    ?>
    </div> 
    <p align="center">&nbsp;</p>
<?php }?>
</body>
</html>

