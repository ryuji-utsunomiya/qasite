<?php//データの挿入

//2.DB接続
try {
  $pdo = new PDO('mysql:dbname=qa_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO user_table(id, l_name, f_name, l_kana, f_kana, user_name, email, email_check, b_year, b_month, b_day, sex, pass, pass_check)VALUES(:id, :l_name, :f_name, :l_kana, :f_kana, :user_name, :email, :email_check, :b_year, :b_month, :b_day, :sex, :pass, :pass_check )");

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':l_name', $l_name, PDO::PARAM_STR);
$stmt->bindValue(':f_name', $f_name, PDO::PARAM_STR);
$stmt->bindValue(':l_kana', $l_kana, PDO::PARAM_STR);
$stmt->bindValue(':f_kana', $f_kana, PDO::PARAM_STR);
$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':email_check', $email_check, PDO::PARAM_STR);
$stmt->bindValue(':b_year', $b_year, PDO::PARAM_INT);
$stmt->bindValue(':b_month', $b_month, PDO::PARAM_INT);
$stmt->bindValue(':b_day', $b_day, PDO::PARAM_INT);
$stmt->bindValue(':sex', $sex, PDO::PARAM_INT);
$stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
$stmt->bindValue(':pass_check', $pass_check, PDO::PARAM_STR);

//実行
$status = $stmt->execute();

if($status==false){//エラーがあるとき
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{//エラーがないとき
  header("Location: ask_done.php");
  exit;
}
?>


<?php//データの読み出し

//1.  DB接続
try {
  $pdo = new PDO('mysql:dbname=qa_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM user_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
    $res = $stmt->fetch();//1レコード取得する書き方
}
?>
