<!-- DBに接続し、各種データを取得 -->
<?php
require_once("conf/dsn.php");

      try{
        $db = new PDO(DSN,USER,PASSWORD);
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