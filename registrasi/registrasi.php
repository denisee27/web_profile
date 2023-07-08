<?php
require '../function/function.php';
if(isset($_POST["submit"])) {
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    if($password1 != $password2){
        echo "
            <script>
                alert('Password yang dimasukkan tidak sama!');    
                document.location.href = 'registrasi.php';
            </script>
            ";
    }
    if (register ($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan!');    
                document.location.href = '../auth/login.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Maaf, Data Gagal Ditambahkan!');    
                document.location.href = 'registrasi.php';
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
    <link rel="stylesheet" href="registrasi.css" type="text/css">
    <title>Document</title>
</head>
<body>
    <div class="form-box">
    <form action="" method="POST">
        <h1>Sign-UP</h1>
        <input type="text" name="username" placeholder="Username"><br>
        <input type="password" name="password1" placeholder="Password"><br>
        <input type="password" name="password2" placeholder="Re-Passwod"><br>
        <button type="submit" name="submit">Sign-Up</button><br>
        <span>Back to <a href="../auth/login.php">login</a></span>
    </form>
    </div>
</body>
</html>