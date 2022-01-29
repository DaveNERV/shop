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
    <h2 class="main_title"><strong><font size="6">Adăugarea depozitului</font></strong></h2>
    <div class='add_d_cont'>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>?tip=44" method="post">
        <p>
        <?php 
            if(($_SERVER['REQUEST_URI']==$_SERVER['PHP_SELF']."?tip=44")){
                require_once("../handlers/connect.php");
                $sSQL="INSERT INTO depozit(id_depozit, oras, adresa) VALUES ('','".$_POST['oras']."', '".$_POST['adresa']."');";
                mysqli_query($connect, $sSQL) or die(mysqli_error($connect)); 
                header('location: index.php?tip=4');
                exit;
            }
        ?>

        <p class='mainText'><b>Oraș:</b></p>
        <p><input size="100" name="oras" type="text" value="" required></p>
        <p class='mainText'><b>Adresa:</b></p>
        <p><input size="100" name="adresa" type="text" value="" required></p>
        <input type="submit" class="btn btn-success" value="OK">
        <input type="button" class="btn btn-danger" value="Înapoi" style="font-size:15px; margin-left: 10px;"  onclick="document.location.href='index.php?tip=4'"> 
        </p>
    </form>
    </div>
</body>
</html>