
<?php

//1.  DB接続
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
    $view .= '<div id="q_box">';
    $view .=    '<div id="q_title">'.'<a href="talk.php?id='.$res["id"].'">'.$res["title"].'</a>'. '</div>';
    $view .=    '<div id="q_reward"><img src="image/coin.jpg" alt="コイン" id="coin">'.$res["reward"]. " BC".'</div>';
    $view .=    '<div id="q_content">'.$res["content"]. '</div>';
    $view .=    '<div id="q_indate">'.$res["indate"]. '</div>';
    $view .= '</div>'."<br>";
  }
}

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
    <div id="box_2">
        <p id="top_msg">詳しい人に直接聞ける<br>ビジネスマンのためのQ&Aサイト</p>
        <form action="register.php">
            <button id="register_btn">新規会員登録</button>
        </form>
    </div>
    <div id="box_3">
        <form action="ask_form.php" method="post">
            <button id="ask_btn">質問する</button>
        </form>
        <form id="ans_btn" action="answer_choice.php">
            <button id="ans_btn">回答する</button>
        </form>
    </div>
    <div id="box_4">
        <div id="recent_question_title">最近の質問</div>
           <div><?=$view?></div>
        </div>
        
        <a name="what">Brain Searchとは？</a>
        <p>あなたの疑問に的確に答えてくれそうな人に直接質問できるQ&Aサービスです。</p>
        
        <div id="container1">
            <div id="point1">基本利用料無料</div>
            <div id="point2">役に立つ回答だけ</div>
            <div id="point3">質問に答えてコインがもらえる</div>
        </div>
        <p>たとえばこんな時！</p>
        <p>＊＊＊が知りたい</p>
        <p>＊＊＊を教えて欲しい</p>
        <p id="faq">よくある質問</p>
        
        
        
    <div id="box_5">
       <div id="bottom_link">
        <a href="" id="text1">利用規約</a>
        <a href="" id="text1">個人情報の取り扱いについて</a>
        <a href="" id="text1">運営会社</a>
        </div>
    </div>
    
</body>
</html>