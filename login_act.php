<?php
session_start();

//0.外部ファイル読み込み
include("functions.php");

//フォームに入力がなかったらlogin.phpを再表示
//issetに！をつけて「setされていない場合」
if(
    !isset($_POST["email"]) || $_POST["email"]=="" ||
    !isset($_POST["pass"]) || $_POST["pass"]==""
){
    header("Location:login.php");
    exit();
}


//1.  DB接続します
$pdo = db_con();

//2. データ登録SQL作成
$sql = "SELECT * FROM user_table WHERE email=:email AND pass=:pass AND life_flg=0";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $_POST["email"]);
$stmt->bindValue(':pass', $_POST["pass"]);
$res = $stmt->execute();

//3. SQL実行時にエラーがある場合
if($res==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

//4. 抽出データ数を取得
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
$val = $stmt->fetch(); //1レコードだけ取得する方法

//5. 該当レコードがあればSESSIONに値を代入
if( $val["id"] != "" ){
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["id"]  = $val['id'];
  $_SESSION["admin"] = $val['admin'];
  $_SESSION["f_name"]      = $val['f_name'];
  header("Location:mypage.php");
}else{
  //logout処理を経由して前画面へ
  header("Location:login.php");
}

exit();
?>

