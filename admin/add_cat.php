<link rel="stylesheet" href="emx_nav_left.css" type="text/css">
<h2><strong><font size="5">Crearea catalogului</font></strong></h2>
<br>
<form action="index.php?tip=1" method="post">
    <input type="submit" class="btn btn-primary" value="Înapoi">
</form>
<form action="<?php echo $_SERVER['PHP_SELF'];?>?tip=33" method="post">
    <p>
    <?php 
        if(($_SERVER['REQUEST_URI']==$_SERVER['PHP_SELF']."?tip=33")){
            require_once("../handlers/connect.php");
            $sSQL="INSERT INTO grupa(id_grupa, denumire_grupa) VALUES ('','".$_POST['den']."');";
            mysqli_query($connect, $sSQL) or die(mysql_error()); 
            header('location: index.php?tip=1');
            exit;
        }
    ?>

    <p>Tema:</p>
    <input size="100" name="den" type="text" value="" required><br>


    <?php echo "<br>"; ?>
        <input type="submit" class="btn btn-success" value="OK">
    </p>
</form>