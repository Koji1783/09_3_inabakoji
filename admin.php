<?php

session_start();

// 関数ファイルの読み込み
include('functions.php');

check_session_adminid ();

// 出力された結果を変数に定義
$pdo = connect_to_db();

// データ取得SQL作成
$sql = 'SELECT id, username, is_admin, is_deleted, created_at, updated_at FROM users_table';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  // fetchAll()関数でSQLで取得したレコードを配列で取得できる
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
  $output = "";
  // <tr><td>deadline</td><td>todo</td><tr>の形になるようにforeachで順番に$outputへデータを追加
  // `.=`は後ろに文字列を追加する，の意味
  foreach ($result as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["id"]}</td>";
    $output .= "<td>{$record["username"]}</td>";
    $output .= "<td class='center'>{$record["is_admin"]}</td>";
    $output .= "<td class='center'>{$record["is_deleted"]}</td>";
    $output .= "<td>{$record["created_at"]}</td>";
    $output .= "<td>{$record["updated_at"]}</td>";
    // edit deleteリンクを追加
    $output .= "<td class='fontsmall'><a href='edit_to_admin.php?id={$record["id"]}'>管理者に変更</a></td>";
    $output .= "<td class='fontsmall'><a href='edit_to_user.php?id={$record["id"]}'>ユーザーに変更</a></td>";
    $output .= "<td class='fontsmall'><a href='edit_to_avail.php?id={$record["id"]}'>アカウントを有効化</a></td>";
    $output .= "<td class='fontsmall'><a href='edit_to_unavail.php?id={$record["id"]}'>アカウントを無効化</a></td>";
    $output .= "<td class='fontsmall'><a href='delete.php?id={$record["id"]}'>アカウントを完全に削除</a></td>";
    $output .= "</tr>";
  }
  // $valueの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
  // 今回は以降foreachしないので影響なし
  unset($record);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>管理者画面</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <fieldset>
    <legend>ユーザーリスト（一覧画面）</legend>
    <a href="logout_admin.php">ログアウト</a>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>ユーザー名</th>
          <th>
            <p>ユーザー(0)</p>
            <p>管理者(1)</p>
          </th>
          <th>
            <p>アカウント有効(0)</p>
            <p>アカウント無効(1)</p>
          </th>
          <th>アカウント作成日</th>
          <th>ユーザー情報変更日</th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?= $output ?>
      </tbody>
    </table>
    <a href="create_account.php">ユーザーを追加</a>
  </fieldset>

</body>

</html>