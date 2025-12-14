<?php
session_start();
if(!isset($_SESSION['nim'])){
    header("location:login.php");
}
$conn = new mysqli("localhost","root","","siamu");

$nim = $_SESSION['nim'];
$reg = $conn->query("SELECT * FROM registrasi WHERE nim='$nim'")->fetch_assoc();
$no_reg = $reg['no_reg'];

if(isset($_GET['hapus'])){
    $conn->query("DELETE FROM krs WHERE id_krs='$_GET[hapus]'");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>KRS Saya</title>
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
    background:#2980b9;
    color:white;
    padding:8px;
}
td{
    text-align:center;
    padding:8px;
    border-bottom:1px solid #ddd;
}
a.btn{
    background:#e74c3c;
    color:white;
    padding:5px 10px;
    border-radius:5px;
    text-decoration:none;}
a.back{
    display:inline-block;
    margin-top:15px;
    }
</style>
</head>
<body>
    <div class="container">
        <h3>Mata Kuliah Yang Diambil</h3>
        <table>
            <tr>
                <th>Hari</th><th>Waktu</th><th>Mata Kuliah</th>
                <th>SKS</th><th>Ruang</th><th>Dosen</th><th>Aksi</th>
            </tr>
            
            <?php
            $q = $conn->query("
                SELECT k.id_krs,j.hari,j.waktu,mk.nma_mk,mk.sks,r.nama_ruang,d.nama
                FROM krs k
                JOIN jadwal j ON k.id_jadwal=j.id_jadwal
                JOIN mata_kuliah mk ON j.kode_mk=mk.kode_mk
                JOIN ruang r ON j.kode_ruang=r.kode_ruang
                JOIN dosen d ON j.nik=d.nik
                WHERE k.no_reg='$no_reg'
                ");
                
                while($r=$q->fetch_assoc()){
            ?>
            <tr>
                <td><?= $r['hari'] ?></td>
                <td><?= $r['waktu'] ?></td>
                <td><?= $r['nma_mk'] ?></td>
                <td><?= $r['sks'] ?></td>
                <td><?= $r['nama_ruang'] ?></td>
                <td><?= $r['nama'] ?></td>
                <td><a class="btn" href="?hapus=<?= $r['id_krs'] ?>">Hapus</a></td>
            </tr>
            
            <?php } ?>
        </table>
        <a class="back" href="registrasi.php">⬅ Kembali</a>
    </div>
</body>
</html>
