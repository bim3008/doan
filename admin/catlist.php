<?php require_once 'inc/header.php';?>
<?php require_once 'inc/sidebar.php';?>
<?php require_once '../classes/category.php' ;?>
<?php
		$cat = new category();
		//DELETE CATEGORY
		if(isset($_GET['catid']))
		{
			$id = $_GET['catid'];
			$delete_category = $cat->deleteCat($id);
		}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh Sách Sản Phẩm</h2>
                <div class="block"> 
					<?php
							if(isset($delete_category))
							{
								echo $delete_category ;
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
							$show_cate = $cat->showCategory();
							if(isset($show_cate))
							{	
								$i = 0;
								while($result = $show_cate->fetch_assoc()){
									$i++;							
						?>
						<tr class="odd gradeX">
							<td><?php echo $result['catId'];?></td>
							<td><?php echo $result['catName'];?></td>
							<td><a href="catedit.php?catid=<?php echo $result['catId'];?>">Edit</a> || <a onclick = 
							" return confirm('Are you want to delete ') "href="?catid=<?php echo $result['catId'];?>   ">Delete</a></td>
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

