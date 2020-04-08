<?php

$login = $_SESSION['logged_user']['login'];
$name = $_SESSION['logged_user']['name'];

echo '<div style="color: green">Пользователь ' . $login . ' авторизован!</div>
      <h2>Добро пожаловать, ' . $name . '!</h2>';

?>

<a href="?page=10">Выход</a>
