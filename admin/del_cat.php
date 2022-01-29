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
<div id="pageNa">
<h2 class="del_title"><strong><font size="6">Ștergerea catalogului</font></strong></h2>
<br>

<?php 
    require_once("../handlers/connect.php");
    
    $sSQL="SELECT `id_grupa`, `denumire_grupa` FROM `grupa` WHERE `id_grupa`=".$_GET['id'];
    mysqli_query($connect, 'SET NAMES utf-8');
    mysqli_query($connect, $sSQL) or die(mysqli_error($connect)); 
    $data=mysqli_query($connect, $sSQL);
    $line=mysqli_fetch_row($data);
    echo "<div class='del_cat_cont'>";
    echo "<form action='del_cat_action.php?&id=".$_GET['id']."' method='post'>";
    echo "<p class='mainText'><b>Denumirea: </b></p>";
    echo "<p>".$line[1]."</p>";
?>
    <br><input type='submit' class="btn btn-danger" value='OK'>
    <input type="button" class="btn btn-primary" value="Înapoi" style="font-size:15px; margin-left: 10px;"  onclick="document.location.href='index.php?tip=1'"></div>
    </form>
    </div>
</body>
</html>