<?php
session_start();
$conn = new mysqli("localhost","root","","siamu");

if(isset($_GET['logout'])){
    session_destroy();
    header("location:login.php");
}

if(isset($_POST['daftar'])){
    $nim  = $_POST['nim'];
    $nama = $_POST['nama'];
    $pass = md5($_POST['password']);
    $conn->query("INSERT INTO mahasiswa(nim,nama,password)
    VALUES('$nim','$nama','$pass')");
    echo "<script>alert('Registrasi berhasil');location='login.php';</script>";
}

if(isset($_POST['login'])){
    $nim = $_POST['nim'];
    $password = md5($_POST['password']);
    $cek = $conn->query("SELECT * FROM mahasiswa 
    WHERE nim='$nim' AND password='$password'");
    if($cek->num_rows > 0){
        $mhs = $cek->fetch_assoc();
        $_SESSION['nim']  = $mhs['nim'];
        $_SESSION['nama'] = $mhs['nama'];
        header("location:registrasi.php");
    }else{
        echo "<script>alert('Login gagal');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login SIAMU</title>
<style>
body{
    background:#3498db;
    font-family:Arial;
}
.box{
    width:350px;
    background:white;
    margin:100px auto;
    padding:25px;
    border-radius:8px;
}
h2{
    text-align:center;
    color:#2c3e50;
}
input{
    width:100%;
    padding:8px;
    margin:5px 0;
}
button{
    width:100%;
    padding:10px;
    background:#3498db;
    color:white;
    border:none;
    border-radius:5px;
}
a{
    text-decoration:none;
    color:#3498db;
    }
</style>
</head>
<body>

<div class="box">
    <?php if(!isset($_GET['reg'])){ ?>
        <h2>Login Sistem</h2>
        <form method="post">
            <input type="text" name="nim" placeholder="NIM" required>
            <input type="password" name="password" placeholder="Password" required>
            <button name="login">Login</button>
        </form>
        <p align="center">Belum punya akun? <a href="?reg=1">Registrasi</a></p>
       
    <?php } else { ?>
        <h2>Registrasi Mahasiswa</h2>
        <form method="post">
            <input type="text" name="nim" placeholder="NIM" required>
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="password" name="password" placeholder="Password" required>
            <button name="daftar">Daftar</button>
        </form>
        <p align="center"><a href="login.php">Login</a></p>

        <?php } ?>
    </div>
</body>
</html>
