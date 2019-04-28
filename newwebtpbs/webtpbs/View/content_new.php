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
<div class="bo">
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
		<?php
			$mattct = $_GET['mattct'];
			$sql = "SELECT * FROM tbl_news_detail WHERE IdNews = '".$mattct."'";
			$query = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_array($query)) {
		?>
			<h2 align="center"><?php echo($row['Title']); ?></h2>
			<hr style="border: 1px solid black;">
			<p><?php echo($row['Description']); ?></p>
		<?php } ?>
	</div>
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
</div>