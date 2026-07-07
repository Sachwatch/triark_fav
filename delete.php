<?php
require_once('funcs.php');

$id = $_POST['id'];

$pdo = db_conn();

$stmt = $pdo->prepare('DELETE FROM triark_favorites WHERE id=:id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

$status = $stmt->execute();

if ($status === false) {
    exit('削除エラー');
} else {
    header('Location: select.php');
    exit();
}