<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TriArk | お気に入りホスト登録</title>
  <style>

* { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'Helvetica Neue', Arial, sans-serif;
      background: #f7f7f7;
      color: #1A2E3A;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: 100vh;
      padding: 40px 20px;
    }

    .fav-card {
      background: white;
      border-radius: 20px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.10);
      padding: 36px 32px;
      width: 100%;
      max-width: 440px;
    }

    .fav-card h1 {
      font-size: 24px;
      font-weight: bold;
      color: #1A2E3A;
      margin-bottom: 6px;
      letter-spacing: 1px;
    }

    .fav-sub {
      font-size: 13px;
      color: #888;
      margin-bottom: 28px;
    }

    .field { margin-bottom: 18px; }

    .field label {
      display: block;
      font-size: 13px;
      font-weight: bold;
      color: #1A2E3A;
      margin-bottom: 6px;
    }

    .field input,
    .field textarea {
      width: 100%;
      padding: 12px 14px;
      border: 1px solid #ddd;
      border-radius: 10px;
      font-size: 15px;
      color: #1A2E3A;
      font-family: inherit;
      outline: none;
      transition: border-color 0.2s;
      background: white;
    }

    .field input:focus,
    .field textarea:focus {
      border-color: #00B4C8;
    }

    .field textarea {
      resize: vertical;
      min-height: 80px;
    }

    .submit-btn {
      width: 100%;
      padding: 15px;
      margin-top: 8px;
      background: #FF8C42;
      color: white;
      border: none;
      border-radius: 30px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.2s, transform 0.1s;
    }

    .submit-btn:hover { background: #ff7a26; }
    .submit-btn:active { transform: scale(0.98); }

    .list-link {
      display: block;
      text-align: center;
      margin-top: 20px;
      font-size: 13px;
      color: #00B4C8;
      text-decoration: none;
    }

    .list-link:hover { text-decoration: underline; }
  </style>
</head>
<body>
  <div class="fav-card">
    <h1>お気に入りホスト登録</h1>
    <p class="fav-sub">気になるホスト・体験をブックマーク</p>

    <form action="insert.php" method="post">
      <div class="field">
        <label>ホスト名・体験名</label>
        <input type="text" name="host" required>
      </div>

      <div class="field">
        <label>URL</label>
        <input type="url" name="url" placeholder="https://...">
      </div>

      <div class="field">
        <label>お気に入りメモ</label>
        <textarea name="comment" placeholder="なぜ気になるか、メモを残しましょう"></textarea>
      </div>

      <button type="submit" class="submit-btn">登録する</button>
    </form>

    <a href="select.php" class="list-link">▶ お気に入り一覧を見る</a>
  </div>
</body>
</html>