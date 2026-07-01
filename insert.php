<?php
// POSTデータ取得
$host_name= $_POST['host'];
$url = $_POST['url'];
$comment = $_POST['comment'];

// 1.DBに接続
require_once('db_config.php');

try {
    $pdo = new PDO("mysql:host={$db_host};dbname={$db_name};charset=utf8", $db_user, $db_pass);
} catch (PDOException $e) {
    exit('DBConnection Error' . $e->getMessage());
}

// 2.SQL作成
    $stmt = $pdo->prepare('INSERT INTO triark_favorites (host, url, comment, created_at) VALUES (:host, :url, :comment, NOW())');
    $stmt->bindValue(':host', $host_name, PDO::PARAM_STR);
    $stmt->bindValue(':url', $url, PDO::PARAM_STR);
    $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
   
// 3.SQL実行
   $status = $stmt->execute();

// 4.実行後の処理
    if ($status === false) {
        $error = $stmt->errorInfo();
        exit('ErrorMessage: ' . print_r($error, true));
    } else {
        header('Location: index.php');
    }
    ?>


