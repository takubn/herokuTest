<?php

//POSTでデータを受け取る。
$name = $_POST['name'];
$contents = $_POST['contents'];

//バリデーションチェック（未入力ならtest.phpへ遷移）
if($name == '' || $contents == ''){
  header('Location: test.php');
  exit();
}


//データベースに接続
$dsn = 'mysql:host=localhost; dbname=board;charset=utf8';
$user = 'boarduser';
$password = 'password';


//例外処理
try{
$db = new PDO($dsn, $user, $password);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'INSERT INTO bbs(name,contents) VALUES(?,?)';
$stmt = $db->prepare($sql);
$data[] = $name;
$data[] = $contents;
$stmt->execute($data);

$db = null;


header('Location: test.php');
exit();

} catch(PDOException $e){
  //接続エラーが起きた際に、エラー文を出す。
  die ('エラー:' . $e->getMessage());
}

 ?>
