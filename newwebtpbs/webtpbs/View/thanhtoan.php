<head>
  <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style type="text/css">
    .body-bg{    
    background: linear-gradient(to right,#7cacdc,#e0e5eb);
    }
     
    form{
    font-family: 'Roboto', sans-serif;
    }
     
    .form-horizontal .header{    
    background: #b5953f;    
    padding: 10px 25px;    
    font-size: 30px;    
    color: #fff;    
    text-transform: uppercase;    
    border-radius: 3px 3px 0 0;
    }
     
    .form-horizontal .form-content{    
    padding: 25px;    
    background: #f9fafd;
    }
     
    .form-horizontal .form-control{    
    padding: 10px 50px 10px 15px;    
    height: 50px;    
    font-size: 18px;    
    color: #000;    
    border: 2px solid #acacac;    
    margin-bottom: 15px;
    }
     
    .form-horizontal .form-control:hover{    
    border-color: #c9af67;
    }
     
    .form-horizontal .form-control:focus{    
    border-color: #b5953f;    
    box-shadow: none;
    }
     
    .form-horizontal .control-label{    
    width: 42px;    
    height: 40px;    
    font-size: 17px;    
    color: #acacac;    
    border-left: 1px solid #acacac;    
    position: absolute;    
    top: 5px;    
    right: 20px;    
    text-align: center;
    }
     
    .form-horizontal .captcha{    
    padding-right: 0;
    }
     
    .form-horizontal .captcha label{    
    background: #e0e0e0;    
    display: block;    
    height: 50px;    
    font-size: 16px;    
    color: #acacac;    
    line-height: 45px;    
    text-align: center;    
    border-radius: 3px 0 0 3px;
    }
     
    .form-horizontal .captcha-text{    
    padding-left: 0;
    }
     
    .form-horizontal .captcha-text input{    
    border-radius: 0 3px 3px 0;
    }
     
    .form-horizontal .footer{    
    background: #e8eaf6;    
    border-top: 1px solid #b5953f;    
    padding: 10px 25px;
    }
     
    .form-horizontal .footer .btn{    
    background: #b5953f;    
    font-size: 18px;    
    color: #fff;    
    float: right;    
    margin: 10px 0;    
    clear: both;    
    padding: 10px 25px;    
    transition: all 0.5s ease 0s;
    }
     
    .form-horizontal .name{    
    padding: 10px 15px;
    }
     
    @media only screen and (max-width:767px){    
      .form-horizontal .control-label i{        
      line-height: 40px;    
      }    
       
      .form-horizontal .captcha label{        
      font-size: 13px;    
      }
    }
  </style>
</head>
<body>
  <?php
    if (isset($_POST['bt_xacnhan'])) {

      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $email = $_POST['email'];
      if ($phone == "" || $address == "" || $email == "") {
        echo ("<script language=javascript>alert('Không có ô nào được để trống !')</script>");
      }else{

        if($_SESSION['cart'] == null) {

        } else {
          // add bill.
          $sql = "INSERT INTO tbl_bill(IdCustomer, Email, Address, Phone, tongTien) VALUES(".$_SESSION['idLogin'].", '".$email."', '".$address."', '".$phone."', '".$_SESSION['tongTien']."')";
          mysqli_query($conn, $sql);

          // get last id;
          $last_id = $conn->insert_id;

          foreach ($_SESSION['cart'] as $key => $value) {

            $insertBillDetail = "INSERT INTO tbl_bill_detail(bill_id, product_id, soLuong) VALUES('".$last_id."', '$key', '". $value['qty'] ."')";

            if(mysqli_query($conn, $insertBillDetail)){
              unset($_SESSION['cart']);
              echo('<script>alert("Xác nhận đơn hàng thành công");location.href="Index.php?page=shoppingcart"</script>');
            }
          }
        }
      }

    }
  ?>
  <?php
    if (isset($_SESSION['username'])){

    }
    else
    {
      unset($_SESSION['cart']);
    }
  ?>
  <div class="container"> 
    <div class="row"> 
      <div class="col-md-offset-3 col-md-8"> 
        <form class="form-horizontal" method="POST"> 
          <div class="form-content"> 
            <div class="form-group"> 
              <div class="col-sm-6"><input class="form-control" id="exampleInputName2" placeholder="Địa chỉ email" name="email"> 
              </div> 
            </div>
            <div class="form-group"> 
              <div class="col-sm-6"><input class="form-control" id="exampleInputName2" placeholder="Địa chỉ" name="address"> 
              </div> 
            </div>
            <div class="form-group"> 
              <div class="col-sm-6"><input class="form-control" id="exampleInputName2" placeholder="Số điện thoại" name="phone"> 
              </div> 
            </div>
          </div> 
          <div class="footer clearfix"> 
            <button type="submit" class="btn btn-default" name="bt_xacnhan">Xác nhận</button> 
          </div> 
        </form> 
      </div> 
    </div> 
  </div>
</body>