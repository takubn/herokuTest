<?php
//DBに接続（DSN設定を読み込み）
require_once $_SERVER['DOCUMENT_ROOT'] . "/conf/dsn.php";

//エラーがあれば出力
ini_set('display_errors', 1);

if (isset($_POST["id"])) {
    $id = $_POST["id"];
}

try {
    $db = new PDO(DSN, USER, PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = //ここにIDを条件にしてBBSテーブルから削除する。
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $db = null;

} catch (PDOException $e) {
    die('エラー:' . $e->getMessage());
}
