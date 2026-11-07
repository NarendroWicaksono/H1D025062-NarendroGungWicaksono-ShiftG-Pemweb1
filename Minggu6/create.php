<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    include("koneksi.php");

    $result = mysqli_query($koneksi, "INSERT INTO pengguna(username,password) VALUES('$username', '$password')");

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create/add</title>
</head>
<body>
    <h1>memasukan data pada database</h1>
    <form action="create.php" method="POST">
        <table>
            <tr>
                <td>username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</body>     
</html>