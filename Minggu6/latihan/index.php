<?php
include "koneksi.php";
$hasil = mysqli_query($koneksi, "SELECT * FROM posts ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Post News Ter-Update!</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <h1>Post News Ter-Update!</h1>
    <a href="tambah.php"><button type="button">Tambah Post</button></a>

    <?php $no = 1; while ($row = mysqli_fetch_assoc($hasil)) { ?>
        <h2><?= $no++ ?>. <?= htmlspecialchars($row['judul']) ?></h2>
        <div class="aksi">
            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus post ini?')">Delete</a>
        </div>
        <?php foreach (paragraf($row['konten']) as $p) { ?>
            <p><?= nl2br(htmlspecialchars($p)) ?></p>
        <?php } ?>
    <?php } ?>

    <?php if ($no === 1) { echo "<p>Belum ada post.</p>"; } ?>
</div>
</body>
</html>
