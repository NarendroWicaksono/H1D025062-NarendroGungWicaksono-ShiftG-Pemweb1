<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Percobaan 2 - SESSION</title>
</head>
<body>
    <h2>Username Session: </h2>
    <?= $_SESSION['username'] ?? ''; ?> <br><br>
    <a href="set.php?set=naren">Set Session</a>
    <a href="destroy.php">Destroy Session</a>
</body>
</html>