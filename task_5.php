<?php

/* 5. *Используя только две переменные, поменяйте их значение местами. Например, если a = 1, b = 2, надо, чтобы получилось b = 1, a = 2. Дополнительные переменные использовать нельзя. */

$a = 1;
$b = 2;
echo "a = $a, b = $b<br><br>";

// 1 вариант.
$a = ($a + $b);
echo "a = $a, b = $b<br>";
$b = $a - $b;
echo "a = $a, b = $b<br><br>";
$a = $a - $b;
echo "a = $a, b = $b";

// 2 вариант.
$a = $a + $b & $b = $a - $b & $a = $a - $b; // $a = 2, $b = 1
