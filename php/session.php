<?php
//sessionにパラメータを格納
if (isset($_GET['page'])) {
    session_start();
    $_SESSION['page'] = $_GET['page'];

    // テスト
    $page_next = (int) $SESSION['page'] + 1;
    $page_before = (int) $SESSION['page'] - 1;

}
