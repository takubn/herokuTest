<?php
//DBに接続（DSN設定を読み込み）
require_once "./conf/dsn.php";

require_once "function.php";

//エラーがあれば出力
ini_set('display_errors', 1);

if (isset($_POST["id"])) {

    $id = $_POST["id"];
    $contents = $_POST["contents"];

}

// 現在時刻を取得
$modified = getCurrentTime();

try {
    $db = new PDO(DSN, USER, PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = //Update文を記述。
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':contents', $contents, PDO::PARAM_STR);
    $stmt->bindParam(':modified', $modified, PDO::PARAM_STR);
    $stmt->execute();

    $db = null;

} catch (PDOException $e) {
    die('エラー：' . $e->getMessage());
}
