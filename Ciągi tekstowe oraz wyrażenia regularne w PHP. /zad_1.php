<?php

$argc = readline();




echo "Ciąg dużymi literami: " . strtoupper($argc) . "\n";
echo "Ciąg małymi literami: " . strtolower($argc) . "\n";
echo "Pierwsza litera dużą literą: " . ucfirst($argc) . "\n";
echo "Pierwsze litery każdego słowa dużą literą: " . ucwords(strtolower($argc)) . "\n";


?>