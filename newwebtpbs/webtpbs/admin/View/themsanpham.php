<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		td{
		  width: 100px;
		  white-space: nowrap;
		  overflow: hidden;
		  text-overflow: ellipsis;
		}
		.oip{
			width: 100%;
			display: block;
			height: 30px;
			border: 0px;
			line-height: 100%;
		}
	</style>
</head>
<body>
	<?php  
	if (isset($_POST['bt_submit'])) {
		$namesp = $_POST['namesp'];
		$giacu = $_POST['giacu'];
		$giamoi = $_POST['giamoi'];
		$mansx = $_POST['mansx'];
		$mansp = $_POST['mansp'];
		$sl = $_POST['sl'];
		//Xử lí upload ảnh start
		if($_FILES['anh']['error']>0){
			echo '<br> Co loi trong viec upload len serve';
		}else
		move_uploaded_file($_FILES['anh']['tmp_name'], '../image/'.$_FILES['anh']['name']);
		$image = $_FILES['anh']['name'];
		$Description = $_POST['Description'];

		$sql = "SELECT* FROM tbl_product_detail WHERE NameProduct = '$namesp'";
		$kt = mysqli_query($conn,$sql);
		$dong = mysqli_num_rows($kt);
		if ($dong > 0) {
			echo ("<script language=javascript>alert('Sản phẩm đã tồn tại')</script>");
		}else{
			$sql = "INSERT INTO tbl_product_detail(	NameProduct,OldPrice,NewPrice,IdProducer,Description,IdGroupProduct,Amount,Image) VALUES ('$namesp','$giacu','$giamoi','$mansx','$Description','$mansp','$sl','$image')";			
			if(mysqli_query($conn,$sql)){
				echo("<script language='javascript'>alert('Thêm sản phẩm thành công');location.href='Index.php?page=quanlysanpham'</script>");
			}
		}
	}

	?>
	<form method="POST" name="myform" class="cach" enctype="multipart/form-data">
		<table class="table table-striped table-bordered">
			<tr>
				<td style="font-weight: bold;">Tên sản phẩm</td>
				<td><input type="text" name="namesp" class="oip"></td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Giá cũ</td>
				<td><input type="number" name="giacu" class="oip"></td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Giá mới</td>
				<td><input type="number" name="giamoi" class="oip"></td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Mã nhà sản xuất</td>
				<td>
					<select class="oip" name="mansx">
						<?php
						$sql1 = "SELECT * FROM tbl_producer";
						$query1 = mysqli_query($conn, $sql1);
						while ($row1 = mysqli_fetch_array($query1)) {
						?>
						<option><?php echo($row1['IdProducer']); ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Mã nhóm sản phẩm</td>
				<td>
					<select class="oip" name="mansp">
						<?php
						$sql2 = "SELECT * FROM tbl_product_group";
						$query2 = mysqli_query($conn, $sql2);
						while ($row2 = mysqli_fetch_array($query2)) {
						?>
						<option><?php echo($row2['IdGroupProduct']); ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Số lượng</td>
				<td><input type="number" name="sl" class="oip" minlength="1" maxlength="1000"></td>
			</tr>
			<tr>
				<td style="font-weight: bold;">URL image</td>
				<td><input type="file" class="oip" name="anh"></td>
			</tr>
			<tr>
				<td style="font-weight: bold;" colspan="2">Mô tả</td>
			</tr>
			<tr>
				<td colspan="2"><textarea name="Description" style="width: 100%; height: 100px;"></textarea></td>
				<script type="text/javascript">
					CKEDITOR.replace("Description");
				</script>
			</tr>
		</table>
		<input type="submit" name="bt_submit" value="Thêm sản phẩm" class="btn btn-success" onclick="ktradl();">
	</form>
</body>
</html>