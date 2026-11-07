<?php
// Array multidimensi: setiap elemen punya nama, asal, dan umur
$orang = [
    ["nama" => "Romi",  "asal" => "Bogor",  "umur" => 22],
    ["nama" => "Anto",  "asal" => "Depok",  "umur" => 23],
    ["nama" => "Putri", "asal" => "Bangka", "umur" => 21],
];

// Tampilkan data dengan looping
foreach ($orang as $o) {
    echo $o["nama"] . "<br>";
    echo "Asal : " . $o["asal"] . "<br>";
    echo "Umur : " . $o["umur"] . "<br><br>";
}
?>
