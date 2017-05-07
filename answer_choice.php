<?php

//ログイン状態に応じたテキスト変更
    session_start();
    $text = "";
    $link = "";
    if(isset($_SESSION["email"] )){//ログイン判定に何の変数を使うのが良い？
    $text = "マイページ";
    $link = "mypage.php";
    }else{
    $text = "ログイン";
    $link = "login.php";
            }


////会員リストを表示する部分
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=qa_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}
//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM question_list ORDER BY id DESC LIMIT 5");
$status = $stmt->execute();
//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .=    '<div><p id="q_title">'.'<a href="talk.php?id='.$res["id"].'">'.$res["title"].'</a>'. '</p>';
    $view .=    '<p id="q_reward">'."/ ".$res["reward"]. " BC"." / ".$res["indate"].'</p></div>';
  }
}

?>



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style3.css">
    <title>質問を選択</title>
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
    <p>あなたが回答できそうな質問（とりあえずのロジックはフラグのマッチ数順）</p>
    <div id="textbox1">
        <p>ああああ（DBから引っ張る（タイトル/日時/回答数/報酬/など））</p>
        <p>いいいい（DBから引っ張る（タイトル/日時/回答数/報酬/など））</p>
        <p>うううう（DBから引っ張る（タイトル/日時/回答数/報酬/など））</p>
        <p>ええええ（DBから引っ張る（タイトル/日時/回答数/報酬/など））</p>
        <p>おおおお（DBから引っ張る（タイトル/日時/回答数/報酬/など））</p>
    </div>
    <p>最近の質問</p>
    <div id="textbox2">
        <?=$view?>
    </div>
    <p>質問を探す</p>
    <div id="textbox3">キーワードやチェック項目で探せるように</div>
    </div>
</body>
</html>