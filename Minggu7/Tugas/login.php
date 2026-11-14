<?php
session_start();

// Data user disimpan di dalam array (sesuai ketentuan tugas)
$users = [
    ['username' => 'admin', 'password' => '12345'],
    ['username' => 'user1', 'password' => 'pass123'],
    ['username' => 'mahasiswa', 'password' => 'unsoed2026']
];

$pesan = "";

if (isset($_POST['login'])) {
    $input_user = $_POST['username'];
    $input_pass = $_POST['password'];
    $login_berhasil = false;

    // Periksa apakah username dan password cocok dengan data di array
    foreach ($users as $u) {
        if ($u['username'] === $input_user && $u['password'] === $input_pass) {
            $login_berhasil = true;
            break;
        }
    }

    if ($login_berhasil) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $input_user;
        header("Location: index.php");
        exit;
    } else {
        $pesan = "Username atau Password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Array</title>
</head>
<body>
    <h2>Halaman Login (Data Array)</h2>
    <?php if (!empty($pesan)) { echo "<p style='color:red;'>$pesan</p>"; } ?>
    <form method="POST" action="">
        <table>
            <tr>
                <td>Username</td>
                <td>: <input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>: <input type="password" name="password" required></td>
            </tr>
            <tr>
                <td><button type="submit" name="login">Login!</button></td>
            </tr>
        </table>
    </form>
</body>
</html>