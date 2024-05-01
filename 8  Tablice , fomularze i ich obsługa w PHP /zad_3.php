<?php
$input = trim(readline());


$numbers = explode(" ", $input);


$sum = 0;


foreach ($numbers as $number) {

    $integerNumber = intval($number);

    $sum += $integerNumber;
}


echo $sum
?>