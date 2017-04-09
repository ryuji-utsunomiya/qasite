
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
            <a href="login.php">ログイン</a>
        </button>
    </div>
    <div id="box_2">
        <p>こちらのプライバシーポリシーに同意の上、下記のフォームにご記入ください。</p>


<form method="post" action="insert.php" enctype="multipart/form-data">
    <div>
    <legend></legend>
     <label>氏名：
         姓<input type="text" name="l_name">
         名<input type="text" name="f_name">
     </label><br>
     <label>氏名（フリガナ）：
         姓<input type="text" name="l_kana">
         名<input type="text" name="f_kana">
     </label><br>
     <label>メールアドレス：<input type="text" name="email"></label><br>
     <label>メールアドレス（確認）：<input type="text" name="email_check"></label><br>
     <label>生年月日：
        <select name="b_year">
            <option >年</option>
            <?php foreach(range(1900,2017) as $b_year): ?>
                <option value="<?=$b_year?>"><?=$b_year?>年</option>
            <?php endforeach; ?>
        </select>
         <select name="b_month">
            <option>月</option>
            <?php foreach(range(1,12) as $b_month): ?>
                <option value="<?=$b_month?>"><?=$b_month?>月</option>
            <?php endforeach; ?>
        </select>
         <select name="b_day">
            <option>日</option>
            <?php foreach(range(1,31) as $b_day): ?>
                <option value="<?=$b_day?>"><?=$b_day?>日</option>
            <?php endforeach; ?>
        </select>
     </label><br>
     <label>性別：
         <select name="sex">選択
             <option value="">--</option>
             <option value="男性">男性</option>
             <option value="女性">女性</option>
         </select>
         <label>パスワード：<input type="text" name="pass"></label><br>
         <label>パスワード（確認）：<input type="text" name="pass_check"></label><br>
         
     </label><br>
     <label><input type="hidden" name="id" value="<?=$id?>"></label><br>
     <input type="file" name="filename" value=""><br>
     <input type="submit" value="送信">
  </div>
</form>

    </div>
    
</body>
</html>





