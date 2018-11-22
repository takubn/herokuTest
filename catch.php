    <!-- エラーがあれば出力 -->
    <?php
        ini_set('display_errors',1);
    ?>

    <!-- post()でidと書き込み内容（変更後）を受け取る -->
    <?php 
                if(isset($_POST["id"])){


                    $nameId = $_POST["id"];
                    $contents = $_POST["contents"];

                    //idを数値だけにする
                    $PrimaryId = preg_replace('/[^0-9]/', '', $nameId);
                    
                    //PrimaryKeyとの差分を埋める
                    $PrimaryId = $PrimaryId*10+1; 

                }    
        ?>
    

        <?php 
            //データベースに接続開始
            $dsn = 'mysql:host=us-cdbr-iron-east-01.cleardb.net;dbname=heroku_b24bf788d9d54e3;charset=utf8';
            $user = 'b35095427bfc9e';
            $password = '5efb2b8e';

                try{
                    $db = new PDO($dsn,$user,$password);
                    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                
                    //PrimaryId（primalykeyとつじつま合わせ済）を引き合いにコンテンツ内容を書き換え。

                    $sql = "UPDATE bbs SET contents=:contents where id = $PrimaryId ";
                    $stmt = $db->prepare($sql);

                    $stmt->bindParam(':contents', $contents, PDO::PARAM_STR);
                    $stmt->execute();

                    $db = null;

                } catch(PDOException $e){
                    die('エラー：'. $e->getMessage());
                    }
            ?>
    



    <!-- 変更ができているか確認のためコールバック（削除はいったんしない） -->
     <?php  
        echo "idは......".$PrimaryId;
        echo "</br>";
        echo "中身は......".$contents;
?>







