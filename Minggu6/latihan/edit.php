<?php
include "koneksi.php";
$id = (int) ($_GET['id'] ?? $_POST['id'] ?? 0);

$stmt = mysqli_prepare($koneksi, "SELECT * FROM posts WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$post = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
if (!$post) {
    die("Post tidak ditemukan. <a href='index.php'>Kembali</a>");
}

$error = "";
$judul = $post['judul'];
$konten = $post['konten'];

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
        $stmt = mysqli_prepare($koneksi, "UPDATE posts SET judul = ?, konten = ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "ssi", $judul, $konten, $id);
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
    <title>Edit Post</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <h1>Edit Post</h1>
    <?php if ($error) echo "<p class='error'>" . htmlspecialchars($error) . "</p>"; ?>
    <form method="post">
        <input type="hidden" name="id" value="<?= $id ?>">

        <label for="judul">Judul (maks. 100 karakter)</label>
        <input type="text" id="judul" name="judul" maxlength="100" value="<?= htmlspecialchars($judul) ?>" required>

        <label for="konten">Konten (minimal 2 paragraf, pisahkan dengan satu baris kosong)</label>
        <textarea id="konten" name="konten" rows="12" maxlength="1000" required><?= htmlspecialchars($konten) ?></textarea>

        <p></p>
        <button type="submit">Update</button>
        <a href="index.php">Batal</a>
    </form>
</div>
</body>
</html>
