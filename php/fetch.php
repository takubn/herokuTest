<?php
//DBに接続（DSN設定を読み込み）
require_once "dsn.php";

try {
    $db = new PDO(DSN, USER, PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM bbs';
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $db = null;

    while (true) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        //取り出したデータがなければ、ループ処理終了。
        if ($result == false) {
            break;
        }

        $result_name[] = $result['name'];
        $result_contents[] = $result['contents'];
        $result_date[] = $result['date'];
        $result_Key[] = $result['id'];
    }

} catch (PDOException $e) {
    die('エラー：' . $e->getMessage());
}
