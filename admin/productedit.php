<?php require_once 'inc/header.php';?>
<?php require_once 'inc/sidebar.php';?>
<?php require_once '../classes/category.php';?>
<?php require_once '../classes/brand.php';?>
<?php require_once '../classes/product.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa sản phảm</h2>
        <div class="block"> 
        <?php
                $procduct = new product();
                $cat      = new category();
                //---------- EDIT PRODUCT-----------
                if(!isset($_GET['id']) && $_GET['id'] == '')
                {
                    echo "<script>window.location = 'productlist.php'</script>" ;      
                }
                else
                {   
                    $id = $_GET['id'] ;
                    if(isset($_POST['submit']))
                    {
                         $updateProduct = $procduct->updateProduct($_POST,$_FILES,$id) ;
                    } 
                }
                // UPDATE PRODUCT
               
         ?>
         <?php 
            // SHOW PRODUCT
            $get_product_id = $procduct->get_id_product($id) ;
            if($get_product_id)
            {
                while($result_product = $get_product_id->fetch_assoc()){             
         ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
                <?php
                    if(isset($updateProduct))
                    {
                        echo   $updateProduct;
                    }
                
                ?>
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name ="nameProduct" value="<?php echo $result_product['productName'] ;?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Danh mục</label>
                    </td>
                    <td>
                        <select id="select" name="category" >
                                <option>------Chọn danh mục-----</option>
                            <?php
                                  
                                    $catlist =$cat->showCategory();
                                    if($catlist)
                                    {
                                        while($result =$catlist->fetch_assoc())
                                        {
                            ?>
                                <option

                                <?php 
                                    if($result['catId'] == $result_product['catId']){ 
                                      echo 'selected' ;
                                    } 
                                
                                ?>
                                
                                value="<?php echo $result['catId'] ;?>"><?php echo $result['catName'] ;?></option>
                            <?php
                            
                                        }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Thương hiệu</label>
                    </td>
                    <td>
                        <select id="select" name="brand" >
                                <option>------Chọn thương hiệu-----</option>
                            <?php
                                    $brand     = new brand() ;
                                    $brandlist =$brand->showBrand();
                                    if($brandlist)
                                    {
                                        while($result =$brandlist->fetch_assoc())
                                        {
                            ?>
                                <option 
                                
                                <?php 
                                    if($result['brandId'] == $result_product['brandId']){ 
                                      echo 'selected' ;
                                    } 
                                
                                ?>
                                value="<?php echo $result['brandId'] ;?>"><?php echo $result['brandName'] ;?></option>
                            <?php
                            
                                        }
                                }
                            ?>
                        </select>
                    </td>
                </tr>

               
				
				<tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="description"><?php echo $result_product['description_product'];?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo  $result_product['price'] ;?>" class="medium" name="price"/>
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Hình ảnh</label>
                    </td>
                    <td>
                        <input type="file" name="image"> </br>
                        <img src="uploads/<?php echo $result_product['image_product'] ;?>"alt="#" width="80px" height="80px" >
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Nổi bật/Không nổi bật</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <?php
                                if($result_product['type_product'] == 1 )
                                {
                            ?>    
                            <option selected value="1">Featured</option> ;
                            <option value="0">Not Featured</option>  ;
                            <?php   
                                }else{

                            ?>
                            <option          value="1">Featured</option> ;
                            <option selected value="0">Not Featured</option>  ;
                                
                                <?php }

                                ?>        
                        </select>
                    </td>
                </tr>
                                
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Cập nhập" />
                    </td>
                </tr>
            </table>
            </form>
            <?php
             }}
            ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php require_once 'inc/footer.php';?>


