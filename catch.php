    <!-- エラーがあれば出力 -->
    <?php
        ini_set('display_errors',1);
    ?>

    <!-- post()でidと書き込み内容（変更後）を受け取る -->
    <?php 
                if(isset($_POST["id"])){


                    $id = $_POST["id"];
                    $contents = $_POST["contents"];

                }
        
            date_default_timezone_set("Asia/Tokyo");
            $date = date('Y/m/d H:i:s');
                



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

                    $sql = "UPDATE bbs SET contents=:contents date=:date where id = $id ";
                    $stmt = $db->prepare($sql);

                    $stmt->bindParam(':contents', $contents, PDO::PARAM_STR);
                    $stmt->bindParam(':date', $date, PDO::PARAM_TIMESTAMP);
                    $stmt->execute();

                    $db = null;

                } catch(PDOException $e){
                    die('エラー：'. $e->getMessage());
                    }
            ?>
    


    <!-- 変更ができているか確認のためコールバック（削除はいったんしない） -->
     <!-- <?php  
        echo "idは......".$id;
        echo "</br>";
        echo "中身は......".$contents;
?> -->

