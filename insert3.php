
<?php
session_start();

//1.POSTでParamを取得

$id = $_POST["id"];
$answer   = $_POST["answer"];
$question_id   = $_POST["question_id"];
$indate = date("Y/m/d");
$user_id = $_SESSION["id"];//$_POST["user_id"];



//2. DB接続
try {
  $pdo = new PDO('mysql:dbname=qa_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

////////////qa_idを取得する部分/////////////////
//２．データ登録SQL作成
//$stmt = $pdo->prepare("select * from qa_list WHERE id=:id");
//$stmt->bindValue(":id",$id,PDO::PARAM_INT);
//$status = $stmt->execute();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO answer_list( indate, question_id, user_id, answer)VALUES( :indate, :question_id, :user_id, :answer)");
$stmt->bindValue(':indate', $indate, PDO::PARAM_INT);
$stmt->bindValue(':question_id', $question_id, PDO::PARAM_INT);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':answer', $answer, PDO::PARAM_STR);

$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
    
   header("Location: talk.php?id=$id");//元々か最新のIDを入れたい
    
  exit;
  }
?>