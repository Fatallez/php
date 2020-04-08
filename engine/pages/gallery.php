<?php
$link = mysqli_connect('127.0.0.1', 'root', '', 'php');

$sql = 'SELECT * FROM gallery ORDER BY vews DESC';
$result = mysqli_query($link, $sql);

while ($row = mysqli_fetch_assoc($result)) {
echo '<a href="?page=5&id=' . $row["id"] . '" name="img"><img src="' . $row["path"] . '" class="min_img"></a>';
}

?>

<link rel="stylesheet" href="./css/gallery.css">