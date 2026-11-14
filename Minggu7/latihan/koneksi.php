<?php
    $conn = mysqli_connect("localhost", "root", "", "pemweb_modul_6");
    if (!$conn) {
        die("Koneksi gagal: ".mysqli_connect_error());
    }
?>