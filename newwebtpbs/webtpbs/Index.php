<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web thực phẩm bổ sung</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  </head>
<body>
	<?php
		include("connection.php");
		include("View/login.php");
		include("View/register.php");
	?>
	<?php
		require_once("View/menu.php");
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
			switch ($page) {
				case 'detail':
					require 'View/detail_product.php';
					break;
				case 'search':
					require 'View/search.php';
					break;
				case 'group':
					require 'View/group_detail.php';
					break;
				case 'tintucthehinh':
					require 'View/group_tintucthehinh.php';
					break;
				case 'content':
					require 'View/content_new.php';
					break;
				case 'shoppingcart':
					require 'View/shoppingcart.php';
					break;
				case 'thanhtoan':
					require 'View/thanhtoan.php';
					break;
				default:{
					require 'View/slide.php';
					require 'View/main.php';
					}
					break;
			}
		}else{
			require 'View/slide.php';
			require 'View/main.php';
		}
	?>


		<?php
			require 'View/footer.php';
		?>
	<div class="contact">
      <!-- Subiz --> <script> (function(s, u, b, i, z){ u[i]=u[i]||function(){ u[i].t=+new Date(); (u[i].q=u[i].q||[]).push(arguments); }; z=s.createElement('script'); var zz=s.getElementsByTagName('script')[0]; z.async=1; z.src=b; z.id='subiz-script'; zz.parentNode.insertBefore(z,zz); })(document, window, 'https://widgetv4.subiz.com/static/js/app.js', 'subiz'); subiz('setAccount', 'acqcdeqzrfkxgdwnikfk'); </script> <!-- End Subiz -->
    </div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/jquery.js"></script>
</body>
</html>