<?php

//ページ数・取得位置の決定
if (isset($_GET['page'])) {

    $page = (int) $_GET['page'];
    //例：3P目なら「20件目」からデータを取得する
    $initial_position = ($page * 10) - 10;

} else {
    $page = 1;
    $initial_position = 0;
}

//DBに接続（DSN設定を読み込み）
require_once "/app/conf/dsn.php";

try {
    $db = new PDO(DSN, USER, PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //更新された順のデータ10件を昇順で取得する。

    $sql = 'SELECT * FROM(SELECT * FROM bbs ORDER BY date desc LIMIT 10 OFFSET {$initial_position}) AS latestData ORDER BY date asc';
    $stmt = $db->prepare($sql);
    $stmt->execute();

    //データ数を取得する。
    $whole_number = $db->prepare("SELECT COUNT(*) id FROM bbs");
    $whole_number->execute();
    $whole_number = $whole_number->fetchColumn();
    //小数点以下を切り上げる。
    $paging_number = ceil($whole_number / 10);

    echo $paging_number;

    $db = null;

    while (true) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        //取り出したデータがなければ、ループ処理終了。
        if ($result == false) {
            break;
        }

        //多次元連想配列に格納
        $bbs['name'][] = $result['name'];
        $bbs['contents'][] = $result['contents'];
        $bbs['date'][] = $result['date'];
        $bbs['id'][] = $result['id'];

    }

} catch (PDOException $e) {
    die('エラー：' . $e->getMessage());
}
