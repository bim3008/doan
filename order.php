<?php
	require_once 'inc/header.php';
?>
<div class="main">		
	<div class="content">
            <div class="content_top" style=" margin-bottom:5px">
                <div class="heading">
                <h3>Your Details Ordered</h3>
                </div>
                <div class="clear"></div>
            </div>  
        <div class="section group">	
            <table class="tblone">
            <tr>
                <th width="5%">ID</th>
                <th width="10%">Product Name</th>
                <th width="10%">Image</th>
                <th width="15%">Price</th>
                <th width="5%">Quantity</th>
                <th width="15%">Total Price</th>
                <th width="10%">Status</th>
                <th width="20%">Date</th>
            </tr>
                <?php
                    $customer_id  = Session::get('customer_id');
                    $get_ordered = $order->get_ordered($customer_id);
                    if($get_ordered)
                    {
                        $i = 0;
                        $sum = 0;
                        while($result = $get_ordered->fetch_assoc())
                        {
                            $i++;
                ?>
                <tr>
                        <td><?php echo  $i; ?></td>
                        <td><?php echo  $result['productName'] ;?></td>
                        <td><img src="admin/uploads/<?php echo  $result['image_order']; ?>" alt=""/></td>
                        <td><?php echo  $result['price'] ;?></td>
                        <td><?php echo  $result['quantity'] ;?></td>
                        <td><?php echo $total =  $result['price'] * $result['quantity'] ;?></td>
                        <td><?php  if($result['status_order'] == 0){
                                       echo 'Đang xử lý' ; } else{echo 'Đã xử lý' ;}
                                
                         ;?></td>
                        <td><?php echo $fm->formatDate($result['date']) ;?></td>
                    
                </tr> 
                        
                <?php            
                        $sum += $total ;
                        }
                        
                    }
                ?>
                                        
            </table>
            </div>
            </div>
    </div>
   
      
<?php
    require_once 'inc/footer.php' ;