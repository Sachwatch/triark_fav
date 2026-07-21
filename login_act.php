<?php
session_start();

$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

require_once('funcs.php');
$pdo = db_conn();

// triark_users から lid で1件取得（life_flg=0の有効ユーザーのみ）
$stmt = $pdo->prepare('SELECT * FROM triark_users WHERE lid=:lid AND life_flg=0;');
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();

if($status === false){
    sql_error($stmt);
}

$val = $stmt->fetch();

if($val && password_verify($lpw, $val['lpw'])){
    // ログイン成功
    session_regenerate_id(true);
    $_SESSION['chk_ssid'] = session_id();
    $_SESSION['kanri_flg'] = $val['kanri_flg'];
    header('Location: select.php');
}else{
    // ログイン失敗
    header('Location: login.php');
}
exit();