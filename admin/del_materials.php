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
  </div>
    <h2 class="del_title"><strong><font size="6">Precis doriți să ștergeți marfa?</font></strong></h2>
<br> 
<?php 
    require_once("../handlers/connect.php");
    $sSQL="SELECT denumire_marfa, descriere, pret, foto, id_grupa FROM marfe WHERE id_marfa=".$_GET['id'];
    mysqli_query($connect, 'SET NAMES utf-8');
    $data=mysqli_query($connect, $sSQL) or die(mysqli_error($connect)); 
    $line=mysqli_fetch_row($data);
    echo "<div class='del_m_cont'>";
    echo "<form action='del_materials_action.php?&tip=".$_GET['tip']."&id=".$_GET['id']."' method='post'>";

        echo "<p class='mainText'><b>Denumire:</b></p>";
        echo "<p>".$line[0]."</p>";

        echo "<p class='mainText'><b>Foto:</b></p>
        <p><img class='photo_goods_del' src='../img/".$line[3]."'</p>";

        echo "<p class='mainText'><b>Preț:</b></p>";
        echo "<p>".$line[2]." lei</p>";

        echo "<p class='mainText'><b>Descriere:</b></p>
        <p class='description_del' align='justify'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$line[1]."</p>";

        echo "<input type='hidden' name='id_gr' value='".$line[4]."'>";

        echo "<p><input type='submit' class='btn btn-danger'' value='OK'>";
        
        $p = "index.php?tip=".$_GET['tip'];
    
        echo '<input type="button" class="btn btn-primary" value="Înapoi" style="font-size:15px; margin-left: 10px;"  onclick=document.location.href="'.$p.'">'; 
    
    echo "</form>";
    
    echo "</div>";
?>
</body>
</html>
