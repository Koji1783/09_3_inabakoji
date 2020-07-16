<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者ログイン画面</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form action="login_admin_act.php" method="post">
        <div>
            <fieldset>
                <legend>管理者ログイン画面</legend>
                <label>ユーザー名：<input type="text" name="username"></label>
                <label>PW：<input type="text" name="password"></label>
                <input type="submit" value="ログイン">
            </fieldset>
        </div>
    </form>

    <a href="login.php">戻る</a>
</body>
</html>