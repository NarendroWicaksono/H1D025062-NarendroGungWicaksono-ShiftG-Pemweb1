<?php
include("koneksi.php");
if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    mysqli_query($koneksi, "INSERT INTO barang(nama, harga) VALUES('$nama', '$harga')");
    header("Location: barang_index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
</head>
<body>
    <h1>Tambah Data Barang</h1>
    <form action="barang_create.php" method="POST">
        <table>
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
    <br>
    <a href="barang_index.php">Batal</a>
</body>
</html>