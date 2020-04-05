<form>
    <input type="hidden" name="page" value="2">
    <p>Первое число:<input type="number" name="x"></p>
    <select name="operation">
        <option>+</option>
        <option>-</option>
        <option>*</option>
        <option>/</option>
    </select>
    <p>Второе число:<input type="number" name="y"></p>
    <input type="submit" value="Вычислить">
</form>

<?php

$x = $_GET['x'];
$y = $_GET['y'];
$operation = $_GET['operation'];

if (!empty($_GET['x']) && !empty($_GET['y'])) {
    switch ($operation) {
        case ('+') :
            $result = $x + $y;
            echo '<p>Результат: ' . $result . '</p>';
            break;
        case ('-') :
            $result = $x - $y;
            echo '<p>Результат: ' . $result . '</p>';
            break;
        case ('*') :
            $result = $x * $y;
            echo '<p>Результат: ' . $result . '</p>';
            break;
        case ('/') :
            if ($y != 0) {
                $result = $x / $y;
                echo '<p>Результат: ' . $result . '</p>';
            } else {
                echo 'Деление на ноль!';
            }
            break;
    }
} else {
    echo '<p>Сначала введите числа</p>';
}