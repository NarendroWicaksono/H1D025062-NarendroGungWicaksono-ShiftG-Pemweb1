<?php
include("koneksi.php");
// Menampilkan nama barang, nama pembeli, dan nama kurir berdasarkan ID yang sama
// Semua ID dari ketiga tabel dikumpulkan dulu, lalu dicocokkan berdasarkan ID yang sama.
// Jika salah satu tabel belum punya data dengan ID tersebut, kolomnya diisi "-".
$read = mysqli_query($koneksi, "SELECT ids.id, barang.nama AS nama_barang, pembeli.nama AS nama_pembeli, kurir.nama AS nama_kurir
    FROM (SELECT id FROM barang UNION SELECT id FROM pembeli UNION SELECT id FROM kurir) AS ids
    LEFT JOIN barang ON ids.id = barang.id
    LEFT JOIN pembeli ON ids.id = pembeli.id
    LEFT JOIN kurir ON ids.id = kurir.id
    ORDER BY ids.id ASC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Index COD</title>
</head>
<body>
    <h1>Menampilkan data dari database!</h1>
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
            echo "<td>".htmlspecialchars($data['nama_barang'] ?? '-')."</td>";
            echo "<td>".htmlspecialchars($data['nama_pembeli'] ?? '-')."</td>";
            echo "<td>".htmlspecialchars($data['nama_kurir'] ?? '-')."</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>