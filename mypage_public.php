
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
        <link rel="stylesheet" href="css/style7.css">
    <title>ユーザーページ</title>
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

           <div id="box_2">
        <table id="table_1">
             <tr>
                 <td id="td1">ユーザーネーム</td>
                 <td><p><?=$res["user_name"]?></p></td>
             <tr>
                 <td id="td1">性別</td>
                 <td>
                     <p><?=$res["sex"]?>
                 </td>
             </tr>
             <tr>
                 <td></td>
                 <td></td>
             </tr>

             
         </table>
        
     <input type="hidden" name="id" value="<?=$id?>">
             <form  action="mypage_update.php">
     <button id="submit_btn" >戻る（前のペジに戻りたい）</button>
             </form>
      </div>


    
</body>
</html>





