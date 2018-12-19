<?php
//DBに接続（DSN設定を読み込み）
require_once "/app/conf/dsn.php";

require_once "function.php";

//エラーがあれば出力
ini_set('display_errors', 1);

//現在時刻を取得
$now = getCurrentTime();

//POSTでデータを受け取る。
$name = $_POST['name'];
$contents = $_POST['contents'];

//未入力ならindex.phpへ遷移
if ($name == '' || $contents == '') {
    header('Location: ../index.php');
    exit();
}

try {
    $db = new PDO(DSN, USER, PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = //insert文を記述する。
    $stmt = $db->prepare($sql);
    $data[] = $name;
    $data[] = $contents;
    $data[] = $now;
    $stmt->execute($data);

    $db = null;

    header('Location: ../index.php');
    exit();

} catch (PDOException $e) {
    //接続エラーが起きた際に、エラー文を出す。
    die('エラー:' . $e->getMessage());
}
