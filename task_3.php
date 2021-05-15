<?php
$a = 5;
$b = '05';

var_dump($a == $b);         // Почему true?
/* Ответ: при сравнении на равенство числа и строки, строка преобразуется в число (неявное преобразование) и происходит сравнение двух чисел. 5 == 5 */

var_dump((int)'012345');     // Почему 12345?
/* Приводим строку к числу (явное преобразование). */

var_dump((float)123.0 === (int)123.0); // Почему false?
/* Строгое сравнение числа с плавающей точкой (float) и числа преобразованного в целое число, происходит сравнение по значению и типу. */

var_dump((int)0 === (int)'hello, world'); // Почему true?
/* Строгое сравнение числа и попытки привести текстовую строку к числу, которая в итоге получает значение 0, по факту сравнивается 0 === 0 . */
