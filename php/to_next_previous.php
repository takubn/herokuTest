<?php
session_start();

if (isset($_SESSION['page'])) {
    $page_next = (int) $_SESSION['page'];
    $page_previous = (int) $_SESSION['page'];
// if ($page_next === 1) {
    //     $page_next += 1;
    // }

    if ($page_next === '') {
        $page_next += 2;
    }

//「次」→現在のページ＋1　「前」→現在のページ-1
    $page_next = $page_next + 1;
    $page_previous = $page_previous - 1;
}
