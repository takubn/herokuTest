


<?php
    //dbを上書きするプログラム
    $sql = 'UPDATE bbs set name = :name contents = :contents ';
    $stmt = $pdo -> prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':contents', $contents, PDO::PARAM_STR);
    $stmt->execute;
?>
