<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/style9.css">
<title>ログイン</title>
</head>
<body>

<header></header>

<div id="box_2">
    <form name="form1" action="login_act.php" method="post">
        <table>
            <tr>
                <td id="td1">メールアドレス）</td>
                <td><input type="text" name="email" id="text1"></td>
            </tr>
            <tr>
                <td id="td1">パスワード</td>
                <td><input type="text" name="pass" id="text1"></td>
            </tr>
        </table>
                <input type="submit" value="ログイン" id="login_button">
    </form>
   
    <p><a href="register.php">新規登録</a></p>
    <p><a href="pass_check.php">パスワードをお忘れですか？</a></p>
    <form action="top.php">
        <input type="button" value="トップページへ" id="top_btn">
    </form>
</div>
</body>
</html>