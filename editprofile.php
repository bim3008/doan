<?php
		require_once 'inc/header.php';
	//	require_once 'inc/silder.php';
?>
<?php
        $check_loginProfile= Session::get('customer_login');
        if($check_loginProfile == false){

           header('location:login.php') ;
        }
?>    
 <div class="main">		
		<div class="content">
            <div class="content_top">
                <div class="heading">
                <h3>Update Profile</h3>
                </div>
                <div class="clear"></div>
            </div>
            <?php
                if(isset($_POST['updateprofile']))
                {
                    $id_update = Session::get('customer_id');
                    $customer = new customer() ;
                    $updateProfile = $customer->update_profile($_POST,$id_update) ;
                    header('location:profile.php');
                }
            
            ?>
			<div class="section group" style="display: table">	
            <?php
                    if(isset($updateProfile))
                    {
                        echo  $updateProfile ;
                    }
            
            ?>
                <form action="" method="POST">
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
                                   <td><input type="text" name="name" value="<?php echo  $result["fullname"] ;?>" style="width: 250px; height: 25px;">   </td>
                            </tr>
                            <tr>
                                    <td>Addrees</td>
                                    <td><input type="text" name="address" value="<?php echo $result["address_cs"] ;?>" style="width: 250px; height: 25px;">  </td>
                            </tr>
                            <tr>
                                    <td>Email</td>
                                    <td><input type="text" name="email" value="<?php echo  $result["email"] ;?>" style="width: 250px; height: 25px;">  </td>

                            </tr>
                            <tr>
                                    <td>Phone</td>
                                    <td><input type="text" name="phone" value="<?php echo  $result["phone"] ;?>"style="width: 250px; height: 25px;">  </td>

                            </tr>

                            <tr>
                                    <td colspan="4"><input type="submit" name="updateprofile" value="Update" style="height: 30px;font-size: 20px;"></td>
                                    
                            </tr>

                        <?php 
                            }}
                        ?>
                    
                    </table>
                </form>
            
 		</div>
 	</div>
<?php 
	require_once 'inc/footer.php' ;
?>
