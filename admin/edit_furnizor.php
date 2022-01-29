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
    <h2 class="main_title"><strong><font size="6">Modificarea furnizorului</font></strong></h2> 
<?php 
    require_once("../handlers/connect.php");
    if($_SERVER['REQUEST_URI']==$_SERVER['PHP_SELF']."?id=".$_GET['id']){
        $sSQL="SELECT `id_furnizor`, `nume_furnizor`, `adresa`, `telefon`, `email`, `oras`, `tara` FROM `furnizor` WHERE `id_furnizor` =".$_GET['id'];
        mysqli_query($connect, 'SET NAMES utf-8'); 
        $data=mysqli_query($connect, $sSQL) or die(mysqli_error($connect)); 
        $line=mysqli_fetch_row($data);
        echo "<div class='edit_fur_cont'><form action='edit_furnizor.php?act=edit&id=".$_GET['id']."' method='post'>";
        echo "<p class='mainText'><b>Nume:</b></p><p><input name='nume' type='text' required size='80' value='".$line[1]."'></p>";
        echo "<p class='mainText'><b>Adresa:</b></p><p><input name='Adresa' type='text' required size='80' value='".$line[2]."'></p>";
        echo "<p class='mainText'><b>Telefon:</b></p><p><input name='tel' type='tel' required size='80' value='".$line[3]."'></p>";
        echo "<p class='mainText'><b>E-mail:</b></p><p><input name='email' type='email' required size='80' value='".$line[4]."'></p>";
        echo "<p class='mainText'><b>Oraș:</b></p><p><input name='Oras' type='text' required size='80' value='".$line[5]."'></p>";
        echo "<p class='mainText'><b>Țara:</b></p><p><input name='tara' type='text' required size='80' value='".$line[6]."'></p>";
    ?>
    
        <input type='submit' class="btn btn-success" value='OK'>
        <input type="button" class="btn btn-danger" value="Înapoi" style="font-size:15px; margin-left: 10px;"  onclick="document.location.href='index.php?tip=2'"> 
        </form>
    </div>
      <?php  }
else {
    if ($_GET['act']=='edit'){ 
        $sSQL="UPDATE `furnizor` SET `nume_furnizor`='".$_POST['nume']."', adresa='".$_POST['Adresa']."', telefon='".$_POST['tel']."', email='".$_POST['email']."', oras='".$_POST['Oras']."', tara='".$_POST['tara']."' WHERE `id_furnizor`=".$_GET['id'];
        mysqli_query($connect, $sSQL) or die(mysqli_error($connect));
        header("location: index.php?tip=2");
    }
}; ?>
</body>
</html>