<?php

// Задание 1

//    $a = rand(-10, 10);
//    $b = rand(-10, 10);
//
//    echo "a = ", $a, ", ";
//    echo "b = ", $b, ", ";
//
//    if($a >= 0 and $b >= 0) {
//        echo "их разность = ", $a - $b;
//    } elseif($a < 0 and $b < 0) {
//        echo "их произведение = ", $a * $b;
//    } else {
//        echo "их сумма = ", $a + $b;
//    }

// Задание 2

//    $a = rand(0, 15);
//
//    switch ($a) {
//        case 0:
//            echo 0, " ";
//        case 1:
//            echo 1, " ";
//        case 2:
//            echo 2, " ";
//        case 3:
//            echo 3, " ";
//        case 4:
//            echo 4, " ";
//        case 5:
//            echo 5, " ";
//        case 6:
//            echo 6, " ";
//        case 7:
//            echo 7, " ";
//        case 8:
//            echo 8, " ";
//        case 9:
//            echo 9, " ";
//        case 10:
//            echo 10, " ";
//        case 11:
//            echo 11, " ";
//        case 12:
//            echo 12, " ";
//        case 13:
//            echo 13, " ";
//        case 14:
//            echo 14, " ";
//        case 15:
//            echo 15, " ";
//    }

// Задание 3, 4

//    function add($arg1, $arg2) {
//        return $arg1 + $arg2;
//    }
//
//    function sub($arg1, $arg2) {
//        return $arg1 - $arg2;
//    }
//
//    function mult($arg1, $arg2) {
//        return $arg1 * $arg2;
//    }
//
//    function div($arg1, $arg2) {
//        return $arg1 / $arg2;
//    }
//
//    function mathOperations($arg1, $arg2, $operation) {
//        switch ($operation) {
//            case "addition":
//                echo(add($arg1, $arg2));
//                break;
//            case "subtraction":
//                echo(sub($arg1, $arg2));
//                break;
//            case "multiplication":
//                echo(mult($arg1, $arg2));
//                break;
//            case "division":
//                echo(div($arg1, $arg2));
//                break;
//        }
//    }

// Задание 5

//    $date = date(Y);
//    $lesson = file_get_contents("lesson.html");
//    echo (str_replace("{YEAR}", $date, $lesson));

// Задание 6

//    function power($val, $pow) {
//        if ($pow > 0) {
//            return $val *= power($val, $pow-1);
//        } elseif ($pow == 0) {
//            return 1;
//        }
//    }
