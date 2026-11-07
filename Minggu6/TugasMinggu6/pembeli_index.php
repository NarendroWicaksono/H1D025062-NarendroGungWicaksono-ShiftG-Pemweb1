<?php
include("koneksi.php");
$read = mysqli_query($koneksi, "SELECT * FROM pembeli ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Pembeli</title>
</head>
<body>
    <h1>Data Pembeli</h1>
    <a href="index.php">Kembali ke Halaman Index Utama</a>
    <br><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Pembeli</th>
            <th>Nomor HP</th>
            <th>Alamat</th>
        </tr>
        <?php
        while($data = mysqli_fetch_array($read)){
            echo "<tr>";
            echo "<td>".$data['id']."</td>";
            echo "<td>".$data['nama']."</td>";
            echo "<td>".$data['nomor_hp']."</td>";
            echo "<td>".$data['alamat']."</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>