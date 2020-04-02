<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IMG</title>
</head>
<body>
    <header><a href="index.php">На главную</a></header>
    <?php
        $link = mysqli_connect('127.0.0.1', 'root', '', 'php');
        $id = $_GET['id'];
        $sql = 'SELECT * FROM gallery WHERE id=' . $id ;
        $result = mysqli_query($link, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $vews = $row["vews"];
            $sql = 'UPDATE `gallery` SET `vews`=' . ++$vews  .  ' WHERE `gallery`.`id`='  . $id;
            mysqli_query($link, $sql);
            echo '<img src="' . $row["path"] . '"><br>Количество просмотров:' . $vews;
        }
    ?>
</body>
</html>