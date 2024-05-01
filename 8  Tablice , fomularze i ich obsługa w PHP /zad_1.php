<?php

$result = [];

for ($i = 200; $i <= 250; $i++) {
    if ($i % 4 === 0) {
        $result[] = $i;
    }
}

echo implode(',', $result);
?>





