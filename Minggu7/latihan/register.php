<?php
    require_once 'koneksi.php';

    if(isset($_POST['register'])){
        $username = $_POST['nama'];
        $password = $_POST['password'];
        $konfirm_password = $_POST['konfirm_password'];
        $konfirm = "";
        global $conn;
        if($password !== $konfirm_password){
            $konfirm = "Password belum sesuai!!!";
        }elseif($username != '' || $password!=''){
            $stmt = $conn->prepare("INSERT INTO pengguna(username, password) VALUES (?,?)");
            $stmt->bind_param("ss", $username, $konfirm_password);
            $stmt->execute();
            $konfirm = "Berhasil Registrasi, Silahkan Login";
        }elseif($username == '' || $password ==''){
            $konfirm="Masih ada data yang kosong!!!";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Latihan | SESSION</title>
</head>
<body>
    <h2>Registrasi Akun</h2>
    <p> <?= $konfirm ?? "";?> </p>

    <form method="post">
        <div>
            <label for="nama">Nama: </label> <br>
            <input type="text" name="nama">
        </div>
        <div>
            <label for="nama">Password: </label> <br>
            <input type="password" name="password">
        </div>
        <div>
            <label for="nama">Konfirmasi Password: </label> <br>
            <input type="password" name="konfirm_password">
        </div><br>
        <input type="submit" name="register" value="Register">
        <p>Udah punya akun?<span><a href="login.php">Login</a></span> </p>
    </form>

</body>
</html>