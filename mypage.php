
<?php
    session_start();

$id = $_POST["id"]; //$_POST["id"];//ここがID引き継げていない

//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=qa_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM user_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
    $res = $stmt->fetch();//1レコード取得する書き方
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
    <title>マイページ</title>
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

<form method="post" action="insert.php" enctype="multipart/form-data">
    <div>
    <legend></legend>
     <label>氏名：
         姓<input type="text" name="l_name" value="<?=$res["l_name"]?>">
         名<input type="text" name="f_name" value="<?=$res["f_name"]?>">
     </label><br>
     <label>氏名（フリガナ）：
         姓<input type="text" name="l_kana" value="<?=$res["l_kana"]?>">
         名<input type="text" name="f_kana" value="<?=$res["f_kana"]?>">
     </label><br>
     <label>メールアドレス：<input type="text" name="email" value="<?=$res["email"]?>"></label><br>
     <label>メールアドレス（確認）：<input type="text" name="email_check" value="<?=$res["email_check"]?>"></label><br>
     <label>生年月日：<input type="text" name="" value="<?=$res["b_year"]?>年<?=$res["b_month"]?>月<?=$res["b_day"]?>日">
     </label><br>
     <label>性別：
         <input type="text" name="" value="<?=$res["sex"]?>">
        
     </label><br>
     <label><input type="hidden" name="id" value="<?=$id?>"></label><br>
     <input type="submit" value="送信">
  </div>
</form>

    
</body>
</html>





