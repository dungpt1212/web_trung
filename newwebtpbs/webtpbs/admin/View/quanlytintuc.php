<head>
	<style type="text/css" media="screen">
		td{
		  width: 100px;
		  white-space: nowrap;
		  /*overflow: hidden;
		  text-overflow: ellipsis;*/
		}
		.anh_tintuc{
			width: 130px;
			height: 100px;
		}
		/*.otintuc{
			width: 200px;
			height: 100px;
			overflow: scroll;
		}*/
	</style>
</head>
<?php
	$sql1 = "SELECT* FROM tbl_news_detail INNER JOIN tbl_news_group ON tbl_news_group.IdNewsGroup = tbl_news_detail.IdNewsGroup";
	$query1 = mysqli_query($conn, $sql1);
?>
	<h3><a class="btn btn-success" href="Index.php?page=themtintuc"><span class="glyphicon glyphicon-plus"></span> THÊM TIN TỨC</a></h3>
	<br>
	<table class="table table-striped table-hover table-bordered animated zoomIn" class="cach">
		<tr>
			<td style="font-weight: bold; background: #8bf4f5;">Mã tin tức</td>
			<td style="font-weight: bold; background: #8bf4f5;">Tiêu đề</td>
			<td style="font-weight: bold; background: #8bf4f5;">Nội dung</td>
			<!-- <td style="font-weight: bold; background: #8bf4f5;">Mô tả</td> -->
			<td style="font-weight: bold; background: #8bf4f5;">Tên nhóm tin tức</td>
			<td style="font-weight: bold; background: #8bf4f5;">Hình ảnh</td>
			<td style="font-weight: bold; background: #8bf4f5;">Thao tác</td>
		</tr>
		<?php
		while ($row1 = mysqli_fetch_array($query1)) {
			?>
		<tr>
			<td><?php echo($row1["IdNews"]) ?></td>
			<td class="otintuc"><?php echo($row1["Title"]) ?></td>
			<td class="otintuc"><?php echo($row1["Content"]) ?></td>
			<!-- <td class="otintuc"><?php echo($row1["Description"]) ?></td> -->
			<td class="otintuc"><?php echo($row1["NameNewsGroup"]) ?></td>
			<td><img src="<?php echo('../'.$row1['Image']); ?>" class="anh_tintuc"></td>
			<td><a class="btn btn-success" href="Index.php?page=capnhattintuc&&tt=<?php echo($row1['IdNews']) ?>">Sửa</a>  <a class="btn btn-danger" href="View/xoatintuc.php?tt=<?php echo $row1["IdNews"] ?>">Xóa</a></td>
		</tr>
		<?php  
			}
		?>
	</table>