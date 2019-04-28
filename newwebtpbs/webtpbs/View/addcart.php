<?php
	session_start();

	include("../connection.php");

	if (!isset($_SESSION['username'])) {
		echo('<script>alert("Bạn phải đăng nhập mới thực hiện được chức năng này"); location.href="../Index.php"</script>');
	}

	//  lấy id của sp cần thêm vào giỏ hàng
	else
	{
		$id = isset($_GET['id']) ? $_GET['id'] : '';

		// $id = $_GET['id'];
		$sql = "SELECT * FROM tbl_product_detail INNER JOIN tbl_product_group ON tbl_product_detail.IdGroupProduct = tbl_product_group.IdGroupProduct WHERE IdProduct = '".$id."'";
		$query = mysqli_query($conn, $sql);
		$product = mysqli_fetch_array($query);

		if ($product) {
			// Kiểm tra tồn tài session['cart']
			if (isset($_SESSION['cart'])) {
				if (isset($_SESSION['cart'][$id])) {
					$_SESSION['cart'][$id]['qty'] += 1;
				}else{
					$_SESSION['cart'][$id]['qty'] = 1;
				}
				$_SESSION['cart'][$id]['name'] = $product['NameProduct'];
				$_SESSION['cart'][$id]['giacu'] = $product['OldPrice'];
				$_SESSION['cart'][$id]['giamoi'] = $product['NewPrice'];
				$_SESSION['cart'][$id]['hinhanh'] = $product['Image'];
				$_SESSION['cart'][$id]['loaisp'] = $product['NameGroupProduct'];
			}else{
				$_SESSION['cart'][$id]['qty']=1;
				$_SESSION['cart'][$id]['name'] = $product['NameProduct'];
				$_SESSION['cart'][$id]['giacu'] = $product['OldPrice'];
				$_SESSION['cart'][$id]['giamoi'] = $product['NewPrice'];
				$_SESSION['cart'][$id]['hinhanh'] = $product['Image'];
				$_SESSION['cart'][$id]['loaisp'] = $product['NameGroupProduct'];
			}
			header("location:../Index.php?page=shoppingcart");
		}
	}
	
?>