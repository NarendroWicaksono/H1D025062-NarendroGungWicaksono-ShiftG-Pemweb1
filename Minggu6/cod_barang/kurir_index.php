<?php
include("koneksi.php");

// DELETE
if(isset($_GET['hapus'])){
    $id = (int) $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM kurir WHERE id=$id");
    header("Location: kurir_index.php");
    exit;
}

// CREATE
if(isset($_POST['submit'])){
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $nomor_hp = mysqli_real_escape_string($koneksi, $_POST['nomor_hp']);
    mysqli_query($koneksi, "INSERT INTO kurir(nama, nomor_hp) VALUES('$nama', '$nomor_hp')");
    header("Location: kurir_index.php");
    exit;
}

// UPDATE
if(isset($_POST['update'])){
    $id = (int) $_POST['id'];
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $nomor_hp = mysqli_real_escape_string($koneksi, $_POST['nomor_hp']);
    mysqli_query($koneksi, "UPDATE kurir SET nama='$nama', nomor_hp='$nomor_hp' WHERE id=$id");
    header("Location: kurir_index.php");
    exit;
}

// Mode edit: isi form dengan data yang dipilih
$edit = null;
if(isset($_GET['edit'])){
    $id = (int) $_GET['edit'];
    $result = mysqli_query($koneksi, "SELECT * FROM kurir WHERE id=$id");
    $edit = mysqli_fetch_array($result);
}

// READ
$read = mysqli_query($koneksi, "SELECT * FROM kurir ORDER BY id ASC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Kurir</title>
</head>
<body>
    <h1><?php echo $edit ? "Edit Data Kurir" : "Tambah Data Kurir"; ?></h1>
    <form action="kurir_index.php" method="POST">
        <?php if($edit){ ?>
            <input type="hidden" name="id" value="<?php echo $edit['id']; ?>">
        <?php } ?>
        <table>
            <tr>
                <td>Nama Kurir</td>
                <td><input type="text" name="nama" value="<?php echo $edit ? htmlspecialchars($edit['nama']) : ''; ?>" required></td>
            </tr>
            <tr>
                <td>Nomor HP</td>
                <td><input type="text" name="nomor_hp" value="<?php echo $edit ? htmlspecialchars($edit['nomor_hp']) : ''; ?>" required></td>
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
        <a href="kurir_index.php">Batal</a>
    <?php } ?>

    <h1>Data Kurir</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Kurir</th>
            <th>Nomor HP</th>
            <th>Aksi</th>
        </tr>
        <?php
        while($data = mysqli_fetch_array($read)){
            echo "<tr>";
            echo "<td>".$data['id']."</td>";
            echo "<td>".htmlspecialchars($data['nama'])."</td>";
            echo "<td>".htmlspecialchars($data['nomor_hp'])."</td>";
            echo "<td><a href='kurir_index.php?edit=".$data['id']."'>Edit</a> | <a href='kurir_index.php?hapus=".$data['id']."' onclick=\"return confirm('Yakin hapus data ini?')\">Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <a href="index.php">Kembali ke Halaman Index Utama</a>
</body>
</html>
