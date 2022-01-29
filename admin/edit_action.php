<?php
    session_start();
    require_once("../handlers/connect.php");
    mysqli_query($connect, 'SET NAMES utf-8');
    if ($_GET['act']=='edit'){
        if($_FILES['foto']['name'] !== ''){
            if(unlink('../img/'.$_POST['uploaded'])){
                $time = time();
                $foto_str = $time . '-' . $_FILES['foto']['name'];
                $path = '../img/' . $foto_str;
                move_uploaded_file($_FILES['foto']['tmp_name'], $path);
                $sSQL="UPDATE marfe SET foto='".$foto_str."' WHERE id_marfa=".$_GET['id'];
                mysqli_query($connect, $sSQL) or die(mysqli_error($connect));
            }
        }
        $sSQL="UPDATE marfe SET denumire_marfa='".$_POST['den']."', descriere='".$_POST['desc']."', id_furnizor='".$_POST['furnizor']."', pret ='".$_POST['pret']."', numarul='".$_POST['nr']."', id_depozit='".$_POST['depozit']."' 
        WHERE id_marfa=".$_GET['id'];
        mysqli_query($connect, $sSQL) or die(mysqli_error($connect));
    }
    
    $cSQL = "SELECT c.id_caracteristica, c.nume_caracteristica, vc.valoarea_caracteristica FROM 
    caracteristici c CROSS JOIN marfe m 
    LEFT JOIN valoarea_caracteristicii vc 
    ON vc.id_caracteristica = c.id_caracteristica AND vc.id_marfa = m.id_marfa 
    WHERE m.id_marfa =".$_GET['id'];
    $cdata = mysqli_query($connect, $cSQL) or die(mysqli_error($connect));
    while($line=mysqli_fetch_row($cdata)){
        if($_POST['caracteristic'.$line[0]] != "" || $_POST['caracteristic'.$line[0]] != NULL){
            echo $_POST['caracteristic'.$line[0]].', ';
            if($line[2] == NULL){
                mysqli_query($connect, "INSERT INTO `valoarea_caracteristicii`(`id_marfa`, `id_caracteristica`, `valoarea_caracteristica`) VALUES ('".$_GET['id']."','".$line[0]."', '".$_POST['caracteristic'.$line[0]]."');") or die(mysqli_error($connect));
            }else{
                mysqli_query($connect, "UPDATE valoarea_caracteristicii SET valoarea_caracteristica = '".$_POST['caracteristic'.$line[0]]."' WHERE id_marfa='".$_GET['id']."' AND id_caracteristica = ".$line[0]) or die(mysqli_error($connect));
             }
        }
        
    }
    header("location: index.php?tip=".$_GET['tip']."&id=".$_POST['id_gr']);
?>