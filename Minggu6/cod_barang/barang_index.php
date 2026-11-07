<?php
include("koneksi.php");

// DELETE
if(isset($_GET['hapus'])){
    $id = (int) $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM barang WHERE id=$id");
    header("Location: barang_index.php");
    exit;
}

// CREATE
if(isset($_POST['submit'])){
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $harga = (int) $_POST['harga'];
    mysqli_query($koneksi, "INSERT INTO barang(nama, harga) VALUES('$nama', $harga)");
    header("Location: barang_index.php");
    exit;
}

// UPDATE
if(isset($_POST['update'])){
    $id = (int) $_POST['id'];
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $harga = (int) $_POST['harga'];
    mysqli_query($koneksi, "UPDATE barang SET nama='$nama', harga=$harga WHERE id=$id");
    header("Location: barang_index.php");
    exit;
}

// Mode edit: isi form dengan data yang dipilih
$edit = null;
if(isset($_GET['edit'])){
    $id = (int) $_GET['edit'];
    $result = mysqli_query($koneksi, "SELECT * FROM barang WHERE id=$id");
    $edit = mysqli_fetch_array($result);
}

// READ
$read = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id ASC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Barang</title>
</head>
<body>
    <h1><?php echo $edit ? "Edit Data Barang" : "Tambah Data Barang"; ?></h1>
    <form action="barang_index.php" method="POST">
        <?php if($edit){ ?>
            <input type="hidden" name="id" value="<?php echo $edit['id']; ?>">
        <?php } ?>
        <table>
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nama" value="<?php echo $edit ? htmlspecialchars($edit['nama']) : ''; ?>" required></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" name="harga" value="<?php echo $edit ? $edit['harga'] : ''; ?>" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php if($edit){ ?>
                        <input type="submit" name="update" value="Update">
                    <?php } else { ?>
                        <input type="submit" name="submit" value="Tambah">
                    <?php } ?>
                </td>
            </tr>
        </table>
    </form>
    <?php if($edit){ ?>
        <br>
        <a href="barang_index.php">Batal</a>
    <?php } ?>

    <h1>Data Barang</h1>
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
            echo "<td>".htmlspecialchars($data['nama'])."</td>";
            echo "<td>".$data['harga']."</td>";
            echo "<td><a href='barang_index.php?edit=".$data['id']."'>Edit</a> | <a href='barang_index.php?hapus=".$data['id']."' onclick=\"return confirm('Yakin hapus data ini?')\">Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <a href="index.php">Kembali ke Halaman Index Utama</a>
</body>
</html>
