<?php
		require_once 'inc/header.php';
	//	require_once 'inc/silder.php';
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

		$customer_id = Session::get('customer_id') ;
		if(isset($_POST['productid']) )
		{	  
			$productid      = $_POST['productid'] ;
			$insert_compare = $pr->insert_compare($productid,$customer_id) ;
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
							<img src="admin/uploads/<?php echo $result_details['image_product'] ;?>" alt="" />
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
					<div class="add-cart">
						<!-- <form action="" method="POST">
							<input type="hidden" name="productid" value="<?php echo $result_details['productId'] ;?>">
							<input type="submit" class="buysubmit" name="compare" value="So sánh"/>	
						</form>	 -->
					</div>
					<?php
						if(isset($insert_compare))
						{
							echo $insert_compare;
						}
					?>
				</div>
				<div class="product-desc">
				<h2>Chi tiết sản phẩm</h2>
				<p><?php echo $result_details['description_product'] ;?></p>
			</div>
						
		</div>
		<!-- PHP -->
				<?php
					}}
				?>
		<!-- PHP -->

		<!-- Danh mục sản phẩm -->
				
 		</div>
 	</div>
<?php 
	require_once 'inc/footer.php' ;
?>
