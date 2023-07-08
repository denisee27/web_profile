<?php
// Database Connection
$conn = mysqli_connect("localhost","root","","personal") or die("Could not connect database");
$register = mysqli_query($conn,"SELECT * FROM akun");
$komentar = mysqli_query($conn,"SELECT * FROM komentar");

// Function
function register($post){
    global $conn;
    $username = htmlspecialchars ($post['username']);
    $password = htmlspecialchars ($post['password1']);

    $add = "INSERT INTO akun
                Values
                ('', '$username', '$password')
            ";
    mysqli_query($conn,$add);
    return mysqli_affected_rows($conn);
}

function komentar($post){
    global $conn;
    $nama = htmlspecialchars ($post['nama']);
    $komentar = htmlspecialchars ($post['komentar']);

    $add = "INSERT INTO komentar
                Values
                ('', '$nama', '$komentar')
            ";
    mysqli_query($conn, $add);
    return mysqli_affected_rows($conn);
}
function query ($data){
    global $conn;
    $result = mysqli_query($conn,$data);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function ubah($post){
    global $conn;
    $id = $post['id'];
    $nama = htmlspecialchars ($post['nama']);
    $komentar = htmlspecialchars ($post['komentar']);

    $ubah = "UPDATE komentar SET
                nama = '$nama',
                komentar = '$komentar'
            WHERE id = $id
            ";
    mysqli_query($conn, $ubah);

    return mysqli_affected_rows($conn);
}
?>