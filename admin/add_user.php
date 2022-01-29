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
    <h2 class="del_title"><strong><font size="6">Adăugarea unui angajat</font></strong></h2>
    <div class="add_user_cont">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>?tip=55" method="post">
        <p>
        <?php 
            if(($_SERVER['REQUEST_URI']==$_SERVER['PHP_SELF']."?tip=55")){
                require_once("../handlers/connect.php");
                $sSQL="INSERT INTO `angajati`(`id_angajat`, `nume`, `prenume`, `gen`, `drepturi`, `data_nasterii`, `idnp`, `login`, `password`) VALUES ('','".$_POST['nume']."', '".$_POST['prenume']."', '".$_POST['gen']."', '".$_POST['tip']."', '".$_POST['nasc']."', '".$_POST['idnp']."', '".$_POST['login']."', '".$_POST['pass']."');";
                mysqli_query($connect, $sSQL) or die(mysqli_error($connect)); 
                header('location: index.php?tip=5');
                exit;
            }
        ?>

        <p class="mainText"><b>Numele:</b></p>
        <p><input style='width:100%' name="nume" type="text" value="" required></p>
        <p class="mainText"><b>Prenumele:</b></p>
        <p><input style='width:100%' size="100%" name="prenume" type="text" value="" required></p>
        <p class="mainText"><b>Gen:</b></p>
        <p><input style='width:100%' size="100" name="gen" type="text" value="" required></p>
        <p class="mainText"><b>Drepturi:</b></p>
        <p><select name="tip" size="1" multiplename="tipuri" required>
            <option value="admin">admin</option>
            <option value="admin">manager</option>
        </select></p>
        <p class="mainText"><b>Data nașterii:</b></p>
        <p><input name="nasc" type="date" required></p>
        <p class="mainText"><b>IDNP:</b></p>
        <p><input style='width:100%' size="100" name="idnp" type="number" value="" required></p>
        <p class="mainText"><b>Login:</b></p>
        <p><input style='width:100%' size="100" name="login" type="text" value="" required></p>
        <p class="mainText"><b>Parola:</b></p>
        <p><input style='width:100%' size="100" name="pass" type="text" value="" required></p>
        <input type="submit" class="btn btn-success" value="OK">
        <input type="button" class="btn btn-danger" value="Înapoi" style="font-size:15px; margin-left: 10px;"  onclick="document.location.href='index.php?tip=5'"> 
    </form>
    </div>
    <br>
</body>
</html>