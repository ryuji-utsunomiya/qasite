<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>ログイン</title>
</head>
<body>

<header>LOGIN</header>

<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form name="form1" action="login_act.php" method="post">
ID:<input type="text" name="email">
PW:<input type="text" name="pass">
<input type="submit" value="LOGIN">
</form>
    <a href="register.php">新規登録</a>
    <a href="pass_check.php">パスワードをお忘れですか？</a>

</body>
</html>