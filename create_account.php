<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント作成</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form action="create_account_act.php" method="post">
        <div>
            <fieldset>
                <legend>アカウント作成</legend>
                <div>
                    <label>ユーザー名：<input type="text" name="username"></label>
                    <label>PW：<input type="text" name="password"></label>
                </div>
                <div>
                    <input type="submit" value="アカウントを作成">
                </div>
            </fieldset>
        </div>
    </form>
    <a href="login.php">戻る</a>
</body>
</html>