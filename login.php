<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <div>
                アカウント作成は<a href="create_account.php">こちら</a>
            </div>
        </nav>
    </header>

    <form action="login_act.php" method="post">
        <div>
            <fieldset>
                <legend>ログイン画面</legend>
                <label>ユーザー名：<input type="text" name="username"></label>
                <label>PW：<input type="text" name="password"></label>
                <input type="submit" value="ログイン">
            </fieldset>
        </div>
    </form>


    <footer>
        <a href="login_admin.php">管理画面</a>
    </footer>
</body>
</html>