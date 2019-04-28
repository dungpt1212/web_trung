<head>
	<style type="text/css">
		td{
		  width: 100px;
		  white-space: nowrap;
		  overflow: hidden;
		  text-overflow: ellipsis;
		}
		.anh_tintuc{
			width: 130px;
			height: 100px;
		}
	</style>
</head>
	<table class="table table-striped table-hover table-bordered animated zoomIn" class="cach">
		<tr>
			<td style="font-weight: bold; background: #8bf4f5;">Tên sản phẩm</td>
			<td style="font-weight: bold; background: #8bf4f5;">Hình ảnh</td>
			<td style="font-weight: bold; background: #8bf4f5;">Số lượng</td>
			<td style="font-weight: bold; background: #8bf4f5;">Giá</td>
			<td style="font-weight: bold; background: #8bf4f5;">Thao tác</td>
		</tr>
		<?php
			include("../connection.php");
			$dh = $_GET['dh'];
			$sql = "SELECT* FROM tbl_bill_detail INNER JOIN tbl_product_detail ON tbl_bill_detail.product_id = tbl_product_detail.IdProduct WHERE bill_id = '".$dh."'";
			$query = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_array($query)) {
		?>
		<tr>
			<td><?php echo($row["NameProduct"]) ?></td>
			<td><img src="<?php echo('../'.$row['Image']); ?>" class="anh_tintuc"></td>
			<td><?php echo($row["soLuong"]) ?></td>
			<td><?php echo(number_format($row["NewPrice"])." đ") ?></td>
			<td><a class="btn btn-danger" href="View/xoadonhang.php?dhct=<?php echo $row["Id"] ?>">Xóa</a></td>
		</tr>
		<?php  
			}
		?>
</table>