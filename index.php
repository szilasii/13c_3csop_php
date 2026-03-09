<?php 

//Össezgzés
$szamok = [5, 8, 3, 10, 2];

$osszeg = 0;

foreach ($szamok as $szam) {
    $osszeg += $szam;
}

echo " <br>Az összeg: " . $osszeg . "<br>";

//Minimum-maximum
$szamok = [5, 8, 3, 10, 2];

$min = $szamok[0];
$max = $szamok[0];

foreach ($szamok as $szam) {
    if ($szam < $min) {
        $min = $szam;
    }

    if ($szam > $max) {
        $max = $szam;
    }
}

echo "Minimum: $min <br>";
echo "Maximum: $max <br>";

//Lineáris keresés
$szamok = [5, 8, 3, 10, 2];
$keresett = 3;

$talalt = false;

foreach ($szamok as $szam) {
    if ($szam == $keresett) {
        $talalt = true;
        break;
    }
}

if ($talalt) {
    echo "A szám megtalálható.";
} else {
    echo "A szám nincs a tömbben.";
}
?>