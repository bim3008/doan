<?php
		require_once 'inc/header.php';
	//	require_once 'inc/silder.php';
?>  
<?php
        $check_cart = Session::get('sum') ;
        if($check_cart == "" || $check_cart == NULL)
        {
                header('location:cart.php') ;
        }
?>  
    <style>
        .payment {
            text-align: center;
            margin-left: 25%;
            width: 50%;
            height: 20%;
            border: 2px solid ;
            margin-top: 10px ;    
            background-color: #CFCFCF;
        }
        .online{
            border: 1px solid;
            background: red;  
            font-size: 20px;
            display: inline-block;
            margin: 10px;
            padding: 5px;
        }
        .off{
            border: 1px solid;
            background: red;  
            font-size: 20px; 
            display: inline-block;
            padding: 5px ;
        }
        .online :hover{
           background-color: grey;
        }
        .off :hover{
           background-color: grey;
        }
    </style>
    <div class="main">		
		<div class="content">
            <div class="content_top">
                <div class="heading">
                <h3>Payment Method</h3>
                </div>
                <div class="clear"></div>
            </div>
            <div class="payment">
                <h2>Choose Method Payment</h2>
               <div  class="online"> <a href="payonline.php">Thanh toán Online</a></div> 
               <div  class="off"> <a href="payoffline.php">Thanh toán Offline</a></div> 
               <!-- <div class="pre"><a href="cart.php">Previous</a></div>           -->
            </div>
            
 		</div>
 	</div>
<?php
	require_once 'inc/footer.php' ;

