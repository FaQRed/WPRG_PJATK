<?php



$input = trim(readline());


$numbers = explode(" ", $input);



$searchNumber = intval(trim(readline()));


if (in_array($searchNumber, $numbers)) {
    echo "Liczba znajduje się w liście\n";
} else {
    echo "Liczba nie znajduje się w liście\n";
}

