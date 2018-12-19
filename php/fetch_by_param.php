<?php
ini_set('display_errors', 1);
session_start();

//DBに接続（DSN設定を読み込み）
require_once $_SERVER['DOCUMENT_ROOT'] . "/conf/dsn.php";
try {
    $db = new PDO(DSN, USER, PASSWORD);

    if (isset($_SESSION['page'])) {
        $page = (int) $_SESSION['page'];

        // データ取得の初期位置を設定　：例　3p目なら「20件～」データを取得
        $initial_position = ($page * 10) - 10;
    } else {
        $page = 1;
        $initial_position = 0;
    }

//更新された順のデータ10件を昇順（更新日時が新しいほうが下にくるように）で取得する
    $sql = "SELECT * FROM(SELECT * FROM bbs ORDER BY date desc LIMIT {$initial_position}, 10) AS latestdata ORDER BY date asc ";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $results) {
        //多次元連想配列に格納
        $bbs['name'][] = $results['name'];
        $bbs['contents'][] = $results['contents'];
        $bbs['date'][] = $results['date'];
        $bbs['id'][] = $results['id'];
        $bbs['modified'][] = $results['modified'];
    }

} catch (PDOException $e) {
    die('エラー：' . $e->getMessage());
}
