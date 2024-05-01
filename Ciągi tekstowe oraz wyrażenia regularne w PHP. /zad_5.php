<?php

$ciag1 = readline();
$ciag2 = readline();



$chars1 = str_split($ciag1);
$chars2 = str_split($ciag2);


$length = min(count($chars1), count($chars2));
$difference_position = -1;

for ($i = 0; $i < $length; $i++) {
    if ($chars1[$i] !== $chars2[$i]) {
        $difference_position = $i;
        break;
    }
}


if ($difference_position === -1) {
    echo "The strings are equal";
} else {
    echo  $difference_position;
}