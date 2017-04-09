<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style4.css">
    <title>質問入力ページ</title>
</head>
<body>
        <div id="box_1">
        <div id="service_name" >【サービス名】</div>
        <button id="menu_btn">MENU</button>
        <button id="login_btn">
            <a href="login.php">ログイン</a>
        </button>
    </div>
    
    <form method="post" action="insert2.php">
        <div>
    <legend></legend>
     <label>質問のタイトル（50文字以内）<br><input type="title" name="title" id="title"></label><br>
     <label>質問内容（1000文字以内）※上詰めにする<br>
     <input type="textarea" name="content" id="content"></label><br>
     
     <label>報酬<br><input type="textarea" name="reward">コイン</label><br>
     <br><label>回答者の選択（今は実装しない）：<input type="text" name="select"></label><br>
     <label><input type="hidden" name="id" value="<?=$id?>"></label><br>
     <p>＊＊人の回答者候補がいます。質問を送信しますか？</p>
     <input type="submit" value="送信" />
  </div>
</form>
    
</body>
</html>