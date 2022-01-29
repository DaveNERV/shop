<?php 
    session_start();
    if (!isset($_SESSION['dat'])){
        $_SESSION['dat']="a";
    }  
    if ($_SESSION['dat']!="b") { 
        require_once("pass.php");
    } else{
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Manager</title>
    <link rel="stylesheet" href="../styles/2col_leftNav.css" type="text/css">
    <link rel="stylesheet" href="../styles/main_manager-style.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div id="masthead">
        <table width=100%>
            <tr>
                <td align="left">
                    <h1 id="siteName">Magazin de realizare a materialelor de construcții</h1>
                </td>
                <td align="right">
                   <?php echo '<a class="home_link" href="index.php?act=new&id='.$_GET['id'].'">'; ?> <img align="middle"src="../1.jpeg" width="100" height="70"></a>
                </td>
            </tr>
        </table>
    </div>
    <h2 class="join-title" align="center">Ați intrat ca manager!</h2><input type="button" class="btn btn-warning" value="Unlog" style="float:right; margin-right: 10px;" onclick="document.location.href='../index.php'"> 
    <br>
    <div id="pageNavv">
      <div id="sectionLinks">
        <?php
            echo "<p class='link'><a href='?act=new&id=".$_GET['id']."'>Comenzi noi</a></p>"; 
        ?>
      </div>
      <div id="advert"></div>
    </div>
        <div class="features">
          <?php
                 require_once("comenzi.php");
          ?>
        </div> 
    <?php } ?>
    
</body>
</html>