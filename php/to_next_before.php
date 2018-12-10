<?php

$page_for_next_before = (int) $_SESSION['page'];

//「次」→現在のページ＋1　「前」→現在のページ-1
$page_next = $page_for_next_before + 1;
$page_before = $page_for_next_before - 1;

//「before」ボタンは最初のページには表示させない。
// if ($page_before === '') {
//     $page_before = 0;
// }
