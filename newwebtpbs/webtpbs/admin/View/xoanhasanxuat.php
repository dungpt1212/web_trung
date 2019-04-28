<?php
	include("../connection.php");
	$mansx = $_GET['mansx'];
	$sql = "DELETE FROM tbl_producer WHERE IdProducer = $mansx";
	mysqli_query($conn, $sql);
	header("location:../Index.php?page=quanlynhasanxuat");
?>