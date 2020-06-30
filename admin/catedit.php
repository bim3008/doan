
<?php // Thêm danh mục CATEGORY ADD>PHP?>
<?php require_once 'inc/header.php';?>
<?php require_once 'inc/sidebar.php';?>
<?php require_once '../classes/category.php' ;?>
<?php
        $cat = new category();
        if(!isset($_GET['catid']) && $_GET['catid'] == '')
        {
            echo  "<script>window.location = 'catlist.php'</script>" ;
        }
        else
        {   
            $id = $_GET['catid'] ;
        }
        if(isset($_POST['catName']))
        {
            $catName = $_POST['catName'] ;

            $updateCategory = $cat->updateCat($catName,$id);
        }

     
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa thương hiệu</h2>
                <?php
                        if(isset($updateCategory))
                        {
                            echo $updateCategory;
                        }
                ?>
                <?php
                        $get_cat_name = $cat->editCategory($id);
                        if($get_cat_name)
                        {
                            while($result = $get_cat_name->fetch_assoc()){
                ?>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo  $result['catName'] ;?>" name = "catName" placeholder="Sửa thư mục..." class="medium" />
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