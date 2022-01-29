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
<h2 class="del_title"><strong><font size="6">Ștergerea angajatului</font></strong></h2>
<?php 
    require_once("../handlers/connect.php");
    $sSQL="SELECT `id_angajat`, `nume`, `prenume`, `drepturi`, `login` FROM `angajati` WHERE id_angajat =".$_GET['id'];
    mysqli_query($connect, 'SET NAMES utf-8'); 
    $data=mysqli_query($connect, $sSQL) or die(mysqli_error($connect)); 
    $line=mysqli_fetch_row($data);

    echo "<div class='del_user_cont'><form action='del_user_action.php?id=$line[0]' method='post'>";

    echo "<p class='mainText'><b>Nume:  </b>".$line[1]."</p>";
    echo "<p class='mainText'><b>Prenume:  </b>".$line[2]."</p>";
    echo "<p class='mainText'><b>Drepturi:  </b>".$line[3]."</p>";
    echo "<p class='mainText'><b>Login:  </b>".$line[4]."</p>";
 ?>
    <br>
    <input type='submit' class="btn btn-danger" value='OK'>
    <input type="button" class="btn btn-primary" value="Înapoi" style="font-size:15px; margin-left: 10px;"  onclick="document.location.href='index.php?tip=5'"> 
    </form>
    </div>
</body>
</html>