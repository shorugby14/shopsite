<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>モスバーガー</title>
</head>
<body>
<center><img src='rogo.jpg' width=200></center>
<hr>

<?php
session_start();
$cart = $_SESSION["cart"];
require_once "../../connect/mysql_account_sample.php";
try{
	$pdo = new PDO("mysql:host=".$ms_host."; dbname=".$ms_name, 
		$ms_user, $ms_pass, 
		array(
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET 'utf8'")
		);
}catch(PDOException $e){
	die($e->getMessage());
}
while(list($code, $amount) = each($cart)) {
	$sql = "SELECT * FROM commodity where code ='".$code."'";
	$result = $pdo->query($sql);
	foreach($result as $row){
		echo "<font color='#ff0033'>■</font>" . $row["name"] . "<br>";
		echo "<font color='#808080'>【税込】</font>" . $row["price"] . "円 ";
		echo "<font color='#808080'>【数量】</font>" . $amount . "<br>";
		echo "<center>[<a href='change.php?code=" . $code . "'>数量変更</a>][<a href='delete.php?code=" . $code . "'>削除</a>]</center><hr>\n";
	}
}
?>
<br>
<center><a href='top.php'>トップへ</a>／<a href='reji.php'>レジへ進む</a></center>
</body></html>
