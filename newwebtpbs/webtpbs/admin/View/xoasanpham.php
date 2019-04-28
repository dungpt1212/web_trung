<?php
	include("../connection.php");
	$spct = $_GET['spct'];
	$sql = "DELETE FROM tbl_product_detail WHERE IdProduct = '".$spct."'";
	mysqli_query($conn, $sql);
	header("location:../Index.php?page=quanlysanpham");
?>