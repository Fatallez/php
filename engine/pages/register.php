<?php

$data = $_POST;
if (isset($data['register'])) {
    $errors = array();

    if (empty($data['name'])) {
        $errors[] = 'Введите имя!';
    }
    if (empty($data['login'])) {
        $errors[] = 'Введите логин!';
    }
    if (empty($data['email'])) {
        $errors[] = 'Введите Email!';
    }
    if (empty($data['password'])) {
        $errors[] = 'Введите пароль!';
    }
    if ($data['password_2'] != $data['password']) {
        $errors[] = 'Пароли не совподают!';
    }

    $sql = 'SELECT * FROM `users`
            WHERE `login`="' . $data['login'] . '"';
    $result = mysqli_query(getConnect(), $sql);
    $user = mysqli_fetch_assoc($result);
    if (count($user)>0) {
        $errors[] = 'Пользователь с таким логином уже существует!';
    }

    $sql = 'SELECT * FROM `users`
            WHERE `email`="' . $data['email'] . '"';
    $result = mysqli_query(getConnect(), $sql);
    $user = mysqli_fetch_assoc($result);
    if (count($user)>0) {
        $errors[] = 'Пользователь с таким email уже существует!';
    }

    if (empty($errors)) {
        $sql = 'INSERT INTO `users` 
                (`name`, `login`, `password`, `email`) 
                VALUES 
                ("' . $data['name'] . '","' . $data['login'] . '", "' . password_hash($data['password'], PASSWORD_DEFAULT) . '", "' . $data['email'] . '");';
        mysqli_query(getConnect(), $sql);
        echo '<div style="color: green">Регистрация прошла успешно!</div>';
    } else {
        echo '<div style="color: red">' . array_shift($errors) . '</div>';
    }
}
?>

<form method="post">
    <p>Введите Ваше имя:</p>
    <input type="text" name="name" value="<?php echo @$data['name']; ?>">
    <p>Введите логин:</p>
    <input type="text" name="login" value="<?php echo @$data['login']; ?>">
    <p>Введите email:</p>
    <input type="email" name="email" value="<?php echo @$data['email']; ?>">
    <p>Введите пароль:</p>
    <input type="password" name="password">
    <p>Введите пароль еще раз:</p>
    <input type="password" name="password_2">
    <input type="submit" value="Зарегистрироваться" name="register">
</form>
