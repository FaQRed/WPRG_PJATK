<?php
$input = readline();
$parts = explode('.', $input);

foreach ($parts as &$part) {
    $part = ltrim($part, '0');
    if ($part === '') {
        $part = '0';
    }
}

$result = implode('.', $parts);

echo $result;