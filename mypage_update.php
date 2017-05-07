
<?php
    session_start();

$id = $_SESSION["id"];

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
        <link rel="stylesheet" href="css/style2.css">
    <title>マイページ</title>
</head>
<body>
    <div id="box_1">
       <form action="top.php">
        <button id="service_name" >Brain Search</button>
        </form>
                <button id="menu_btn">よくある質問</button>
        <a href="#what"><button id="menu_btn">BRAIN SEARCHとは？</button></a>
        <form  action="login.php">
            <button id="login_btn" action="login.php">ログイン（ログイン中はマイページの表記に）</button>
        </form>
    </div>

    <form method="post" action="insert4.php" enctype="multipart/form-data">
           <div id="box_2">


        <table id="table_1">
             <tr>
                 <td id="td1">姓</td>
                 <td><input type="text" name="l_name" value="<?=$res["l_name"]?>"></td>
             </tr>
             <tr>
                 <td id="td1">名</td>
                 <td><input type="text" name="f_name" value="<?=$res["f_name"]?>"></td>
             </tr>
             <tr>
                 <td id="td1">姓（フリガナ）</td>
                 <td><input type="text" name="l_kana" value="<?=$res["l_kana"]?>"></td>
             </tr>
             <tr>
                 <td id="td1">名（フリガナ）</td>
                 <td><input type="text" name="f_kana" value="<?=$res["f_kana"]?>"></td>
             </tr>
             <tr>
                 <td id="td1">ユーザーネーム</td>
                 <td><p><?=$res["user_name"]?></p></td>
             </tr>
             <tr>
                 <td id="td1">メールアドレス</td>
                 <td><input type="text" name="email" value="<?=$res["email"]?>"></td>
             </tr>
             <tr>
                 <td id="td1">メールアドレス（確認）</td>
                 <td><input type="text" name="email_check" value="<?=$res["email_check"]?>"></td>
             </tr>
             <tr>
                 <td id="td1">生年月日</td>
                 <td>
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
                </td>
             </tr>
             <tr>
                 <td id="td1">性別</td>
                 <td>
                     <select name="sex" id="">
                        <option value="男女"><?=$res["sex"]?></option>
                         <option value="男性">男性</option>
                         <option value="女性">女性</option>
                     </select>
                     <tr>
                         <td>パスワード</td>
                         <td><input type="text" name="pass" value="<?=$res["pass"]?>"></td>
                     </tr>
                     <tr>
                         <td>パスワード（確認）</td>
                         <td><input type="text" name="pass_check" value="<?=$res["pass_check"]?>"></td>
                     </tr>
                 </td>
             </tr>
             <tr>
                 <td></td>
                 <td></td>
             </tr>

             
         </table>
        
     <input type="hidden" name="id" value="<?=$id?>">
     <input type="submit" value="更新" id="submit_btn">
      </div>
</form>


    
</body>
</html>





