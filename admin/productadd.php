<?php require_once 'inc/header.php';?>
<?php require_once 'inc/sidebar.php';?>
<?php require_once '../classes/category.php';?>
<?php require_once '../classes/brand.php';?>
<?php require_once '../classes/product.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm sản phảm</h2>
        <div class="block"> 
            <?php
                    $procduct = new product();
                    if($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['submit']))
                    {
                            $insertProduct = $procduct->insert_product($_POST,$_FILES) ;
                    }
            
            ?>              
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
                <?php
                    if(isset($insertProduct))
                    {
                        echo  $insertProduct;
                    }
                
                ?>
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name ="nameProduct" placeholder="Nhập tên sản phẩm..." class="medium" />
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
                                    $cat     = new category() ;
                                    $catlist =$cat->showCategory();
                                    if($catlist)
                                    {
                                        while($result =$catlist->fetch_assoc())
                                        {
                            ?>
                                <option value="<?php echo $result['catId'] ;?>"><?php echo $result['catName'] ;?></option>
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
                                <option value="<?php echo $result['brandId'] ;?>"><?php echo $result['brandName'] ;?></option>
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
                        <textarea class="tinymce" name="description"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Price..." class="medium" name="price"/>
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Hình ảnh </label>
                    </td>
                    <td>
                        <input type="file" name="image"/>
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Nổi bật/Không nổi bật</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <option value="1">Nổi bật</option>
                            <option value="0">Không nổi bật</option>
                        </select>
                    </td>
                </tr>
                                
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
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


