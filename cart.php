<?php 
	require_once 'inc/header.php' ;
//	require_once 'inc/silder.php' ;
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
				<?php
					//Delete Cart
					if(isset($_GET['cartid']))
					{		
						$id = $_GET['cartid'];
						$delete_cart = $cart->deleteCart($id);
					}									
				    // Update Cart
					if($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['submit']))
					{
						$cartId = $_POST['cartid'];
						$quantity = $_POST['quantity'];	 
						$update_quantity = $cart->update_quantity($cartId,$quantity);
						if($quantity == 0)
						{
							$delete = $cart->deleteCart($cartId);
						}
					}						
				?>
					<h2>Your Cart</h2>
		
						<table class="tblone">
							<tr>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php
								if(isset($delete_cart))
								{
									echo $delete_cart ;
								}									
							?>	
							<?php
								if(isset($update_quantity))
								{
									echo $update_quantity ;
								}
							?>
						<?php
							//Hiển thị sản phẩm
							$get_product_cart = $cart->get_product_cart() ;
							if($get_product_cart)
							{
								$subtotal = 0 ;
								while($result = $get_product_cart->fetch_assoc()){											
						?>					
							<tr>
								<td><?php echo  $result['productName']; ?></td>
								<td><img src="admin/uploads/<?php echo  $result['image_cart']; ?>" alt=""/></td>
								<td><?php echo $fm->formatDollars($result['price']) ;  ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartid"   value="<?php echo $result['cartId'] ;?>">
										<input type="number" name="quantity" min="0" value="<?php echo  $result['quantity']; ?>"/>
										<input type="submit" name="submit"   value="Update"/>
									</form>
								</td>
								<td>
								<?php   
									$total = $result['price'] *  $result['quantity'] ;
									if(isset($total)) echo $fm->formatDollars($total) ;
								
								?></td> 
								<td><a href="?cartid=<?php echo $result['cartId'] ;?> ">Xóa</a></td>
							</tr>

						<?php
								$subtotal += $total ;
							}
						}
						?>
							
						</table>

						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Grand Total :</th>
									<td>
										<?php
												if(isset($subtotal)){
													echo $fm->formatDollars($grandToltal = $subtotal)  ;
													session::set('sum',$grandToltal);	
												}																
										?>
									</td>
							</tr>   
					   </table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<?php
									$check_login = Session::get('customer_login');
									$accessToken = Session::get('accesstoken');
									if($check_login || $accessToken)
									{
										echo '<a href="payment.php"> <img src="images/check.png" alt="" /></a>' ;
									}
									// else if($accessToken)
									// {
									// 	 echo '<a href="form.php"> <img src="images/check.png" alt="" /></a>' ;
									// }
									else
									{
										echo '<a href="login.php"> <img src="images/check.png" alt="" /></a>' ;

									}
									
							?>
							
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

 <?php require_once 'inc/footer.php' ; ?>