<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>モスバーガー</title>
</head>
<body>

<center><img alt='' src='rogo.jpg' width=200></center>

<?php
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

$sql = "SELECT * FROM commodity";
$result = $pdo->query($sql);

foreach($result as $row){
	echo "<font color='#ff66cc'>■</font>".$row["name"]."<br>";
	echo "<center><img alt='' src='".$row["image"] ."'>";
	echo $row["price"]."円(税込)→<a href='order.php?code=".$row["code"]."&amount=1'>注文</a></center>";
	echo "<font color='#ff6600'>".$row["exp"]."</font><br><hr>";
}
?>
<a href='top.php'>topへ戻る</a><br>
</body></html>
