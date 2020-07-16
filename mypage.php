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

$username = $_SESSION["username"];

// データ取得SQL作成
// $sql = 'SELECT * FROM sns_table WHERE g_id=2';
$sql = "SELECT COUNT(username) AS post_cnt FROM sns_table WHERE username = :username";
// $sql = "SELECT COUNT(cnt) AS like_cnt FROM sns_table LEFT OUTER JOIN (SELECT comment_id, COUNT(id) AS cnt FROM like_sns_table GROUP BY comment_id) AS likes ON sns_table.id = likes.comment_id WHERE username = :username";

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $_SESSION["username"], PDO::PARAM_STR);
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
    $output .= "<td>{$username}</td>";
    $output .= "<td>{$record["post_cnt"]}</td>";
  }

    $sql2 = "SELECT COUNT(cnt) AS like_cnt FROM sns_table LEFT OUTER JOIN (SELECT comment_id, COUNT(id) AS cnt FROM like_sns_table GROUP BY comment_id) AS likes ON sns_table.id = likes.comment_id WHERE username = :username";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindValue(':username', $_SESSION["username"], PDO::PARAM_STR);
    $status2 = $stmt2->execute();

    // データ登録処理後
    if ($status2 == false) {
        // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
        $error = $stmt2->errorInfo();
        exit('sqlError:'.$error[2]);
    
    
    } else {
        // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
        // fetchAll()関数でSQLで取得したレコードを配列で取得できる
        $result = $stmt2->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
        foreach ($result as $record) {
        $output .= "<td>{$record["like_cnt"]}</td>";
        $output .= "</tr>";
        }
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
  <legend>あなたのアカウント</legend>
    <a href="index.php">入力画面に戻る</a>
    <table>
      <thead>
        <tr>
          <th>名前</th>
          <th>投稿数</th>
          <th>累計いいね数</th>
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