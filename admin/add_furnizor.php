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
    <h2 class="main_title"><strong><font size="6">Adăugarea unui furnizor</font></strong></h2>
    <div class="add_fur_cont">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>?tip=22" method="post">
        <p>
        <?php 
            if(($_SERVER['REQUEST_URI']==$_SERVER['PHP_SELF']."?tip=22")){
                require_once("../handlers/connect.php");
                $sSQL="INSERT INTO `furnizor`(`id_furnizor`, `nume_furnizor`, `adresa`, `telefon`, `email`, `oras`, `tara`) VALUES ('','".$_POST['nume']."', '".$_POST['adresa']."', '".$_POST['tel']."', '".$_POST['email']."', '".$_POST['oras']."', '".$_POST['tara']."');";
                mysqli_query($connect, $sSQL) or die(mysqli_error($connect)); 
                header('location: index.php?tip=2');
                exit;
            }
        ?>

        <p class='mainText'><b>Numele furnizorului:</b></p>
        <p><input size="100" name="nume" type="text" value="" required></p>
        <p class='mainText'><b>Adresa:</b></p>
        <p><input size="100" name="adresa" type="text" value="" required></p>
        <p class='mainText'><b>Oraș:</b></p>
        <p><input size="100" name="oras" type="text" value="" required></p>
        <p class='mainText'><b>Țara:</b></p>
        <p><input size="100" name="tara" type="text" value="" required></p>
        <p class='mainText'><b>Telefon:</b></p>
        <p><input size="100" name="tel" type="tel" value="" required></p>
        <p class='mainText'><b>E-mail:</b></p>
        <p><input size="100" name="email" type="email" value="" required><br>

        <br>
        <input type="submit" class="btn btn-success" value="OK">
        <input type="button" class="btn btn-danger" value="Înapoi" style="font-size:15px; margin-left: 10px;"  onclick="document.location.href='index.php?tip=2'"> 
        </p>
    </form>
    </div>
</body>
</html>