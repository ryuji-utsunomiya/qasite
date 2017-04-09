<?php
//1. POSTデータ取得
$id   = $_POST["id"];
$title   = $_POST["title"];
$content   = $_POST["content"];
$reward   = $_POST["reward"];



//2. DB接続。レンタルサーバーの場合はhostはサーバーのmysqlのアドレス。root,空欄の部分はxammpの場合。tryはエラーが出たらcatchで拾ってくれる。エラーを表示したくないときは、exir(空欄)にする
try {
  $pdo = new PDO('mysql:dbname=qa_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO question_list(id, title, content, reward)VALUES(:id, :title, :content, :reward)");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->bindValue(':reward', $reward, PDO::PARAM_INT);

//$stmt->bindValue('sysdate())', $indate, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後。基本はこのまま。エラーを表示したくない場合のみ若干操作するかも。
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト.半角スペースが入る。header使ったらexitを使うのが風習。

  header("Location: top.php");
  exit;

}
?>
