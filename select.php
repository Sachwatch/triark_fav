<?php
require_once('funcs.php');

// DB接続
$pdo = db_conn();

// データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM triark_favorites");
$status = $stmt->execute();


// 3. データ表示用の変数を組み立て
$view = "";
if ($status == false) {
    $error = $stmt->errorInfo();
    exit("ErrorQuery:" . $error[2]);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= "<div class='fav-item'>";
        $view .= "<div class='fav-host'>" . h($result['host']) . "</div>";
        if (!empty($result['url'])) {
            $view .= "<a class='fav-url' href='" . h($result['url']) . "' target='_blank'>" . h($result['url']) . "</a>";
        }
        $view .= "<div class='fav-comment'>" . h($result['comment']) . "</div>";
        $view .= "<div class='fav-date'>" . h($result['created_at']) . "</div>";
        
        // 編集ボタン（idを持ってdetail.phpへ・GETで渡す）
        $view .="<div class='fav-actions'>";
        $view .="<a class='btn-edit' href='detail.php?id=" . h($result['id']) . "'>編集</a>";
        
        // 削除ボタン（idを持ってdelete.phpへ・POST+確認ダイアログ）
        $view .="<form class='del-form' action='delete.php' method='post' onsubmit='return confirm(\"本当に削除してもよいですか？\")'>";
        $view .="<input type='hidden' name='id' value='" . h($result['id']) . "'>";
        $view .="<button type='submit' class='btn-del'>削除</button>";
        $view .="</form>";
        $view .="</div>";
        $view .= "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TriArk | お気に入りホスト一覧</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Helvetica Neue', Arial, sans-serif;
      background: #f7f7f7;
      color: #1A2E3A;
      padding: 40px 20px;
    }
    .list-wrap { max-width: 600px; margin: 0 auto; }
    .list-wrap h1 {
      font-size: 24px; font-weight: bold;
      margin-bottom: 4px; letter-spacing: 1px;
    }
    .list-sub { font-size: 13px; color: #888; margin-bottom: 24px; }
    .fav-item {
      background: white;
      border-radius: 14px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.06);
      padding: 18px 20px;
      margin-bottom: 14px;
      border-left: 4px solid #00B4C8;
    }
    .fav-host { font-size: 17px; font-weight: bold; color: #1A2E3A; margin-bottom: 6px; }
    .fav-url { font-size: 13px; color: #00B4C8; text-decoration: none; word-break: break-all; }
    .fav-url:hover { text-decoration: underline; }
    .fav-comment { font-size: 14px; color: #555; margin: 8px 0; }
    .fav-date { font-size: 12px; color: #aaa; }
    .empty { text-align: center; color: #999; padding: 40px 0; }
    .back-link {
      display: inline-block; margin-top: 16px;
      font-size: 13px; color: #FF8C42; text-decoration: none;
    }
    .back-link:hover { text-decoration: underline; }
  
  .fav-actions { display: flex; gap: 8px; margin-top: 10px; }
  .btn-edit, .btn-delete {
    display: inline-block; padding: 6px 16px; 
    border-radius: 8px; font-size:  13px; font-weight: bold;
    text-decoration: none; cursor: pointer; border: none;
  }
  .btn-edit { background: #00B4C8; color: white; }
  .btn-edit:hover { background: #0098a8; }
  .btn-delete { background: #FF8C42; color: white; }
  .btn-delete:hover { background: #ff7a26; }
  .btn-del:hover { background: #ff7a26; }
  .del-form { margin: 0; }
  
  
  </style>
</head>
<body>
  <div class="list-wrap">
    <h1>お気に入りホスト一覧</h1>
    <p class="list-sub">ブックマークした気になるホスト・体験</p>

    <?php if (empty($view)): ?>
      <div class="empty">まだお気に入りがありません</div>
    <?php else: ?>
      <?= $view ?>
    <?php endif; ?>

    <a href="index.php" class="back-link">▶ 登録画面に戻る</a>
  </div>
</body>
</html>