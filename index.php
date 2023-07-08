<?php
session_start();
require 'function/function.php';
if(!isset($_SESSION['login'])){
    header("Location: auth/login.php");
    exit;
};
if(isset($_POST["kirim"])) {
    $nama = $_POST['nama'];
    $komentar = $_POST['komentar'];
    if($nama == '' || $komentar == ''){
        echo "
            <script>
                alert('Mohon isi nama dan komentar!');    
                document.location.href = 'index.php';
            </script>
            ";
    return false;
    }
    if (komentar ($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan!');    
                document.location.href = 'index.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Maaf, Data Gagal Ditambahkan!');    
                document.location.href = 'index.php';
            </script>
            ";
    }
}

$komentar = mysqli_query($conn,"SELECT * FROM komentar");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Minggu 2</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@1&display=swap" rel="stylesheet">
    <script src="script.js"></script>
</head>
<body>
    <div class="logout">
        <a href="auth/logout.php">Logout</a>
    </div>
<div class="card">
    <div class="judul">
       <h1>Personal Profile</h1> 
    </div>
    <div class="header">
        <ul>
            <a href="#saya"><li>Tentang Saya </li></a>
            <a href="#hobi"><li>Hobi Saya </li></a>
            <a href="#pengalaman"><li>Pengalaman Programming</li></a>
            <a href="#komentar"><li>Apa Komentar Orang?</li></a>
        </ul>
    </div>
<div class="content">
    <div class="head">
        <img src="img/1.jpg">
        <div class="myname">
        <h1 ALIGN="Center">I'M Denise Aldianto</h1>
        <h1 ALIGN="Center"><a href="https://join.mercubuana.ac.id" target="_blank">MAHASISWA UNIVERSITAS</a></h1>
        <h1 ALIGN="Center"><a href="https://join.mercubuana.ac.id"target="_blank">MERCU BUANA</a></h1>
        </div>
    </div>
    <img src="img/2.jpg" id="pic2">
    <div class="about">
    <h2 ALIGN="CENTER" id="saya"><u>Tentang Saya</u></h2>
    <p>
            Hallo perkenalkan nama saya <b>Denise Aldianto</b>, saya lahir di Karanganyar tanggal 27 juni 2001. Saya berasal dari solo tepatnya
            di Kab.Karanganyar. Saya dari <big>SMK N 1 Karanganyar</big> jurusan Akuntansi, namun sejak di jakarta saya mendapat rekomendasi untuk kuliah jurusan <i>IT</i> oleh teman dan saudara yang akhirnya Saya
            memilih masuk <em>Universitas Mercu Buana</em> jurusan Sistem Informasi.
            <h2 id="hobi">Hobi Saya</h2>
            <ul>
                <li>Futsal</li>
                <li>Main Game</li>
                <li>Menonton Film</li>
            </ul>
            <div style=”border-top: 2px dashed #DB1200; margin-top: 1em; padding-top: 1em;”> </div>

    </p>
    <img src="img/3.jpg" id="pic3">

    <table style="margin: 35px auto; text-align: left;" border="1" cellspacing="5" width="600">
        <caption>
            <div style="margin: 25px 0px;" align="top" id="pengalaman"><b>Pengalaman Programming</b></div>
        </caption>
        
        <tr>
            <td>HTML</td>
            <td>MYSQL</td>
        </tr>
        <tr>
            <td>CSS</td>
            <td>ORACLE</td>
        </tr>
        <tr>
            <td>PHP</td>
            <td>Phyton</td>
        </tr>
        <tr>
            <td>Javascript</td>
            <td>Laravel</td>
        </tr>
    </table>
    <p>
        Di jakarta saya bekerja di suatu perusahaan swasta yang bergerak di dunia <b>E-Commerce</b> yang melakukan transaksi melalui marketplace seperti
        <i>Shopee,Tokopedia,Lazada,bukalapak,</i> dan lain sebagainya. Disini saya sebagai <i>Shopkeeper</i> yang berfokus untuk mengembangkan toko di marketplace
    </p>
<div class="isi">
    <h3 id="komentar">Kasih Komentar Buat Denis</h3>
   <form action="" method="POST">
        <input type="text" name="nama" placeholder="Masukkan Nama" require></input><br>
        <textarea type="text" name="komentar" placeholder="Masukkan Komentar Kamu Disini" rows="5" require></textarea><br>
        <button type="submit" name="kirim">Kirim</button>
    </form>
</div>
<div class="komentar">
    <?php foreach($komentar as $row) :?>
    <div class="media">
        <div class="media-body">
            <h4><?=$row["nama"]; ?></h3>
           <P>" <?= $row["komentar"]; ?> "</p>
        </div>
    </div>
    <form action="" method="GET">
    <div class="action">
            <a href="update/update.php?id=<?= $row["id"];?>"><div class="ubah" type="submit" name="ubah">Ubah Teks</div></a>
            <a href="function/hapus.php?id=<?= $row["id"];?>"onclick="return confirm('Yakin akan menghapus?');"><div class="delete" type="submit">Delete</div></a>
    </div>
    </form>
<hr color="#FFE7CD" size="1" width="50%">
        <?php endforeach;?>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
