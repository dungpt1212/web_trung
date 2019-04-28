<?php
	session_start();
	$_SESSION['cart'];
	if (isset($_POST['bt_update'])) {
		foreach ($_SESSION['cart'] as $key => $value) {

			$soLuong = $_POST[$key];

			if ($soLuong <= 0) {
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['qty'] = $soLuong;
			}
		}
	}
	header("location: ../Index.php?page=shoppingcart");
?>