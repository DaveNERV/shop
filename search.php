<?php
    require_once("handlers/connect.php");
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Magazin de realizare a materialelor de construcții</title>
    <link rel="stylesheet" href="styles/search_style.css">
    <link rel="stylesheet" href="styles/2col_leftNav.css">
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
                    <a class="home_link" href="index.php"><img align="middle"src="1.jpeg" width="100" height="70"></a>
                </td>
            </tr>
        </table>
    </div>
    <br>
<?php
    $sql="SELECT `id_marfa`, `denumire_marfa`, `id_grupa`, `descriere`, `pret`, `id_furnizor`, `foto`, `id_depozit`, `numarul` FROM `marfe` WHERE `denumire_marfa` LIKE '%".$_POST['searchFor']."%'";
    $data=mysqli_query($connect, $sql); 
    while ($lin=mysqli_fetch_row($data)){ ?>
		<table class="goods" cellSpacing=0 cellPadding=2>
            <tr>
                <td>
                <?php
                     $img='img/'.$lin[6];
                     echo '<b style="font-size:20px";>'.$lin[1].'</b><br><table width=70%><tr><td align="centre">';
                     echo '<form action="info-good.php?id='.$lin[0].'" method="post">
                    <input class="click_image" type="image" src='.$img.' alt="Submit feedback"></form></td>';
                ?>
                <?php
                     echo '<td width=600><p class="description">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$lin[3].'</p></td></tr></table><br><br><table width=100%><tr><td>';
                ?>
                <?php
                    if($lin[8] == 0){
                        echo '<p class="dispon"><b>Nu este în stoc!</b></p>';
                    }else if (trim($lin[4]) && $lin[4]>0){
                        echo '<b>Preț: </b>'.$lin[4].' lei.';
                    }else{
                        echo "<b>Preț: </b><p>La comandă</p>";
                    }
                ?>			
                <?php
                    echo "</td><td><form action='catalog/korzin.php?id=".$lin[0]."' method='post'><input required type='number' max='".$lin[8]."' value='' style='width:100px' name='order_".$lin[0]."'>";
                ?>
                    <input type="submit" name="add_order" class="btn btn-primary" style="font-size:10px;" <?php if($lin[8] == 0){echo "disabled";} ?> id=add_order value="Adauga în comandă"></form></tr></table>
    </td>
    <?php }
    ?>
    </tr>
    
    </table>

<?php
    echo "<br>";
    echo "<form class='to_main' action='index.php' method='post'>
        <input type='submit' class='btn btn-warning' value='Principala'>
        </form>"
?>
<br>
</body>
</html>

