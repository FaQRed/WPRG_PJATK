<?php


echo "Podaj zbiór A (liczby oddzielone spacjami): ";
$inputA = trim(readline());


echo "Podaj zbiór B (liczby oddzielone spacjami): ";
$inputB = trim(readline());


$setA = explode(" ", $inputA);
$setB = explode(" ", $inputB);


$isSubset = true;
foreach ($setB as $element) {
    if (!in_array($element, $setA)) {
        $isSubset = false;
        break;
    }
}


if ($isSubset) {
    echo "TAK\n";
} else {
    echo "NIE\n";
}


