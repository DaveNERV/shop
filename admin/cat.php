<h2 class="m-title">Materiale</h2>
<br>
<?php
    require_once("../handlers/connect.php");

    mysqli_query ($connect, "set character_set_client='utf-8'");

    $sql="SELECT id_grupa, denumire_grupa FROM grupa order by id_grupa";
    $data=mysqli_query($connect, $sql); ?>
    <table class='cat_table' BORDER=2>
        <tr><td width=350 align='center'><b>Denumire</td>
            <td width=70 align='center'><b>Adaugă marfă</td>
            <td width=70 align='center'><b>Modifică catalog</td>
            <td width=70 align='center'><b>Intră în catalog</td>
            <td width=70 align='center'><b>Șterge catalog</td>	  
        </tr></font>

    <?php while($line=mysqli_fetch_row($data)){
        echo "<tr>";
            echo "<td>".$line[1]."</font></td>";
            echo "<td width=50 align='center'><form action='add_goods.php?tip=1&id=$line[0]' method='post'>
            <input type='image' src='plus_fav.gif'></form></td>";
            echo "<td width=50 align='center'><form action='edit_cat.php?id=$line[0]' method='post'>
            <input type='image' src='b_edit.png'></form></td>";
            echo "<td width=50 align='center'><form action='".$_SERVER['PHP_SELF']."?tip=1&id=$line[0]' method='post'>
            <input type='image' src='b_props.png'></form></td>";
            echo "<td width=70 align='center'><form action='del_cat.php?id=$line[0]' method='post'>
            <input type='image' src='b_drop.png'></form></td>";
        echo "</tr>";
    }
    echo "</table>";
?>
