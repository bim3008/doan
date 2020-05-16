
	<div class="header_bottom">
		<div class="header_bottom_left" style="width: 25%;">
			<div class="section group">
				<div class="content" style="width:100% ;margin-top: 20px;">
					<div style=" padding:0px">
						<h2 style="margin-top: -20px; text-align: center; ">DANH MỤC</h2>
							<th>
							<?php 
									$showall_cat = $ct->showAllCategory_FontEnd() ;
									if($showall_cat)
									{
										while($result_show=$showall_cat->fetch_assoc()){
								
								?>
									<td><a href="productbycat.php?catid=<?php  echo $result_show['catId'] ;?>"><?php echo '<h2> '.$result_show["catName"].'</h2>' ;?></a></td>
								<?php
									}
								}
								?>
							</th>	
					</div>		
			</div>
		
		
		</div>				
		  <div class="clear"></div>
			</div>
			 <div class="header_bottom_right_images" style="width:74%">
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