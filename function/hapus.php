<?php 
require 'function.php';
if (isset($_GET['id'])) {
    mysqli_query($conn,"DELETE FROM komentar WHERE id='$_GET[id]'");
    echo "
    <script>
        alert('Komentar Berhasil Dihapus!');    
        document.location.href = '../index.php';
    </script>
    ";
    } else {
    echo "
    <script>
        alert('Maaf, Komentar Gagal Dihapus!');    
        document.location.href = 'barang.php';
    </script>
    ";
 }
?>
