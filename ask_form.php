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
    <link rel="stylesheet" href="css/style4.css">
    <title>質問入力ページ</title>
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
        <form method="post" action="insert2.php">
            <div id="box_2">
                <table>
                    <tr>
                        <td id="td1" >質問のタイトル</td>
                        <td><input type="title" name="title" id="title"></td>
                    </tr>
                    <tr>
                        <td id="td1">質問内容</td>
                        <td>
                            <textarea name="content" id="" cols="75" rows="10"></textarea>
                        </td>
                        
                    </tr>
                    <tr>
                        <td id="td1">総報酬（解決時に消費されるコイン数です）</td>
                        <td>
                            <select name="reward" id="coin" >
                                 <option value="10">10 BC</option>
                                 <option value="25">25 BC</option>
                                 <option value="25">50 BC</option>
                                 <option value="25">100 BC</option>
                                 <option value="25">250 BC</option>
                                 <option value="25">500 BC</option>
                            </select>
                            <p>＊＊さんは現在＊＊BC持っています。</p>
                        </td>
                    </tr>
                    <tr>
                        <td id="td1">報酬の分配方法</td>
                        <td>
                            <select name="reward_pay" id="reward_pay">
                                 <option value="ベストアンサーのみ">ベストアンサーのみ（解決時に1名選択）</option>
                                 <option value="貢献度順">貢献度順（解決時に複数名選択）</option>
                                 <option value="山分け">山分け（無効回答以外全員に分配）</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td id="td1">回答者の選択（今は実装しない/別ページにした方が良い？）</td>
                        <td><input type="text" name="select"></td>
                    </tr>
                    <tr>
                        <td id="td1">質問の掲載期間</td>
                        <td>質問の投稿時点から7日間</td>
                    </tr>
            </table>
                    <input type="hidden" name="id" value="<?=$id?>">
                     <div id="box_3">
                     <p id="conf_msg">＊＊人の回答者候補がいます。質問を送信しますか？</p>
             <input type="submit" value="送信" id="submit_btn">
        
        </div>
            </div>
    </form>
    
</body>
</html>