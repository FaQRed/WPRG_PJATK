<?php

$ciag = readline();
$from = readline();
$to = readline();

$modded = str_replace($from,$to,$ciag);
echo $modded;
