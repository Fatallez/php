<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <title>Gallery</title>
</head>
<body>
    <?php
        $link = mysqli_connect('127.0.0.1', 'root', '', 'php');

        $sql = 'SELECT * FROM gallery ORDER BY vews DESC';
        $result = mysqli_query($link, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<a href="/img.php?id=' . $row["id"] . '" name="img"><img src="' . $row["path"] . '"></a>';
        }
    ?>
</body>
</html>
