<?php
include("koneksi.php");
if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    $result = mysqli_query($koneksi, "UPDATE pengguna SET username='$username', password='$password' WHERE id=$id");

    header("Location: index.php");
}

$id = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $username = $user_data['username'];
    $password = $user_data['password'];
}
?>
<html>
<head>
    <title>Edit User Data</title>
</head>
<body>
    <a href="index.php">Batal</a>
    <br/><br/>
    <form method="post" action="update.php">
        <table border="0">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value=<?php echo $username; ?>></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password" value=<?php echo $password; ?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>