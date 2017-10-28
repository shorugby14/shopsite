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
$code = $_GET["code"];
$amount = $_GET["amount"];
$_SESSION["code"] = $code;
$_SESSION["amount"] = $amount;

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

$sql = "SELECT * FROM commodity where code ='".$code."'";
$result = $pdo->query($sql);
foreach($result as $row){
	echo "<font color='#ff0000'>【商品名】</font>".$row["name"]."<br>";
	echo "<font color='#ff0000'>【品番】</font>".$row["code"]."<br>";
	echo "<font color='#ff0000'>【税込】</font>".$row["price"]."円<br>";
	echo "<font color='#ff0000'>【数量】</font>".$amount."<br>";
}
?>
<form action='order.php'>
<input type='hidden' name='code' value='<?php echo $code ?>'>
数量 <input type='text' name='amount' size='5' value='1'>
<input type='submit' value='数量変更'><br><br>
</form>
<center>
[<a href='cart.php'>買物カゴに入れる</a>]
[<a href='top.php'>買物カゴに入れない</a>]
</center>
</body></html>
