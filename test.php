
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
        <link rel="stylesheet" href="css/test.css">
    <title>Document</title>

</head>

<body>

<ul id="nav">
<li><a href="#">Home</a>
</li>
<li><a href="#">Strategy</a>
	<ul>
	<li><a href="#">ログイン</a></li>
	<li><a href="#">マイページ</a>
		<li><a href="#">ログアウト</a>
		<ul>
		<li><a href="#">b2</a></li>
		<li><a href="#">b2</a></li>
		</ul>
	</li>
	</ul>
</li>
<li><a href="#">About</a>
	<ul>
	<li><a href="#">c1</a>
		<ul>
		<li><a href="#">c2</a></li>
		<li><a href="#">c2</a></li>
		</ul>
</li>
	<li><a href="#">c1</a></li>
	</ul>
</li>

<!--nav--></ul>
<div class="content">
<p>　通常の横並びドロップダウンメニューです。メニュー部分にマウスオーバーするとコンテンツの上に子メニューが展開します。</p>
<p>　子孫メニューの制御ははoverflowで行っております。displayでの制御も可能ですが、その場合はcontentプロパティで表示している▶矢印は見えなくなります。</p>
</div>
</body>

</html>