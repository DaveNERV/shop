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
                   <?php echo '<a class="home_link" href="index.php?act=new&id='.$_GET['tip'].'">'; ?> <img align="middle"src="../1.jpeg" width="100" height="70"></a>
                </td>
            </tr>
        </table>
    </div>
    <div class="chitanta-info">
        <h2 class="chitanta-title">Chitanța №
        <?php
            require_once("../handlers/connect.php");
            if (isset($_GET['d'])) {
                $sSQL="DELETE FROM marfa_in_chitanta WHERE id_marfa=".$_GET['d']." AND id_chitanta = ".$_GET['id'];
                mysqli_query($connect, $sSQL) or die(mysqli_error($connect));
            }
            $sql3 = "SELECT mc.numar, mc.costul, m.denumire_marfa, m.id_marfa, v.id_chitanta FROM
                    marfe m INNER JOIN marfa_in_chitanta mc
                    ON m.id_marfa = mc.id_marfa
                    INNER JOIN vanzari v
                    ON mc.id_chitanta = v.id_chitanta WHERE v.id_chitanta=".$_GET['id'];
            $data3=mysqli_query($connect, $sql3) or die(mysqli_error($connect));
            echo $_GET['id']."</b></font></h2>";
            $s=1; $summ=0; ?>
            <table border=2 bgcolor=white>
              <tr class="table-info">
                <td width=15% align='center'><strong>Nr de ordine</strong></td>
                <td width=40% align='center'><b>Denumirea</b></td>		
                <td width=10% align='center'><b>Numărul</b></td>
                <td width=20% align='center'><b>Suma</b></td>
                <td width=15% align='center'><b>Șterge</b> </td>
              </tr>

        <?php 
            while($line3=mysqli_fetch_row($data3)){ 
                echo "<tr>";
                echo "<td width=10% align='center'>".$s."</td>"; 
                $s++;

                echo "<td width=30% align='center'>".$line3[2]."</td>";
                echo "<td width=15% align='center'>".$line3[0]."</td>";
                echo "<td width=20% align='center'>".$line3[1]." lei</td>";
                $summ = $summ + $line3[1];
                echo "<td width=20% align='center'><form action='comanda_open.php?id=".$_GET['id']."&tip=".$_GET['tip']."&d=".$line3[3]."&cl=".$_GET['cl']."' method='post'>";
                
                echo "<input type='image' src='b_drop.png'></form></td>";
                echo "</tr>";
            }
            echo "<tr><td class='table-success' colspan='3'><b>Total:
              </b></td><td class='table-success' width=100 align='center'><b>".$summ." lei</b></td>";
            echo "</table>";
              $sql2="SELECT `id_client`, `Nume`, `Prenume` FROM `client` WHERE `id_client`=".$_GET['cl'];
              $data2=mysqli_query($connect, $sql2) or die(mysqli_error($connect));
              while($line2=mysqli_fetch_row($data2)){ 
                   echo "<br><p class='mainText'><b>Client:</p><p class='mainText' id='person'>".$line2[1]. ' '. $line2[2]."</p></b>";
                }
            echo "<form action='index.php?act=new&id=".$_GET['tip']."' method='post'>" ?>
                <br><input type='submit' class="btn btn-primary" value='Înapoi'>
            </form>
        </div>
</body>
</html>