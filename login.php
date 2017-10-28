<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>モスバーガー</title>
</head>
<body>

<center><img src='rogo.jpg'></center>
<br>
<?php
session_start();

if(empty($_POST["login_id"]) || empty($_POST["password"])){
	echo "ユーザー名とパスワードを入力してください<br>";
	echo "<a href='top.php'>トップへ</a>";
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
$plogin_id = preg_replace("/\\\/","\\\\\\", $_POST["login_id"]);
$plogin_id = preg_replace("/'/","\'", $plogin_id);
$plogin_id = preg_replace("/\"/","\\\"", $plogin_id);
$ppassword = preg_replace("/\\\/","\\\\\\", $_POST["password"]);
$ppassword = preg_replace("/'/","\'", $ppassword);
$ppassword = preg_replace("/\"/","\\\"", $ppassword);
$sql = "SELECT * FROM customer where login_id = '".$plogin_id."' and password = password('".$ppassword."')";

echo $sql;
$result = $pdo->query($sql);

if(!$result){
	echo "データを取得出来ませんでした。時間をおいてもう一度お試し下さい。";
}

$uname = null;
while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $_SESSION["user"] = $_POST["login_id"];
	$uname = $row["login_id"];
}

if($uname != null){
	header("Location: top.php");
}else{
	echo "<hr>ユーザー名かパスワードが正しくありません。";
	echo "<a href = 'login_form.php'>戻る</a>";
	exit;
}
$_SESSION["user"] = $_POST["login_id"];

?>
</body></html>
