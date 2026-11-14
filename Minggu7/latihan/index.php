<?php
    session_start();
    if($_SESSION['login'] !== true){
        header("Location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main - Latihan | SESSION</title>
</head>
<body>
    <h1>Hallo <?= $_SESSION['nama']; ?> 👋 </h1>
    <b>Selamat datang di website GACOR PISAN</b>
</body>
</html>