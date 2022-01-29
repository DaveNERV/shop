<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Magazin de realizare a materialelor de construcții</title>
    <link rel="stylesheet" href="../styles/login-style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1 class="title" align="center"><b>Intrați în cont ca Admin</b></h1>
    <br>
    <div class="container" style="width:30%";>
        <form class="login" action='index.php?tip=1' method='post'>
            <p class="mainText">Login:*</p>
            <p><input name="name" type="text" value="" size="15" required></p>
            <p class="mainText">Parola:*</p>
            <p><input name="pass" type="password" value="" size="15" required></p>
            <div class="buttons" width="100%">
                <input name="submit" class="btn btn-success" type="submit" value="OK">
                <input type="button" class="btn btn-danger" value="Înapoi" style="font-size:15px; margin-left: 10px;" onclick="document.location.href='../index.php'"> 
            </div>
        </form> 
        <?php if(isset($_SESSION["wrong"])){
                    echo '<p class="msg"> ' . $_SESSION["wrong"] . ' </p>';
                    unset($_SESSION["wrong"]);
            } ?>
    </div>
</body>
</html>