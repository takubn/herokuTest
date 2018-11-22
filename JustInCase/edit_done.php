<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>edit.done</title>
  </head>
  <body>


<?php
$id = $_POST['id'];
$name = $_POST['name'];
$contents = $_POST['contents'];
 ?>


<?php
$dsn = 'mysql:host=us-cdbr-iron-east-01.cleardb.net;dbname=heroku_b24bf788d9d54e3;charset=utf8';
$user = 'b35095427bfc9e';
$password = '5efb2b8e';


try{

  $db = new PDO($dsn,$user,$password);
  $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  //データの書き換え。
  $sql = "UPDATE bbs SET name=:name,contents=:contents where id = $id ";
  $stmt = $db->prepare($sql);


  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':contents', $contents, PDO::PARAM_STR);


  $stmt->execute();

  $db = null;

  // $result = $stmt->fetch(PDO::FETCH_ASSOC);
  //
  // $result_name= $result['name'];
  // $result_contents= $result['contents'];
  // $result_date=$result['date'];


 } catch(PDOException $e){
die('エラー：'. $e->getMessage());
}

 ?>
