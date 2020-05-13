
	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
			<!-- GET IPHONE -->
			<?php
					
					$getIphone = $pr->getIphone() ;
					if($getIphone)
					{
						while($resultIp = $getIphone->fetch_assoc())
						{

						
			
			?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $resultIp['productId']?>"> <img src="admin/uploads/<?php echo $resultIp['image_product']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Iphone</h2>
						<p> <?php echo $fm->textShorten($resultIp['description_product'],30) ;?> </p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultIp['productId']?>">Add to cart</a></span></div>
				   </div>
			   </div>
			<?php
						}
					}		
			?>	
			<!-- GET SAMSUNG -->
			<?php
					
					$getSS = $pr->getSamsung() ;
					if($getSS)
					{
						while($resultSS = $getSS->fetch_assoc())
						{			
			
			?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
					<a href="details.php?proid=<?php echo $resultSS['productId']?>"> <img src="admin/uploads/<?php echo $resultSS['image_product']?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Samsung</h2>
						  <p><?php echo $fm->textShorten($resultSS['description_product'],30) ;?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultSS['productId']?>">Add to cart</a></span></div>
					</div>
				</div>
			</div>
			<?php
						}
					}		
			?>	
			<!-- GET OPPO -->
			<?php
					
					$getOppo = $pr->getOppo() ;
					if($getOppo)
					{
						while($resultOppo = $getOppo->fetch_assoc())
						{			
			
			?>
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
					<a href="details.php?proid=<?php echo $resultOppo['productId']?>"> <img src="admin/uploads/<?php echo $resultOppo['image_product']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Oppo</h2>
						<p><?php echo $fm->textShorten($resultOppo['description_product'],30) ;?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultOppo['productId']?>">Add to cart</a></span></div>
				   </div>
			   </div>		
			<?php
						}
					}		
			?>	  
			<!-- GET HUAWAI -->
			<?php
					
					$getHuawai = $pr->getHuawai() ;
					if($getHuawai)
					{
						while($resultHw =$getHuawai->fetch_assoc())
						{			
			
			?>   
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
					<a href="details.php?proid=<?php echo $resultHw['productId']?>"> <img src="admin/uploads/<?php echo $resultHw['image_product']?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Huawai</h2>
						  <p><?php echo $fm->textShorten($resultHw['description_product'],50) ;?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultHw['productId']?>">Add to cart</a></span></div>
					</div>
				</div>
			</div>
			<?php
						}
					}		
			?>	  
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt=""/></li>
						<li><img src="images/2.jpg" alt=""/></li>
						<li><img src="images/3.jpg" alt=""/></li>
						<li><img src="images/4.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>