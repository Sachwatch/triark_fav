<?php
require_once('funcs.php');

$id = $_GET['id'];

// DB接続
$pdo = db_conn();

// 2.SQL作成(idで1件だけ取得)
$stmt = $pdo->prepare("SELECT * FROM triark_favorites WHERE id = :id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

// 3.SQL実行
$status = $stmt->execute();

// 4.実行後の処理
$result = '';
if ($status === false) {
    sql_error($stmt);
} else {
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TriArk | お気に入り編集</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Helvetica Neue', Arial, sans-serif;
      background: #f7f7f7; color: #1A2E3A;
      display: flex; justify-content: center; align-items: flex-start;
      min-height: 100vh; padding: 40px 20px;
    }
    .fav-card {
      background: white; border-radius: 20px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.10);
      padding: 36px 32px; width: 100%; max-width: 440px;
    }
    .fav-card h1 { font-size: 24px; font-weight: bold; margin-bottom: 6px; letter-spacing: 1px; }
    .fav-sub { font-size: 13px; color: #888; margin-bottom: 28px; }
    .field { margin-bottom: 18px; }
    .field label { display: block; font-size: 13px; font-weight: bold; margin-bottom: 6px; }
    .field input, .field textarea {
      width: 100%; padding: 12px 14px; border: 1px solid #ddd;
      border-radius: 10px; font-size: 15px; color: #1A2E3A;
      font-family: inherit; outline: none; background: white;
    }
    .field input:focus, .field textarea:focus { border-color: #00B4C8; }
    .field textarea { resize: vertical; min-height: 80px; }
    .submit-btn {
      width: 100%; padding: 15px; margin-top: 8px;
      background: #00B4C8; color: white; border: none;
      border-radius: 30px; font-size: 16px; font-weight: bold; cursor: pointer;
    }
    .submit-btn:hover { background: #0098a8; }
    .list-link { display: block; text-align: center; margin-top: 20px; font-size: 13px; color: #00B4C8; text-decoration: none; }
  </style>
</head>
<body>
  <div class="fav-card">
    <h1>お気に入り編集</h1>
    <p class="fav-sub">登録済みの内容を修正できます</p>

    <form method="POST" action="update.php">
      <div class="field">
        <label>ホスト名・体験名</label>
        <input type="text" name="host" value="<?= h($result['host']) ?>" required>
      </div>
      <div class="field">
        <label>URL</label>
        <input type="url" name="url" value="<?= h($result['url']) ?>">
      </div>
      <div class="field">
        <label>お気に入りメモ</label>
        <textarea name="comment"><?= h($result['comment']) ?></textarea>
      </div>

      <input type="hidden" name="id" value="<?= h($result['id']) ?>">
      <button type="submit" class="submit-btn">更新する</button>
    </form>

    <a href="select.php" class="list-link">▶ 一覧に戻る</a>
  </div>
</body>
</html>