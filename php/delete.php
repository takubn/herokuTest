<?php
//エラーがあれば出力
ini_set('display_errors', 1);

if (isset($_POST["id"])) {
    $id = $_POST["id"];

    // 数値だけに切り取る
    // $primeId = intval($id);
}

//データベースに接続
require_once "dsn.php";

try {
    $db = new PDO(DSN, USER, PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE from bbs where id = $id";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $db = null;

} catch (PDOException $e) {
    die('エラー:' . $e->getMessage());
}
