<?php 
    if(isset($_POST["id"])){
        $nameId = $_POST["id"];
        $nameContents = $_POST["contents"];

        echo "idは......".$nameId;
        echo "</br>";
        echo "中身は......".$nameContents;
    }    
?>