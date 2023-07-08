<?php
session_start();
require 'function.php';
// Session & Cookie
$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($conn,"SELECT * FROM  akun WHERE 
                        username = '$username' AND password='$password'");

if (mysqli_num_rows($data) === 1){
    session_start();
    $_SESSION['login'] = true;
    if(isset($_POST['rememberme'])){
        setcookie('login','true', time()+60);
    }
    header("Location:../index.php");
    exit;
} else{
    echo"<script>
            alert('Username Atau Password Salah')
            document.location.href = '../auth/login.php';
        </script>";
}

                