<h2><strong><font size="5" style="margin-left: 210px;">Depozituri mărfurilor</font></strong></h2>
</br>
<?php
    require_once("../handlers/connect.php");
    mysqli_query ($connect, "set character_set_client='utf-8'");
    $sql3="SELECT `id_depozit`, `oras`, `adresa` FROM `depozit` ORDER BY `id_depozit`";
    $data3=mysqli_query($connect, $sql3) or die(mysqli_error($connect)); ?>

	  <table border=2 bgcolor=white class="depozit" width="70%">
          <tr class="table-info">
            <td width=35% align='center'><b>Oraș</b></td>
            <td width=35% align='center'><b>Adresa</b></td>
            <td width=15% align='center'><b>Modifica</b></td>
            <td width=15% align='center'><b>Șterge</b></td>
          </tr>
<?php 
    while($line3=mysqli_fetch_row($data3)){ 
        echo "<tr>";
            echo "<td>".$line3[1]."</td>";
            echo "<td width=100>".$line3[2]."</td>";
            echo "<td width=50 align='center'><form action='edit_depozit.php?id=$line3[0]' method='post'>
            <input type='image' src='b_edit.png'></form></td>";
            echo "<td width=70 align='center'><form action='del_depozit.php?id=$line3[0]' method='post'>
            <input type='image' src='b_drop.png'></form></td>";
        echo "</tr>";
    } ?>
    </table>
    <br>
<form action="add_depozit.php" method="post">
    <input name="submit" type="submit" style="margin-left: 210px;" class="btn btn-primary" value="Adaugă un nou depozit">
</form>