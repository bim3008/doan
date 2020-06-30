<?php
	require_once 'lib/session.php';
	// require_once './fb-callback.php' ;
	Session::init();
?>			
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<?php
	require_once 'lib/database.php';
	require_once 'helpers/format.php';

	spl_autoload_register(function ($class){
		require_once 'classes/'. $class.'.php';
	});
	$db     	= new Database();
	$fm			= new Format();
	$br			= new brand();
	$customer   = new customer();
	$ct 	    = new category();
	$pr 		= new product();
	$cart 		= new cart();
	$order 		= new order();
	$comment    = new comments();
?>
<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
<?php

	$accessToken     = Session::get('accesstoken'); 
	// $getInformationLoginFacebook = new customer() ;
	// if(isset($accessToken))
	// {
	// 	$accessToken     = Session::get('accesstoken'); 
	// 	$userData        = Session::get('userData'); 
	// 	// $inserInformationLoginFacebook = $getInformationLoginFacebook->insertFacebook($userData);		
	// }
?>
  <div class="wrap">
		<div style="background-color: black;" class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.jpg" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form action="search.php" method="post">
				    	<input type="text" placeholder="Nhập sản phẩm cần tìm" name="search"><input type="submit" value="Tìm kiếm">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div style="width:175px;"  class="cart">
						<a href="cart.php" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Giỏ hàng</span>
								<span class="no_product">
									<?php										
										$check_cart = $cart->check_cart() ;
										if($check_cart)
										{
											$sum = session::get("sum") ;
											echo $fm->formatDollars($sum);	 
										}
										else
										{
											echo  '0 VNĐ' ;
										}
									?>
								</span>
							</a>
						</div>
				  </div>
			<?php
			// Người dùng Logout//
				if(isset($_GET['customerid']))
				{
					$deteleCart = $cart ->delete_all_in_cart();
					Session::destroy() ;
					header('location:index.php');
				}
			?>
		   <div  style="    width: 115px; margin-left: 30px;line-height: 2;"  class="login">
			   <!-- Kiểm tra đăng nhập -->
					<?php
					$check_login     = Session::get('customer_login');
					$accessToken     = Session::get('accesstoken'); 
					$userData        = Session::get('userData'); 
					// echo "<pre>" ;
					// print_r($userData);
					// echo "</pre>" ;
					if($check_login || $accessToken){?>
						<!-- Lấy id của Customer -->
						<a style="font-size: 20px" href="?customerid=<?php echo Session::get('customer_id') ; ?>">Đăng xuất</a>  
					<?php } 
					else { ?>
	
						<a style="font-size:20px;" href="login.php">Đăng nhập</a>
				<?php } ?>						
			</div>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul   id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li ><a style="font-family: none" href="index.php">Trang chủ</a></li>
	  <li ><a style="font-family: none" href="cart.php">Giỏ hàng</a></li>
	  
	  <?php
	  		$check_profile= Session::get('customer_login');
			  if($check_profile){?>
				 <li ><a style="font-family: none" href="profile.php">Hồ sơ</a></li>  
			  <?php } 
			  else
			  {
				  echo "" ;	
			  }				 
	  ?>
	  <?php	
	  		$check_order= Session::get('customer_login');
			  if($check_order){?>
				 <li  ><a style="font-family: none" href="order.php">Lịch sử</a></li>			  
			  <?php } 
			  else if($accessToken)
			  {
				  echo ' <li ><a style="font-family: none" href="order.php">Lịch sử</a></li>' ;
			  }
			  else 
			  {
				  echo "" ;
			  }			  
	  ?>
	<li ><a style="font-family: none" href="contact.php">Liên hệ</a> </li>
	  <div class="clear"></div>
	</ul>
</div>