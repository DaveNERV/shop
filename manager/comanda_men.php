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
<div class="users">
    <h2><font size="5"><b>Executori

    <?php
        require_once("../handlers/connect.php");
        mysqli_query ($connect, "set character_set_client='utf-8'");
        $sql2="SELECT `id_angajat`, `nume`, `prenume`, `login` FROM `angajati` WHERE drepturi = 'manager'";
        $data2=mysqli_query($connect, $sql2) or die(mysqli_error($connect));
    ?>
          </b></font></h2>
          <table BORDER=2 bgcolor=white width="100%">
              <tr class="table-info">
                <td width=40% align='center'><strong>Numele, Prenumele</strong></td>
                <td width=40% align='center'><b>Login</b></td>		
                <td width=20% align='center'><b>Fixări</b></td>
              </tr>

    <?php while ($line2=mysqli_fetch_row($data2)){ 
                echo "<tr>";
                    echo "<td width=100 align='center'>".$line2[1].' '.$line2[2]."</td>";
                    echo "<td width=100 align='center'>".$line2[2]."</td>";
                    echo "<td width=100 align='center'><a href='ordin.php?id=" .$_GET['id']."&tip=".$_GET['tip']."&men=".$line2[0]."'>Fixează</a></td>";
                echo "</tr>";
            }
    ?>
          </table>
    <br>
    <?php echo "<form action='index.php?act=new&id=".$_GET['tip']."' method='post'>"; ?>
            <input type='submit' class="btn btn-primary" value='Înapoi'>
        </form>
</div>
</body>
</html>