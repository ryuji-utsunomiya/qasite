
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div id="box_1">
        <div id="service_name" >【サービス名】</div>
        <button id="menu_btn">MENU</button>
        <button id="login_btn">
            <a href="login.html">ログイン</a>
        </button>
    </div>
    <div id="box_2">
        <p>こちらのプライバシーポリシーに同意の上、下記のフォームにご記入ください。</p>


<form method="post" action="insert.php" enctype="multipart/form-data">
        <div class="jumbotron">
    <legend></legend>
     <label>氏名：<input type="text" name="name"></label><br>
     <label>会社名：<input type="text" name="company"></label><br>
     <label>年齢：<input type="text" name="age"></label><br>
     <label><input type="hidden" name="id" value="<?=$id?>"></label><br>
     <input type="file" name="filename" value=""><br>
     <input type="submit" value="送信">
  </div>
</form>

    </div>
    
</body>
</html>





