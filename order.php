<?php
	require_once 'inc/header.php';
?>
<div class="main">		
	<div class="content">
            <div class="content_top" style=" margin-bottom:5px">
                <div class="heading">
                <h3>Lịch Sử</h3>
                </div>
                <div class="clear"></div>
            </div>  
        <div class="section group">	
            <table class="tblone">
            <tr>
                <th width="5%">Id</th>
                <th width="10%">Tên Sản Phẩm</th>
                <th width="10%">Hình ảnh</th>
                <th width="15%">Giá</th>
                <th width="5%">Số lượng</th>
                <th width="15%">Tổng tiền</th>
                <th width="10%">Tình trạng</th>
                <th width="10%">Ngày</th>
            </tr>
                <?php
                    
                    // $customer_id  = Session::get('customer_id');    
                    // $facebookId   $customer_id
                    if(Session::get('customer_id') == true)
                    {
                        $customer_id  = Session::get('customer_id'); 
                    }
                    if(isset($userData['id']))
                    {
                        $customer_id =  $userData['id'] ;
                    }
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
                        <td><?php echo $fm->formatDollars( $total =  $result['price'] * $result['quantity'])   ;?></td>
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