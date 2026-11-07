<?php
include("koneksi.php");
$read = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Barang</title>
</head>
<body>
    <h1>Data Barang</h1>
    <a href="barang_create.php"><button>Tambah Barang</button></a>
    <br><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php
        while($data = mysqli_fetch_array($read)){
            echo "<tr>";
            echo "<td>".$data['id']."</td>";
            echo "<td>".$data['nama']."</td>";
            echo "<td>".$data['harga']."</td>";
            echo "<td><a href='barang_update.php?id=".$data['id']."'>Edit</a> | <a href='barang_delete.php?id=".$data['id']."'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <a href="index.php">Kembali ke Halaman Index Utama</a>
</body>
</html>