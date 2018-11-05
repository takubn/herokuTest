<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>dc-board</title>
  </head>

<body>

  <p>掲示板</p>

  <form method="POST" action="write.php">
  <input type="text" name="name"><br><br>
  <textarea name="contents" rows="8" cols="40">
  </textarea><br><br>
  <input type="submit" name="btn1" value="投稿する">
  </form>



  <?php
  //データベースに接続。
  $dsn = 'mysql:host=localhost; dbname=board;charset=utf8';
  $user = 'boarduser';
  $password = 'password';

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


  //取得した情報を出力
  echo '<hr><br>';
  echo '投稿者:'.$result['name'];
  echo '<br>';
  echo '内容:<br><br>'.$result['contents'];
  }


  } catch(PDOException $e){
  die('エラー：'. $e->getMessage());
  }

  ?>

</body>
</html>
