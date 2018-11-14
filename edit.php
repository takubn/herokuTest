
<?php
$id = $_POST['id'];
 ?>


<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>test</title>
  </head>
  <body>
    <h1>test</h1>
    <?php echo $id ?>


    <?php
    $dsn = 'mysql:host=us-cdbr-iron-east-01.cleardb.net;dbname=heroku_b24bf788d9d54e3;charset=utf8';
    $user = 'b35095427bfc9e';
    $password = '5efb2b8e';


    try{

      $db = new PDO($dsn,$user,$password);
      $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      //すべてのデータを取得。
      $sql = "SELECT * FROM bbs where $id ";
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

     <div class="white"><?php echo mb_substr($result_name,0,5,"UTF-8");?></div>
     <div class="white"><?php echo $result_contents ?></div>
     <p class="date"><?php echo $result_date ?></p>


  </body>
</html>
