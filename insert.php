<?php
//1. POSTデータ取得
$name   = $_POST["name"];
$company  = $_POST["company"];
$age = $_POST["age"];
//$indate = "aa";

//2. DB接続します（ここはコピペ。）レンタルサーバーの場合はhostはサーバーのmysqlのアドレス。root,空欄の部分はxammpの場合。tryはエラーが出たらcatchで拾ってくれる。エラーを表示したくないときは、exir(空欄)にする
try {
  $pdo = new PDO('mysql:dbname=qa_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO user_list(id, name, company, age )VALUES(NULL, :name, :company, :age )");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':company', $company, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':age', $age, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
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
    
    
    
  header("Location: top.php");
  exit;

}
?>
