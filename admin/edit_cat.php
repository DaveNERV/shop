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
<h2 class="del_title"><strong><font size="6">Modificarea catalogului</font></strong></h2>
<?php 
    require_once("../handlers/connect.php");
    if($_SERVER['REQUEST_URI']==$_SERVER['PHP_SELF']."?id=".$_GET['id']){
        require_once("../handlers/connect.php");
        $sSQL="SELECT id_grupa, denumire_grupa FROM grupa WHERE id_grupa=".$_GET['id'];
        $data=mysqli_query($connect, $sSQL) or die(mysqli_error($connect)); 
        $line=mysqli_fetch_row($data);
        echo "<div class='edit_cat_cont'>
        <form action='".$_SERVER['PHP_SELF']."?act=edit&id=".$_GET['id']."' method='post'>";
            echo "<p class='mainText'><b>Denumirea:</b></p>";
            echo "<p><input name='name' size='50%' type='text' value=".$line[1]."></p>";
            echo "<input type='submit' class='btn btn-success' value='OK'>"; ?> 
            <input type="button" class="btn btn-danger" value="Înapoi" style="font-size:15px; margin-left: 10px;"  onclick="document.location.href='index.php?tip=1'"> 
    </form>
<?php }
    else {
        if ($_GET['act']=='edit'){
            $sSQL="UPDATE grupa SET denumire_grupa='".$_POST['name']."'WHERE id_grupa=".$_GET['id'];
            mysqli_query($connect, 'SET NAMES utf-8');
            mysqli_query($connect, $sSQL) or die(mysqli_error($connect));
            header('location: index.php?tip=1');
        }
    }
?>
    </div>
</body>
</html>