<h2> <font size="5"><b>Catalogul materialelor</b></font></h2>
<br>
  <?php
    require_once("../handlers/connect.php");
    mysqli_query ($connect, "set character_set_client=utf-8");

    $mSQL =  "SELECT m.id_marfa, m.denumire_marfa, m.id_grupa, m.descriere, m.pret, m.foto, m.numarul, f.nume_furnizor, d.oras, d.adresa FROM 
    marfe m INNER JOIN grupa g
    ON g.id_grupa = m.id_grupa
    INNER JOIN depozit d
    ON d.id_depozit = m.id_depozit
    INNER JOIN furnizor f
    ON f.id_furnizor = m.id_furnizor
    WHERE m.id_grupa=".$_GET['id'];

    $data2=mysqli_query($connect, $mSQL);?>
    <table class="goods_table" border=2 bgcolor=white width=100%>
        <tr class="table-info">
            <td width=5%><b>Codul mărfii</b></td>
            <td width=15%><b>Denumirea</b></td>
            <td width=20%><b>Descrierea</b></td>
            <td width=7%><b>Preț</b></td>
            <td width=12%><b>Fotografia</b></td>
            <td width=8%><b>Numărul în depozit</b></td>
            <td width=7%><b>Furnizor</b></td>
            <td width=15%><b>Depozit(adresa)</b></td>
            <td width=5%><b>Modifică marfa</b></td>
            <td width=5%><b>Șterge marfa</b></td>
        </tr>
    
    <?php while($line=mysqli_fetch_row($data2)){
        echo "<tr>";
            echo "<td>".$line[0]."</td>";
            echo "<td>".$line[1]."</td>";
            echo "<td class='description'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$line[3]."</td>";
            echo "<td>".$line[4]." lei</td>";
            echo "<td><img class='photo_goods' src='../img/".$line[5]."'></td>";
            echo "<td>".$line[6]."</td>";
            echo "<td>".$line[7]."</td>";
            echo "<td>".$line[8].", ".$line[9]."</td>";
            echo "<td align='center'><form action='edit_goods.php?tip=".$_GET['tip']."&id=".$line[0]."' method='post'>
            <input type='image' src='b_edit.png'></form></td>";
            echo "<td align='center'><form action='del_materials.php?tip=".$_GET['tip']."&id=".$line[0]."' method='post'>
            <input type='image' src='b_drop.png'></form></td>";
        echo "</tr>";
    }?>
    </table>;
