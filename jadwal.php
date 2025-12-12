<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $conn = new mysqli('localhost', 'root', '', 'siamu');
    ?>
    <h3 align="center">Jadwal Kuliah Semester Gasal 2025/2026</h3>
    <table border='1' align='center' style='border-collapse: collapse'>
        <tr>
            <th>Hari</th>
            <th>Waktu</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Nama Ruang</th>
            <th>Nama Dosen</th>
            <th>Aksi</th>
        </tr>
        <?php
        $jadwal = $conn->query("SELECT * FROM view_jadwal");
        while($brs = $jadwal->fetch_assoc()){
            echo "<tr>";
                echo "<td>".$brs['hari']."</td>";
                echo "<td>".$brs['waktu']."</td>";
                echo "<td>".$brs['nma_mk']."</td>";
                echo "<td>".$brs['sks']."</td>";
                echo "<td>".$brs['nama_ruang']."</td>";
                echo "<td>".$brs['nama']."</td>";
                echo "<td>EDIT/HAPUS</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
