<!-- エラー文出力 -->
<?php ini_set('display_errors',1); ?>


<!-- idをprimekeyと同じ値にする -->
<?php

    if(isset($_POST["id"])){
        $id = $_POST["id"];

        // 数値だけに切り取る
        $primeId = intval($id);

 
    }
?>


<?php 
    //データベースに接続
   require_once("conf/DSN.php");

    try{
        $db = new PDO(DSN,USER,PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE from bbs where id = $primeId";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $db = null;


    }catch(PDOException $e){
        die('エラー:'.$e->getMessage());
    }
?>
