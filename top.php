<?php
////会員リストを表示する部分
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=qa_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}
//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM question_list");
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
    $view .=$res["title"]."<br>";
//    $view .='<p>'.$res["title"]." / ".$res["name"]." / ".$res["company"];
//    $view .='<a href="detail.php?id='.$res["id"].'">';
//    $view .= '  ';
//    $view .= " [編集] ";
//    $view .= '</a>'."/";
//    $view .= '<a href="delete.php?id='.$res["id"].'">';
//    $view .= " [削除] ";
//    $view .= '</a>';
//    $view .= "</p>";
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>ホーム</title>
</head>
    <body>
    <div id="box_1">
        <div id="service_name" >【サービス名】</div>
        <button id="menu_btn">MENU</button>
        <button id="login_btn">
            <a href="login.php">ログイン</a>
        </button>
    </div>
    <div id="box_2">
        <p id="top_msg">詳しい人に直接聞けるQ&Aサイト</p>
        <form id="register_btn" action="register.php">
            <button>新規会員登録</button>
        </form>
    </div>
    <div id="box_3">
        <form id="ask_btn" action="ask_form.php">
            <button>質問する</button>
        </form>
        <form id="ans_btn" action="answer_choice.php">
            <button>回答する</button>
        </form>
    </div>
    <div id="box_4">
        <div id="recent_question">
            <p>最近の質問</p>
            <p id="title"><?=$view?></p></div>
        <div id="ranking">
            <p>ランキング</p>
            <p>phpでDBからデータを読み出す（回答数順、貢献度順・・）</p>
        </div></div>
    <div id="box_5">
       <div id="bottom_link">
        <a href="http://gsacademy.tokyo/" id="text1">利用規約</a>
        <a href="http://gsacademy.tokyo/" id="text1">個人情報の取り扱いについて</a>
        <a href="http://gsacademy.tokyo/" id="text1">運営会社</a>
        </div>
    </div>
    
</body>
</html>