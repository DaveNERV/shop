<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Magazin de realizare a materialelor de construcții</title>
    <link rel="stylesheet" href="../styles/cos-style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php
        session_start();
        require_once("../handlers/connect.php");
        mysqli_query($connect, "set character_set_client='utf-8'");
    
        $sqql = "SELECT `id_marfa`, `denumire_marfa`, `descriere`, `pret`, `foto` FROM `marfe` WHERE id_marfa='".$_GET['id']."'";
        $roww=mysqli_query($connect, $sqql) or die(mysqli_error($connect));
        while ($liene=mysqli_fetch_row($roww)){
            if((isset($_POST['order_'.$liene[0]])) and ($_POST['order_'.$liene[0]] != "")){
                $sqll="INSERT INTO com(id, id_marfa, nr) VALUES ('', '".$liene[0]."', '".$_POST['order_'.$liene[0]]."');";
                $rowy=mysqli_query($connect, $sqll) or die(mysqli_error($connect));
            }
        }
    ?>
    <div class="title-button">
        <h1 class="title">Comanda dumneavostră:</h1>
        <table width=99% border=0 cellpadding=0 cellspacing=0>
            <tr>
                <td height=36><input name="button3" type=button style="font-size:15px" class="btn btn-primary" onclick="document.location.href='../index.php'" value="Continuați alegerea"></td>
           </tr>
        </table>
    </div>
        <table class="order_table" cellSpacing=0 cellPadding=2>
        <tr>
            <td align="center" width="10%"><b>Foto</b></td>
            <td align="center" width="70%"><b>Denumire/Descriere</b></td>
            <td align="center" align="center" width="5%"><b>Numărul</b></td>
            <td align="center" width="10%"><b>Preț</b></td>
            <td align="right" width="5%">&nbsp;</td>
        </tr>

    <?php 
        $siql="SELECT m.id_marfa, m.denumire_marfa, m.descriere, m.pret, m.foto, c.nr, c.id FROM 
        com c INNER JOIN marfe m 
        ON c.id_marfa = m.id_marfa";
        $rowu=mysqli_query($connect, $siql);
        $summa=0;
        while($arry = mysqli_fetch_array($rowu)){
            $summa = $summa + $arry[3] * $arry[5];	
    ?>
            <tr>
                <td align="center" valign="middle" align="right">
            <?php
                if (trim($arry[4])){
                    echo '<img src="../img/'.$arry[4].'" border=1 height=70></a>';
                }else{
                    echo '&nbsp;';
                }
            ?>
                </td>
                <td class="description"><b><?= $arry[1] ?></b><br><?= $arry[2] ?></td>
                <td align="center"><?= $arry[5] ?></td>
                <td align="center">
            <?php
                if(trim($arry[3]) && $arry[3]>0){
                    echo $arry[3].' lei';
                }
            ?>
                </td>
                <td align='center'>
            <?php 
                echo "<a href='del_marfa.php?id=".$arry[6]."&tip=".$_GET['id']."'>Șterge</a>"; 
            ?>
                </td>
            </tr>
        <?php
    }
    ?>
        <tr>
            <td colspan="2" align="left"><b>Suma totală:</b></td>
            <td colspan="3" align="center">
        <b><?php echo $summa.' lei'; ?></b></td>
        </tr>
            </table>
        <br>
        <br>

        <fieldset class="form_user"><legend class="title_form">Completați formularul:</legend>
            <?php echo "<form action='comanda.php?id=".$_GET['id']."' method='post'>"; ?>
            <p class="mainText">Numele:*</p> 
            <p><input type="text" name="nume" style="width:100%" required></p>
            <p class="mainText">Prenumele:*</p>
            <p><input type="text" name="pren" style="width:100%" required></p>
            <p class="mainText">Telefon:*</p>
            <p><input type="tel" name="tel" style="width:100%" required></p>
            <p class="mainText">Adresa:*</p>
            <p><input type="text" name="adress" style="width:100%" required></p>
            <p class="mainText">E-mail:*</p>
            <p><input type="email" name="email" style="width:100%" required></p>
            <p class="mainText">Oraș:*</p>
            <p><input type="text" name="oras" style="width:100%" required></p>
        </fieldset>
        <table class="submit-btn" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td align="right"><input type="submit" id="submit" name="sent" class="btn btn-success" value="Trimite comanda" style="font-size:15px"></td>
            </tr>
        </table>
        </form>
        <input type="button" id="to_main" class="btn btn-primary" value="Continuați alegerea" style="font-size:15px;" "margin-left: 100px;" onclick="document.location.href='../index.php'"> 
        <br><br>
</body>
</html>
