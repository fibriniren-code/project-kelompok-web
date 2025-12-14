<?php
session_start();
if(!isset($_SESSION['nim'])){
    header("location:login.php");
}
$conn = new mysqli("localhost","root","","siamu");

$nim = $_SESSION['nim'];
$reg = $conn->query("SELECT * FROM registrasi WHERE nim='$nim'")->fetch_assoc();
$no_reg = $reg['no_reg'];

if(isset($_GET['ambil'])){
    $conn->query("INSERT INTO krs(no_reg,id_jadwal)
    VALUES('$no_reg','$_GET[ambil]')");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Tambah KRS</title>
<style>
body{
    font-family:Arial;
    background:#f4f6f9;
}
.container{
    width:90%;
    margin:auto;
    background:white;
    padding:20px;
    border-radius:10px;
}
table{
    width:100%;
    border-collapse:collapse;
}
th{
    background:#27ae60;
    color:white;
    padding:8px;
}
td{
    text-align:center;
    padding:8px;
    border-bottom:1px solid #ddd;
}
a.btn{
    background:#2ecc71;
    color:white;
    padding:5px 10px;
    border-radius:5px;
    text-decoration:none;
    }
    </style>
</head>
<body>
    <div class="container">
        <h3>Tambah Jadwal Kuliah</h3>
        <table>
            <tr>
                <th>Hari</th><th>Waktu</th><th>Mata Kuliah</th>
                <th>SKS</th><th>Ruang</th><th>Dosen</th><th>Aksi</th>
            </tr>
        <?php
        $q=$conn->query("SELECT * FROM view_jadwal");
        while($j=$q->fetch_assoc()){
        ?>
        <tr>
            <td><?= $j['hari'] ?></td>
            <td><?= $j['waktu'] ?></td>
            <td><?= $j['nma_mk'] ?></td>
            <td><?= $j['sks'] ?></td>
            <td><?= $j['nama_ruang'] ?></td>
            <td><?= $j['nama'] ?></td>
            <td><a class="btn" href="?ambil=<?= $j['id_jadwal'] ?>">Ambil</a></td>
        </tr>
        <?php } ?>
    </table>
    <a href="registrasi.php">⬅ Kembali</a>
</div>
</body>
</html>
