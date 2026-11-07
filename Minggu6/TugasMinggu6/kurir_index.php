<?php
include("koneksi.php");
$read = mysqli_query($koneksi, "SELECT * FROM kurir ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Kurir</title>
</head>
<body>
    <h1>Data Kurir</h1>
    <a href="index.php">Kembali ke Halaman Index Utama</a>
    <br><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Kurir</th>
            <th>Nomor HP</th>
        </tr>
        <?php
        while($data = mysqli_fetch_array($read)){
            echo "<tr>";
            echo "<td>".$data['id']."</td>";
            echo "<td>".$data['nama']."</td>";
            echo "<td>".$data['nomor_hp']."</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>