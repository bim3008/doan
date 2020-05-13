
<?php // Thêm thương hiệu sản phẩm>PHP?>
<?php require_once 'inc/header.php';?>
<?php require_once 'inc/sidebar.php';?>
<?php require_once '../classes/brand.php' ;?>
<?php
        $brand = new brand();
        if(isset($_POST['brandName']))
        {
            $brandName = $_POST['brandName'];
            $insertBrand = $brand->insert_brand($brandName) ;
        }
?> 
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm thương hiệu</h2>
                <?php
                        if(isset($insertBrand))
                        {
                            echo $insertBrand ;
                        }

                ?>
               <div class="block copyblock"> 
                 <form action="brandadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name = "brandName" placeholder="Vui lòng thêm thương hiệu sản phẩm..." class="medium" />
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