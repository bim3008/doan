
<?php // Thêm danh mục CATEGORY ADD>PHP?>
<?php require_once 'inc/header.php';?>
<?php require_once 'inc/sidebar.php';?>
<?php require_once '../classes/category.php' ;?>
<?php
        $cat = new category();
        if(isset($_POST['catName']))
        {
            $catName = $_POST['catName'];
            $insertCat = $cat->insert_category($catName) ;
        }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm danh mục</h2>
                <?php
                        if(isset($insertCat))
                        {
                            echo $insertCat ;
                        }
                ?>
               <div class="block copyblock"> 
                 <form action="catadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name = "catName" placeholder="Vui lòng nhập danh mục sản phẩm..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                </form>
              </div>
            </div>
        </div>
<?php require_once 'inc/footer.php';?>