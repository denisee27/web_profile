<?php
require "../function/function.php";
$id = $_GET['id'];
$komentar = query("SELECT * FROM komentar WHERE id = $id")[0];

if(isset($_POST["ubah"])) {
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah!');    
                document.location.href = '../index.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Maaf, Data Gagal Diubah!');    
                document.location.href = 'update.php';
            </script>
            ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="update.css" type="text/css">
    <title>Edit Komentar</title>
</head>
<body>
<div class="update">
    <form action="" method="post">
        <h1>UBAH KOMENTAR</h1>
        <div class="form">
            <input type="hidden" name="id" Id="id" value="<?=$komentar["id"]?>"></input>
            <input type="text" name="nama" id="nama" value="<?= $komentar["nama"]?>"></input>
            <textarea type="text" name="komentar"><?= $komentar["komentar"]?></textarea><br>
            <button type="submit" name="ubah">Ubah</button><br>
            <span>Back to <a href="../index.php">Home</a></span>
        </div>
    </form> 
</div> 
</body>
</html>