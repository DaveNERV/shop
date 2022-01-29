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
<h2 class="del_title"><strong><font size="6">Adăugarea mărfii</h2></font></strong></h2>

    <div class="add_goods_container">
    <?php 
        require_once("../handlers/connect.php");
        echo "<form action='add_caracteristics.php?tip=".$_GET['tip']."&id=".$_GET['id']."' method='post' enctype='multipart/form-data'>"; ?>
            <p class="pCtext"><b>Denumire:*</b></p>
            <p><input type='text' style="width: 100%;" name='denumire' required></p>
            <p class="pCtext"><b>Descriere:</b></p>
            <p><textarea type='text' style="width: 100%;" name='descriere'></textarea></p>
            <p class="pCtext"><b>Pret:*</b></p>
            <p><input type='text' style="width: 100%;" name='pret' required></p>
            <p class="pCtext"><b>Furnizor:*</b></p>
            <p><select required name="id_furnizor" size="1" multiplename="Furnizor">
            <?php 
                $sqlOp1 = 'SELECT id_furnizor, nume_furnizor FROM furnizor ORDER BY id_furnizor';
                $data=mysqli_query($connect, $sqlOp1);
                while($Op=mysqli_fetch_row($data)){
                    echo '<option value="'.$Op[0].'">'.$Op[1].'</option>';
                }
            ?>
            </select></p>
            <p class="pCtext"><b>Fotografie:*</b></p>
            <p><input type='file' name='foto' required></p>
            <p class="pCtext"><b>Depozit:*</b></p>
            <p><select name="id_depozit" size="1" multiplename="adresat" required>
                <?php 
                $sqlOp1 = 'SELECT id_depozit, oras, adresa FROM depozit ORDER BY id_depozit';
                $data=mysqli_query($connect, $sqlOp1);
                while($Op=mysqli_fetch_row($data)){
                    echo '<option value="'.$Op[0].'">'.$Op[1].', '.$Op[2].'</option>';
                }
            ?>
            </select></p>
        <p class="pCtext"><b>Numărul:*</b></p>
            <p><input type='text' name='nr' required></p>
        
            <?php echo '<input type="hidden" name="grupa" value="'.$_GET['id'].'">'; ?>

            <input type='submit' class='btn btn-success' value='Incarcă'>
            <input type="button" class="btn btn-danger" value="Înapoi" style="font-size:15px; margin-left: 10px;"  onclick="document.location.href='index.php?tip=1'"> 
        </form>
    </div>
</body>
</html>