<?php

ini_set('display_errors',1);

date_default_timezone_set("Asia/Tokyo");
$now = date('Y/m/d H:i:s');

//POSTでデータを受け取る。
$name = $_POST['name'];
$contents = $_POST['contents'];

//バリデーションチェック（未入力ならindex.phpへ遷移）
if($name == '' || $contents == ''){
  header('Location: index.php');
  exit();
}


//データベースに接続
$dsn = 'mysql:host=us-cdbr-iron-east-01.cleardb.net;dbname=heroku_b24bf788d9d54e3;charset=utf8';
$user = 'b35095427bfc9e';
$password = '5efb2b8e';


//例外処理
try{
$db = new PDO($dsn, $user, $password);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'INSERT INTO bbs(name,contents,date) VALUES(?,?,?)';
$stmt = $db->prepare($sql);
$data[] = $name;
$data[] = $contents;
$date[] = $now;
$stmt->execute($data);

$db = null;


header('Location: index.php');
exit();

} catch(PDOException $e){
  //接続エラーが起きた際に、エラー文を出す。
  die ('エラー:' . $e->getMessage());
}

 ?>
