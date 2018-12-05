<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
  <script src="js/jquery-3.3.1.min.js"></script>
  <link rel="shortcut icon" href="img/favicon.ico">
  <title>dc-board</title>
</head>

<body onload="moveBottom()">

  <!-- 入力部分始まり -->
  <div class="item-input" style="position: fixed;width: 35%;margin-left: 30px;">
    <p class="input-logo"><img src="img/logo.png" alt="ロゴの画像"></p>
    <div id="form-main">
      <div id="form-div">
        <form class="form" id="form1" method="POST" action="php/write.php">
          <!-- 名前入力欄 -->
          <p class="name">
            <input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input"
              placeholder="Name" id="name" />
          </p>
          <!-- 投稿内容欄 -->
          <p class="text">
            <textarea name="contents" class="validate[required,length[6,300]] feedback-input" id="comment" placeholder="Comment"></textarea>
          </p>
          <!-- 投稿ボタン -->
          <div class="submit" id="replace">
            <input type="submit" value="SEND" id="button-submit" />
            <div class="ease"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- 入力部分終わり -->


  <!-- 出力部分始まり-->
  <div class="item-display">
    <?php
//DBから情報を取得
require_once "php/fetch.php";
//ループ処理のために最大値を定義
$max = 10;
?>

    <?php for ($i = 0; $i < $max; $i++): ?>
      <div class="display-box">

        <div class="display-name">
          <!-- 5文字で切り捨て、それを変数に格納 -->
          <?php $str_name[] = mb_substr($bbs['name'][$i], 0, 5, "UTF-8");?>
          <div class="white-char"  id="name<?=$i;?>"><?=$str_name[$i]?></div>
          <div hidden id="withoutStrName<?=$i;?>"><?=$bbs['name'][$i];?></div>
        </div>

        <div class="display-contents">
          <div class="white-char" id="contents<?=$i;?>"><?=$bbs['contents'][$i];?></div>
          <p class="date"><?=$bbs['date'][$i];?></p>
          <!-- PrimalyKey取得 -->
          <div hidden id="primalyKey<?=$i;?>"><?=$result_Key[$i];?></div>
        </div>

        <!-- 編集ボタン -->
        <button class="buttonEdit" onclick="changeFormEdit(withoutStrName<?=$i;?>,contents<?=$i;?>),changeEditMode(name<?=$i;?>,contents<?=$i;?>,primalyKey<?=$i;?>)">edit</button>
        <!-- 削除ボタン　-->
        <!-- <?php echo "<button class=\"buttonDelete\"  onclick=\"changeFormDelete(withoutStrName$i,contents$i),changeDeleteMode(primalyKey$i);\">delete</button>" ?> -->

        <button class=buttonDelete  onclick=changeFormDelete(withoutStrName<?=$i;?>,contents<?=$i;?>),changeDeleteMode(primalyKey<?=$i;?>)>delete</button>

      </div>
    <?php endfor;?>

  </div>
  <!-- 出力部分終わり-->

<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
