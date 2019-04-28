<head>
	<style type="text/css">
		td{
		  width: 100px;
		  white-space: nowrap;
		  overflow: hidden;
		  text-overflow: ellipsis;
		}
	</style>
</head>
<?php
	$sql = "SELECT* FROM tbl_producer";
	$query = mysqli_query($conn, $sql);
?>	
	<table class="table table-striped table-hover table-bordered animated zoomIn" class="cach">
		<tr>
			<td style="font-weight: bold; background: #8bf4f5;">STT</td>
			<td style="font-weight: bold; background: #8bf4f5;">Tên nhà sản xuất</td>
			<td style="font-weight: bold; background: #8bf4f5;">Thao tác</td>
		</tr>
		<?php  
		while ($row = mysqli_fetch_array($query)) {
			?>
		<tr>
			<td><?php echo($row["IdProducer"]) ?></td>
			<td><?php echo($row["NameProducer"]) ?></td>
			<td><a class="btn btn-success" href="Index.php?page=suanhasanxuat&&mansx=<?php echo $row["IdProducer"] ?>">Sửa</a>  <a class="btn btn-danger" href="View/xoanhasanxuat.php?mansx=<?php echo $row["IdProducer"] ?>">Xóa</a></td>
		</tr>
		<?php  
	}
	?>
</table>