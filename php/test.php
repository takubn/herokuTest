<?php
// テスト
$page_for_next_before = (int) $_SESSION['page'];

$page_next = $page_for_next_before + 1;
$page_before = $page_for_next_before - 1;

if ($page_before === '' && $page_before === 1) {
    $page_before = 0;
}
