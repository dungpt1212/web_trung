<?php
	$conn = mysqli_connect("localhost", "root", "","whey") or die("Không thể kết nối tới database");
	mysqli_query($conn, "SET NAMES 'UTF8'");
?>