<?php
            
            require_once 'classes/customer.php' ;
            if(isset($_POST['confirm']))
            {
                // $getInfoFacebookOder    = new customer();

                // $insertInfoFacebookOder = $getInfoFacebookOder->getInforFacebookeOder($_POST) ;
            }
?>
<?php
    // require_once 'fb-callback.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Xác nhận thông tin</title>
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
        <h1>Xác nhận thông tin</h1>
        
		<div class="main-agileinfo">
			<div class="agileits-top">
                
				<form action="#" method="post">
					<input class="text" type="text" name="fullname" placeholder="Full Name" required="">
                    <input class="text email" type="email" name="email" placeholder="Email" required="">
                    <input  style="margin:20px 0px"class="text" type="text" name="address" placeholder="Address" required="">
                    <input  style="margin:20px 0px"class="text" type="text" name="phone" placeholder="Phone" required="">
					<div class="wthree-text">
						<div class="clear"> </div>
					</div>
					<input type="submit"  name= "confirm" value="Xác nhận">
                </form>
			</div>
		</div>
		<!-- copyright -->
		<div class="colorlibcopy-agile">
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