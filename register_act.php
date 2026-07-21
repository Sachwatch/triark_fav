<?php
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

$hashed_lpw = password_hash($lpw, PASSWORD_DEFAULT);

require_once('funcs.php');
$pdo = db_conn();

// kanri_flg・life_flg はテーブルのDEFAULT 0 に任せる
$stmt = $pdo->prepare('INSERT INTO triark_users (name, lid, lpw) VALUES (:name, :lid, :lpw)');
$stmt->bindValue(':name', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $hashed_lpw, PDO::PARAM_STR);

$status = $stmt->execute();

if($status === false){
    sql_error($stmt);
}else{
    redirect('login.php');
}