<?php require_once 'inc/header.php';?>
<?php require_once 'inc/sidebar.php';?>
<?php require_once '../classes/category.php';?>
<?php require_once '../classes/brand.php';?>
<?php require_once '../classes/product.php';?>
<?php require_once '../helpers/format.php';?>
<?php
	 $pd     = new product();
	 $fm     = new Format();
	if(isset($_GET['productid']))
	{
			$id = $_GET['productid'];
			$delete_product = $pd->deleteProduct($id) ;
	}
?>
<div class="grid_10">
    <div class="box round first grid">
		<h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<?php
							if(isset($delete_product))
							{
								echo $delete_product;
							}		
					
			?>       
			<thead>
				<tr>
					<th>ID</th>
					<th>Product Name</th>
					<th>Product Price</th>
					<th>Product Image</th>
					<th>Description</th>
					<th>Type</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				
				<?php
					// SHOW PRODUCT
					$pdlist = $pd->showProduct() ;
						if(isset($pdlist))
						{
							$i = 0;
							while($result = $pdlist -> fetch_assoc()){		
								$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $result['productId'] ;?></td>
					<td><?php echo $result['productName'] ;?></td>
					<td><?php echo $result['price'] ;?></td>
					<td style="margin-bottom: -25px;margin-top: 5px; padding-top: 5px;padding-bottom: 5px"> <img src="uploads/<?php echo $result['image_product'] ;?>"alt="#" width="50px" height="50px" ></td>
					<td><?php  echo  $limit = $fm->textShorten( $result['description_product'],10)    ;?></td>
					<td><?php 
							if($result['type_product'] == 1){
								echo "Featured" ;
							}else
							{
								echo "Not Featured" ;
							}   
					?></td>
					<td><?php echo $result['catName'] ;?></td>
					<td><?php echo $result['brandName'] ;?></td>
					<td><a href="productedit.php?id=<?php echo $result['productId'] ;?>">Edit</a> || 
					<a onclick = " return confirm('Are you want to delete ')" href="?productid=<?php echo $result['productId'] ;?>"> Delete </a></td>
				</tr>
				<?php
					}}else{
						echo  'Dữ Liệu Rỗng';
					}
					
				?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php require_once 'inc/footer.php';?>
