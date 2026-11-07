<?php
include "koneksi.php";
$error = "";
$judul = "";
$konten = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul  = trim($_POST['judul']);
    $konten = trim($_POST['konten']);

    if ($judul === "" || $konten === "") {
        $error = "Judul dan konten wajib diisi.";
    } elseif (mb_strlen($judul) > 100) {
        $error = "Judul maksimal 100 karakter.";
    } elseif (mb_strlen($konten) > 1000) {
        $error = "Konten maksimal 1000 karakter.";
    } elseif (count(paragraf($konten)) < 2) {
        $error = "Konten harus berisi minimal 2 paragraf (pisahkan dengan satu baris kosong).";
    } else {
        $stmt = mysqli_prepare($koneksi, "INSERT INTO posts (judul, konten) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $judul, $konten);
        mysqli_stmt_execute($stmt);
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Post</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <h1>Tambah Post</h1>
    <?php if ($error) echo "<p class='error'>" . htmlspecialchars($error) . "</p>"; ?>
    <form method="post">
        <label for="judul">Judul (maks. 100 karakter)</label>
        <input type="text" id="judul" name="judul" maxlength="100" value="<?= htmlspecialchars($judul) ?>" required>

        <label for="konten">Konten (minimal 2 paragraf, pisahkan dengan satu baris kosong)</label>
        <textarea id="konten" name="konten" rows="12" maxlength="1000" required><?= htmlspecialchars($konten) ?></textarea>

        <p></p>
        <button type="submit">Simpan</button>
        <a href="index.php">Batal</a>
    </form>
</div>
</body>
</html>
