<?php
session_start();

//1. POSTデータ取得
$id   = $_POST["id"];
$title   = $_POST["title"];
$content   = $_POST["content"];
$reward   = $_POST["reward"];
$reward_pay   = $_POST["reward_pay"];
$indate = date("Y/m/d");
$user_id = $_SESSION["id"];

//2. DB接続
try {
  $pdo = new PDO('mysql:dbname=qa_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO question_list(id, indate, user_id, title, content, reward, reward_pay)VALUES(:id, :indate, :user_id, :title, :content, :reward, :reward_pay)");

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':indate', $indate, PDO::PARAM_INT);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->bindValue(':reward', $reward, PDO::PARAM_INT);
$stmt->bindValue(':reward_pay', $reward_pay, PDO::PARAM_STR);

$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．指定ページへリダイレクト.
  header("Location: ask_done.php");
  exit;
}
?>
