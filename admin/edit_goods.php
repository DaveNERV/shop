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
    <div id="pageNa"></div>
        <h2 class="edit_good_title">Editarea unei unități de mărfuri</h2>
        <br>
    <?php
        require_once("../handlers/connect.php");
        $sSQL =  "SELECT m.id_marfa, m.denumire_marfa, m.id_grupa, m.descriere, m.pret, m.foto, m.numarul, f.nume_furnizor, d.oras, d.adresa, m.id_furnizor, d.id_depozit FROM marfe m INNER JOIN grupa g
        ON g.id_grupa = m.id_grupa
        INNER JOIN depozit d
        ON d.id_depozit = m.id_depozit
        INNER JOIN furnizor f
        ON f.id_furnizor = m.id_furnizor
        WHERE m.id_marfa=".$_GET['id'];

        $cSQL = "SELECT c.id_caracteristica, c.nume_caracteristica, vc.valoarea_caracteristica FROM 
        caracteristici c CROSS JOIN marfe m 
        LEFT JOIN valoarea_caracteristicii vc 
        ON vc.id_caracteristica = c.id_caracteristica AND vc.id_marfa = m.id_marfa 
        WHERE m.id_marfa =".$_GET['id'];

        mysqli_query($connect, 'SET NAMES utf-8');
        $data = mysqli_query($connect, $sSQL) or die(mysqli_error($connect));
        $cdata = mysqli_query($connect, $cSQL) or die(mysqli_error($connect));

        $line=mysqli_fetch_row($data); ?>
        <div class="edit_forms">
            <div class="f1" width="50%">
        <?php echo "<form action='edit_action.php?act=edit&tip=".$_GET['tip']."&id=".$_GET['id']."' method='post' enctype='multipart/form-data'>";

        echo "<p class='mainText'>Denumirea:</p><p><input name='den' style='width:100%' required type='text' width='100%' value='".$line[1]."'></p>";

        echo "<p class='mainText'>Foto:</p><p><input type='file' style='width:100%' name='foto'></p>";

        echo "<p class='mainText'>Preț:</p><p><input name='pret' type='number' required style='width:100%' value='".$line[4]."'></p>";

        echo "<p class='mainText'>Număr:</p><p><input name='nr' type='number' required style='width:100%' value='".$line[6]."'></p>"; 

        echo "<p class='mainText'>Furnizor:</p>";?>

        <p><select required name="furnizor" size="1" multiplename="Furnizor">
            <?php
                $sqlOp1 = 'SELECT id_furnizor, nume_furnizor FROM furnizor ORDER BY id_furnizor';
                echo '<option value="'.$line[10].'">'.$line[7].'</option>';
                $data1=mysqli_query($connect, $sqlOp1);
                while($Op=mysqli_fetch_row($data1)){
                    if($Op[0] !== $line[10]){
                        echo '<option value="'.$Op[0].'">'.$Op[1].'</option>';
                    }
                }
            ?>
            </select></p>

        <?php echo "<p class='mainText'>Depozit:</p>"; ?>

        <p><select name="depozit" size="1" multiplename="Depozit" required>
            <?php 
                $sqlOp2 = 'SELECT id_depozit, oras, adresa FROM depozit ORDER BY id_depozit';
                echo '<option value="'.$line[11].'">'.$line[8].', '.$line[9].'</option>';
                $data2=mysqli_query($connect, $sqlOp2);
                while($Op=mysqli_fetch_row($data2)){
                    if($Op[0] !== $line[11]){
                        echo '<option value="'.$Op[0].'">'.$Op[1].', '.$Op[2].'</option>';
                    }
                }
            ?>
            </select></p>

        <?php 
            echo "<p class='mainText'>Descriere:</p><p><textarea style='width:100%'; name='desc' type='text' width='800' size='880'>".$line[3]."</textarea></p>";
            echo "<input type='hidden' name='id_gr' value='".$line[2]."'>"; 
            echo "<input type='hidden' name='uploaded' value='".$line[5]."'>"; 
        ?>

        <br><br>
            </div>
            <div class="f2" width="50%">
        <table class="caracteristics" cellSpacing=0 cellPadding=6 width="100%">
            <td align="center"><b>Denumirea caracteristicii</b></td>
            <td align="center"><b>Valoarea caracteristicii</b></td>
            <?php while($lin2=mysqli_fetch_row($cdata)){?>
            <tr>
            <?php echo '<td><p class="pCtext">'.$lin2[1].'</p></td>';?> 
                    <td><input type="text" name="<?php echo 'caracteristic'.$lin2[0]; ?>" value="<?php echo $lin2[2]; ?>"></td>
                </tr>
            <?php } ?>
             </table>
                <p class="mod"><input type='submit' class="btn btn-success" value='Modifică'></p>
            </form>
                </div>
            </div>
        <div class="to_main">
            <?php echo "<form action='index.php?tip=".$_GET['tip']."' method='post'>"; ?>
                <input type='submit' class="btn btn-primary" value='Înapoi'>
            </form>
            <br>
        </div>
</body>
</html>