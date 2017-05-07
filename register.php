
<?php
//ログイン状態に応じたテキスト変更
    session_start();
    $text = "";
    $link = "";
    if(isset($_SESSION["email"] )){//ログイン判定に何の変数を使うのが良い？
    $text = "マイページ";
    $link = "mypage.php";
    }else{
    $text = "ログイン";
    $link = "login.php";
            }



?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style6.css">
    <title>会員登録フォーム</title>
</head>
<body>
    <div id="box_1">
       <form action="top.php">
        <button id="service_name" >Brain Search</button>
        </form>
        <a href="#faq"><button id="menu_btn">よくある質問</button></a>
        <a href="#what"><button id="menu_btn">BRAIN SEARCHとは？</button></a>
        <form  action="<?=$link?>">
            <button id="login_btn" action="<?=$link?>">
                <?=$text?>
            </button>
        </form>
        <form  action="logout_act.php">
            <button id="login_btn" >
                ログアウト
            </button>
        </form>
    </div>
    <div id="box_2">
        <p>こちらのプライバシーポリシーに同意の上、下記のフォームにご記入ください。</p>
        <form method="post" action="insert.php" enctype="multipart/form-data">
        <table id="table1" >
             <tr>
                 <td>氏名：</td>
                 <td>姓<input type="text" name="l_name"><br>
                     名<input type="text" name="f_name"></td>
             </tr>
             <tr>
                 <td>氏名（フリガナ）：</td>
                 <td>姓<input type="text" name="l_kana"><br>
                     名<input type="text" name="f_kana"></td>
             </tr>
             <tr>
                 <td>ユーザー名：</td>
                 <td><input type="text" name="user_name"></td>
             </tr>
             <tr>
                 <td>メールアドレス：</td>
                 <td><input type="text" name="email"></td>
             </tr>
             <tr>
                 <td>メールアドレス（確認）：</td>
                 <td><input type="text" name="email_check"></td>
             </tr>
             <tr>
                 <td  id="td1">生年月日：</td>
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
             <tr><td>性別：</td>
                 <td>
                     <select name="sex">選択
                         <option value="">--</option>
                         <option value="男性">男性</option>
                         <option value="女性">女性</option>
                     </select>
                 </td>
             </tr>
             <tr><td>パスワード：</td>
                 <td><input type="text" name="pass"></td>
             </tr>
             <tr><td>パスワード（確認）：</td>
                 <td><input type="text" name="pass_check"></td>
             </tr>
         </table>
         <div id="box_3">
             <input type="hidden" name="id" value="<?=$id?>"><br>
<!--             <input type="file" name="filename" value=""><br>-->

         </div>
	<label for="upload">画像のアップロード</label>
	<input type="file" name="upfile" size="30" id="upload">

                       <input type="submit" value="送信" id="submit_btn">
                        </form>




   
   
    </div>
    
</body>
</html>





