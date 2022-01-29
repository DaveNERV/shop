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
    <h2 class="main_title"><strong><font size="6">Ștergerea depozitului</font></strong></h2>
<?php 
    require_once("../handlers/connect.php");
    if($_SERVER['REQUEST_URI']==$_SERVER['PHP_SELF']."?id=".$_GET['id']){
        $sSQL="SELECT `id_depozit`, `oras`, `adresa` FROM `depozit` WHERE `id_depozit` =".$_GET['id'];
        mysqli_query($connect, 'SET NAMES utf-8'); 
        $data=mysqli_query($connect, $sSQL) or die(mysqli_error($connect)); 
        $line=mysqli_fetch_row($data);

        echo "<div class='del_d_cont'><form action='del_depozit.php?act=del&id=".$_GET['id']."' method='post'>";

        echo "<p><b>Oraș:  </b>".$line[1]."</p>";
        echo "<p><b>Adresa:  </b>".$line[2]."</p>";
     ?>
        <input type='submit' class="btn btn-danger" value='OK'> 
        <input type="button" class="btn btn-primary" value="Înapoi" style="font-size:15px; margin-left: 10px;"  onclick="document.location.href='index.php?tip=4'"> 
        </form>
    </div>
    
  <?php  }
else {
    if ($_GET['act']=='del'){ 
        $sSQL="DELETE FROM `depozit` WHERE id_depozit=".$_GET['id'];
        mysqli_query($connect, $sSQL) or die(mysqli_error($connect));
        header("location: index.php?tip=4");
    }
}; ?>
</body>
</html>