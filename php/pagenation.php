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

//データ数を取得する。
$whole_number = $db->prepare("SELECT COUNT(*) id FROM bbs");
$whole_number->execute();
$whole_number = $whole_number->fetchColumn();
//小数点以下を切り上げる。
$paging_number = ceil($whole_number / 10);

echo $paging_number;
