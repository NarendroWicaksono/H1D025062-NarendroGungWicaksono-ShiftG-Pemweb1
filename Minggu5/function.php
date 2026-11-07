<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Percobaan 4 - function</title>
</head>
<body>
    <?php
    function text(){
        echo "hello world! <br><br>";
    }
    text();

    function olahraga($sport){
        echo "saya bermain $sport <br>";
    }
    olahraga("sepak bola");
    olahraga("basket");
    olahraga("voli");
    olahraga("badminton");
    olahraga("golf");

    function penjumlahan(int $a, int $b){
        return $a + $b;
    }
    echo penjumlahan(5,2)."<br>";

    function tambah_dua(&$value) {
        $value += 2;
    }
    $num = 4;
    tambah_dua($num);
    echo $num."<br><br>";

    function lahir($BulanKelahiran){
        switch($BulanKelahiran){
            case "januari":
                echo "anda lahir di bulan januari";
                break;
            case "februari":
                echo "anda lahir di bulan februari";
                break;
            case "maret":
                echo "anda lahir di bulan maret";
                break;
            default:
                echo "anda lahir bukan di bulan januari, februari, atau maret";
        }
    }
    $bulan="november";
    lahir($bulan);
    ?>
</body>
</html>