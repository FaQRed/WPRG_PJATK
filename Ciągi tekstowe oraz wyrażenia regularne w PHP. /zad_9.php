<?php


$input_numbers = readline();


$unwanted_chars = array('\\', '/', ':', '*', '?', '"', '<', '>', '|', '+', '-', '\'');


$cleaned_sequence = str_replace($unwanted_chars, ' ', $input_numbers);

$result = trim(preg_replace('/\s+/', ' ', $cleaned_sequence));

echo $result;