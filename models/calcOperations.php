<?php

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
        return $a % $b;
    }
}

function calcOperations($arg1, $arg2, $operation, $result)
{
    switch ($operation) {
        case "+":
            $result = fold($arg1, $arg2);
            return $result;
        case "-":
            $result = deduct($arg1, $arg2);
            return $result;
        case "*":
            $result = multiply($arg1, $arg2);
            return $result;
        case "%":
            $result = divide($arg1, $arg2);
            return $result;
        default:
            //$result = "Одно из указанных значений, не соответствовало требуемому формату.";
            //return $result;
    }

    return $result;
}

//error_reporting(-1);

$arg1 = 0;
$arg2 = 0;
$result = 0;

if (isset($_GET['arg1'])) {
    $arg1 = $_GET['arg1'];
    $arg2 = $_GET['arg2'];
    $result = $arg1 + $arg2;
}
