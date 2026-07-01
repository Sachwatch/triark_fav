<?php
require_once('funcs.php');   // XSS対策の h() を使うため読み込む
require_once('db_config.php');

// 1. DB接続
try {
$pdo = new PDO("mysql:host={$db_host};dbname={$db_name};charset=utf8", $db_user, $db_pass);} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}

// 2. データ取得SQL作成
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