<?php
		require_once 'inc/header.php';
	//	require_once 'inc/silder.php';
		$customer_id = Session::get('customer_id') ;
?>

 <div class="main">

	<?php
		// Khi người dùng ấn vào chi tiết sản phẩm
		if(!isset($_GET['proid']) && $_GET['proid'] == NULL)
		{
			 //  echo "<script>window.location = '404.php'</script>" ;
		}
		{  
			   $id = $_GET['proid'];
		}
		// Khi người dùng nhấn mua hàng 
		if($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['submit']))
		{
		   $quantity  = $_POST['quantity'];	 
		   $AddToCart = $cart->add_to_cart($id,$quantity);
		}
		// SO Sánh
	
		// if(isset($_POST['productid']) )
		// {	  
		// 	$productid      = $_POST['productid'] ;
		// 	$insert_compare = $pr->insert_compare($productid,$customer_id) ;
		// }
	?>
<?php
			if(isset($_POST['submitComment']))
			{
				$id = $_GET['proid'];
				$messge            =  $_POST['messge'];
				$insert_comment	   =  $customer -> insertComment($customer_id,$_POST,$id) ;				
			}
?>
	
		<div class="content">
			<div class="section group">
				<!-- Khi người dùng nhấn vào chi tiết sẽ  -->
					<?php 
						$product_details = $pr->productDetails($id);
						if($product_details)
						{
							while($result_details = $product_details->fetch_assoc())
							{		

					?>
					<div class="cont-desc span_1_of_2">				
						<div class="grid images_3_of_2">
							<a href="./admin/uploads/<?php echo $result_details['image_product'] ;?>"><img src="admin/uploads/<?php echo $result_details['image_product'] ;?>" alt="" /> </a>
					</div>
					<div class="desc span_3_of_2">
						<h2><?php echo $result_details['productName'] ;?> </h2>
						<p> <?php echo $fm->textShorten($result_details['description_product'],50) ;?></p>					
						<div class="price">
							<p>Price: <span><?php echo $fm->formatDollars($result_details['price']." "."VNĐ") ;?></span></p>
							<p>Category: <span><?php echo $result_details['catName'] ;?></span></p>
							<p>Brand:<span><?php echo $result_details['brandName']; ?></span></p>
					</div>
					<div class="add-cart">
						<form action="" method="post">
							<input type="hidden" class="catid" value="<?php echo $result_details['catId'] ;?>">
							<input type="number" class="buyfield" name="quantity" value="1" min= "1"/>
							<input type="submit" class="buysubmit" name="submit" value="Mua ngay"/>							
							</form>
							<?php
									if(isset($AddToCart))
									{
										echo 'Product Already Added';
									}
							?>			
					</div>
				
				</div>
				<div class="product-desc">
				<h2>Chi tiết sản phẩm</h2>
				<p><?php echo $result_details['description_product'] ;?></p>
			</div>


			
		<!-- PHP -->
				<?php
					}}
				?>
		<!-- PHP -->
		<div class="product-desc">
				<h2>Bình luận</h2>		
					</div>
			<?php
				
					if($customer_id)
					{ ?>
						    <form action="" method="POST">
								<textarea style="margin:20px 0px 0px;" name="messge" id="" cols="98" rows="8" placeholder="Viêt bình luận"></textarea>
								<input style="margin-top:5px ; width:60px ; height:30px ; margin-left: 91.5%;" type="submit" name="submitComment" value="Gửi">
							</form>
					<?php }
					else
					{
						echo "" ;
					}
			?>		
			<?php
					$showComment = $comment->showComment($id) ;
					if($showComment)
					{
						while($result_comment = $showComment->fetch_assoc())
						{
					
			?>
					<input type="text" value="<?php echo  $result_comment['comment'] ;?>">
					<p><?php echo  $result_comment['fullname']?></p>
					<p><?php echo  $result_comment['date']?></p>
		
			<?php 
						}}
			?>

				
 		</div>
 	</div>
<?php 
	require_once 'inc/footer.php' ;
?>
