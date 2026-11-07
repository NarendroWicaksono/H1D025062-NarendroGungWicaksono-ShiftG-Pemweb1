<?php
include("koneksi.php");
$read = mysqli_query($koneksi, "SELECT barang.id, barang.nama AS nama_barang, pembeli.nama AS nama_pembeli, kurir.nama AS nama_kurir FROM barang JOIN pembeli ON barang.id = pembeli.id JOIN kurir ON barang.id = kurir.id");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Index COD</title>
</head>
<body>
    <h1>Menampilkan data dari database!</h1>
    <br>
    <a href="barang_index.php">CRUD Barang</a> | 
    <a href="pembeli_index.php">CRUD Pembeli</a> | 
    <a href="kurir_index.php">CRUD Kurir</a>
    <br><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Nama Pembeli</th>
            <th>Nama Kurir</th>
        </tr>
        <?php
        while($data = mysqli_fetch_array($read)){
            echo "<tr>";
            echo "<td>".$data['id']."</td>";
            echo "<td>".$data['nama_barang']."</td>";
            echo "<td>".$data['nama_pembeli']."</td>";
            echo "<td>".$data['nama_kurir']."</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>