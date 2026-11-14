<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Percobaan 1 - SESSION</title>
</head>
<body>
    <h1>Hasil kiriman Session pada Halaman 1:</h1>
    <h2>Username session dihalaman 2: <?= $_SESSION['username']; ?></h2><br><br>
    <a href="halaman1.php">Ke Halaman 1</a>
</body>
</html>