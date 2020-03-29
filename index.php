<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Фотогаллерея</title>
</head>
<body>
<?php

$dir = './img';

foreach (new DirectoryIterator($dir) as $img) {
    if ($img->isDot()) continue;

    printf('<a href="./img/%s" target="_blank"><img src="./img/%s" width="250px" alt="img"></a>', $img->getFilename(), $img->getFilename());
}

$file = './logs/log.txt';
$lines = count(file($file));
$iterator = new FilesystemIterator('./logs/', FilesystemIterator::SKIP_DOTS);

if (!file_exists($file) || $lines < 10) {
    file_put_contents('./logs/log.txt', date('r') . PHP_EOL, FILE_APPEND);
} else {
        rename($file, './logs/log' . (iterator_count($iterator)-1) . '.txt');
        file_put_contents('./logs/log.txt', date('r') . PHP_EOL, FILE_APPEND);
}
?>
</body>
</html>
