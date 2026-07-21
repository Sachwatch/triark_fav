<?php
require_once('funcs.php');

$id      = $_POST['id'];
$host    = $_POST['host'];
$url     = $_POST['url'];
$comment = $_POST['comment'];

$pdo = db_conn();

$stmt = $pdo->prepare('UPDATE triark_favorites SET host=:host, url=:url, comment=:comment WHERE id=:id;');
$stmt->bindValue(':host', $host, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

$status = $stmt->execute();

if ($status === false) {
    exit('更新エラー');
} else {
    header('Location: select.php');
    exit();
}