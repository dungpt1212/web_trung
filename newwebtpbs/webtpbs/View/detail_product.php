<div class="bo"> <!-- detail start -->
  <div class="row">
    <?php
    $msp = $_GET['msp'];
    $sql = "SELECT * FROM tbl_product_detail INNER JOIN tbl_producer ON
    tbl_product_detail.IdProducer = tbl_producer.IdProducer INNER JOIN tbl_product_group ON tbl_product_detail.IdGroupProduct = tbl_product_group.IdGroupProduct WHERE IdProduct = '".$msp."'";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $tenloaisp = $row['IdGroupProduct'];
      ?>
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <img src="<?php echo($row['Image']) ?>" width="300px" height="320px" style="margin-left: -20px; margin-top: 20px;" class="img_lq">
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 detail_center">
        <h2><?php echo($row['NameProduct']); ?></h2> 
        <p>Nhà sản xuất: <span class="span_detail"><?php echo($row['NameProducer']); ?></span></p>
        <p>Dòng sản phẩm: <span class="span_detail"><?php echo($row['NameGroupProduct']); ?></span></p>
        <p>Số lượng sản phẩm trong kho: <span class="span_detail"><?php if ($row['Amount']==0) {
          echo "Hết hàng";
        }else{ echo("Còn ".$row['Amount']." sản phẩm"); } ?></span></p>
        <?php if ($row['OldPrice'] == 0) {
          echo "";
        }else{
          echo('<p style="font-weight: bold;">Giá cũ: '.number_format($row['OldPrice']).'đ');
        } ?>
        <p style="font-weight: bold;">Giá mới: <?php echo(number_format($row['NewPrice'])); ?>đ</p>
        <?php if ($row['NameGroupProduct'] == 'Phụ kiện') {
        }else{
          ?>
          <div class="form-group">
            <label>Hương vị:</label>
            <select class="form-control" name="huongvi">
              <option>------Nhấp vào để chọn------</option>
              <option>Socola</option>
              <option>Chuối</option>
              <option>Dâu tây</option>
              <option>Vani</option>
              <option>Cam</option>
            </select>
          </div>
        <?php  } ?>
        <br>
        <div class="muahang">
         <!--  <a href="View/addcart.php?id=<?php echo($row['IdProduct']) ?>"><button class="btn btn-danger btn-sm" name="bt_mua"><span class="fa fa-shopping-cart">   Thêm vào giỏ hàng</span></button></a> -->
         <a data-toggle="modal" href='#contact'><button class="btn btn-danger btn-sm" name="bt_mua"><span class="fa fa-shopping-cart">   Thêm vào giỏ hàng</span></button></a>
       </div>
     </div>
   <?php } ?>
   <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 imggiaohang">
    <img src="image/img_giaohang.png">
  </div>

</div>
<div style="clear: both;"></div>

<div class="row">
  <h3 class="motaspct">Mô Tả</h3>
  <?php
  $sql = "SELECT * FROM tbl_product_detail INNER JOIN tbl_producer ON
  tbl_product_detail.IdProducer = tbl_producer.IdProducer INNER JOIN tbl_product_group ON tbl_product_detail.IdGroupProduct = tbl_product_group.IdGroupProduct WHERE IdProduct = '".$msp."'";
  $query = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_array($query)){
    ?>
    <p><?php echo($row['Description']); ?></p>
  <?php } ?>
</div>

<div class="splq" style="text-align: center;">
  <hr>
  <h3>SẢN PHẨM LIÊN QUAN</h3><br>
  <?php
  $sql = "SELECT * FROM tbl_product_detail WHERE IdGroupProduct = $tenloaisp Order by Rand() LIMIT 6";
  $query = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_array($query)) {
    ?>
    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
      <img src="<?php echo($row['Image']); ?>" class="img_splp">
      <a href="index.php?page=detail&&msp=<?php echo($row['IdProduct']) ?>" class="ten_spnb" style="margin-left: 25px;"><?php echo($row['NameProduct']); ?></span></a>
      <p class="giacu_lq"><?php if ($row['OldPrice'] == 0) {
        echo "";
      }else{ echo(number_format($row['OldPrice'])).'đ'; } ?></p>
      <p class="giamoi_lq"><?php echo(number_format($row['NewPrice'])).'đ'; ?></p>
    </div>
  <?php } ?>
</div>
</div>
<!-- Contact poop up start  -->
<div class="modal fade" id="contact">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Liên hệ</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Contact poop up end  -->
