<?php
session_start();
if(isset($_COOKIE['login'])){
    if($_COOKIE['login'] == 'true') {
        $_SESSION['login'] = true;
    }
}
if(isset($_SESSION['login'])){
    header("Location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css" type="text/css">
    <title>Document</title>
</head>
<body>
<div class="login">
    <form action="../function/session.php" method="POST">
        <h1>LOGIN</h1>
        <div class="form">
            <input type="text" name="username" id="username" placeholder="Username"><br>
            <input type="password" name="password" id="password" placeholder="Password"><br>
            <input type="checkbox" name="rememberme" id="rememberme">
            <label for="rememberme">Remember Me</label><br>
            <button type="submit">Login</button><br>
            <span><a href="../registrasi/registrasi.php">Don't have account yet?</a></span><br>
        </div>
    </form> 
</div> 
</body>
</html>
