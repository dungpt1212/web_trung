<head>
    <style>
        .myform {
            box-sizing: border-box;
            width: 260px;
            margin: 100px auto 0;
            box-shadow: 2px 2px 5px 1px rgba(0, 0, 0, 0.2);
            padding-bottom: 40px;
            border-radius: 3px;
          }
          .myform > h1 {
            box-sizing: border-box;
            padding: 20px;
          }
           
          .form_login input {
            margin: 40px 25px;
            width: 200px;
            display: block;
            border: none;
            padding: 10px 0;
            border-bottom: solid 1px #1abc9c;
            transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 96%, #1abc9c 4%);
            background-position: -200px 0;
            background-size: 200px 100%;
            background-repeat: no-repeat;
            color: #0e6252;
          }
          .form_login input:focus, .form_login input:valid {
            box-shadow: none;
            outline: none;
            background-position: 0 0;
          }
          .form_login input:focus::-webkit-input-placeholder,.form_login input:valid::-webkit-input-placeholder {
            color: #1abc9c;
            font-size: 11px;
            transform: translateY(-20px);
            visibility: visible !important;
          }
           
          .form_login button {
            border: none;
            background: #1abc9c;
            cursor: pointer;
            border-radius: 3px;
            padding: 6px;
            width: 200px;
            color: white;
            margin-left: 25px;
            box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.2);
          }
          .form_login button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 6px 0 rgba(0, 0, 0, 0.2);
          }
    </style>
</head>
<?php
  if (isset($_POST['bt_dangnhap'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if ($user == "" || $pass == "") {
      echo("<script language = javascript>alert('Tên đăng nhập hoặc mật khẩu không được để trống')</script>");
    }else{
      $sql = "SELECT* FROM tbl_customer WHERE NameCustomer = '$user' AND Pass = '$pass'";

      $kt = mysqli_query($conn, $sql);
      $row = mysqli_num_rows($kt);



      if ($row == 0) {
        echo("<script language = javascript>alert('Tên đăng nhập hoặc mật khẩu không đúng')</script>");
      }else{
        $dong = mysqli_fetch_array($kt);
        $_SESSION['username'] = $user;
        $_SESSION['idLogin'] = $dong['IdCustomer'];
        header("location:Index.php");
      }
    }
  }


  if (isset($_POST['bt_dangnhap'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if ($user == "" || $pass == "") {
      echo("<script language = javascript>alert('Tên đăng nhập hoặc mật khẩu không được để trống')</script>");
    }else{
      $sql = "SELECT* FROM tbl_admin WHERE NameAdmin = '$user' AND Pass = '$pass'";
      $kt = mysqli_query($conn, $sql);
      $row = mysqli_num_rows($kt);
      if ($row == 0) {
        echo("<script language = javascript>alert('Tên đăng nhập hoặc mật khẩu không đúng')</script>");
      }else{
        $_SESSION['admin'] = $user;
        header("location:admin/Index.php?page=trangchu");
      }
    }
  }
?>
<div class="form_login">
  <div class="modal fade" id="modal-id">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div> -->
        <div class="modal-body" align="center">
          <form method="POST" id="myform">
          <h1>Đăng nhập</h1>
            <input placeholder="Mời bạn nhập tên tài khoản.." type="text" name="user" required="">
            <input placeholder="Mời bạn nhập mật khẩu.." type="password" name="pass" required="">
            <button name="bt_dangnhap">Đăng nhập</button>
            <br><br>
            <a data-toggle="modal" href="#modal-id1" style="margin-left: 60px;"><i>Chưa có tài khoản</i></a>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>