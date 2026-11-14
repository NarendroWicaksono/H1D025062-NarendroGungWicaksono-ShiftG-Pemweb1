<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Index</title>
    <!-- Otomatis pindah ke logout.php dalam waktu 10 detik -->
    <meta http-equiv="refresh" content="10;url=logout.php">
</head>
<body>
    <h1>Halo, <?php echo $_SESSION['username']; ?>!</h1>
    <h3>Selamat Datang di Halaman Utama (Index)</h3>
    <p>Anda akan otomatis keluar (logout) dan kembali ke halaman login dalam waktu <strong>10 detik</strong>.</p>
    
    <br>
    <a href="logout.php"><button>Logout Sekarang</button></a>
</body>
</html>