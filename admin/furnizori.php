<h2><strong><font size="5">Furnizorii mărfurilor</font></strong></h2>
</br>
<?php
    require_once("../handlers/connect.php");
    mysqli_query ($connect, "set character_set_client='utf-8'");
    $sql4="SELECT `id_furnizor`, `nume_furnizor`, `adresa`, `telefon`, `email`, `oras`, `tara` FROM `furnizor` ORDER BY `id_furnizor`";
    $data4=mysqli_query($connect, $sql4) or die(mysqli_error($connect)); ?>

	  <table border=2 bgcolor=white width="100%">
          <tr class="table-info">
            <td width=15% align='center'><b>Numele furnizorului</b></td>
            <td width=20% align='center'><b>Adresa</b></td>
            <td width=15% align='center'><b>Telefon</b></td>
            <td width=20% align='center'><b>E-mail</b></td>
            <td width=10% align='center'><b>Oraș</b></td>
            <td width=10% align='center'><b>Țara</b></td>
            <td width=5% align='center'><b>Modifica</b></td>
            <td width=5% align='center'><b>Șterge</b></td>
          </tr>
<?php 
    while($line4=mysqli_fetch_row($data4)){ 
        echo "<tr>";
            echo "<td>".$line4[1]."</td>";
            echo "<td>".$line4[2]."</td>";
            echo "<td>".$line4[3]."</td>";
            echo "<td>".$line4[4]."</td>";
            echo "<td>".$line4[5]."</td>";
            echo "<td>".$line4[6]."</td>";
            echo "<td align='center'><form action='edit_furnizor.php?id=$line4[0]' method='post'>
            <input type='image' src='b_edit.png'></form></td>";
            echo "<td align='center'><form action='del_furnizor.php?id=$line4[0]' method='post'>
            <input type='image' src='b_drop.png'></form></td>";
        echo "</tr>";
    } ?>
    </table>
<br>
<form action="add_furnizor.php" method="post">
    <input name="submit" type="submit" class="btn btn-primary" value="Adaugă un nou furnizor">
</form>