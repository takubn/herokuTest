<?php
session_start();

if (isset($_GET['page'])) {

    $page_for_next_previous = (int) $_SESSION['page'];

//「次」→現在のページ＋1　「前」→現在のページ-1
    $page_next = $page_for_next_previous + 1;
    $page_previous = $page_for_next_previous - 1;

//値が入っていない場合、「0」を代入する。
    if ($page_previous === '') {
        $page_previous = 0;
    }
}
