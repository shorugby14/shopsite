﻿<?php
session_start();
$code = $_GET["code"];
$amount = $_GET["amount"];
$cart = $_SESSION["cart"];
if(isset($cart[$code])) {
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

<center><img src='rogo.jpg' width=200></center>

<br>
<center>
すでに商品は買い物カゴに入っていません。
</center>
</body></html>
