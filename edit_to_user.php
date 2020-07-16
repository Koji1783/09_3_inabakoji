<?php

session_start();

// 関数ファイルの読み込み
include('functions.php');

check_session_adminid ();

// idの受け取り
$id = $_GET['id'];

// DB接続
$pdo = connect_to_db();


// データ取得SQL作成
$sql = 'SELECT * FROM users_table WHERE id=:id';


// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は指定の11レコードを取得
  // fetch()関数でSQLで取得したレコードを取得できる
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザーに変更（編集画面）</title>
</head>

<body>
  <form action="update_to_user.php" method="POST">
    <fieldset>
      <legend>ユーザーに変更（編集画面）</legend>
      <a href="admin.php">一覧画面</a>
      <div>
      <?= $record["username"] ?>をユーザーにしますか？
      </div>
      <div>
        <button>submit</button>
      </div>
      <input type="hidden" name="id" value="<?= $record['id'] ?>">
    </fieldset>
  </form>

</body>

</html>