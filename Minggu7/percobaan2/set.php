<?php
    session_start();
    $set = $_GET['set'];
    $_SESSION['username'] = $set;
    // $_SESSION['username'] = 'naren';
    header("Location:index.php");
?>