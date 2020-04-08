<?php
$data = $_POST;

if (isset($data['do_login'])) {
    $errors = array();

    $sql = 'SELECT * FROM `users`
            WHERE `login`="' . $data['login'] . '"';
    $result = mysqli_query(getConnect(), $sql);
    $user = mysqli_fetch_assoc($result);
    if (count($user)>0) {
        if (password_verify($data['password'], $user['password'])) {
            $_SESSION['logged_user'] = $user;
            header('Location: ?page=9');
        } else {
            $errors[] = 'Неверно введен пароль!';
        }
    } else {
        $errors[] = 'Пользователя с таким логином не существует!';
    }

    if (!empty($errors)) {
        echo '<div style="color: red">' . array_shift($errors) . '</div>';
    }

}
?>

<form method="post">
    <p>Введите логин:</p>
    <input type="text" name="login" value="<?php echo @$data['login']; ?>" required>
    <p>Введите пароль:</p>
    <input type="password" name="password" required>
    <input type="submit" value="Войти" name="do_login">
</form>
<p>Еще не зарегестрированы? Тогда вам <a href="?page=8">сюда</a>!</p>
