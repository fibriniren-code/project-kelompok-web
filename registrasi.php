<?php
session_start();
if(!isset($_SESSION['nim'])){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Registrasi KRS</title>
<style>
body{
    font-family:Arial;
    background:#f4f6f9;
}
.container{
    width:60%;
    margin:80px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    text-align:center;
}
h2{
    color:#2c3e50;
}
a.menu{
    display:block;
    margin:15px auto;
    padding:15px;
    width:60%;
    background:#3498db;
    color:white;
    text-decoration:none;
    border-radius:8px;
}
a.menu:hover{
    background:#2980b9;
}
.logout{
    background:#e74c3c !important;
}
</style>
</head>
<body>
    <div class="container">
        <h2>Registrasi Semester Genap 2025/2026</h2>
        <p><b>NIM:</b> <?= $_SESSION['nim'] ?> <br>
        <b>Nama:</b> <?= $_SESSION['nama'] ?></p>

        <a class="menu" href="krs_saya.php">📘 Mata Kuliah Diambil</a>
        <a class="menu" href="tambah_krs.php">➕ Tambah Jadwal Kuliah</a>
        <a class="menu logout" href="login.php?logout=true">🚪 Logout</a>
    </div>
</body>
</html>
