<?php
include("koneksi.php");
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    mysqli_query($koneksi, "UPDATE barang SET nama='$nama', harga='$harga' WHERE id=$id");
    header("Location: barang_index.php");
}
$id = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM barang WHERE id=$id");
while($data = mysqli_fetch_array($result)){
    $nama = $data['nama'];
    $harga = $data['harga'];
}
?>
<html>
<head>
    <title>Edit Barang</title>
</head>
<body>
    <h1>Edit Data Barang</h1>
    <form method="post" action="barang_update.php">
        <table>
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga" value="<?php echo $harga; ?>"></td>
            </tr>
            <tr>
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    <br>
    <a href="barang_index.php">Batal</a>
</body>
</html>