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
            <p>phpでDBからデータを読み出す</p>
        </div>
        <div id="ranking">
            <p>ランキング</p>
            <p>phpでDBからデータを読み出す</p>
        </div>
    </div>
    <div id="box_5">
       <div id="bottom_link">
        <a href="http://gsacademy.tokyo/" id="text1">利用規約</a>
        <a href="http://gsacademy.tokyo/" id="text1">個人情報の取り扱いについて</a>
        <a href="http://gsacademy.tokyo/" id="text1">運営会社</a>
        </div>
    </div>
    
    
</body>
</html>