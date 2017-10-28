<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>モスバーガー</title>
</head>
<body>

<center><img src='rogo.jpg' width=200></center>
<br>
<?php
session_start();

if(!isset($_SESSION["cart"])){
	echo "カートが空です。やり直してください。<br>";
	exit;
}
else{
	echo "お客様情報を登録するため、ログインIDとパスワードを入力してください";
}
?>
<br>
<form method='post' action='send.php'><font color='#99ccff'>■</font>ログインID<br>
<center> <input type='text' name='login_id' size='16' value=''><br></center>
<font color='#99ccff'>■</font>パスワード<br>
<center> <input type='text' name='password' size='16' value=''><br></center>
<br>
<center> <input type='submit' value='次へ'><br></center>
</form>
<br>
<centar>
<a href='top.php'>トップへ</a>
</centar>
</body></html>
