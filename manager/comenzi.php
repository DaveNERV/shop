<h2><strong><font size="5">Lista de comenzi</font></strong></h2>
<br>
<?php
    require_once("../handlers/connect.php");
    mysqli_query($connect, "set character_set_client='utf-8'");
    if($_GET['act']=='new'){
	   $sql2="SELECT z.id_chitanta, z.data, z.id_angajat, c.Nume, c.Prenume, a.nume, a.prenume, c.id_client FROM 
       vanzari z LEFT JOIN angajati a
       ON z.id_angajat = a.id_angajat
       INNER JOIN client c
       ON c.id_client = z.id_client ORDER BY z.id_chitanta";
	   $data2=mysqli_query($connect, $sql2) or die(mysqli_error($connect)); ?>
	   <table class="orders" border=2 bgcolor=white>
          <tr class="table-danger">
              <td width=15% align='center'><b>Comanda</b></td>
              <td width=10% align='center'><b>Data</b></td>		
              <td width=25% align='center'><a href=<?php echo 'comanda_comanda.php?tip='.$_GET['id']; ?> ><b>Client</b></a></td>
              <td width=20% align='center'><b>Executor</b></td>
              <td width=10% align='center'><b>Suma</b></td>
              <td width=10% align='center'><b>Șterge comanda</b> </td>
              <td width=10% align='center'><b>Vizionarea comenzii</b></td>
          </tr>
<?php while($line2=mysqli_fetch_row($data2)){ 
          echo "<tr>";
          echo "<td width=100 align='center'>Chitanța nr.".$line2[0]."</td>";
          echo "<td width=100 align='center'>".$line2[1]."</td>";
          echo "<td width=100 align='center'>".$line2[3]. ' ' .$line2[4]."</td>";
	  
          echo "<td width=100 align='center'><a href='comanda_men.php?id=".$line2[0]."&tip=".$_GET['id']."'>";
          if($line2[2]=='NULL' || $line2[2] == 0){ 
              echo "Nedefinit</a></td>";
          }else{
                echo $line2[5]. ' ' . $line2[6];    
          }

          $sql3="SELECT `id_chitanta`, `id_marfa`, `numar`, `costul` FROM `marfa_in_chitanta` WHERE `id_chitanta`=".$line2[0];
          $data3=mysqli_query($connect, $sql3) or die(mysqli_error($connect));
          $summ=0;
          while ($line3=mysqli_fetch_row($data3)){
              $summ=$summ+$line3[3];
          }

          echo "<td width=100 align='center'>".$summ." lei</td>";
          echo "<td width=70 align='center'><a href='comanda_del.php?id=$line2[0]&tip=".$_GET['id']."'>Șterge</a></td>";
          echo "<td width=70 align='center'><a href='comanda_open.php?id=$line2[0]&tip=".$_GET['id']."&cl=".$line2[7]."'>Deschide</a></td>";
          echo "</tr>";
       }
          echo "</table>";
    }
?>