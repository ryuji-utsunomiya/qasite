<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
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
    
    <form method="post" action="insert2.php" enctype="multipart/form-data">
        <div class="jumbotron">
    <legend></legend>
     <label>質問のタイトル（50文字以内）：<input type="title" name="title"></label><br>
     <label>質問内容<input type="textarea" name="question"></label><br>
     <label>回答者の選択（今は実装しない）：<input type="text" name="select"></label><br>
     <label><input type="hidden" name="id" value="<?=$id?>"></label><br>
     <p>＊＊人の回答者候補がいます。質問を送信しますか？</p>
     <input type="submit" value="投稿" />
  </div>
</form>
    
</body>
</html>