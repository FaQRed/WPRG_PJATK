<?php

$input = explode(" ", readline());
$num1 = (float)$input[0];
$num2 = (float)$input[1];
$num3 = (float)$input[2];


echo "Liczby w kolejności ---> ";
if ($num1 <= $num2 && $num1 <= $num3) {
    echo number_format($num1, 6) . " ";
    if ($num2 <= $num3) {
        echo number_format($num2, 6) . " " . number_format($num3, 6) . "\n";
    } else {
        echo number_format($num3, 6) . " " . number_format($num2, 6) . "\n";
    }
} elseif ($num2 <= $num1 && $num2 <= $num3) {
    echo number_format($num2, 6) . " ";
    if ($num1 <= $num3) {
        echo number_format($num1, 6) . " " . number_format($num3, 6) . "\n";
    } else {
        echo number_format($num3, 6) . " " . number_format($num1, 6) . "\n";
    }
} else {
    echo number_format($num3, 6) . " ";
    if ($num1 <= $num2) {
        echo number_format($num1, 6) . " " . number_format($num2, 6) . "\n";
    } else {
        echo number_format($num2, 6) . " " . number_format($num1, 6) . "\n";
    }
}


echo "Liczby w kolejności <---: ";
if ($num1 >= $num2 && $num1 >= $num3) {
    echo number_format($num1, 6) . " ";
    if ($num2 >= $num3) {
        echo number_format($num2, 6) . " " . number_format($num3, 6) . "\n";
    } else {
        echo number_format($num3, 6) . " " . number_format($num2, 6) . "\n";
    }
} elseif ($num2 >= $num1 && $num2 >= $num3) {
    echo number_format($num2, 6) . " ";
    if ($num1 >= $num3) {
        echo number_format($num1, 6) . " " . number_format($num3, 6) . "\n";
    } else {
        echo number_format($num3, 6) . " " . number_format($num1, 6) . "\n";
    }
} else {
    echo number_format($num3, 6) . " ";
    if ($num1 >= $num2) {
        echo number_format($num1, 6) . " " . number_format($num2, 6) . "\n";
    } else {
        echo number_format($num2, 6) . " " . number_format($num1, 6) . "\n";
    }
}

