<?php
    require_once("handlers/connect.php");
    mysqli_query($connect, "set character_set_client='utf-8'");
    mysqli_query($connect, "set character_set_results='utf-8'");
    mysqli_query($connect, "set collation_connection='utf-8'");
    $sql = "SELECT id_grupa, denumire_grupa FROM grupa order by id_grupa";
    $data = mysqli_query($connect, $sql);
    while($row=mysqli_fetch_row($data)){
	   echo "<a class='link' href='index.php?id=".$row[0]."'>".$row[1]."</a>";
    }
?>