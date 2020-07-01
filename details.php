<?php
		require_once 'inc/header.php';
	//	require_once 'inc/silder.php';
		$customer_id 		= Session::get('customer_id') ;
			 // $customer_facebook  = $userData['id'] ;
			 error_reporting(0);
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
	?>
<?php
			if(isset($_POST['submitComment']))
			{
				if(isset($customer_id))
				{
					$id = $_GET['proid'];
					$messge            =  $_POST['messge'];
					$insert_comment	   =  $customer -> insertComment($customer_id,$_POST,$id) ;		
				}
						
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
							<p>Giá: <span><?php echo $fm->formatDollars($result_details['price']." "."VNĐ") ;?></span></p>
							<p>Thư Mục: <span><?php echo $result_details['catName'] ;?></span></p>
							<p>Thương hiệu:<span><?php echo $result_details['brandName']; ?></span></p>
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
										echo '<span style="color:red">Sản phẩm đã được thêm</span>';
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
					$showComment = $comment->showComment($id) ;
					if(!$showComment)
					{
							echo '<h2 style="text-align: center;margin-top: 10px;color: red;">Sản phẩm chưa có bình luận</h2>' ;
					}
					else
					{
						while($result_comment = $showComment->fetch_assoc())
						{
					
			?>
					
					<div style="border: 1px solid ; width:700px ;margin:20px 0px ; background-color: #EEEEEE;  margin-top:20px ; ">

						<div class = "name" style="font-size: 20px;color:red ; padding:10px"> Tên:<?php  echo  $result_comment['fullname']?> </div>
					 	<div  class = "comments" style="color: black; padding:5px;"><?php echo  $result_comment['comment'] ;?></div>
					
						<div  class = "date"  style="margin-left:550px;font-family: fantasy;"><?php echo  $result_comment['date']?></div>	
					</div>	
			<?php 
						}

					}											
					
			?>
			<?php
				
				if($customer_id || $customer_facebook)
				{ ?>
						<form action="" method="POST">
							<textarea style="margin:20px 0px 0px;" name="messge" id="" cols="98" rows="8" placeholder="Viêt bình luận"></textarea>
							<input style="margin-top:5px ; width:70px ; height:30px ; margin-left: 89.5%;" type="submit" name="submitComment" value="Bình luận">
						</form>
				<?php }

		?>		

				
 		</div>
 	</div>
<?php 
	require_once 'inc/footer.php' ;
?>
