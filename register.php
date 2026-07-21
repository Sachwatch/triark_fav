<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TriArk | ユーザー登録</title>
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
    .field input {
      width: 100%; padding: 12px 14px; border: 1px solid #ddd;
      border-radius: 10px; font-size: 15px; color: #1A2E3A;
      font-family: inherit; outline: none; background: white;
    }
    .field input:focus { border-color: #00B4C8; }
    .submit-btn {
      width: 100%; padding: 15px; margin-top: 8px;
      background: #00B4C8; color: white; border: none;
      border-radius: 30px; font-size: 16px; font-weight: bold; cursor: pointer;
    }
    .submit-btn:hover { background: #0098a8; }
    .link { display: block; text-align: center; margin-top: 16px; font-size: 13px; color: #00B4C8; text-decoration: none; }
    .link:hover { text-decoration: underline; }
  </style>
</head>
<body>
  <div class="fav-card">
    <h1>ユーザー登録</h1>
    <p class="fav-sub">アカウントを作成してTriArkを使い始めましょう</p>

    <form method="POST" action="register_act.php">
      <div class="field">
        <label>ID</label>
        <input type="text" name="lid" required>
      </div>
      <div class="field">
        <label>パスワード</label>
        <input type="password" name="lpw" required>
      </div>
      <button type="submit" class="submit-btn">登録する</button>
    </form>

    <a href="login.php" class="link">▶ ログイン画面へ</a>
  </div>
</body>
</html>