<?php

list($a, $b) = explode(" ", trim(readline()));

list($c, $d) = explode(" ", trim(readline()));


$array = [];

// Tworzenie tablicy na podstawie zakresów a do b dla indeksów i c do d dla wartości
for ($i = $a; $i <= $b; $i++) {
   if($c<=$d){
        $array[$i] = $c;
        $c++;
   }

}


print_r($array);


