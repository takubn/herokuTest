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
            //データベースに接続
            require_once("../conf/dsn.php");

                try{
                    $db = new PDO(DSN,USER,PASSWORD);
                    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                
                    //PrimaryIdを引き合いにコンテンツ内容を書き換え。

                    $sql = "UPDATE bbs SET contents=:contents,date=:date where id = $id ";
                    $stmt = $db->prepare($sql);

                    $stmt->bindParam(':contents', $contents, PDO::PARAM_STR);
                    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
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
