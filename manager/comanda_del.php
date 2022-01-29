<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Manager</title>
    <link rel="stylesheet" href="../styles/2col_leftNav.css" type="text/css">
    <link rel="stylesheet" href="../styles/main_manager-style.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div id="masthead">
        <table width=100%>
            <tr>
                <td align="left">
                    <h1 id="siteName">Magazin de realizare a materialelor de construcții</h1>
                </td>
                <td align="right">
                   <?php echo '<a class="home_link" href="index.php?act=new&id='.$_GET['tip'].'">'; ?> <img align="middle"src="../1.jpeg" width="100" height="70"></a>
                </td>
            </tr>
        </table>
    </div>
    <div class="del_cont">
    <h2 class="del-title">Ștergerea comenzii № 

    <?php
        require_once("../handlers/connect.php");
        if($_SERVER['REQUEST_URI']==$_SERVER['PHP_SELF']."?id=".$_GET['id']."&tip=".$_GET['tip']){
            $sSQL="SELECT z.id_chitanta, c.id_client FROM 
                   vanzari z INNER JOIN client c
                   ON c.id_client = z.id_client WHERE `id_chitanta`=".$_GET['id'];
            mysqli_query($connect, 'SET NAMES utf-8'); 
            $data = mysqli_query($connect, $sSQL) or die(mysqli_error($connect)); 
            $line=mysqli_fetch_row($data);
            echo $line[0];
            echo "</h2><br>";
            echo "<div class='buttons'><form action='comanda_del.php?act=del&id=".$_GET['id']."&tip=".$_GET['tip']."' method='post'>
                <input type='hidden' name='id_cl' value='".$line[1]."'>";
            echo "<input class='btn btn-danger' type='submit' value='OK'>
                </form>";
        }else{
            if($_GET['act']=='del') {
                $sSQL1="DELETE FROM vanzari WHERE id_chitanta=".$_GET['id'];
                $sSQL2="DELETE FROM client WHERE id_client=".$_POST['id_cl'];
                mysqli_query($connect, $sSQL1) or die(mysqli_error($connect));
                mysqli_query($connect, $sSQL2) or die(mysqli_error($connect));
                header('location: index.php?act=new&id='.$_GET['id']);
            }
        }
        echo "<form action='index.php?act=new&id=".$_GET['tip']."' method='post'>"; 
        ?>
            <input class='btn btn-secondary' type='submit' value='Anulare'>
        </form></div>
    </div>
</body>
</html>