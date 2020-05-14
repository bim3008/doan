<?php
	require_once 'inc/header.php';
	if(!isset($_GET['catid']) && $_GET['catid'] == '')
	{
		echo "<script>window.location = 'details.php'</script>" ;
	}
	else
	{   
		$id = $_GET['catid'] ;
	}

?>
<style>
	.image_product{
		padding-left: 0px;
	}

</style>
 <div class="main">
    <div class="content">
    	<div class="content_top">
			<!-- Hiển thị tên Danh Mục -->
				<?php	
					$show_cat = $ct->get_name_by_cat($id) ;
					if($show_cat){
						while($result_cat = $show_cat->fetch_assoc()){
				?>
				<div class="heading">
				<h3>CATEGORY :<?php echo $result_cat['catName'] ;?></h3>
				</div>
				<?php
						}}
				?>
				<div class="clear"></div>
			</div>
			<!-- Hiển thị sản phẩm --> 
	    <div class="section group"> 
			<?php 
				$show_product = $ct->get_product_by_cat($id) ;
				if($show_product){
					while($result = $show_product->fetch_assoc()){
			?>
				<div class="grid_1_of_4 images_1_of_4 ">
					<a   href="details.php?proid=<?php echo $result['productId'] ;?>"><img class="image_product" style="height:200px;" src="admin/uploads/<?php echo $result['image_product'];?>" alt="" /></a>
					<h2><?php echo $result['productName'] ;?> </h2>
					<p><?php echo $fm->textShorten($result['description_product'],40);?></p>
					<p><span class="price"><?php echo $result['price'] . " " ."VNĐ" ?></span></p>
					<div class="button"><span> <a href="details.php?proid=<?php echo $result['productId'] ;?>" class="details">Chi tiết</a></span></div>	
				</div>
			<?php 
					}
				}
			?>					
				
		</div>
				
    </div>
 <?php
		require_once 'inc/footer.php' ;
 ?>