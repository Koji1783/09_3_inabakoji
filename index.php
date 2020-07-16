<?php
session_start();

// 関数ファイルの読み込み
include('functions.php');

check_session_id ();

// DB接続
$pdo = connect_to_db();
$output = $_SESSION["username"];

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>トップページ</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
        <nav>
            <div>
                <a href="logout.php">ログアウト</a>
            </div>
            <?= $output?>さん、こんにちは。
            <a href="mypage.php">マイページ</a>
        </nav>
    </header>
    <form action="select_origin.php" method="POST">
    <fieldset>
      <legend>創始者を調べる</legend>
      <div>
        <input type="text" name="origin_word">という言葉を最初に発言した人を<button class="btn slide-bg">チェック</button>
      </div>
    </fieldset>
  </form>


  <form action="insert3.php" method="POST">
    <fieldset>
      <legend>投稿する（お題３）</legend>
      <a href="select3.php" class="btn cubic"><span class="hovering">確認</span><span class="default">みんなの投稿</span></a>
      <div>
        コメント: <textarea name="comment" cols="40" rows="10"></textarea>
      </div>
      <div>
        ハッシュタグ: <textarea name="hashtag" cols="35" rows="1"></textarea>
      </div>
      <div>
      <button class="btn slide-bg">投稿</button>
      </div>
    </fieldset>
  </form>


  <form action="insert2.php" method="POST">
    <fieldset>
      <legend>投稿する（お題２）</legend>
      <a href="select2.php" class="btn cubic"><span class="hovering">確認</span><span class="default">みんなの投稿</span></a>
      <div>
        コメント: <textarea name="comment" cols="40" rows="10"></textarea>
      </div>
      <div>
        ハッシュタグ: <textarea name="hashtag" cols="35" rows="1"></textarea>
      </div>
      <div>
      <button class="btn slide-bg">投稿</button>
      </div>
    </fieldset>
  </form>


  <form action="insert1.php" method="POST">
    <fieldset>
      <legend>投稿する（お題１）</legend>
      <a href="select1.php" class="btn cubic"><span class="hovering">確認</span><span class="default">みんなの投稿</span></a>
      <div>
        コメント: <textarea name="comment" cols="40" rows="10"></textarea>
      </div>
      <div>
        ハッシュタグ: <textarea name="hashtag" cols="35" rows="1"></textarea>
      </div>
      <div>
      <button class="btn slide-bg">投稿</button>
      </div>
    </fieldset>
  </form>


</body>

</html>

