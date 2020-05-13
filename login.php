<?php
		require_once 'inc/header.php';
		// require_once 'inc/silder.php';
?>

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
		 	<?php
				if(isset($_POST['login']))
				{
					$loginAccount = $customer->login_customer($_POST) ;
				}
			
			?>
			<h3>Login Account</h3>
        	<form action="" method="post" id="member">
                	<input name="usernameLogin" type="text"     placeholder="Username" > 
					<input name="passwordLogin" type="password" placeholder="Password" >
					<p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
        			<div><div><input type="submit" name="login" value="Sign Up" style="background: #3f4040;color: white;height: 50px;    border: 1px solid #303030;
					text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);font-size: 15px;font-weight: bold;border-radius: 3px;"></div></div>
            </form>
           
		</div>
		<?php
				if(isset($_POST['createAccout']))
				{
					$insertCustomer = $customer->insert_customer($_POST) ;
				}

		?>
    	<div class="register_account">
			<h3>Register New Account</h3>
    		<form action="" method="POST">
				<?php 
						// Đăng kiểm tra đăng ký
						if(isset($insertCustomer))
						{
							echo $insertCustomer ;
						}		
				?>
		   		<table>
		   			<tbody>
						<tr>
							<td>
								<div>
									<input type="text" name="username" placeholder="Enter UserName"  >
								</div>			
								<div>
									<input type="password" name="password" placeholder="Enter Password" style="font-size: 12px;color: #B3B1B1;padding: 8px;outline: none;margin: 5px 0;width: 340px;" >
								</div>		
								<div>
									<input type="password" name="repassword" placeholder="Enter RePassword" style="font-size: 12px;color: #B3B1B1;padding: 8px;outline: none;margin: 5px 0;width: 340px;" >
								</div>	
								<div>
									<input type="text" name="email" placeholder="Enter Email">
								</div>

								
							</td>
							<td>
								
								<div>
										<input type="text" name="fullname" placeholder="Enter FullName">
								</div>
								<div>
										<input type="text" name="address" placeholder="Enter Address">
								</div>
								<div>
									<input type="text" name="zipcode" placeholder="Enter ZipCode ">
								</div>			
								<div>
									<input type="text" name="phone" placeholder="Enter Phone ">
								</div>						
							</td>
						</tr> 
					</tbody>
				</table> 
					<div class="search"><div><input type="submit" name="createAccout" value="Create Account" style="background: #3f4040;color: white;height: 50px;    border: 1px solid #303030;
					text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);font-size: 15px;font-weight: bold;border-radius: 3px;"></div></div>
					<p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
					<div class="clear"></div>
			</form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?
		require_once 'inc/footer.php' ;
?>