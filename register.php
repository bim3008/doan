<?php
    require_once './classes/customer.php' ;
    $customer = new customer();
    if(isset($_POST['createAccout']))
    {
        $insertCustomer = $customer->insert_customer($_POST) ;
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>ĐĂNG KÝ </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/register.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
        <h1>Đăng ký</h1>
        
		<div class="main-agileinfo">
			<div class="agileits-top">
                
				<form action="#" method="post">
					<input class="text" type="text" name="fullname" placeholder="Full Name" required="">
                    <input  style="margin:20px 0px"class="text" type="text" name="username" placeholder="Username" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<input class="text w3lpass" type="password" name="repassword" placeholder="Confirm Password" required="">
                    <input class="text email" type="email" name="email" placeholder="Email" required="">
                    <input  style="margin:20px 0px"class="text" type="text" name="address" placeholder="Address" required="">
                    <input  style="margin:20px 0px"class="text" type="text" name="phone" placeholder="Phone" required="">
					<div class="wthree-text">
						<div class="clear"> </div>
					</div>
					<input type="submit"  name= "createAccout" value="Đăng ký">
                </form>
                             <?php // Đăng kiểm tra đăng ký
                                    if(isset($insertCustomer))
                                    {
                                        echo $insertCustomer ;
                                    }		
		                     ?>
				<p>Don't have an Account? <a href="login.php"> Đăng nhập!</a></p>
			</div>
		</div>
		<!-- copyright -->
		<div class="colorlibcopy-agile">
			<p>© 2018 Colorlib Signup Form. All rights reserved | Design by <a href="https://colorlib.com/" target="_blank">Colorlib</a></p>
		</div>
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>