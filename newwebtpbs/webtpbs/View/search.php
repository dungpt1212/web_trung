<head>
	<style type="text/css">
		#mucdanhsachsp {
			list-style: none;
		}
		#mucdanhsachsp li{
			font-size: 16px;
			color: #3c87aa;
			margin-bottom: 15px;
		}
		#mucdanhsachth {
			list-style: none;
		}
		#mucdanhsachth li{
			font-size: 16px;
			color: #3c87aa;
			margin-bottom: 18px;
			border-bottom: 1px solid #e9eff2;
		}
	</style>
</head>
<?php
	$search = $_POST['tukhoa'];
	$_SESSION['khoa'] = $search;
?>
<div class="bo">
	<div class="cot" style="position: relative;">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<p style="text-transform: uppercase; font-weight: bold;"><?php echo('Kết quả tìm kiếm cho '.'"'.$search).'"'; ?></p>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<div class="form-group" style="position: absolute;right: 16px;">
				<select class="form-control" style="width: 100%;">
                    <option>Thứ tự mặc định</option>
                    <option>Thứ tự theo mức phổ biến</option>
                    <option>Thứ tự theo điểm đánh giá</option>
                    <option>Thứ tự theo sản phẩm mới</option>
                    <option>Thứ tự theo giá: từ cao đến thấp</option>
                    <option>Thứ tự theo giá: từ thấp đến cao</option>
                </select>
            </div>
		</div>
	</div>
	<div style="clear: both;"></div>
	<br><br>
	<div class="cot">
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<h4><b>DANH MỤC SẢN PHẨM</b></h4>
			<hr>
			<ul id="mucdanhsachsp">
				<?php
					$sql1 = "SELECT * FROM tbl_product_group";
					$query1 = mysqli_query($conn,$sql1);
					while ($row1 = mysqli_fetch_array($query1)) {
				?>
				<li><?php echo($row1['NameGroupProduct']); ?></li>
				<?php } ?>
			</ul>
			<br><br>
			<h4><b>THƯƠNG HIỆU</b></h4>
			<hr>
			<ul id="mucdanhsachth">
				<?php
					$sql2 = "SELECT * FROM tbl_producer";
					$query2 = mysqli_query($conn,$sql2);
					while ($row2 = mysqli_fetch_array($query2)) {
				?>
				<li><?php echo($row2['NameProducer']); ?></li>
				<?php } ?>
			</ul>
		</div>
		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
			<?php
				$sql = "SELECT* FROM tbl_product_detail INNER JOIN tbl_producer ON tbl_product_detail.IdProducer=tbl_producer.IdProducer INNER JOIN tbl_product_group ON tbl_product_detail.IdGroupProduct = tbl_product_group.IdGroupProduct WHERE NameProduct LIKE '%$search%'";
				$query = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_array($query)) {
			?>

			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="height: 350px; text-align: center;">
				<img src="<?php echo($row['Image']); ?>" class="img_splp">
				<a href="index.php?page=detail&&msp=<?php echo($row['IdProduct']) ?>" class="ten_spnb"><span><?php echo($row['NameProduct']); ?></span></a>
		        <p class="giacu_lq"><?php if ($row['OldPrice'] == 0) {
		        }else{ echo(number_format($row['OldPrice'])).'đ'; } ?></p>
		        <p class="giamoi_lq"><?php echo(number_format($row['NewPrice'])).'đ'; ?></p>
			</div>
	
			<?php } ?>
		</div>
	</div>
</div>