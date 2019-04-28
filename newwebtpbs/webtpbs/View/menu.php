  <!-- Menu dành cho desktop -->
  <div class="menu-top">
    <nav class="navbar navbar-default" role="navigation">
      <div class="bo">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <p class="hotline"><i class="fa fa-phone"></i> Hotline:01627.804.441</p>
        </div>
      
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <div class="navbar-right">
            <ul class="nav navbar-nav navbar-right menudn">
              <li><a href="Index.php?page=shoppingcart"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
              <li><?php
                    if (isset($_SESSION['username'])) {
                        echo("<a href=''><i class='glyphicon glyphicon-user' style='margin-right:4px;'></i>".$_SESSION['username']."</a>");
                                  }

                    else{ 
                      if (isset($_SESSION['admin'])) {
                        echo("<a href=''><i class='glyphicon glyphicon-user' style='margin-right:4px;'></i>".$_SESSION['admin']."</a>");
                                  }
                      else{
                        echo('<a data-toggle="modal" href="#modal-id" style="width:auto;"><i class="fa fa-sign-in"></i> Đăng nhập</a>'); } 
                      }
                    ?></li>
              <li><?php 
                    if (isset($_SESSION['username'])) {
                        echo("<a href='View/logout.php'><i class='glyphicon glyphicon-log-out' style='margin-right:4px;'></i>Đăng xuất</a>");
                        
                        }
                    else{ 
                      if (isset($_SESSION['admin'])) {
                        echo("<a href='View/logout.php'><i class='glyphicon glyphicon-log-out' style='margin-right:4px;'></i>Đăng xuất</a>");
                                }
                      else{echo('<a data-toggle="modal" href="#modal-id1"><i class="fa fa-key"></i> Đăng ký</a>'); } 
                      }
                    ?></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </div>
  <!-- end menu dành cho desktop -->

  
  <!-- menu dành cho smartphone -->
  <!-- <div class="menu-top-dd">
    <nav class="navbar navbar-default" role="navigation">
      <div class="bo">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <p class="hotline"><a href="Index.php?page=shoppingcart"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></p>
        </div>
      
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <div class="navbar-right">
            <ul class="nav navbar-nav navbar-right menudn">
              <li>
                <a href="Index.php?page=tintucthehinh">Tin tức thể hình</a>
              </li>
              <?php
                $sql = "SELECT* FROM tbl_product_group";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
              ?>
              <li>
                <?php echo('<a href="Index.php?page=group&&name='.$row["NameGroupProduct"].'">'.$row["NameGroupProduct"].'</a>'); ?>
              </li>
              <?php } ?>
              <li><?php
                    if (isset($_SESSION['username'])) {
                        echo("<a href=''><i class='glyphicon glyphicon-user' style='margin-right:4px;'></i>".$_SESSION['username']."</a>");
                                  }
  
                    else{ 
                      if (isset($_SESSION['admin'])) {
                        echo("<a href=''><i class='glyphicon glyphicon-user' style='margin-right:4px;'></i>".$_SESSION['admin']."</a>");
                                  }
                      else{
                        echo('<a data-toggle="modal" href="#modal-id" style="width:auto;"><i class="fa fa-sign-in"></i> Đăng nhập</a>'); } 
                      }
                    ?></li>
              <li><?php 
                    if (isset($_SESSION['username'])) {
                        echo("<a href='View/logout.php'><i class='glyphicon glyphicon-log-out' style='margin-right:4px;'></i>Đăng xuất</a>");
                        
                        }
                    else{ 
                      if (isset($_SESSION['admin'])) {
                        echo("<a href='View/logout.php'><i class='glyphicon glyphicon-log-out' style='margin-right:4px;'></i>Đăng xuất</a>");
                                }
                      else{echo('<a data-toggle="modal" href="#modal-id1"><i class="fa fa-key"></i> Đăng ký</a>'); } 
                      }
                    ?></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </div> -->
  <!-- end menu dành cho smartphone -->

  <div class="menu-center">
    <div class="bo">
      <div class="logo">
        <div class="row">
          <div class="col-xs-12 col-md-6 col-lg-4 anhlogo">
              <img src="image/logotrung.png" style="width: 30%;">
          </div>

          <div class="col-xs-12 col-md-6 col-lg-8 animated zoomIn">
              <div class="container"> 
               <div class="row"> 
                <div class="col-md-6"> 
                 <div class="search-box"> 
                  <form class="search-form" method="POST" action="Index.php?page=search">
                    <input class="form-control" name="tukhoa" placeholder="Nhập từ khóa cần tìm" type="text" list="aaa">
                    <datalist id="aaa" style="width: 100%;">
                      <?php
                        $sql = "SELECT* FROM tbl_product_detail";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                      ?>
                      <a href="index.php?page=detail&&msp=<?php echo($row['IdProduct']) ?>"><option><?php echo($row['NameProduct']); ?></option></a>
                      <?php
                        }
                      ?>
                    </datalist>
                    <button type="submit" name="sub" class="btn btn-link search-btn"><i class="glyphicon glyphicon-search"></i></button>
                  </form> 
                 </div> 
                </div> 
               </div>
              </div>
          </div>
        </div>
      </div>
    </div>  	
  </div>

  <div style="clear: both;"></div>


  <div class="menu-bot">
    <nav class="navbar navbar-inverse">
        <div class="bo">
          <ul class="nav navbar-nav">
              <li class="active" style="font-size: 18px; background: #00709d;"><a href="Index.php"><span class="glyphicon glyphicon-home" style="margin-right: 5px; "></span>Trang chủ</a></li>
              <?php
                $sql = "SELECT* FROM tbl_product_group";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
              ?>
              <li>
                <?php echo('<a href="Index.php?page=group&&name='.$row["NameGroupProduct"].'">'.$row["NameGroupProduct"].'</a>'); ?>
              </li>
              <?php } ?>
              <li>
                <a href="Index.php?page=tintucthehinh">Tin tức thể hình</a>
              </li>
          </ul>
        </div>
    </nav>
  </div>