<head>
	<style type="text/css">
		td{
		  width: 100px;
		  white-space: nowrap;
		  overflow: hidden;
		  text-overflow: ellipsis;
		}
		.hangdau{
			background: #8bf4f5;
		}
		.hangdau:hover{
			background: #268389;
		}
	</style>
</head>
<?php
	$sql = "SELECT* FROM tbl_customer";
	$query = mysqli_query($conn, $sql);
?>	
	<br><br>
	<table class="table table-striped table-hover table-bordered animated zoomIn" class="cach">
		<tr>
			<!-- <td colspan="3"><h1 align="center">DANH SÁCH NHÓM SẢN PHẨM</h1></td> -->
		</tr>
		<tr>
			<td style="font-weight: bold;" class="hangdau">STT</td>
			<td style="font-weight: bold;" class="hangdau">UserName</td>
			<td style="font-weight: bold;" class="hangdau">Thao tác</td>
		</tr>
		<?php  
		while ($row = mysqli_fetch_array($query)) {
			?>
		<tr>
			<td><?php echo($row["IdCustomer"]) ?></td>
			<td><?php echo($row["NameCustomer"]) ?></td>
			<td><a class="btn btn-danger" href="View/xoataikhoan.php?makh=<?php echo $row["IdCustomer"] ?>">Xóa</a></td>
		</tr>
		<?php  
	}
	?>
</table>