<?php
session_start();

$page_next = (int) $_SESSION['page'];
$page_previous = (int) $_SESSION['page'];

if ($_SESSION['page'] === '') {
    $page_next += 1;
    $page_previous += 1;
}

//「次」→現在のページ＋1　「前」→現在のページ-1
$page_next = $page_next + 1;
$page_previous = $page_previous - 1;
