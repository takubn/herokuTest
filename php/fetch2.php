<?php
ini_set('display_errors', 1);
session_start();

//DBに接続（DSN設定を読み込み）
require_once "/app/conf/dsn.php";
$db = new PDO(DSN, USER, PASSWORD);

//sessionでパラメータ受け取る。
if (isset($_SESSION['page'])) {
    $page = (int) $_SESSION['page'];

    // データ取得の初期位置を設定　：例　3p目なら「20件～」データを取得
    $initial_position = ($page * 10) - 10;
} else {
    $page = 1;
    $initial_position = 0;
}

//--------------サブクエリ無し設定した開始位置からデータを取り出す。

$sql = "SELECT * FROM bbs ORDER BY date desc LIMIT {$initial_position},10";

$stmt = $db->prepare($sql);

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $results) {
    echo $results['id'], '：';
    echo $results['name'], '<br>';
    echo $results['contents'], '<br>';
}

//----------------------終わり----------------------------------------
