<?php

// var_dump($_GET);
// exit();

// 関数ファイルの読み込み
include('functions.php');


// GETデータ取得
$user_id = $_GET['user_id'];
$comment_id = $_GET['comment_id'];

// DB接続
$pdo = connect_to_db();

// いいね状態のチェック(COUNTで件数を取得できる!)
$sql = 'SELECT COUNT(*) FROM like_sns_table WHERE user_id=:user_id AND comment_id=:comment_id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':comment_id', $comment_id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
    // エラー処理
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
} else {
    $like_count = $stmt->fetch();
    // var_dump($like_count[0]);
    // exit();

    // いいねしていれば削除，していなければ追加のSQLを作成
    if ($like_count[0] != 0) {
        $sql = 'DELETE FROM like_sns_table WHERE user_id=:user_id AND comment_id=:comment_id';
    }else{
        // SQL作成
        $sql = 'INSERT INTO like_sns_table(id, user_id, comment_id, created_at)VALUES(NULL, :user_id, :comment_id, sysdate())';
    }
    
    // SQL実行
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindValue(':comment_id', $comment_id, PDO::PARAM_INT);
    $status = $stmt->execute();

    if ($status == false) {
        // エラー処理
        $error = $stmt->errorInfo();
        echo json_encode(["error_msg" => "{$error[2]}"]);
        exit();
    } else {
        header('Location:select3.php');
    }
    
}

