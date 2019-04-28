<?php
	include("../connection.php");
	$makh = $_GET['makh'];
	$sql = "DELETE FROM tbl_customer WHERE IdCustomer = $makh";
	mysqli_query($conn, $sql);
	header("location:../Index.php?page=quanlytaikhoan");
?>