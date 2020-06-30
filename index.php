<?php
		require_once 'inc/header.php';
		require_once 'inc/silder.php' ;
?>
<?php 
?>
 <div class="main">
    <div class="content">
    	<div class="content_top" style="margin-top: 30px;background-color: #414045;">
    		<div class="heading">
    		<h3 style="color:blanchedalmond">Sản phẩm nổi bật</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div "  class="section group">
			<!-- START SẢN PHẨM NỔI BẬT -->
			  <?php
					// LẤY SẢN PHẨM NỔI BẬT 	  
					$productFreatured = $pr->getproduct_featured() ;
					if($productFreatured)
					{
						while($result = $productFreatured->fetch_assoc())
						{
			  ?>
				<div class="grid_1_of_4 images_1_of_4 ">
					 <a href="details.php?proid=<?php echo $result['productId']?>"><img style="height: 200px" src="admin/uploads/<?php echo $result['image_product'] ;?>" alt="" /></a>
					 <h2><?php echo  $result['productName'] ;?> </h2>
					 <p> <?php echo $fm->textShorten($result['description_product'],30) ;?>  </p>
					 <p><span class="price"><?php echo  $fm->formatDollars($result['price'] . " ". "VNĐ" );?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php							
						}
					}			
				?>
			<!-- END SẢN PHẨM NỔI BẬT -->
			</div>
			<div style="background-color: 414045;"  class="content_bottom">
    				<div class="heading">
    					<h3 style="color:blanchedalmond">Sản phẩm mới</h3>
    				</div>
    				<div class="clear"></div>
			</div>
			<div class="section group">			
				<?php
						// LẤY SẢN PHẨM MỚI  
						$productNew = $pr->getproduct_new() ;
						if($productNew)
						{
							while($result_new = $productNew->fetch_assoc())
							{
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result_new['productId'];?>"><img style="height: 200px" src="admin/uploads/<?php echo $result_new['image_product'] ;?>" alt="" /></a>
					 <h2><?php echo  $result_new['productName'] ;?> </h2>
					 <p> <?php echo $fm->textShorten($result_new['description_product'],30) ;?>  </p>
					 <p><span class="price"><?php echo $fm->formatDollars($result_new['price'] . " ". "VNĐ") ;?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_new['productId'];?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php
							}}
				?>				
			</div>
    </div>
 </div>	  
 <?php require_once 'inc/footer.php' ;?>

