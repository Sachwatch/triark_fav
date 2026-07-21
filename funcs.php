<?php
//共通に使う関数を記述
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}


// DB接続
function db_conn() {
    require('db_config.php');
    try {
        return new PDO("mysql:host={$db_host};dbname={$db_name};charset=utf8mb4", $db_user, $db_pass);
    } catch (PDOException $e) {
        exit('DBConnectError:' . $e->getMessage());
    }
}   

// SQLエラー表示
function sql_error($stmt) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);    
}

// ページ遷移
function redirect($file_name) {
    header('Location: ' . $file_name);
    exit();
}

// ログインチェック（ログインしていなければログイン画面へ飛ばす）
function loginCheck() {
    if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()) {
        header('Location: login.php');
        exit();
    }
}
