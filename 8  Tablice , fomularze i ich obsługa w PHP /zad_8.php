<?php




$input1 = trim(readline());

$input2 = trim(readline());


$array1 = explode(" ", $input1);


$array2 = explode(" ", $input2);


$set1 = array_unique($array1);
$set2 = array_unique($array2);


$result = array_unique(array_merge($set1, $set2));
echo implode(" ", $result) . "\n";


