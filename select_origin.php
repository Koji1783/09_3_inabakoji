<?php
session_start();

// 関数ファイルの読み込み
include('functions.php');

check_session_id ();
// 項目入力のチェック
// 値が存在しないor空で送信されてきた場合はNGにする
if (!isset($_POST['origin_word']) || $_POST['origin_word']==''){
  exit('ParamError');
}


$pdo = connect_to_db();


// データ取得SQL作成
$sql = 'SELECT * FROM sns_table WHERE comment OR hashtag LIKE :o_word';


// SQL準備&実行
$stmt = $pdo->prepare($sql);

$o_word = $_POST["origin_word"];
$o_word = '%'.$o_word.'%';
$stmt->bindParam(':o_word', $o_word, PDO::PARAM_STR);

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
    $output .= "<td>{$record["commentdate"]}</td>";
    $output .= "</tr>";
  }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>創始者は誰だ（一覧画面）</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <fieldset>
    <legend>創始者は誰だ（一覧画面）</legend>
    <a href="index.php">入力画面に戻る</a>
    <table>
      <thead>
        <tr>
          <th>名前</th>
          <th>コメント</th>
          <th>ハッシュタグ</th>
          <th>投稿時間</th>
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