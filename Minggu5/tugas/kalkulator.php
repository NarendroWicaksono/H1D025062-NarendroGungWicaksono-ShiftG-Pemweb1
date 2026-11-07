<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator sederhana</title>
</head>
<body>
    <h2>Kalkulator Sederhana</h2>

    <form method="post" action="">
        <label>Angka pertama:</label><br>
        <input type="number" name="angka1" step="any" required value="<?php echo isset($_POST['angka1']) ? htmlspecialchars($_POST['angka1']) : ''; ?>"><br><br>

        <label>Operator:</label><br>
        <select name="operator" required>
            <option value="penjumlahan" <?php echo (isset($_POST['operator']) && $_POST['operator'] == 'penjumlahan') ? 'selected' : ''; ?>>+ (Penjumlahan)</option>
            <option value="pengurangan" <?php echo (isset($_POST['operator']) && $_POST['operator'] == 'pengurangan') ? 'selected' : ''; ?>>- (Pengurangan)</option>
            <option value="perkalian" <?php echo (isset($_POST['operator']) && $_POST['operator'] == 'perkalian') ? 'selected' : ''; ?>>x (Perkalian)</option>
            <option value="pembagian" <?php echo (isset($_POST['operator']) && $_POST['operator'] == 'pembagian') ? 'selected' : ''; ?>>/ (Pembagian)</option>
        </select><br><br>

        <label>Angka Kedua:</label><br>
        <input type="number" name="angka2" step="any" required value="<?php echo isset($_POST['angka2']) ? htmlspecialchars($_POST['angka2']) : ''; ?>"><br><br>

        <button type="submit" name="hitung">Hitung</button>
    </form>

    <?php
    if (isset($_POST['hitung'])) {
        $angka1   = (float) $_POST['angka1'];
        $angka2   = (float) $_POST['angka2'];
        $operator = $_POST['operator'];
        $hasil    = 0;
        $simbol   = '';
        $error    = false;

        switch ($operator) {
            case 'penjumlahan':
                $hasil  = $angka1 + $angka2;
                $simbol = '+';
                break;
            case 'pengurangan':
                $hasil  = $angka1 - $angka2;
                $simbol = '-';
                break;
            case 'perkalian':
                $hasil  = $angka1 * $angka2;
                $simbol = 'x';
                break;
            case 'pembagian':
                if ($angka2 == 0) {
                    $error = true;
                } else {
                    $hasil  = $angka1 / $angka2;
                    $simbol = '/';
                }
                break;
        }

        echo "<hr>";
        echo "<h3>Hasil Perhitungan</h3>";

        if ($error) {
            echo "<p>Error: Tidak bisa membagi dengan angka 0!</p>";
        } else {
            echo "<p>$angka1 $simbol $angka2 = $hasil</p>";
        }
    }
    ?>
</body>
</html>
