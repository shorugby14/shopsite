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

unset($_SESSION["user"]);
echo "ログアウトしました";
?>
<br>
<centar>
<a href='top.php'>トップへ</a>
</centar>
</body></html>
