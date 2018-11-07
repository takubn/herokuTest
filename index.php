<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link rel="shortcut icon" href="favicon.ico">
    <title>dc-board</title>
  </head>

<body>
<!-- 入力部分始まり -->
  <div id="box-write">
    
    <p>
    <img src="logo.png" alt="">
    </p>

  <div id="form-main">
    <div id="form-div">
      <form class="form" id="form1" method="POST" action="write.php">
        <!-- 名前入力欄 -->
        <p class="name">
           <input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Name" id="name" />
         </p>

         <!-- 投稿内容欄 -->
         <p class="text">
           <textarea name="contents" class="validate[required,length[6,300]] feedback-input" id="comment" placeholder="Comment"></textarea>
         </p>

         <!-- 投稿ボタン -->
         <div class="submit">
                 <input type="submit" value="SEND" id="button-blue"/>
                 <div class="ease"></div>
               </div>
      </form>
    </div>
  </div>
</div>
  <!-- 入力部分終わり -->




<!-- データ表示部分始まり -->
  <?php
  //データベースに接続。
  $dsn = 'mysql:host=us-cdbr-iron-east-01.cleardb.net;dbname=heroku_b24bf788d9d54e3;charset=utf8';
  $user = 'b35095427bfc9e';
  $password = '5efb2b8e';

  try{

  $db = new PDO($dsn,$user,$password);
  $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  //すべてのデータを取得。
  $sql = 'SELECT * FROM bbs';
  $stmt = $db->prepare($sql);
  $stmt->execute();

  $db = null;

    while(true){
      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      //取り出したデータがなければ、ループ処理終了。
      if($result==false){
          break;
      }
      // 一行ずつ変数に入れる
      $result_name[]= $result['name'];
      $result_contents[]= $result['contents'];
  }

  } catch(PDOException $e){
  die('エラー：'. $e->getMessage());
  }

  ?>

<!-- ループ処理のために、最大値を定義する -->
  <?php
    $max = count($result_name);
   ?>

<!-- 出力部分 -->
<div id="box-display">
  <?php for($i=1; $i<=$max; $i++):?>
    <p>名前：<?php echo $result_name[$i] ?></p>
    <p>内容：<?php echo $result_contents[$i] ?><p>
  <?php endfor; ?>
</div>


<!-- 表示データ部分終わり -->








</body>
</html>
