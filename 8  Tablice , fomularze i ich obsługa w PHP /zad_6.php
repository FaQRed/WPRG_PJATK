<?php


$input = trim(readline());


$array = explode(" ", $input);



$n = intval(trim(readline()));


if ($n >= 0 && $n <= count($array)) {

    array_splice($array, $n, 0, '$');


    echo implode(" ", $array) . "\n";
} else {

    echo "BŁĄD\n";
}
?>
