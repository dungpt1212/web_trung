<?php
	session_start();
	$id = $_GET['idsp'];
	unset($_SESSION['cart'][$id]);
	header("location:../Index.php?page=shoppingcart");
?>