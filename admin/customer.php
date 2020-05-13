<?php // tdêm danh mục CATEGORY ADD>PHP?>
<?php require_once 'inc/header.php';?>
<?php require_once 'inc/sidebar.php';?>
<?php require_once '../classes/customer.php' ;?>
<?php
        $customer = new customer();
        if(!isset($_GET['customerid']) || $_GET['customerid'] == "")
        {
            echo  "<script>window.location = 'inbox.php'</script>" ;
        }
        else
        {   
            $id = $_GET['customerid'] ;
        } 
     
?>
<style>
    .block tr{
        font-size: 20px 
    }

</style>

<div class="grid_10">
    <div class="box round first grid">
		<h2>Information Customer</h2>
        <div class="block">  
            <table class="data display datatable" id="example">				
                <?php
                    $get_information_customer = $customer->getInformationCustomer($id);
                    if($get_information_customer)
                    {
                        while($result = $get_information_customer->fetch_assoc())
                    {
                        
                ?>    
				<tr>
                    <td>Name : </td>
                    <td> <?php echo  $result['fullname'] ;?></td> 
                </tr>
                <tr>
                    <td>Address :</td> 
                    <td> <?php echo  $result['address_cs'] ;?></td>     
                </tr>
                <tr>
                    <td>Phone :</td> 
                    <td> <?php echo  $result['phone'] ;?></td>   
                </tr>    
                <tr>
                    <td>Zipcode :</td> 
                    <td> <?php echo  $result['zipcode'] ;?></td>
                </tr>     
                    
             
                <?php }}?>			
         
		</table>

       </div>
    </div>
</div>
<?php require_once 'inc/footer.php'  ;