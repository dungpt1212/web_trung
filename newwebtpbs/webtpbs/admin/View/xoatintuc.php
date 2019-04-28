<?php
	include("../connection.php");
	$tt = $_GET['tt'];
	$sql = "DELETE FROM tbl_news_detail WHERE IdNews = $tt";
	mysqli_query($conn, $sql);
	header("location:../Index.php?page=quanlytintuc");
?>