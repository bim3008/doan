<?php require_once 'inc/header.php';?>
<?php require_once 'inc/sidebar.php';?>
<?php require_once '../classes/brand.php' ;?>
<?php
        $brand= new brand();
        // DELETE BRAND
		if(isset($_GET['brandid']))
		{
			$id = $_GET['brandid'];
			$delete_brand = $brand->deleteBrand($id);
		}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh Sách Sản Phẩm</h2>
                <div class="block"> 
					<?php
							if(isset($delete_brand))
							{
								echo $delete_brand ;
							}		
					
					?>       
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                        <?php
                        // SHOW BRAND
							$show_brand = $brand->showBrand();
							if(isset($show_brand))
							{	
								$i = 0;
								while($result = $show_brand->fetch_assoc()){
									$i++;							
						?>
						<tr class="odd gradeX">
							<td><?php echo $result['brandId'];?></td>
							<td><?php echo $result['brandName'];?></td>
							<td><a href="brandedit.php?brandid=<?php echo $result['brandId'];?>">Edit</a> || <a onclick = 
							" return confirm('Are you want to delete ') " href="?brandid=<?php echo $result['brandId'];?>   ">Delete</a></td>
						</tr>
						<?php
								}
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

