<!-- エラー文出力 -->
<?php ini_set('display_errors',1); ?>


<!-- idをprimekeyと同じ値にする -->
<?php

    if(isset($_POST["id"])){
        $id = $_POST["id"];

        // 数値だけに切り取る
        $primeId = preg_replace('/[^0-9]/','',$id);

        // primalykeyとの差分を埋める
        $primeId = $primeId*10+1;
    }
?>


<?php 
    //データベースに接続
    $dsn = 'mysql:host=us-cdbr-iron-east-01.cleardb.net;dbname=heroku_b24bf788d9d54e3;charset=utf8';
    $user = 'b35095427bfc9e';
    $password = '5efb2b8e';


    try{
        $db = new PDO($dsn,$user,$password);
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE bbs SET delete_flg=1 where id = $PrimeId ";
        $stmt = $db->prepare($sql);

        $stmt->execute();











        $sql = "INSERT　INTO　bbs(delete_flg) VALUES(1) where id = $primeId";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $db = null;


    }catch(PDOException $e){
        die('エラー:'.$e->getMessage());
    }
?>


<!-- postでidがわたっているかテスト -->
<?php
echo 'idは'.$primeId.'です';

?>