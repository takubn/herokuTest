<!-- <?php 
    if(isset($_POST["id"])){
        $nameId = $_POST["id"];
        $nameContents = $_POST["contents"];

        echo "idは......".$nameId;
        echo "</br>";
        echo "中身は......".$nameContents;
    }    
?> -->

<!-- ｰｰｰｰｰｰｰｰｰｰｰｰここまでは動くので弄らないｰｰｰｰｰｰｰｰｰｰｰｰ -->






<!-- --------------ver2----------- -->


    <!-- post()でidを受け取る -->
    <?php 
                if(isset($_POST["id"])){


                    $nameId = $_POST["id"];
                    $contents = $_POST["contents"];

                    //idを数値だけにする
                    $PrimaryId = preg_replace('/[^0-9]/', '', $nameId);

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
                
                    //PrimaryId（ループ処理の数字）を引き合いにコンテンツ内容を書き換え。
                    $sql = "SELECT * FROM bbs where id = $PrimaryId ";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                
                    $db = null;
                    

                    $sql = "UPDATE bbs SET contents=:contents where id = $id ";
                    $stmt = $db->prepare($sql);


                    $stmt->bindParam(':contents', $contents, PDO::PARAM_STR);


                    $stmt->execute();

                    $db = null;



                } catch(PDOException $e){
                    die('エラー：'. $e->getMessage());
                    }
            ?>
    
<!-- --------------ver2終わり----------- -->
