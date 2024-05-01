<?php
$input_number = readline();

$number = (float)$input_number;


$formatted_number = rtrim(sprintf('%.15F', $number), '0');

if (strpos($formatted_number, '.') !== false) {
    $formatted_number = rtrim($formatted_number, '.');
}

echo $formatted_number;

