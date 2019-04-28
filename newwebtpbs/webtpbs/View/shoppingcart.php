<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style type="text/css">
    .table&amp;amp;gt;
    tbody&amp;amp;gt;
    tr&amp;amp;gt;td, 
    .table&amp;amp;gt;
    tfoot&amp;amp;gt;
    tr&amp;amp;gt;
    td {  
      vertical-align: middle;
      }
      .divquaylai{
        width: 200px;
        height: 50px;
      }
      .quaylai{
        font-weight: bold;
        
      }
     
    @media screen and (max-width: 600px) {
    table#cart tbody td .form-control { 
      width:20%; 
      display: inline !important;
      } 
       
      .actions .btn { 
      width:36%; 
      margin:1.5em 0;
      } 
       
      .actions .btn-info { 
      float:left;
      } 
       
      .actions .btn-danger { 
      float:right;
      } 
       
      table#cart thead {
      display: none;
      } 
       
      table#cart tbody td {
      display: block;
      padding: .6rem;
      min-width:320px;
      } 
       
      table#cart tbody tr td:first-child {
      background: #333;
      color: #fff;
      } 
       
      table#cart tbody td:before { 
      content: attr(data-th);
      font-weight: bold; 
      display: inline-block;
      width: 8rem;
      } 
       
      table#cart tfoot td {
      display:block;
      } 
      table#cart tfoot td .btn {
      display:block;
      }
    }
</style>
</head>
<body>
<?php
  if (isset($_SESSION['cart']) && $_SESSION['cart'] != null) {
?>
  <div class="container"> 
    <form action="View/updatecart.php" method="POST">
      <table id="cart" class="table table-hover table-condensed"> 
        <thead> 
          <tr> 
            <th style="width:50%">Tên sản phẩm</th> 
            <th style="width:10%">Giá cũ</th> 
            <th style="width:10%">Giá mới</th> 
            <th style="width:8%">Số lượng</th> 
            <th style="width:12%" class="text-center">Thành tiền</th> 
            <th style="width:10%"> </th> 
          </tr> 
        </thead> 
        <tbody>
        <?php
          $tongtienthanhtoan = 0;
          $tongSanPham = 0;
          foreach ($_SESSION['cart'] as $key => $value) {
        ?>
          <tr>

            <td data-th="Sản phẩm"> 
              <div class="row"> 
                <div class="col-sm-2 hidden-xs"><img src="<?php echo($value['hinhanh']) ?>" alt="Sản phẩm 1" class="img-responsive" width="100"></div> 
                <div class="col-sm-10"> 
                  <h4 class="nomargin"><?php echo($value['name']); ?></h4> 
                  <p><?php echo($value['loaisp']); ?></p> 
                </div> 
              </div> 
            </td>

            <td data-th="Giá cũ"><?php if ($value['giacu'] == 0) {
              echo "";
            }else{ echo(number_format($value['giacu']).' đ');} ?></td>

            <td data-th="Giá mới"><?php echo(number_format($value['giamoi']).' đ'); ?></td>

            <td data-th="Quantity"><input class="form-control text-center" value="<?php echo($value['qty']) ?>" type="number" name="<?php echo $key; ?>"></td>

            <td data-th="Subtotal" class="text-center"><?php echo(number_format($value['giamoi']*$value['qty']).'đ'); ?></td>

            <td class="actions" data-th="">
              <a href="View/deletecart.php?idsp=<?php echo($key) ?>" class="btn btn-danger btn-sm"><span class="fa fa-trash-o">Xóa</span></a>
            </td>

          </tr>
          
        <?php
            $tongtienthanhtoan += $value['giamoi']*$value['qty'];
            $tongSanPham += $value['qty'];
            $_SESSION['tongSanPham'] = $tongSanPham;
            $_SESSION['tongTien'] = $tongtienthanhtoan;
          } ?>
        </tbody>
        <tfoot> 
          <tr> 
            <td>
              <a href="Index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
              <input type="submit" name="bt_update" value="Cập nhật giỏ hàng" class="btn btn-success">
            </td> 
            <td colspan="2" class="hidden-xs"> </td> 
            <td class="hidden-xs text-center"><strong>Tổng tiền <?php echo(number_format($tongtienthanhtoan).' đ'); ?></strong></td> 
            <td>
              <a href="<?php if (isset($_SESSION['username'])) {echo('Index.php?page=thanhtoan');} else{echo('Index.php');} ?>" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>
            </td> 
          </tr> 
        </tfoot> 
      </table>
    </form>
  </div>
<?php }else{ ?>
  <h3 align="center" style="font-weight: bold; opacity: 0.8; margin-top: 30px;">Chưa có sản phẩm trong giỏ hàng</h3>
  <br>
    <a href="Index.php"><h4 class="quaylai" align="center">QUAY LẠI CỬA HÀNG</h4></a>
<?php } ?>
</body>
</html>
