<?php
	session_start();
	if (isset($_SESSION['cart'])) {
		echo "<pre/>";
		var_dump($_SESSION['cart']);
	}
?>