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
	$sql = "SELECT* FROM tbl_product_detail INNER JOIN tbl_product_group ON tbl_product_detail.IdGroupProduct = tbl_product_group.IdGroupProduct INNER JOIN tbl_producer ON tbl_product_detail.IdProducer = tbl_producer.IdProducer";
	$query = mysqli_query($conn, $sql);
?>
	<h3><a class="btn btn-success" href="Index.php?page=themsanpham"><span class="glyphicon glyphicon-plus"></span> THÊM SẢN PHẨM</a></h3>
	<br>
	<table class="table table-striped table-hover table-bordered animated zoomIn" class="cach">
		<tr>
			<td style="font-weight: bold; background: #8bf4f5;">Mã sản phẩm</td>
			<td style="font-weight: bold; background: #8bf4f5;">Tên sản phẩm</td>
			<td style="font-weight: bold; background: #8bf4f5;">Giá cũ</td>
			<td style="font-weight: bold; background: #8bf4f5;">Giá mới</td>
			<td style="font-weight: bold; background: #8bf4f5;">Tên nhà sản xuất</td>
			<td style="font-weight: bold; background: #8bf4f5;">Tên nhóm sản phẩm</td>
			<td style="font-weight: bold; background: #8bf4f5;">Số lượng</td>
			<td style="font-weight: bold; background: #8bf4f5;">URL image</td>
			<td style="font-weight: bold; background: #8bf4f5;">Thao tác</td>
		</tr>
		<?php  
		while ($row = mysqli_fetch_array($query)) {
			?>
		<tr>
			<td><?php echo($row["IdProduct"]) ?></td>
			<td><?php echo($row["NameProduct"]) ?></td>
			<td><?php echo($row["OldPrice"]) ?></td>
			<td><?php echo($row["NewPrice"]) ?></td>
			<td><?php echo($row["NameProducer"]) ?></td>
			<td><?php echo($row["NameGroupProduct"]) ?></td>
			<td><?php echo($row["Amount"]) ?></td>
			<td><?php echo($row["Image"]) ?></td>
			<td><a class="btn btn-success" href="Index.php?page=capnhatsanpham&&spct=<?php echo($row['IdProduct']) ?>">Sửa</a>  <a class="btn btn-danger" href="View/xoasanpham.php?spct=<?php echo $row["IdProduct"] ?>">Xóa</a></td>
		</tr>
		<?php  
	}
	?>
</table>