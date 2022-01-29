<h2><strong><font size="5">Utilizatorii site-ului(angajați)</font></strong></h2>
</br>
<?php
    require_once("../handlers/connect.php");
    mysqli_query ($connect, "set character_set_client='utf-8'");
    $sql2="SELECT `id_angajat`, `nume`, `prenume`, `gen`, `drepturi`, `data_nasterii`, `idnp`, `login`, `password` FROM `angajati`";
    $data2=mysqli_query($connect, $sql2); ?>

	  <table border=2 bgcolor=white>
          <tr class="table-info">
            <td width=350 align='center'><b>Numele, Prenumele</b></td>
            <td width=100 align='center'><b>Drept</b></td>
            <td width=100 align='center'><b>Gen</b></td>
            <td width=100 align='center'><b>Nascut</b></td>	
            <td width=200 align='center'><b>idnp</b></td>
            <td width=200 align='center'><b>Login</b></td>
            <td width=150 align='center'><b>Parola</b></td>
            <td width=70 align='center'><b>Modifică</b></td>
            <td width=70 align='center'><b>Șterge</b></td>
          </tr>
<?php 
    while($line2=mysqli_fetch_row($data2)){ 
        echo "<tr>";
            echo "<td>".$line2[1]." ".$line2[2]."</td>";
            echo "<td width=100>".$line2[4]."</td>";
            echo "<td width=100>".$line2[3]."</td>";
            echo "<td width=100>".$line2[5]."</td>";
            echo "<td width=100>".$line2[6]."</td>";
            echo "<td width=100>".$line2[7]."</td>";
            echo "<td width=100>".$line2[8]."</td>";
            echo "<td width=50 align='center'><form action='edit_user.php?id=$line2[0]' method='post'>
            <input type='image' src='b_edit.png'></form></td>";
            echo "<td width=70 align='center'><form action='del_user.php?id=$line2[0]' method='post'>
            <input type='image' src='b_drop.png'></form></td>";
        echo "</tr>";
    } ?>
    </table>
<br>
<form action="add_user.php" method="post">
    <p><input name="submit" class="btn btn-primary" type="submit" value="Adaugă un nou angajat"></p>
</form>