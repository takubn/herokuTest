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



<!-- post()でidを受け取る -->
<?php 
        if(isset($_POST["id"])){


            $nameId = $_POST["id"];
            $nameContents = $_POST["contents"];

            //idを数値だけにする
            $PrimaryId = preg_replace('/[^0-9]/', '', $nameId);

            //データベースに接続開始
            $dsn = 'mysql:host=us-cdbr-iron-east-01.cleardb.net;dbname=heroku_b24bf788d9d54e3;charset=utf8';
            $user = 'b35095427bfc9e';
            $password = '5efb2b8e';

                try{
                    $db = new PDO($dsn,$user,$password);
                    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                
                    //PrimaryId（ループ処理の数字）を引き合いにすべてのデータを取得。
                    $sql = "SELECT * FROM bbs where $PrimaryId ";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                
                    $db = null;
                
                
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                
                    $result_name= $result['name'];
                    $result_contents= $result['contents'];
                    $result_date=$result['date'];
                
                
                } catch(PDOException $e){
                    die('エラー：'. $e->getMessage());
                    }
            
        echo "名前は......".var_dump($result_name);
        echo "</br>";
        echo "日時は......".$result_date;

        }    
    ?>



