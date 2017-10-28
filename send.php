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
$customer = $_SESSION["customer"];
$tel = $_SESSION["tel"];
$mail = $_SESSION["mail"];
$cart = $_SESSION["cart"];
$login_id = $_POST["login_id"];
$password = $_POST["password"];

if(!isset($_SESSION["cart"])){
	echo "カートが空です。やり直してください。<br>";
	exit;
}




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



$sql = "SELECT count(*) FROM customer where login_id = '".$login_id."'";
$result = $pdo->query($sql);
while($row = $result->fetch(PDO::FETCH_ASSOC)){
	$count = $row["count(*)"];
}
if($count > 0){
	echo "すでに登録されているユーザ名です<br>";
	echo "<a href='registration.php'>戻る</a>";
	exit;
}


$sql = "INSERT INTO customer(name,tel,mail,login_id,password) values('".$customer."','".$tel."','".$mail."','".$login_id."',password('".$password."'))";
$result = $pdo->query($sql);

$sql = "SELECT * FROM customer where login_id = '".$login_id."' and password = password('".$password."')";
$result = $pdo->query($sql);
$id = "";
foreach($result as $row){
	$id = $row["id"];
}

$code_list = "";
$amount_list = "";

while(list($code, $amount) = each($cart)) {
	$code_list .= $code . ",";
	$amount_list .= $amount . ",";
}
$sql = "INSERT INTO orders(customer_id,code,amount,dt) values(".$id.",'".$code_list."','".$amount_list."',now())";
$result = $pdo->query($sql);

echo "注文を承りました";

$_SESSION["cart"] = null;

?>
<br>
<centar>
<a href='top.php'>トップへ</a>
</centar>
</body></html>
