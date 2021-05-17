<?php

/* 1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:

если $a и $b положительные, вывести их разность;
если $а и $b отрицательные, вывести их произведение;
если $а и $b разных знаков, вывести их сумму;

Ноль можно считать положительным числом. */

// 1 вариант.

echo "1 задание:<br>";
$a = 3;
$b = 2;

if ($a >= 0 && $b >= 0) {
    echo ($a - $b);
    echo "<br><br>";
} elseif ($a < 0 && $b < 0) {
    echo ($a * $b);
    echo "<br><br>";
} else {
    echo ($a + $b);
    echo "<br><br>";
}

// 2 вариант.

echo "1 задание (другая реализация):<br>";
function performOperation($a, $b)
{
    if ($a >= 0 && $b >= 0) {
        return ($a - $b);
    } elseif ($a < 0 && $b < 0) {
        return ($a * $b);
    }
    return ($a + $b);
}

echo (performOperation(5, 2));

/* 2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15. При желании сделайте это задание через рекурсию. */

// 1 вариант.

echo "<br><br><br>2 задание:<br>";
$a = rand(0, 16); // Умышленно проставлено максимальное число "16" (а не 15), чтобы продемонстрировать работу кейса "default".
echo "$a<br>";

switch ($a) {
    case 0:
        echo "0\n";
    case 1:
        echo "1\n";
    case 2:
        echo "2\n";
    case 3:
        echo "3\n";
    case 4:
        echo "4\n";
    case 5:
        echo "5\n";
    case 6:
        echo "6\n";
    case 7:
        echo "7\n";
    case 8:
        echo "8\n";
    case 9:
        echo "9\n";
    case 10:
        echo "10\n";
    case 11:
        echo "11\n";
    case 12:
        echo "12\n";
    case 13:
        echo "13\n";
    case 14:
        echo "14\n";
    case 15:
        echo "15<br><br>";
        break;
    default:
        echo "Ошибка: число больше 15 или меньше нуля! Допустимый диапазон чисел - от 0 до 15.<br><br>";
}

// 1а вариант.

echo "2 задание (другая форма вывода):<br>";
$a = rand(0, 16); // Умышленно проставлено максимальное число "16" (а не 15), чтобы продемонстрировать работу кейса "default".
echo "$a<br>";

switch ($a) {
    case 0:
        echo $a++;
    case 1:
        echo $a++;
    case 2:
        echo $a++;
    case 3:
        echo $a++;
    case 4:
        echo $a++;
    case 5:
        echo $a++;
    case 6:
        echo $a++;
    case 7:
        echo $a++;
    case 8:
        echo $a++;
    case 9:
        echo $a++;
    case 10:
        echo $a++;
    case 11:
        echo $a++;
    case 12:
        echo $a++;
    case 13:
        echo $a++;
    case 14:
        echo $a++;
    case 15:
        echo "15<br><br>";
        break;
    default:
        echo "Ошибка: число больше 15 или меньше нуля! Допустимый диапазон чисел - от 0 до 15.<br><br>";
}

// 2 вариант (через рекурсию).

echo "2 задание (через рекурсию):<br>";
function printNumbers($a)
{
    if ($a <= 15) {
        echo "{$a}\n";
        $a++;
        printNumbers($a);
    }
}

$a = rand(0, 15);
echo "$a<br>";

printNumbers($a);


/* 3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return. В делении проверьте деление на 0 и верните текст ошибки. */

echo "<br><br><br>3 задание:<br>";
function fold($a, $b)
{
    return $a + $b;
}

function deduct($a, $b)
{
    return $a - $b;
}

function multiply($a, $b)
{
    return $a * $b;
}

function divide($a, $b)
{
    if ($b == 0) {
        return "На ноль делить нельзя!";
    } else {
        return $a / $b;
    }
}

echo fold(6, 2);
echo "\n(Сложение)<br>";

echo deduct(6, 2);
echo "\n(Вычитание)<br>";

echo multiply(6, 2);
echo "\n(Умножение)<br>";

echo divide(6, 2);
echo "\n(Деление)";


/* 4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch). */

echo "<br><br><br>4 задание:<br>";
function calculate($arg1, $arg2, $operation)
{
    switch ($operation) {
        case "+":
            echo "Сумма чисел ($arg1 и $arg2):\n";
            return fold($arg1, $arg2);
        case "-":
            echo "Разность чисел ($arg1 и $arg2):\n";
            return deduct($arg1, $arg2);
        case "*":
            echo "Произведение чисел ($arg1 и $arg2):\n";
            return multiply($arg1, $arg2);
        case "/":
            echo "Частное чисел ($arg1 и $arg2):\n";
            return divide($arg1, $arg2);
        default:
            return "Одно из указанных значений, не соответствовало требуемому формату.";
    }
}

echo (calculate(4, 3, "+"));


/* 6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень. */

echo "<br><br><br>6 задание:<br>";
function raiseToDegree($val, $pow)
{
    if ($pow == 1) {
        return $val;
    } elseif ($pow < 0) {
        return raiseToDegree(1 / $val, -$pow); // Возведение числа в отрицательную степень.
    } else {
        return $val * raiseToDegree($val, $pow - 1);
    }
}

echo raiseToDegree(5, 0);


/* 7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:

22 часа 15 минут
21 час 43 минуты */

echo "<br><br><br>7 задание:<br>";

// 1 способ.

/* 
0, 5 - 20 (часов)
2 - 4, 22 - 24 (часа)
1, 21 (час)

0, 5 - 20, 25 - 30, 35 - 40, 45 - 50, 55 - 59 (минут)
1, 21, 31, 41, 51 (минута)
2 - 4, 22 - 24, 32 - 34, 42 - 44, 52 - 54 (минуты)
 */

function showDate($hours, $minutes)
{
    if (($hours == 0 || $hours >= 5 && $hours <= 20) && ($minutes == 0 || $minutes >= 5 && $minutes <= 20 || $minutes >= 25 && $minutes <= 30 || $minutes >= 35 && $minutes <= 40 || $minutes >= 45 && $minutes <= 50 || $minutes >= 55 && $minutes <= 59)) {
        echo "$hours часов $minutes минут";
    } elseif (($hours == 0 || $hours >= 5 && $hours <= 20) && ($minutes == 1 || $minutes == 21 || $minutes == 31 || $minutes == 41 || $minutes == 51)) {
        echo "$hours часов $minutes минута";
    } elseif (($hours == 0 || $hours >= 5 && $hours <= 20) && ($minutes >= 2 && $minutes <= 4 || $minutes >= 22 && $minutes <= 24 || $minutes >= 32 && $minutes <= 34 || $minutes >= 42 && $minutes <= 44 || $minutes >= 52 && $minutes <= 54)) {
        echo "$hours часов $minutes минуты";
    } elseif (($hours == 1 || $hours == 21) && ($minutes == 1 || $minutes == 21 || $minutes == 31 || $minutes == 41 || $minutes == 51)) {
        echo "$hours час $minutes минута";
    } elseif (($hours == 1 || $hours == 21) && ($minutes == 0 || $minutes >= 5 && $minutes <= 20 || $minutes >= 25 && $minutes <= 30 || $minutes >= 35 && $minutes <= 40 || $minutes >= 45 && $minutes <= 50 || $minutes >= 55 && $minutes <= 59)) {
        echo "$hours час $minutes минут";
    } elseif (($hours == 1 || $hours == 21) && ($minutes >= 2 && $minutes <= 4 || $minutes >= 22 && $minutes <= 24 || $minutes >= 32 && $minutes <= 34 || $minutes >= 42 && $minutes <= 44 || $minutes >= 52 && $minutes <= 54)) {
        echo "$hours час $minutes минуты";
    } elseif (($hours >= 2 && $hours <= 4 || $hours >= 22 && $hours <= 24) && ($minutes >= 2 && $minutes <= 4 || $minutes >= 22 && $minutes <= 24 || $minutes >= 32 && $minutes <= 34 || $minutes >= 42 && $minutes <= 44 || $minutes >= 52 && $minutes <= 54)) {
        echo "$hours часа $minutes минуты";
    } elseif (($hours >= 2 && $hours <= 4 || $hours >= 22 && $hours <= 24) && ($minutes == 0 || $minutes >= 5 && $minutes <= 20 || $minutes >= 25 && $minutes <= 30 || $minutes >= 35 && $minutes <= 40 || $minutes >= 45 && $minutes <= 50 || $minutes >= 55 && $minutes <= 59)) {
        echo "$hours часа $minutes минут";
    } elseif (($hours >= 2 && $hours <= 4 || $hours >= 22 && $hours <= 24) && ($minutes == 1 || $minutes == 21 || $minutes == 31 || $minutes == 41 || $minutes == 51)) {
        echo "$hours часа $minutes минута";
    }
}

$hours = rand(0, 24);
$minutes = rand(0, 59);
echo showDate($hours, $minutes);

// 2 способ.

echo "<br><br><br>7 задание (другая реализация):<br>";

function showTime($hours, $minutes)
{
    if ($hours % 100 == 0 || ($hours % 100 >= 5 && $hours % 100 <= 20)) {
        $res = $hours . ' часов ';
    } elseif ($hours % 10 == 1) {
        $res = $hours . ' час ';
    } else {
        $res = $hours . ' часа ';
    }

    if ($minutes % 10 == 0 || ($minutes % 10 >= 5 && $minutes % 10 <= 9) || ($minutes % 100 >= 11 && $minutes % 100 <= 14)) {
        $res .= $minutes . ' минут';
    } elseif ($minutes % 10 == 1) {
        $res .= $minutes . ' минута';
    } else {
        $res .= $minutes . ' минуты';
    }
    return $res;
}

echo (showTime(date('G'), date('i')));
