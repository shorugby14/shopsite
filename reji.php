<?php
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>モスバーガー</title>
</head>
<body>

<center><img src='rogo.jpg' width=200></center>

<br>
<center><font color='#ffcc00'>●</font><font color='#ff9900'>●</font>お客様情報等の入力<font color='#ff9900'>●</font>
<font color='#ffcc00'>●</font></center>
<form method='post' action='confirm.php'><font color='#99ccff'>■</font>お名前<br>
<center> <input type='text' name='name' size='16' value=''><br></center>
<font color='#99ccff'>■</font>TEL<br>
<center> <input type='text' name='tel' size='16' value=''><br></center>
<font color='#99ccff'>■</font>メールアドレス<br>
<center> <input type='text' name='mail' size='16' value=''><br></center>
<br>
<center> <input type='submit' value='次へ'><br></center>
</form>
</body></html>
