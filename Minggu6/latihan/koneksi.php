<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_berita";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
mysqli_set_charset($koneksi, "utf8mb4");

// Pecah konten menjadi paragraf (dipisah baris kosong)
function paragraf($teks) {
    $parts = preg_split('/(\r\n|\r|\n){2,}/', trim($teks));
    return array_values(array_filter(array_map('trim', $parts), 'strlen'));
}
