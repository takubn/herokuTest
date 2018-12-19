 <?php
//DBに接続（DSN設定を読み込み）
require_once $_SERVER['DOCUMENT_ROOT'] . "/conf/dsn.php";

try {
    $db = new PDO(DSN, USER, PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//ページネーションのため、データ数を取得する。
    $whole_number = $db->prepare(/** データ数を取得するSELECT文を記述する。*/);
    $whole_number->execute();
    $whole_number = $whole_number->fetchColumn();
//小数点以下を切り上げる。　例：160件データがあったら、17P文のリンクを生成するための数値。（1Pは10件表示）
    $paging_number = ceil($whole_number / 10);

} catch (PDOException $e) {
    die('エラー：' . $e->getMessage());
}
