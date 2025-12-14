<?php
session_start();
if(!isset($_SESSION['nim'])){
    header("location:login.php");
}
$conn = new mysqli("localhost","root","","siamu");
?>
<!DOCTYPE html>
<html>
<head>
<title>Jadwal Kuliah</title>
<style>
body{
    font-family: Arial;
    background:#f4f6f9;
}
.container{
    width:90%;
    margin:auto;
    background:white;
    padding:20px;
    border-radius:8px;
}
h3{
    text-align:center;
    color:#2c3e50;
}
table{
    width:100%;
    border-collapse:collapse;
}
th{
    background:#3498db;
    color:white;
    padding:10px;
}
td{
    padding:8px;
    border-bottom:1px solid #ddd;
    text-align:center;
}
a.btn{
    background:#2ecc71;
    color:white;
    padding:6px 10px;
    border-radius:4px;
    text-decoration:none;
}
a.btn:hover{
    background:#27ae60;
}
</style>
</head>
<body>


<div class="container">
<h3>Jadwal Kuliah Semester Genap 2025/2026</h3>


<table>
<tr>
    <th>Hari</th>
    <th>Waktu</th>
    <th>Mata Kuliah</th>
    <th>SKS</th>
    <th>Ruang</th>
    <th>Dosen</th>
    <th>Aksi</th>
</tr>


<?php
$q = $conn->query("SELECT * FROM view_jadwal");
while($r = $q->fetch_assoc()){
?>
<tr>
    <td><?= $r['hari'] ?></td>
    <td><?= $r['waktu'] ?></td>
    <td><?= $r['nma_mk'] ?></td>
    <td><?= $r['sks'] ?></td>
    <td><?= $r['nama_ruang'] ?></td>
    <td><?= $r['nama'] ?></td>
    <td>
        <a class="btn" href="registrasi.php?ambil=<?= $r['id_jadwal'] ?>">Ambil</a>
    </td>
</tr>
<?php } ?>
</table>
</div>


</body>
</html>
