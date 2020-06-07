﻿<?php require_once 'inc/header.php';?>
<?php require_once 'inc/sidebar.php';?>
<?php require_once '../classes/cart.php' ;?>
<?php require_once '../helpers/format.php' ;?>
<form action="">
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Đơn đặt hàng</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<?php
							$cart = new cart();
							if(isset($_GET['proccessid']) && isset($_GET['price']))
							{
								$id = $_GET['proccessid'];
								$price = $_GET['price'];
								$status = $cart->proccess_status($id,$price);
							}
							if(isset($_GET['proccessedid']) && isset($_GET['price']))
							{
								$id = $_GET['proccessedid'];
								$price = $_GET['price'];
								$delete_order = $cart->delete_process($id,$price);
							}
					?>
					<thead						
						<tr>
							<th>No.</th>
							<th>Khách hàng ID</th>
							<th>Ngày đặt hàng</th>
							<th>Sản phẩm</th>
							<th>Số lượng</th>
							<th>Giá</th>
							<th>Thông tin khách hàng</th>
							<th>Trạng thái</th>
						</tr>
						
					</thead>
					<tbody>
					<?php
							$cart =  new cart();
							$fm   =  new Format;
							$get_ordered_cart = $cart->get_ordered_cart() ;
							$i = 0;
							if($get_ordered_cart)
							{
								while($result = $get_ordered_cart->fetch_assoc())
								{
									$i++;						
					?>

						<tr class="odd gradeX">
							<td><?php echo $i ;?></td>
							<td><?php echo $result['customer_id'] ;?></td>
							<td><?php echo $fm->formatDate($result['date']) ;?></td>
							<td><?php echo $result['productName'] ;?></td>
							<td><?php echo $result['quantity'] ;?></td>
							<td><?php echo $result['price'] ;?></td>
							<td><a href="customer.php?customerid=<?php echo $result['customer_id'] ;?>">Hiển thị thông tin</a></td>
							<td><?php
									if($result['status_order'] == 0)
									{ ?>
										 <a href="?proccessid=<?php echo $result['customer_id'];?>&price=<?php echo $result['price']?>">Chưa xử lý</a> 
									<?php }
									else{ ?>
										<a href="?proccessedid=<?php echo $result['customer_id'];?>&price=<?php echo $result['price']?>">Đã xử lý</a> 	
									<?php }
							?></td>
						</tr>
						<?php
								}}
						?>			
					</tbody>
					
					
					</table>
					
               </div>
            </div>
		</div>
		
</form>

<!-- <script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>

<?php  require_once 'inc/footer.php' ;?> -->
