<?php
session_start();

//ログイン状態に応じたテキスト変更
    $text = "";
    $link = "";
    if(isset($_SESSION["email"] )){//ログイン判定に何の変数を使うのが良い？
    $text = "マイページ";
    $link = "mypage.php";
    }else{
    $text = "ログイン";
    $link = "login.php";
            }



$id = $_GET['id'];//top.phpからid取得
$login_user = $_SESSION["user_name"];


//1.  DB接続
try {
  $pdo = new PDO('mysql:dbname=qa_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}


////////質問の件名と内容を表示////////////////////////////////////////

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM question_list WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示

if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
    $res = $stmt->fetch();//1レコード取得する書き方
}
$user_id1 = $res["user_id"];
//////////////////////////////////////////////////////////////////
////////回答を表示/////////////////////////////////////////////////

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM answer_list WHERE question_id=$id");
$status = $stmt->execute();
//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{//Selectデータの数だけ自動でループ
    while( $res1 = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .=    '<div id="ans_box">'.$res1["answer"].'///回答者ID（名前に変換したい）：'.$res1["user_id"]. '</div>';
  }
}
//////////////////////////////////////////////////////////////////
////////質問投稿ユーザー名を表示/////////////////////////////////////////////////
//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM user_table WHERE id=$user_id1");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示

if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
    $res2 = $stmt->fetch();//1レコード取得する書き方
}

//////////////////////////////////////////////////////////////////
////////回答投稿ユーザー名を表示/////////////////////////////////////////////////
//２．データ登録SQL作成
$user_id =$_SESSION["id"];
$stmt = $pdo->prepare("SELECT * FROM user_table WHERE id=$user_id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示

if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
    $res3 = $stmt->fetch();//1レコード取得する書き方
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style5.css">
    <title>質問に回答する</title>
</head>
<body>
    <div id="box_1">
       <form action="top.php">
        <button id="service_name" >Brain Search</button>
        </form>
        <a href="#faq"><button id="menu_btn">よくある質問</button></a>
        <a href="#what"><button id="menu_btn">BRAIN SEARCHとは？</button></a>
        <form  action="<?=$link?>">
            <button id="login_btn" action="<?=$link?>">
                <?=$text?>
            </button>
        </form>
        <form  action="logout_act.php">
            <button id="login_btn" >
                ログアウト
            </button>
        </form>
    </div>
    
    <div id="box2">
        <div id="q_title">Q<?=$res["title"]?></div>
        <img src="image/plane_profile.gif" id="profile_img" alt="プロフィール画像を表示">
            <div>
                <p id="q_date"><?=$res["indate"]?></p>
                <p id="name_q">
                   <a href="mypage_public.php">
                    <?=$res2["user_name"]?>さん（投稿者ページにリンクさせたい）
                   </a>
                </p>
            </div>
        <div id="q_content"><?=$res["content"]?></div>
        <p>設定フラグ [今は実装しない]</p>
        <p>過去の回答</p>
        <?=$view?>
        <p>回答する [DBに記入/この画面上にも表示]</p>
        <form action="insert3.php" method="post">
            <textarea id="ans_box" cols="30" rows="10" name="answer"></textarea><br>
        <input type="submit" value="回答する">
        <input type="hidden" name="id" value="<?=$id?>">
        <input type="hidden" name="question_id" value="<?=$res["id"]?>">
        <input type="hidden" name="user_id" value="<?=$res["user_id"]?>">
        </form>
        <form action="solved.php" method="post">
            <input type="submit" value="解決した">
        <input type="hidden" name="id" value="<?=$res["id"]?>">
        </form>

        </div>
    </body>
</html>