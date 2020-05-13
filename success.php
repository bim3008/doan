<?php
		require_once 'inc/header.php';
	//	require_once 'inc/silder.php';
?>  
    <style>
        p{
            color: red;
        font-size: 30px;
        text-align: center;
        }
    </style>
    <div class="main">		
		<div class="content">
            <div class="content_top">
                <?php

                    $success ='<p>Order Successfully !! Thank you </p>'  ;
                    echo $success ;
                    Session::set('success',$success) ;

                ?>
              
            </div>    
 		</div>
 	</div>
<?php
	require_once 'inc/footer.php' ;