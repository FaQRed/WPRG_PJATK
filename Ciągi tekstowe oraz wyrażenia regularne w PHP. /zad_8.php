<?php

$input_string = readline();
$word_to_remove = readline();


$pattern = '/\b' . preg_quote($word_to_remove, '/') . '\b/i';
$output_string = preg_replace($pattern, '', $input_string);

$output_string = trim(preg_replace('/\s+/', ' ', $output_string));

echo $output_string;