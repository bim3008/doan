<?php
		require_once 'inc/header.php';
	//	require_once 'inc/silder.php';
?>
 <div class="main">

	<?php
		// Khi người dùng ấn vào chi tiết sản phẩm
		if(!isset($_GET['proid']) && $_GET['proid'] == NULL)
		{
			   echo "<script>window.location = '404.php'</script>" ;
		}
		{  
			   $id = $_GET['proid'];
		}
		// Khi người dùng nhấn mua hàng 
		if($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['submit']))
		{
		   $quantity = $_POST['quantity'];	 
		   $AddToCart = $cart->add_to_cart($id,$quantity);
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
							<p>Price: <span><?php echo  $result_details['price']." "."VNĐ" ;?></span></p>
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
						
		</div>
		<!-- PHP -->
				<?php
					}}
				?>
		<!-- PHP -->

		<!-- Danh mục sản phẩm -->
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
						<?php
							$showall_cat = $ct->showAllCategory_FontEnd() ;
							if($showall_cat)
							{
								while($result_show=$showall_cat->fetch_assoc()){
						
						?>
						    <li><a href="productbycat.php?catid=<?php  echo $result_show['catId'] ;?>"><?php echo '<h2> '.$result_show["catName"].'</h2>' ;?></a></li>
						<?php
							}
						}
						?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
<?php 
	require_once 'inc/footer.php' ;
?>
