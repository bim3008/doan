<?php
    require_once 'inc/header.php';	
    require_once 'functions.php'
?>
<?php
        if(!isset($_POST['search']) || $_POST['search'] == NULL)
        {
                header('location:index.php') ;
        }
        {   
                 $productSearch = $_POST['search'] ;
                 //$productSearch = preg_replace("#[^0-9a-z]#i", "", $productSearch);
                //  echo $productSearch = convert_vi_to_en($productSearch);
        }

?>
 	<div class="main">
    <div class="content">
    	<div class="content_top">
            <h2>KẾT QUẢ TÌM KIẾM:</h2>
				<div class="clear"></div>
		</div>
            <!-- Hiển thị sản phẩm --> 
			<div class="section group"> 
                    <?php 
                        $pr = new product();
                        $get_product_search = $pr->get_product_search($productSearch) ;
                        if(isset($get_product_search))
                        {
                            while($result = $get_product_search->fetch_assoc()) {      
                    ?>
                    
                        <div class="grid_1_of_4 images_1_of_4 ">
                            <a href="details.php?proid=<?php echo $result['productId'] ;?>"><img class="image_product" style="height:200px;" src="admin/uploads/<?php echo $result['image_product'];?>" alt="" /></a>
                            <h2><?php echo $result['productName'] ;?> </h2>
                            <p><?php echo $fm->textShorten($result['description_product'],40);?></p>
                            <p><span class="price"><?php echo $fm->formatDollars($result['price']);?></span></p>
                            <div class="button"><span> <a href="details.php?proid=<?php echo $result['productId'] ;?>" class="details">Chi tiết</a></span></div>	
                        </div>
                    <?php 
                           }
                        }
                    ?>					
					
			</div>
		
			
	</div>
</div>

<?php
	require_once 'inc/footer.php' ;
?>