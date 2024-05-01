<?php

$input_string = readLine();


$formatted_string = chunk_split($input_string, 2, ':');


$formatted_string = substr($formatted_string, 0, -1);


echo $formatted_string;

