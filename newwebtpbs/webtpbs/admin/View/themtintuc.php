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
	$query = "SELECT* FROM tbl_news_detail ";
	$db = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($db);

	if(isset($_POST['bt_submit'])) {
		$title = $_POST['title'];
		$content = $_POST['content'];
		$description = $_POST['description'];
		$id_group_new = $_POST['id_group_new'];
		$image = $_POST['image'];

		$sql = "SELECT* FROM tbl_news_detail WHERE Title = '$title'";
		$kt = mysqli_query($conn,$sql);
		$dong = mysqli_num_rows($kt);
		if ($dong > 0) {
			echo ("<script language=javascript>alert('Tin tức đã tồn tại')</script>");
		}else{
			$sql = "INSERT INTO tbl_news_detail(Title,Content,Description,IdNewsGroup,Image) VALUES ('$title','$content','$description','$id_group_new','$image')";			
			if(mysqli_query($conn,$sql)){
				echo("<script language='javascript'>alert('Thêm tin tức thành công');location.href='Index.php?page=quanlytintuc'</script>");
			}
		}
	}
?>

	<form method="POST">
		<table class="table table-striped table-bordered" class="cach">
			<tr>
				<td style="font-weight: bold;">Tiêu đề</td>
				<td><input type="text" name="title"></td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Nội dung</td>
				<td><input type="text" name="content"></td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Mã nhóm tin tức</td>
				<td>
					<select name="id_group_new">
						<?php
						$sql1 = "SELECT * FROM tbl_news_group";
						$query1 = mysqli_query($conn, $sql1);
						while ($row1 = mysqli_fetch_array($query1)) {
						?>
						<option><?php echo($row1['IdNewsGroup']); ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Hình ảnh</td>
				<td><input type="text" name="image"></td>
			</tr>
			<tr>
				<td style="font-weight: bold;" colspan="2">Mô tả</td>
			</tr>
			<tr>
				<td colspan="2"><textarea name="description" style="width: 100%; height: 100px;"></textarea></td>
				<script type="text/javascript">
					CKEDITOR.replace("description");
				</script>
			</tr>
		</table>
		<input type="submit" name="bt_submit" value="Thêm" class="nut_sub">
	</form>