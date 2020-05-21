<?php
		require_once 'inc/header.php';
	//	require_once 'inc/silder.php';
?>
 <div class="main">		
	<div class="content">
            <div class="content_top">
                <div class="heading">
                <h3>ProFile Customer</h3>
                </div>
                <div class="clear"></div>
            </div>  
   
	    <div class="section group">	
            
                <table class="tblone">
                <?php
                    $id = Session::get('customer_id');

                    $check_profileCustomer = $customer->show_profile_customer($id) ;  
                    if($check_profileCustomer)
                    {
                        while($result =$check_profileCustomer->fetch_assoc())
                        {                         
                ?>
                        <tr>
                                <td>Name</td>
                                <td><?php echo  $result["fullname"] ;?></td>
                        </tr>
                        <tr>
                                <td>Addrees</td>
                                <td><?php echo  $result["address_cs"] ;?></td>
                        </tr>
                        <tr>
                                <td>Email</td>
                                <td><?php echo  $result["email"] ;?></td>
                        </tr>
                        <tr>
                                <td>Phone</td>
                                <td><?php echo  $result["phone"] ;?></td>
                        </tr>
                        <tr>
                                <td colspan="4"> <a href="editprofile.php">UPDATE PROFILE</a> </td>
                                
                        </tr>

                    <?php 
                        }}
                    ?>
                
                </table>
            
 		</div>
 	</div>
<?php 
	require_once 'inc/footer.php' ;
?>
