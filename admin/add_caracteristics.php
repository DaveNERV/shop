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
    <h2 class="del_title"><strong><font size="6"><h2>Adăugarea marfii</h2></font></strong></h2>
    <br>
    <?php
        session_start();
    
        require_once("../handlers/connect.php");
        $time = time();
        $foto_str = $time . '-' . $_FILES['foto']['name'];
        $path = '../img/' . $foto_str;
        move_uploaded_file($_FILES['foto']['tmp_name'], $path);

        $sSQL="INSERT INTO `marfe`(`id_marfa`, `denumire_marfa`, `id_grupa`, `descriere`, `pret`, `id_furnizor`, `foto`, `id_depozit`, `numarul`) VALUES (NULL, '".$_POST['denumire']."', '".$_POST['grupa']."', '".$_POST['descriere']."', '".$_POST['pret']."', '".$_POST['id_furnizor']."', '".$foto_str."', '".$_POST['id_depozit']."', '".$_POST['nr']."')";
        mysqli_query($connect, $sSQL) or die(mysqli_error($connect)); 
    
        echo "<form action='index.php?tip=".$_GET['tip']."&id=".$_GET['id']."' method='post'
        <input type='submit' value='OK'>
        </form>";
    
        $sSQL = "SELECT id_marfa FROM marfe WHERE foto LIKE '%".$time."%'";
        $data1 = mysqli_query($connect, $sSQL) or die(mysqli_error($connect));
        $lin1 = mysqli_fetch_assoc($data1);
        $_SESSION['id_marfa'] = $lin1['id_marfa'];
    
        $cSQL = "SELECT id_caracteristica, nume_caracteristica FROM caracteristici ORDER BY id_caracteristica";
        $data2 = mysqli_query($connect, $cSQL) or die(mysqli_error($connect)); 
    
    echo "<div class='add_c_cont'>";
    echo "<form action='action.php?id=".$_POST['grupa']."' method='post' enctype='multipart/form-data'>" ?>
    <table class="caracteristics" cellSpacing=0 cellPadding=6, border=2>
        <tr>
            <td><b>Denumirea caracteristicii</b></td>
            <td><b>Valoarea caracteristicii</b></td>
        </tr>
        <tr>
        <?php while($lin2=mysqli_fetch_row($data2)){?>
            
           <?php echo '<td>'.$lin2[1].'</td>';?> 
            <td><input type="text" style="width: 100%;" name="<?php echo 'caracteristic'.$lin2[0];?>"></td>
        </tr>    
        <?php } ?>
    </table>
        <br><input type='submit' class='btn btn-success' value='încarcă'>
        <input type="button" class="btn btn-primary" value="Continuă fără caracteristica" style="font-size:15px; margin-left: 10px;"  onclick="document.location.href='index.php?tip=1'"> 
    </form>
    </div>
</body>
</html>