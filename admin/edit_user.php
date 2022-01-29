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
<h2 class="del_title"><strong><font size="6">Modificarea datelor despre angajat</font></strong></h2>
<div class="edit_user_cont">
    <?php 
        require_once("../handlers/connect.php");
        $sSQL="SELECT `id_angajat`, `nume`, `prenume`, `gen`, `drepturi`, `data_nasterii`, `idnp`, `login`, `password` FROM `angajati` WHERE id_angajat=".$_GET['id'];
        mysqli_query($connect, 'SET NAMES utf-8'); 
        $data=mysqli_query($connect, $sSQL) or die(mysqli_error($connect));
        $line=mysqli_fetch_row($data);
        echo "<form action='edit_user_action.php?id=".$line[0]."' method='post'>";
        echo "<p class='mainText'><b>Nume:</b></p><p><input name='nume' type='text' size='80' required value='".$line[1]."'></p>";
        echo "<p class='mainText'><b>Prenume:</b></p><p><input name='pren' type='text' size='80' required value='".$line[2]."'></p>";
        echo "<p class='mainText'><b>Gen:</b></p><p><input name='gen' type='text' width='400' required size='10' value='".$line[3]."'></p>";
        echo "<p class='mainText'><b>Drepturi:</b></p><p><input name='tip' type='text' required width='400' size='10' value='".$line[4]."'></p>";
        echo "<p class='mainText'><b>Nascut:</b></p><p><input name='nasc' type='date' required value='".$line[5]."'></p>";
        echo "<p class='mainText'><b>idnp:</b></p><p><input name='idnp' type='text' width='400' required size='70' value='".$line[6]."'></p>";
        echo "<p class='mainText'><b>Loginul:</b></p><p><input name='login' type='text' width='400' required size='70' value='".$line[7]."'></p>";
        echo "<p class='mainText'><b>Parola:</b></p><p><input name='pass' type='text' width='400' required size='70' value='".$line[8]."'></p>"; ?>
        <input type='submit' class="btn btn-success" value='OK'>
        <input type="button" class="btn btn-danger" value="Înapoi" style="font-size:15px; margin-left: 10px;"  onclick="document.location.href='index.php?tip=5'">
    </form>
</div>
<br>
</body>
</html>