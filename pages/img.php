<link rel="stylesheet" href="./css/img.css">
<?php
$link = mysqli_connect('127.0.0.1', 'root', '', 'php');
$id = $_GET['id'];
$sql = 'SELECT * FROM gallery WHERE id=' . $id ;
$result = mysqli_query($link, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $sql = 'UPDATE `gallery` SET `vews` = `vews` + 1 WHERE `gallery`.`id`='  . $id;
    mysqli_query($link, $sql);
    echo '<section class="product">
            <h2>' . $row['name'] . '</h2>
            <img src="' . $row["path"] . '" class="big_img">
            <h3>$' . $row['price'] . '</h3>
            <p>Количество просмотров: ' . $row['vews'] . '</p>
            </section>';
}
?>

<form method="POST">
    <input type="hidden" formmethod="GET" name="page" value="5">
    <label>Имя</label>
    <input type="text" name="name" value="Аноним">

    <label>Комментарий</label>
    <textarea name="comment" placeholder="Введите текст комментария" required></textarea>

    <input type="submit" value="Опубликовать">
</form>

<?php

if (!empty($_POST['name']) && !empty($_POST['comment'])) {
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $sql = 'INSERT INTO `comments` (`name`, `text`, `product_id`) VALUES ("' . $name . '", "' . $comment . '", "' . $id . '")';

    mysqli_query($link, $sql);
}

?>

<h4>Комментарии:</h4>

<?php
$sql = 'SELECT * FROM comments WHERE product_id=' . $id . ' ORDER BY `date` DESC' ;
$result = mysqli_query($link, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo '<section class="comment">
            <h5>Пользователь: ' . $row['name'] . '</h5>
            <p>' . $row['text'] . '</p>
            </section>';
}
