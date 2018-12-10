<?php
//sessionにパラメータを格納
if (isset($_GET['page'])) {
    session_start();
    $_SESSION['page'] = $_GET['page'];

    // テスト
    $page_for_next_before = (int) $SESSION['page'];

    $page_next = $page_for_next_before + 1;
    $page_before = $page_for_next_before - 1;

}
