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
    <h2 class="del_title"><strong><font size="6">Ștergerea furnizorului</font></strong></h2>
    <br> 
<?php 
    require_once("../handlers/connect.php");
    if($_SERVER['REQUEST_URI']==$_SERVER['PHP_SELF']."?id=".$_GET['id']){
        $sSQL="SELECT `id_furnizor`, `nume_furnizor`, `adresa`, `telefon`, `email`, `oras`, `tara` FROM `furnizor` WHERE `id_furnizor` =".$_GET['id'];
        mysqli_query($connect, 'SET NAMES utf-8'); 
        $data=mysqli_query($connect, $sSQL) or die(mysqli_error($connect)); 
        $line=mysqli_fetch_row($data);

        echo "<div class=del_fur_cont><form action='del_furnizor.php?act=del&id=".$_GET['id']."' method='post'>";
        echo "<p><b>Numele furnizorului: </b>".$line[1]."</p>";
        echo "<p><b>Adresa: </b>".$line[2]."</p>";
        echo "<p><b>Oraș: </b>".$line[5]."</p>";
        echo "<p><b>Țara: </b>".$line[6]."</p>";
        echo "<p><b>Telefon: </b>".$line[3]."</p>";
        echo "<p><b>E-main: </b>".$line[4]."</p>";
     ?>
            <input type='submit' class="btn btn-danger" value='OK'>
        <input type="button" class="btn btn-primary" value="Înapoi" style="font-size:15px; margin-left: 10px;"  onclick="document.location.href='index.php?tip=2'"> 
        </form>
    </div>
  <?php  }
else {
    if ($_GET['act']=='del'){ 
        $sSQL="DELETE FROM `furnizor` WHERE `id_furnizor`=".$_GET['id'];
        mysqli_query($connect, $sSQL) or die(mysqli_error($connect));
        header("location: index.php?tip=2");
    }
}; ?>
</body>
</html>