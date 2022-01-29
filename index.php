<?php 
    session_start();
    if(isset($_SESSION['dat'])) { 
        $_SESSION['dat']=$_SESSION['dat']."a";
    }else{ 
        header('location: index.php');
        $_SESSION['dat']="a"; 
        require_once("handlers/connect.php");
        mysqli_query ("set character_set_client='utf-8'");
        $sql="DROP TABLE `com`";
        $datu=mysqli_query($connect, $sql) or die(mysqli_error($connect));
        $sql="CREATE TABLE `com` (
          `id` int auto_increment primary key,
          `id_marfa` smallint NOT NULL default '0',
          `nr` int NOT NULL,
          FOREIGN KEY(id_marfa) REFERENCES marfe(id_marfa))";
        $daty=mysqli_query($connect, $sql) or die(mysqli_error($connect));
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Magazin de realizare a materialelor de construcții</title>
    <link rel="stylesheet" href="styles/2col_leftNav.css">
    <link rel="stylesheet" href="styles/list_style.css">
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
    <div id="content">
        <?php if(($_SERVER['REQUEST_URI']==$_SERVER['PHP_SELF'])) {
        ?>
        <h2 id="pageName">Pagina principală</h2>
        <div class="feature"><img src="2.jpeg" width="280" height="200">
            <h3>Despre magazin</h3>
            <p class="info-text" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Magazinul de realizare a materialelor de construcții vă urează bun venit pe platforma de tranzacționare. Dacă vă interesează cumpărarea materialelor cum ar fi de tip: Peroplast, pelicule izolatoare, lâne de bumbac, etc, o să vă ajutăm să faceți alegerea corectă. Acest magazin are sortiment mare si preturi rezonabile.</p>
        </div>
        <?php } else{
            if(($_SERVER['REQUEST_URI']==$_SERVER ['PHP_SELF']."?id=".$_GET['id']) or 
            ($_SERVER['REQUEST_URI']==$_SERVER ['PHP_SELF']) or
            ($_SERVER['REQUEST_URI']==$_SERVER ['PHP_SELF']."?id=".$_GET['id'])){?>
                <?php
                    if (isset($_POST['set_diapazone']) && $_POST['diapazon1'] != NULL && $_POST['diapazon2'] != NULL) {
                        $diapazon1 = $_POST['diapazon1'];
                        $diapazon2 = $_POST['diapazon2'];
                        $sql="SELECT `id_marfa`, `denumire_marfa`, `id_grupa`, `descriere`, `pret`, `id_furnizor`, `foto`, `id_depozit`, `numarul` FROM `marfe` WHERE `pret` BETWEEN $diapazon1 AND $diapazon2";
                    }elseif(isset($_POST['set_inDepozit'])){
                        $depozit = $_POST['inDepozit'];
                        $diapazon1 = $diapazon2 = NULL;
                        if($depozit == 1){
                            $sql="SELECT `id_marfa`, `denumire_marfa`, `id_grupa`, `descriere`, `pret`, `id_furnizor`, `foto`, `id_depozit`, `numarul` FROM `marfe`";
                        }elseif($depozit == 2){
                            $sql="SELECT `id_marfa`, `denumire_marfa`, `id_grupa`, `descriere`, `pret`, `id_furnizor`, `foto`, `id_depozit`, `numarul` FROM `marfe` WHERE `numarul`>0";
                        }elseif($depozit == 3){
                            $sql="SELECT `id_marfa`, `denumire_marfa`, `id_grupa`, `descriere`, `pret`, `id_furnizor`, `foto`, `id_depozit`, `numarul` FROM `marfe` WHERE `numarul`=0";
                        }
                    }else{
                        $sql="SELECT `id_marfa`, `denumire_marfa`, `id_grupa`, `descriere`, `pret`, `id_furnizor`, `foto`, `id_depozit`, `numarul` FROM `marfe`";
                        $diapazon1 = $diapazon2 = NULL;
                    }?> 
                <div class="container_forms">
                    <div class="cont_diapazon">
                        <form name="form_diapazon" method='POST'>
                            <input class='d1' type="number" name="diapazon1" placeholder="" style="font-size:10px;">
                            <input class='d2' type="number" name="diapazon2" placeholder="" style="font-size:10px;">
                            <input type="submit" class="btn btn-primary" name="set_diapazone" style="font-size:10px;" value="Alege diapazonul">
                        </form>
                        <?php if($diapazon1 != NULL && $diapazon2 != NULL){
                        echo "<p><b>Prețul între $diapazon1 și $diapazon2</b></p>";
                    }?>
                    </div>
                    <div class="cont_is">
                        <form class="form_is" name="form_is" method='POST'>
                            <select name="inDepozit" size="1" multiplename="">
                                    <option value=1>Toate</option>
                                    <option value=2>Doar cele care sunt</option>
                                    <option value=3>Care lipsesc</option>
                                </select>
                            <input type="submit" class="btn btn-primary" name="set_inDepozit" style="font-size:10px;" value="Alege">
                        </form>
                    </div>
                </div>
                <?php require_once("handlers/connect.php");
                                                                                 
                $data = mysqli_query($connect, $sql);
                while($lin=mysqli_fetch_row($data)){
                    if ($lin[2]==$_GET['id']){	?>
                        <table cellSpacing=0 cellPadding=2 width="105%" border=6 class=goods_main><tr><td> 
                        <?php
			                 echo '<b style="font-size:20px";>'.$lin[1].'</b><br><table width=70%><tr><td><form action="info-good.php?id='.$lin[0].'" method="post">
                     <input class="click_image" type="image" src="img/'.$lin[6].'" alt="Submit feedback"></form></td></a></td>';
			             ?>
			             <?php
			                 echo '<td class="description" width=500>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$lin[3].'</td></tr></table><br><br><table width=100%><tr><td>';
			             ?>
                        <?php
                            if($lin[8] == 0){
                                echo '<p class="dispon"><b>Nu este în stoc!</b></p>';
                            }elseif (trim($lin[4]) && $lin[4]>0){
                                echo '<b>Preț: </b>'.$lin[4].' lei.';
                            }else{
                                echo "<p>La comandă:</p>";
                            }
                        ?>			
                        <?php
                            echo "</td><td><form action='catalog/korzin.php?id=".$lin[0]."' method='post'><input required type='number' value='' style='width:100px' name='order_".$lin[0]."'>";
                        ?>
                            	
                            <input type="submit" name="add_order" class="btn btn-primary" style="font-size:10px;" <?php if($lin[8] == 0){echo "disabled";} ?> id=add_order value="Adaugă în comandă"></form></tr></table>
                            </td></tr></table>
                <?php 
                    }
                }
            }
        }
    ?>
    <br>
    </div>
    <div id="navBar">
        <div id="search">
            <form action='search.php' method='post'>
                <label class="title-nav">Căutare</label>
                <input name="searchFor" type="text" size="20">
                <input type="submit" class="btn btn-success" value="Caută">
            </form>
        </div>

        <div class="relatedLinks">
            <a class="link_main" href='index.php'>Principala</a><br><br>
            <label class="title-nav">Materiale:</label><br>
            <ul>
                <?php require_once('folder/catalogs.php'); ?>
            </ul>
        </div>
        <div id="advert">
            <form action="admin/pass.php">
                <p><button type="submit" class="btn btn-primary" value="Intră ca Admin">Intră ca Admin</button></p>
            </form>
            <form action='manager/pass.php'>
                <p><button type="submit" class="btn btn-primary" value="Intră ca Manager">Intră ca Manager</button></p>
            </form>
        </div>
    </div>
    <div id="siteInfo">&copy; «Magazin de realizare a materialelor de construcții» 2021. All rights reserved</div>
    <br>
</body>
</html>