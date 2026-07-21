<?php
require_once('funcs.php');

$host_name = $_POST['host'];
$url = $_POST['url'];
$comment = $_POST['comment'];

$pdo = db_conn();

$stmt = $pdo->prepare('INSERT INTO triark_favorites (host, url, comment, created_at) VALUES (:host, :url, :comment, NOW())');
$stmt->bindValue(':host', $host_name, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

$status = $stmt->execute();

if ($status === false) {
    exit('登録エラー');
} else {
    header('Location: select.php');
    exit();
}