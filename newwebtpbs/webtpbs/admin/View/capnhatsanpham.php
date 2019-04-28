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
	$spct = $_GET['spct'];
	$query = "SELECT* FROM tbl_product_detail WHERE IdProduct ='".$spct."'";
	$db = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($db);

	if(isset($_POST['bt_submit'])) {
		$name = $_POST['name'];
		$giacu = $_POST['giacu'];
		$giamoi = $_POST['giamoi'];
		$mansx = $_POST['mansx'];
		$groupsp = $_POST['groupsp'];
		$Description = $_POST['Description'];
		$sl = $_POST['sl'];
		//Xử lí upload ảnh start
		if($_FILES['anh']['error']>0 || !$_FILES['anh'] ){
			/*echo '<br> Co loi trong viec upload len serve';*/
			$image = $row['Image'];
		}else{
			move_uploaded_file($_FILES['anh']['tmp_name'], '../image/'.$_FILES['anh']['name']);
			$image = $_FILES['anh']['name'];
		}
		 //Xử lí upload ảnh end

		$sql = "UPDATE tbl_product_detail SET IdProduct = '$spct', NameProduct = '$name', OldPrice = '$giacu', NewPrice = '$giamoi', IdProducer = '$mansx', IdGroupProduct = '$groupsp', Description = '$Description',Amount = '$sl', Image = '$image' WHERE IdProduct ='$spct' ";
		if(mysqli_query($conn,$sql)){
			echo('<script>alert("Cập nhật sản phẩm thành công"); location.href="Index.php?page=quanlysanpham"</script>');
		}
	}
?>

	<form method="POST" enctype="multipart/form-data">
		<table class="table table-striped table-bordered" class="cach">
			<tr>
				<td style="font-weight: bold;">Mã sản phẩm</td>
				<td><input type="text" name="id" value="<?php echo($row["IdGroupProduct"]) ?>" readonly></td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Tên sản phẩm</td>
				<td><input type="text" name="name" value="<?php echo($row["NameProduct"]) ?>"></td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Giá cũ</td>
				<td><input type="number" name="giacu" value="<?php echo($row["OldPrice"]) ?>"></td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Giá mới</td>
				<td><input type="number" name="giamoi" value="<?php echo($row["NewPrice"]) ?>"></td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Mã nhà sản xuất</td>
				<!-- <td>
					<select class="oip" name="mansx">
						<?php
						$sql1 = "SELECT * FROM tbl_producer";
						$query1 = mysqli_query($conn, $sql1);
						while ($row1 = mysqli_fetch_array($query1)) {
						?>
						<option><?php echo($row1['IdProducer']); ?></option>
						<?php } ?>
					</select>
				</td> -->
				<td><input type="text" name="mansx" value="<?php echo($row["IdProducer"]) ?>"></td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Mã nhóm sản phẩm</td>
				<!-- <td>
					<select class="oip" name="groupsp">
						<?php
						$sql2 = "SELECT * FROM tbl_product_group";
						$query2 = mysqli_query($conn, $sql2);
						while ($row2 = mysqli_fetch_array($query2)) {
						?>
						<option><?php echo($row2['IdGroupProduct']); ?></option>
						<?php } ?>
					</select>
				</td> -->
				<td><input type="text" name="groupsp" value="<?php echo($row["IdGroupProduct"]) ?>"></td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Số lượng</td>
				<td><input type="number" name="sl" value="<?php echo($row["Amount"]) ?>"></td>
			</tr>
			<tr>
				<td style="font-weight: bold;">URL image</td>
				<td><input type="file" class="oip" name="anh"></td>
			</tr>
			<tr>
				<td style="font-weight: bold;" colspan="2">Mô tả</td>
			</tr>
			<tr>
				<td colspan="2"><textarea name="Description" style="width: 100%; height: 100px;"><?php echo($row["Description"]) ?></textarea></td>
				<script type="text/javascript">
					CKEDITOR.replace("Description");
				</script>
			</tr>
		</table>
		<input type="submit" name="bt_submit" value="Cập nhật" class="nut_sub">
	</form>