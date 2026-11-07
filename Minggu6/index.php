<?php  
    include("koneksi.php");
    if(!isset($koneksi) || !$koneksi){
        die("database connection is not available");
    }
    // Perbaikan: ubah id_desc menjadi id DESC
    $read = mysqli_query($koneksi, "SELECT * FROM pengguna ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>belajar crud</title>
</head>
<body>
    <h1>menampilkan data dari database</h1>
    <a href="create.php"><button>tambah data</button></a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>username</th>
            <th>password</th>
            <th>operasi</th>
        </tr>
    
    <?php
    while($data_pengguna = mysqli_fetch_array($read)){
        echo "<tr>";
        echo "<td>".$data_pengguna['id']."</td>";
        echo "<td>".$data_pengguna['username']."</td>";
        echo "<td>".$data_pengguna['password']."</td>";
        echo "<td><a href='update.php?id=".$data_pengguna['id']."'>edit</a> | <a href='delete.php?id=".$data_pengguna['id']."'>delete</a></td>";
        echo "</tr>";
    }
    ?>
    </table>
</body>
</html>