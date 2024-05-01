<?php


$input_numbers = readline();


$cleaned_numbers = preg_replace('/[\\\/:*?"<>|+\-.]/', ' ', $input_numbers);


$cleaned_numbers = preg_replace('/\s+/', ' ', $cleaned_numbers);
$cleaned_numbers = trim($cleaned_numbers);
echo $cleaned_numbers;