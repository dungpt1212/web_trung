<div class="bo">
	<ul class="ul_nhomtintuc">
		<?php
			$sql = "SELECT * FROM tbl_news_group";
			$query = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_array($query)) {
		?>
		<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
			<li><a href=""><?php echo($row['NameNewsGroup']); ?></a></li>
		</div>
		<?php } ?>
	</ul>
	<div style="clear: both;"></div>
	<br><br>
	<div class="danhmuctintuc">
		<h3 class="danhmuctintuc1">DINH DƯỠNG THỂ HÌNH</h3>
		<hr style="margin-top: -10px;">
		<?php
			$sql1 = "SELECT * FROM tbl_news_detail WHERE IdNewsGroup = 3";
			$query1 = mysqli_query($conn,$sql1);
			while ($row1 = mysqli_fetch_array($query1)) {
		?>
		<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
			<a href="Index.php?page=content&&mattct=<?php echo($row1['IdNews']) ?>"><img src="<?php echo($row1['Image']); ?>" class="image-tt"></a>
			<p class="title-tt"><a href="Index.php?page=content&&mattct=<?php echo($row1['IdNews']) ?>"><?php echo($row1['Title']); ?></a></p>
			<hr style="border: 1px solid #d7d7d7;">
			<p class="content-tt"><?php echo($row1['Content']); ?></p>
			
		</div>
		<?php } ?>
	</div>

	<div style="clear: both;"></div>
	<br><br>
	<div class="danhmuctintuc">
		<h3 class="danhmuctintuc1">KIẾN THỨC THỂ HÌNH</h3>
		<hr style="margin-top: -10px;">
		<?php
			$sql1 = "SELECT * FROM tbl_news_detail WHERE IdNewsGroup = 1";
			$query1 = mysqli_query($conn,$sql1);
			while ($row1 = mysqli_fetch_array($query1)) {
		?>
		<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
			<a href="Index.php?page=content&&mattct=<?php echo($row1['IdNews']) ?>"><img src="<?php echo($row1['Image']); ?>" class="image-tt"></a>
			<p class="title-tt"><a href="Index.php?page=content&&mattct=<?php echo($row1['IdNews']) ?>"><?php echo($row1['Title']); ?></a></p>
			<hr style="border: 1px solid #d7d7d7;">
			<p class="content-tt"><?php echo($row1['Content']); ?></p>
			
		</div>
		<?php } ?>
	</div>

	<div style="clear: both;"></div>
	<br><br>
	<div class="danhmuctintuc">
		<h3 class="danhmuctintuc1">BÀI TẬP THỂ HÌNH</h3>
		<hr style="margin-top: -10px;">
		<?php
			$sql1 = "SELECT * FROM tbl_news_detail WHERE IdNewsGroup = 2";
			$query1 = mysqli_query($conn,$sql1);
			while ($row1 = mysqli_fetch_array($query1)) {
		?>
		<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
			<a href="Index.php?page=content&&mattct=<?php echo($row1['IdNews']) ?>"><img src="<?php echo($row1['Image']); ?>" class="image-tt"></a>
			<p class="title-tt"><a href="Index.php?page=content&&mattct=<?php echo($row1['IdNews']) ?>"><?php echo($row1['Title']); ?></a></p>
			<hr style="border: 1px solid #d7d7d7;">
			<p class="content-tt"><?php echo($row1['Content']); ?></p>
			
		</div>
		<?php } ?>
	</div>

	<div style="clear: both;"></div>
	<br><br>
	<div class="danhmuctintuc">
		<h3 class="danhmuctintuc1">THỰC PHẨM BỔ SUNG</h3>
		<hr style="margin-top: -10px;">
		<?php
			$sql1 = "SELECT * FROM tbl_news_detail WHERE IdNewsGroup = 4";
			$query1 = mysqli_query($conn,$sql1);
			while ($row1 = mysqli_fetch_array($query1)) {
		?>
		<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
			<a href="Index.php?page=content&&mattct=<?php echo($row1['IdNews']) ?>"><img src="<?php echo($row1['Image']); ?>" class="image-tt"></a>
			<p class="title-tt"><a href="Index.php?page=content&&mattct=<?php echo($row1['IdNews']) ?>"><?php echo($row1['Title']); ?></a></p>
			<hr style="border: 1px solid #d7d7d7;">
			<p class="content-tt"><?php echo($row1['Content']); ?></p>
			
		</div>
		<?php } ?>
	</div>
</div>