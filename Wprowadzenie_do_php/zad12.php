<?php

$n = readline();
while (!ctype_digit($n)) {
    echo "BŁĄD! \n";
    $n = readline();
}

for ($i = 1; $i <= $n; $i++) {
    echo str_repeat('*', $i) . "\n";
}
for ($i = $n - 1; $i >= 1; $i--) {
    echo str_repeat(' ', $n - $i) . str_repeat('*', $i) . "\n";
}






