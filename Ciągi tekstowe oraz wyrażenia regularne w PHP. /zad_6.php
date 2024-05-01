<?php

$text_string = readline();
$words = explode(" ", readline());
$word_k = readline();

$pos_p1 = strpos($text_string, $words[0]);
$pos_p2 = strpos($text_string, $words[1]);


    $insert_position = ($pos_p1 < $pos_p2) ? $pos_p1 + strlen($words[0]) : $pos_p2 + strlen($words[1]);
    echo substr_replace($text_string, " $word_k", $insert_position, 0);