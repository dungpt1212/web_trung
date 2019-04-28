<head>
	<style type="text/css">
		td{
		  width: 100px;
		  white-space: nowrap;
		  overflow: hidden;
		  text-overflow: ellipsis;
		}
		input{
			width: 100%;
			border: 0px;
		}
		.nut_sub{
			width: 80px;
			height: 40px;
			border-radius: 8px;
			color: white;
			background: #10c221;
			font-weight: bold;
		}
		.dong{
			background: #8bf4f5;
		}
	</style>
</head>
<?php
	$masp = $_GET['masp'];
	$sql = "SELECT* FROM tbl_product_group WHERE IdGroupProduct ='".$masp."'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query)
?>	
<?php
	if (isset($_POST['bt_submit'])) {
		$name = $_POST['name'];

		$sql = "UPDATE tbl_product_group SET NameGroupProduct = '".$name."' WHERE IdGroupProduct = '".$masp."'";
		if(mysqli_query($conn,$sql))
		echo ('<script language = javascript>alert("thành công");location.href="Index.php?page=quanlynhomsanpham"</script>');
	}
?>
	<br><br>
	<form method="POST">
		<table class="table table-striped table-bordered" class="cach">
			<tr>
				<td style="font-weight: bold; background: #8bf4f5;">STT</td>
				<td style="font-weight: bold; background: #8bf4f5;">Tên nhóm sản phẩm</td>
			</tr>
			<tr>
				<td><input type="text" name="id" value="<?php echo($row["IdGroupProduct"]) ?>" readonly></td>
				<td><input type="text" name="name" value="<?php echo($row["NameGroupProduct"]) ?>"></td>
			</tr>
		</table>
		<input type="submit" name="bt_submit" value="Cập nhật" class="nut_sub">
	</form>