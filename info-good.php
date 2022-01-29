<?php
    require_once("handlers/connect.php");
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Magazin de realizare a materialelor de construcții</title>
    <link rel="stylesheet" href="styles/info_goods_style.css">
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
        $id_marfa = $_GET['id'];
        $sql = "SELECT m.id_marfa, m.denumire_marfa, m.id_grupa, m.descriere, m.pret, m.foto, m.numarul, g.denumire_grupa 
        FROM marfe m INNER JOIN grupa g
        ON g.id_grupa = m.id_grupa
        WHERE m.id_marfa = $id_marfa";
    
        $sql2 = "SELECT c.nume_caracteristica, vc.valoarea_caracteristica
        FROM marfe m INNER JOIN valoarea_caracteristicii vc
        ON m.id_marfa = vc.id_marfa
        INNER JOIN caracteristici c
        ON c.id_caracteristica = vc.id_caracteristica
        WHERE m.id_marfa = $id_marfa";
    
        $data=mysqli_query($connect, $sql);
        $lin = mysqli_fetch_row($data);
        $data2=mysqli_query($connect, $sql2);
        echo '<h1 class="title_info">'.$lin[1].'</h1><br>';?>
        
        <div class="container_info">
            <?php echo '<img class="photo_goods" src="img/'.$lin[5].'">'; ?>

            <table class="this_info_good" cellSpacing=0 cellPadding=6>
                <tr>
                <?php 
                    echo '<td width=18%><b>Codul mărfii</b></td>';
                    echo '<td>'.$lin[0].'</td>';
                ?> 
                </tr>
                <tr>
                <?php 
                    echo '<td><b>Grupa mărfii</b></td>';
                    echo '<td>'.$lin[2].'</td>';
                ?> 
                </tr>
                <tr>
                <?php 
                    echo '<td><b>Prețul</b></td>';
                    echo '<td>'.$lin[4].' lei</td>';
                ?> 
                </tr>
                <tr>
                <?php 
                    echo '<td><b>Descrierea</b></td>';
                    echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;'.$lin[3].'</td>';
                ?> 
                </tr>
            </table>
        </div>
        <br><br>
        <?php if(mysqli_num_rows($data2) > 0){ ?>
        <table class="caracteristics_table" cellSpacing=0 cellPadding=6>
            <tr class="table-danger">
                <th class="den">Denumirea caracteristicii</th>
                <th class="den">Valoarea caracteristicii</th>
            </tr>
        <?php while($lin2=mysqli_fetch_row($data2)){ ?>
            <tr>
            <?php
                echo '<td class="val" width="30%">'.$lin2[0].'</td>';
                echo '<td class="val">'.$lin2[1].'</td>';
            ?>
            </tr>
            <?php } ?>
        </table>
        <?php } ?>
        <br>
        
        <?php echo "<form class='buy' action='catalog/korzin.php?id=".$_GET['id']."' method='post'><input required type='number' value='' style='width:100px' name='order_".$_GET['id']."'>"; ?>
        <input type="submit" class="btn btn-primary" name="add_order" style="font-size:10px;" <?php if($lin[6] == 0){echo "disabled";} ?> id=add_order value="Adauga în comandă"></form>
    
<?php
    echo "<br>";
    echo "<form class='to_main' action='index.php' method='post'>
        <input type='submit' class='btn btn-warning' value='Principala'>
        </form>"
?>
<br>
</body>
</html>