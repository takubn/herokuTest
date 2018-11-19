<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link rel="shortcut icon" href="favicon.ico">
    <title>dc-board</title>

    <!-- js記述部分　 -->
      <script>
        function scr(){
          var a = document.documentElement;
          var y = a.scrollHeight - a.clientHeight;
          window.scroll(0, y);
        }
      </script>
  </head>

<body onload="scr();">


  <!-- 入力部分始まり -->
  <div class="item-input" style="position: fixed;width: 35%;">
      <p class="input-logo">
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

  <!-- DBに接続し、各種データを取得 -->
    <?php
    
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
            $result_date[]=$result['date'];
            // primarykeysを取得
            $result_id[]=$result['id'];
      }

          } catch(PDOException $e){
            die('エラー：'. $e->getMessage());
          }
      ?>

  <!-- 出力部分(display)始まり-->
        <div class="item-display">

          <!-- ループ処理のために、最大値を定義 -->
        　<?php $max = count($result_name);?>      
          
          <?php for($i=0; $i<$max; $i++):?>
               
            <div class="display-box">
                <!-- 名前の表示部分 -->
                <div class="display-name">
                  <!-- 5文字で切り捨て、それを変数に格納 -->
                    <?php $str_name[] = mb_substr($result_name[$i],0,5,"UTF-8");  ?>
                  
                  <!-- 文字列として一行（名前）を出力。idを自動付与する意図-->
                    <?php echo "<div class=\"white\" id=\"name$i\">$str_name[$i]</div>"?>
                </div>
                
                <!-- 投稿内容の表示部分 -->
                <div class="display-contents">
                  <!-- 文字列として一行（投稿内容）を出力。idを自動付与する意図-->
                    <?php echo "<div class=\"white\" id=\"contents$i\">$result_contents[$i]</div> "?>
                    <p class="date"><?php echo $result_date[$i] ?></p>
                </div>

                <!-- 編集ボタン -->
                <?php echo "<button class=\"button\" id=\"btn$i\" onclick=\"getDirect(name$i,contents$i);\">edit</button>"?>
    
              </div>

          <?php endfor; ?>
        </div>
  <!-- 出力部分(display)終わり -->

<script type="text/javascript" src="script.js"></script>
</body>
</html>
