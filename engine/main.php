<?php

    include 'config/lib.php';
    $pages = include 'config/pages.php';

    $page = getPage($pages);

    session_start();
    ob_start();
    include 'pages/' . $page;
    $content = ob_get_clean();

    $html = file_get_contents(__DIR__ . '/main.html');
    echo str_replace('{{CONTENT}}', $content, $html);