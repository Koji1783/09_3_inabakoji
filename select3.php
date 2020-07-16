<?php
// DB接続の設定
// DB名は`gsacf_x00_00`にする
session_start();

// 関数ファイルの読み込み
include('functions.php');

check_session_id ();

// ユーザ名取得
$user_id = $_SESSION['id'];


$pdo = connect_to_db();

// データ取得SQL作成
// $sql = 'SELECT * FROM sns_table WHERE g_id=2';
$sql = 'SELECT * FROM sns_table LEFT OUTER JOIN (SELECT comment_id, COUNT(id) AS cnt FROM like_sns_table GROUP BY comment_id) AS likes ON sns_table.id = likes.comment_id WHERE g_id=3';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();


// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  exit('sqlError:'.$error[2]);


} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  // fetchAll()関数でSQLで取得したレコードを配列で取得できる
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
  $output = "";
  // <tr><td>deadline</td><td>todo</td><tr>の形になるようにforeachで順番に$outputへデータを追加
  // `.=`は後ろに文字列を追加する，の意味
  foreach ($result as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["username"]}</td>";
    $output .= "<td>{$record["comment"]}</td>";
    $output .= "<td>{$record["hashtag"]}</td>";
    $output .= "<td><a href='like_create3.php?user_id={$user_id}&comment_id={$record["id"]}'>like{$record["cnt"]}</a></td>";
    $output .= "</tr>";
  }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>みんなの投稿（一覧画面）</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <fieldset>
  <legend>みんなの投稿欄（一覧画面）</legend>
    <a href="index.php">入力画面に戻る</a>
    <table>
      <thead>
        <tr>
          <th>名前</th>
          <th>コメント</th>
          <th>ハッシュタグ</th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>