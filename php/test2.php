<?php
// /スタートのポジションを計算する
if ($page > 1) {
    // 例：２ページ目の場合は、『(2 × 10) - 10 = 10』
    $start = ($page * 10) - 10;
} else {
    $start = 0;
}

// postsテーブルから10件のデータを取得する
$posts = $db->prepare("SELECT  id, title FROM posts LIMIT 10 OFFSET  {$start}");
$posts->execute();
$posts = $posts->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo $post['id'], '：';
    echo $post['title'], '<br>';
}

// postsテーブルのデータ件数を取得する
$page_num = $db->prepare("
	SELECT COUNT(*) id
	FROM posts
");
$page_num->execute();
$page_num = $page_num->fetchColumn();

// ページネーションの数を取得する
$pagination = ceil($page_num / 10);

?>

<?php for ($x = 1; $x <= $pagination; $x++) {?>
	<a href="?page=<?php echo $x ?>"><?php echo $x; ?></a>
<?php } // End of for ?>
