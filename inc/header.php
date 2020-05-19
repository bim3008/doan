<?php
	require_once 'lib/session.php';
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
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form action="search.php" method="post">
				    	<input type="text" placeholder="Search for Products" name="search"><input type="submit" value="SEARCH">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="cart.php" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
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
				}
			?>
		   <div class="login">
			   <!-- Kiểm tra đăng nhập -->
					<?php
					$check_login = Session::get('customer_login');
					if($check_login){?>
						<!-- Lấy id của Customer -->
						<a href="?customerid=<?php echo Session::get('customer_id') ; ?>">Logout</a>  
					<?php } else {?> 
	
						<a href="login.php">Login</a>
				<?php } ?>						
			</div>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Home</a></li>
	  <li><a href="cart.php">Cart</a></li>
	  <li><a href="contact.php">Contact</a> </li>
	  <?php
	  		$check_profile= Session::get('customer_login');
			  if($check_profile){?>

				 <li><a href="profile.php">Profile</a></li>
				  
			  <?php } else 

				  echo "" ;
	  ?>
	  <?php	
	  		$check_order= Session::get('customer_login');
			  if($check_order){?>

				 <li><a href="order.php">Order</a></li>
				  
			  <?php } else 

				  echo "" ;
	  ?>
	  <div class="clear"></div>
	</ul>
</div>