<?php
    $year = $_POST["year"];


    if ($year >= 1 && $year <= 1582) {
        $x = 15;
        $y = 6;
    } elseif ($year >= 1583 && $year <= 1699) {
        $x = 22;
        $y = 2;
    } elseif ($year >= 1700 && $year <= 1799) {
        $x = 23;
        $y = 3;
    } elseif ($year >= 1800 && $year <= 1899) {
        $x = 23;
        $y = 4;
    } elseif ($year >= 1900 && $year <= 2099) {
        $x = 24;
        $y = 5;
    } elseif ($year >= 2100 && $year <= 2199) {
        $x = 24;
        $y = 6;
    } else {
        echo "Nieprawidłowy rok";
        exit;
    }

    $a = $year % 19;
    $b = $year % 4;
    $c = $year % 7;
    $d = (19 * $a + $x) % 30;
    $e = (2 * $b + 4 * $c + 6 * $d + $y) % 7;

    if ($d == 29 && $e == 6) {
        $easterDate = "26 kwietnia";
    } elseif ($d == 28 && $e == 6 && (11 * $x + 11) % 30 < 19) {
        $easterDate = "18 kwietnia";
    } elseif (($d + $e) < 10) {
        $easterDate = (22 + $d + $e) . " marca";
    } else {
        $easterDate = ($d + $e - 9) . " kwietnia";
    }

    echo "<!DOCTYPE html>
<html lang=\"pl\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Wynik</title>
    <link rel=\"stylesheet\" href=\"easter.css\">
</head>
<body>

<div class=\"container\">
    <h2>Wynik obliczeń</h2>
    <p>Data Wielkanocy dla roku $year wynosi: <strong>$easterDate</strong></p>
    <a href=\"easter_year.html\" class=\"return-btn\">Powrót do formularza</a>
</div>

</body>
</html>";
