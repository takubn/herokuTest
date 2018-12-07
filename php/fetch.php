<?php
ini_set('display_errors', 1);
session_start();

//sessionでパラメータ受け取る。
if (isset($_SESSION['page'])) {
    $page = (int) $_SESSION['page'];
    echo $page;
}

//DBに接続（DSN設定を読み込み）
require_once "/app/conf/dsn.php";

try {
    $db = new PDO(DSN, USER, PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //----------更新された順のデータ10件を昇順で取得する。----------
    $sql = 'SELECT * FROM(SELECT * FROM bbs ORDER BY date desc LIMIT 10) AS latestData ORDER BY date asc';

    $stmt = $db->prepare($sql);
    $stmt->execute();

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

        // $db = null;

    }

} catch (PDOException $e) {
    die('エラー：' . $e->getMessage());
}
