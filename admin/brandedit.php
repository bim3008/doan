
<?php // Thêm danh mục CATEGORY ADD>PHP?>
<?php require_once 'inc/header.php';?>
<?php require_once 'inc/sidebar.php';?>
<?php require_once '../classes/brand.php' ;?>
<?php
        // Edit
        $brand = new brand();
        if(!isset($_GET['brandid']) && $_GET['brandtid'] == '')
        {
           echo "<script>window.location = 'brandlist.php'</script>" ;
            
        }
        else
        {   
            $id = $_GET['brandid'] ;
        }
        if(isset($_POST['brandName']))
        {
            $brandName = $_POST['brandName'] ;

            $updateCategory = $brand->updateBrand($brandName,$id);
        }

     
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa thư mục</h2>
                <?php
                        if(isset($updateCategory))
                        {
                            echo $updateCategory;
                        }
                ?>
                <?php //EXIT BRAND?>
                <?php
                        $get_cat_name = $brand->editBrand($id);
                        if($get_cat_name)
                        {
                            while($result = $get_cat_name->fetch_assoc()){
                ?>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo  $result['brandName'] ;?>" name = "brandName" placeholder="Sửa thương hiệu..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Edit" />
                            </td>
                        </tr>
                    </table>
                </form>
                <?php

                        
                            }
                            }                                               
                ?>
              </div>
            </div>
        </div>
<?php require_once 'inc/footer.php';?>