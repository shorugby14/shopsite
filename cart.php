<?php
session_start();
$code = $_SESSION["code"];
$amount = $_SESSION["amount"];
$cart = $_SESSION["cart"];
if(!isset($cart[$code])) {
     $cart[$code] = $amount;
     $_SESSION["cart"] = $cart;
     header("Location: top.php");
     exit;
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>モスバーガー</title>
</head>
<body>

<center><img src='irogo.jpg' width=200></center>

<br>
<center>
すでに商品は入っています。<br>
<a href='top.php'>トップへ</a>
</center>
</body></html>
