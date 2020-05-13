<?php	
	require_once '../classes/loginadmin.php' ;
	// require_once '../lib/session.php';
	// Session::checkSession();
    
	
?>
<?php
        
		$class =  new adminlogin(); // gọi tới class loginadmin -> require_once '../classes/loginadmin.php';
		if(isset($_POST['adminUser']) && isset($_POST['adminPass']) )
		{
			$adminUser = $_POST['adminUser'] ;
			$adminPass = md5($_POST['adminPass']) ;

			$check_admin = $class->login_admin($adminUser,$adminPass); // kết nối với funcion logiin_admin trong lớp class

		}

?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="POST">
			<h1>Admin Login</h1>
			<span><?php
						if(isset($check_admin))
						{
							echo $check_admin ;
						}
			?></span>
			<div>
				<input type="text" placeholder="Username"  name="adminUser"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  name="adminPass"/>
			</div>
			<div>
				<input type="submit" value="Login" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>