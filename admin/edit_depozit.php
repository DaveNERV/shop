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
    <h2 class="main_title"><strong><font size="6">Modificarea depozitului</font></strong></h2>
<?php 
    require_once("../handlers/connect.php");
    if($_SERVER['REQUEST_URI']==$_SERVER['PHP_SELF']."?id=".$_GET['id']){
        $sSQL="SELECT `id_depozit`, `oras`, `adresa` FROM `depozit` WHERE `id_depozit` =".$_GET['id'];
        mysqli_query($connect, 'SET NAMES utf-8'); 
        $data=mysqli_query($connect, $sSQL) or die(mysqli_error($connect)); 
        $line=mysqli_fetch_row($data);
        echo "<div class='edit_d_cont'><form action='edit_depozit.php?act=edit&id=".$_GET['id']."' method='post'>";
        echo "<p class='mainText'><b>Oraș:</b></p><p><input name='Oras' type='text' size='80' required value='".$line[1]."'></p>";
        echo "<p class='mainText'><b>Adresa:</b></p><p><input name='Adresa' type='text' size='80' required value='".$line[2]."'></p>";?>
        <input type='submit' class="btn btn-success" value='OK'>
        <input type="button" class="btn btn-danger" value="Înapoi" style="font-size:15px; margin-left: 10px;"  onclick="document.location.href='index.php?tip=4'"> 
        </form>
    </div>
      <?php  }
else {
    if ($_GET['act']=='edit'){ 
        $sSQL="UPDATE `depozit` SET `oras`='".$_POST['Oras']."', adresa='".$_POST['Adresa']."' WHERE `id_depozit`=".$_GET['id'];
        mysqli_query($connect, $sSQL) or die(mysqli_error($connect));
        header("location: index.php?tip=4");
    }
}; ?>
</body>
</html>