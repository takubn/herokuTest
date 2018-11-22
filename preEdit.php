<?php 
$id = $_POST['roopId'];
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link rel="shortcut icon" href="favicon.ico">
    <title>dc-board</title>
  </head>
  <body>
    <h1>投稿修正</h1>
    <!-- <?php echo $id ?> -->


    <?php
    $dsn = 'mysql:host=us-cdbr-iron-east-01.cleardb.net;dbname=heroku_b24bf788d9d54e3;charset=utf8';
    $user = 'b35095427bfc9e';
    $password = '5efb2b8e';


    try{

      $db = new PDO($dsn,$user,$password);
      $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      //すべてのデータを取得。
      $sql = "SELECT * FROM bbs where id = $id ";
      $stmt = $db->prepare($sql);
      $stmt->execute();

      $db = null;


      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      $result_name= $result['name'];
      $result_contents= $result['contents'];
      $result_date=$result['date'];


     } catch(PDOException $e){
    die('エラー：'. $e->getMessage());
    }
     ?>

  <div class="display-contents">
     <form  action="edit_done.php" method="post">
       <input type="hidden" name="id" value="<?php echo $id ?>">
       <div class="edit"><input type="text" name="name" value="<?php echo mb_substr($result_name,0,5,"UTF-8");?>"></div>
       <div class="edit"><input type="textarea" name="contents" value="<?php echo $result_contents ?>"></div>
       <input type="submit" class="button"  value="変更する">
     </form>
  </div>


  </body>
</html>
