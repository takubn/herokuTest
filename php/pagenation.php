 <?php
//DBに接続（DSN設定を読み込み）
require_once "/app/conf/dsn.php";

//ページ数・取得位置の決定
if (isset($_GET['page'])) {

    $page = (int) $_GET['page'];
    //例：3P目なら「20件目」からデータを取得する
    $initial_position = ($page * 10) - 10;

} else {
    $page = 1;
    $initial_position = 0;
}

try {
    $db = new PDO(DSN, USER, PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//SELECTするデータの初期位置を、GETで取得したパラメーターによって変更する。
    $limit_data = $db->prepare("SELECT id FROM bbs LIMIT 10 OFFSET {$initial_position}");

    $limit_data->execute();
    $limit_data = $limit_data->fetchAll(PDO::FETCH_ASSOC);

    foreach ($limit_data as $value) {
        echo 'idは' . $value['id'] . '....!';
    }

//データ数を取得する。
    $whole_number = $db->prepare("SELECT COUNT(*) id FROM bbs");
    $whole_number->execute();
    $whole_number = $whole_number->fetchColumn();
//小数点以下を切り上げる。
    $paging_number = ceil($whole_number / 10);

    echo $paging_number;

} catch (PDOException $e) {
    die('エラー：' . $e->getMessage());
}
