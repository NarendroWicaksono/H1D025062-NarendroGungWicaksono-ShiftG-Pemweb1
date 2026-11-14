<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Percobaan 3 - SESSION</title>
</head>
<body>
    <h2>Hallo <?= $_SESSION['nama']; ?>.</h2>
    <h3>Selamat Datang Di Situs Kami</h3>

    <p>Umur : <?=$_SESSION['umur'];?> tahun </p>
    <p>Email : <?=$_SESSION['email'];?> </p>
</body>
</html>