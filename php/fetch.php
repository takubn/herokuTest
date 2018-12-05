<?php
//DBに接続（DSN設定を読み込み）
require_once "/app/conf/dsn.php";

try {
    $db = new PDO(DSN, USER, PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //更新された順のデータ20件を昇順で取得する。
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

        // $bbs['name'][] = $result['name'];
        // $result_contents[] = $result['contents'];
        // $result_date[] = $result['date'];
        // $result_Key[] = $result['id'];
        // var_dump($bbs['name']);
        echo '<br/>';
        var_dump($result['name']);

    }

} catch (PDOException $e) {
    die('エラー：' . $e->getMessage());
}
