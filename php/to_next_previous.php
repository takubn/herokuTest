<?php

$page_for_next_previous = (int) $_SESSION['page'];

//「次」→現在のページ＋1　「前」→現在のページ-1
$page_next = $page_for_next_previous + 1;
$page_previous = $page_for_next_previous - 1;

//「before」ボタンは最初のページには表示させない。
if ($page_previous === '') {
    $page_previous = 0;
}
