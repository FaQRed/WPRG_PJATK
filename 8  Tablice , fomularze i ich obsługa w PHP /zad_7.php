<?php



$input = trim(fgets(STDIN));


$octalNumbers = explode(" ", $input);


$hexNumbers = array_map(function ($octal) {
    $decimal = octdec($octal);
    $hexadecimal = dechex($decimal);
    return "0x" . $hexadecimal;
}, $octalNumbers);


echo implode(" ", $hexNumbers) . "\n";

