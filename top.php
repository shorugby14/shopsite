<?php
session_start();
if(!isset($_SESSION["user"])){
	$menu  = "<div align='right'>現在ログインしていません:<a href='login_form.php'>ログイン</a></div><hr>";
}else{
	$menu = "<div align='right'>ログインID:".$_SESSION["user"]." <a href='logout.php'>ログアウト</a></div><hr>";
}
if(!isset($_SESSION["cart"])) {
     $_SESSION["cart"] = array();
}
$cart = $_SESSION["cart"];
if(count($cart)>0) {
  $msg = "買い物カゴの商品数: " . count($cart) . " 点<br><div align='right'><a href='display.php'>買い物カゴを見る</a>／<a href='reji.php'>レジへ進む</a></div><hr>";
}
else{
  $msg = "";
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>モスバーガー</title>
</head>
<body>
<?php echo $menu ?>
<center><img alt='' src='rogo.jpg' width=200></center>

<marquee>ようこそ、7411003のモスバーガーショップへ！</marquee>
<?php echo $msg ?>
<center>
	<br>
	<form action="search.php" method="POST">
		キーワード検索<br>
		<input type="text" name="keyword" size="30">
		<input type="submit" value="検索">
	</form>
</center>
<font color='#ff66cc'>■</font><a href='list.php'>今週のお薦め</a><br>
<font color='#ff66cc'>■</font><a href='all_list.php'>商品一覧</a><br>
</body></html>
