<?php  
	session_start();
	if(isset($_SESSION['username'])){
		// unset($_SESSION['username']);
		session_destroy();
		header('location:../Index.php');
	}
	if(isset($_SESSION['admin'])){
		unset($_SESSION['admin']);
		header('location:../Index.php');
	}
?>