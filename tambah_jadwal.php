<?php
$conn = new mysqli("localhost","root","","siamu");
?>
<!DOCTYPE html>
<html>
<head>
<title>Tambah Jadwal</title>
<style>
body{
    font-family:Arial;
    background:#ecf0f1;
}
.box{
    width:500px;
    margin:50px auto;
    background:white;
    padding:20px;
    border-radius:8px;
}
select,button{
    width:100%;
    padding:8px;
    margin:5px 0;
}
button{
    background:#27ae60;
    color:white;
    border:none;
}
</style>
</head>
<body>
    <div class="box">
        <h3>Form Tambah Jadwal Kuliah</h3>
        <form action="insert_jadwal.php" method="post">
            
    <select name="hari" required>
        <option value="">-- Pilih Hari --</option>
        <option>Senin</option>
        <option>Selasa</option>
        <option>Rabu</option>
        <option>Kamis</option>
        <option>Jumat</option>
    </select>
        
    <select name="waktu" required>
        <option value="">-- Pilih Waktu --</option>
        <option>07:30-10:20</option>
        <option>10:30-13:20</option>
        <option>13:20-16:30</option>
        <option>16:30-19:20</option>
    </select>
        
    <select name="kode_mk" required>
        <option value="">-- Mata Kuliah --</option>
            
    <?php
        $mk=$conn->query("SELECT * FROM mata_kuliah");
        while($m=$mk->fetch_assoc()){
        echo "<option value='$m[kode_mk]'>$m[nma_mk]</option>";
        }
    ?>
        
    </select>
    <select name="kode_ruang" required>
        <option value="">-- Ruang --</option>
    
    <?php
        $r=$conn->query("SELECT * FROM ruang");
        while($d=$r->fetch_assoc()){
        echo "<option value='$d[kode_ruang]'>$d[nama_ruang]</option>";
        }
    ?>
    </select>
    <select name="nik" required>
    <option value="">-- Dosen --</option>
    
    <?php
        $d=$conn->query("SELECT * FROM dosen");
        while($x=$d->fetch_assoc()){
        echo "<option value='$x[nik]'>$x[nama]</option>";
        }?>
    </select>
    <button type="submit">Simpan Jadwal</button>
</form>
</div>
</body>
</html>
