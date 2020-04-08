<?php

function getPage(array $pages)
{
    $pageNumber = 1;
    if (!empty($_GET['page'])) {
        $pageNumber = (int)$_GET['page'];
    }

    if (empty($pages[$pageNumber])) {
        $pageNumber = 1;
    }

    return $pages[$pageNumber];
}

function getConnect() {
    static $link;

    if (empty($link)) {
        $link = mysqli_connect('127.0.0.1', 'root', '', 'php');
    }

    return $link;
}