<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>モスバーガー</title>
</head>
<body>

<center><img alt='' src='rogo.jpg' width=200></center>
<br>
<?php
session_start();
if(isset($_SESSION["user"])){
	echo "ログイン済みです";
	echo "<center><a href='top.php'>トップへ</a>/<a href='reji.php'>レジへ</a></center>";
	exit;
}
?>
<br>
<form method='post' action='login.php'><font color='#99ccff'>■</font>ログインID<br>
<center> <input type='text' name='login_id' size='16' value=''><br></center>
<font color='#99ccff'>■</font>パスワード<br>
<center> <input type='password' name='password' size='16' value=''><br></center>
<br>
<center> <input type='submit' value='ログイン'><br></center>
</form>
<br>
<center>
<a href='top.php'>トップへ</a>
</center>
</body></html>
