<?php
//1. POSTデータ取得
$id   = $_POST["id"];
$l_name   = $_POST["l_name"];
$f_name   = $_POST["f_name"];
$l_kana   = $_POST["l_kana"];
$f_kana   = $_POST["f_kana"];
$email   = $_POST["email"];
$email_check   = $_POST["email_check"];
$b_year   = $_POST["b_year"];
$b_month   = $_POST["b_month"];
$b_day   = $_POST["b_day"];
$sex   = $_POST["sex"];
$pass   = $_POST["pass"];
$pass_check   = $_POST["pass_check"];


//2. DB接続。レンタルサーバーの場合はhostはサーバーのmysqlのアドレス。root,空欄の部分はxammpの場合。tryはエラーが出たらcatchで拾ってくれる。エラーを表示したくないときは、exir(空欄)にする
try {
  $pdo = new PDO('mysql:dbname=qa_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


$stmt = $pdo->prepare("UPDATE user_table SET l_name=:l_name, f_name=:f_name, l_kana=:l_kana, f_kana=:f_kana, email=:email, email_check=:email_check, b_year=:b_year, b_month=:b_month, b_day=:b_day, sex=:sex, pass=:pass, pass_check=:pass_check  WHERE id=:id");
$stmt->bindValue(':l_name', $l_name);
$stmt->bindValue(':f_name', $f_name);
$stmt->bindValue(':l_kana', $l_kana);
$stmt->bindValue(':f_kana', $f_kana);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':email_check', $email_check);
$stmt->bindValue(':b_year', $b_year);
$stmt->bindValue(':b_month', $b_month);
$stmt->bindValue(':b_day', $b_day);
$stmt->bindValue(':sex', $sex);
$stmt->bindValue(':pass', $pass);
$stmt->bindValue(':pass_check', $pass_check);
$stmt->bindValue(':id', $id);
$status = $stmt->execute();


//$stmt->bindValue('sysdate())', $indate, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後。基本はこのまま。エラーを表示したくない場合のみ若干操作するかも。
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト.半角スペースが入る。header使ったらexitを使うのが風習。
    
    
    
    //画像アップロード
    if(isset($_FILES['filename']) && $_FILES['filename']['error']==0){
    
    //2. アップロード先とファイル名を作成
    $upload_file = "./upload/".$_FILES["filename"]["name"];
    
    // アップロードしたファイルを指定のパスへ移動
    //move_uploaded_file("一時保存場所","成功後に正しい場所に移動");
    if (move_uploaded_file($_FILES["filename"]['tmp_name'],$upload_file)){
        
        //パーミッションを変更（ファイルの読み込み権限を付けてあげる）
        chmod($upload_file,0644);
    }else{
        echo "fileuploadOK...Failed";
    }
}else{
    echo "fileupload失敗";
}
    
    
    
  header("Location: update_done.php");
  exit;

}
?>
