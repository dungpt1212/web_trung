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
	$sql = "SELECT* FROM tbl_news_group";
	$query = mysqli_query($conn, $sql);
?>	
	<br><br>
	<table class="table table-striped table-hover table-bordered animated zoomIn" class="cach">
		<tr>
			<td style="font-weight: bold; background: #8bf4f5;">STT</td>
			<td style="font-weight: bold; background: #8bf4f5;">Tên nhóm tin tức</td>
			<td style="font-weight: bold; background: #8bf4f5;">Thao tác</td>
		</tr>
		<?php  
		while ($row = mysqli_fetch_array($query)) {
			?>
		<tr>
			<td><?php echo($row["IdNewsGroup"]) ?></td>
			<td><?php echo($row["NameNewsGroup"]) ?></td>
			<td><a class="btn btn-success" href="Index.php?page=suanhomtintuc&&mantt=<?php echo $row["IdNewsGroup"] ?>">Sửa</a>  <a class="btn btn-danger" href="">Xóa</a></td>
		</tr>
		<?php  
	}
	?>
</table>