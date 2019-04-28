<?php
	include("../connection.php");
	$dhct = $_GET['dhct'];
	$dh = $_GET['dh'];
	$sql = "DELETE FROM tbl_bill_detail WHERE Id = '".$dhct."'";
	mysqli_query($conn, $sql);
	$sql1 = "DELETE FROM tbl_bill WHERE IdBill = '".$dh."'";
	mysqli_query($conn, $sql1);
	header("location:../Index.php?page=quanlydonhang");
?>