<?php
    session_start();
    $_SESSION['username'] = "naren";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Percobaan 1 - SESSION</title>
</head>
<body>
    <h1>Kirim Data Session ke Halaman 2</h1>
    <h2>Username session di Halaman 1: <?= $_SESSION['username']; ?> </h2> <br><br>
    <a href="halaman2.php">Ke Halaman 2</a>
</body>
</html>