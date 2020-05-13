<?php $filepath = realpath(dirname(__FILE__)); ?>
<?php require_once ($filepath.'/../helpers/format.php');?>
<?php require_once ($filepath.'/../lib/database.php');?>
<?php require_once ($filepath.'/../admin/fun_image.php') ;?>
<?php
    class product
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
            $this->fi = new func_image();
        }
        public function insert_product($data,$files)
        {
            //check user and pass in ../helpers/format.php
            $list = array('jpg','jpeg','png','zig');
            $productName = mysqli_real_escape_string($this->db->link,$data['nameProduct']);
            $category    = mysqli_real_escape_string($this->db->link,$data['category']) ;
            $brand       = mysqli_real_escape_string($this->db->link,$data['brand']) ;
            $description = mysqli_real_escape_string($this->db->link,$data['description']) ;
            $price       = mysqli_real_escape_string($this->db->link,$data['price']) ;
            $type        = mysqli_real_escape_string($this->db->link,$data['type']) ;
            $uploadImage = $files['image']['name'];
            if($productName == "" || $brand == "" || $category == "" || $description == "" ||$price == "" ||$type == "" ||$uploadImage == "" )
            {
                    $alert = '<span> Fiedls must be not empty</span>' ;
                    return $alert ;
            }       
            else
            {
                $image_name = $_FILES['image']['name'] ;
                $image_size = $_FILES['image']['size'] ;
                $image_tmp  = $_FILES['image']['tmp_name'] ;
             
                $check_size = $this->fi->checkSize($image_size,1024,10485760);
                $exten_image_name = pathinfo($image_name,PATHINFO_EXTENSION);
                if((in_array(strtolower($exten_image_name),$list ) && $check_size == true))
                {
                    @move_uploaded_file($image_tmp,"../admin/uploads/$image_name") ;    
                }

                $query  = "INSERT INTO tbl_product(productName,catId,brandId,description_product,price,type_product,image_product) VALUES('$productName', '$category','$brand','$description','$price','$type', '$image_name')";
                $result = $this->db->insert($query); // Insert in Database
                if($result)
                {
                    $alert = '<span>Insert sucessfully</span>' ;
                    return $alert ;
                }
                else
                {
                    $alert = '<span>Insert not sucess</span>' ;
                    return $alert ;
                }                   
            }    
        }    
        
        public function showProduct()
        {
            $query  = " SELECT p.*, c.catName,b.brandName
                        FROM   tbl_product as p ,tbl_category as c,tbl_brand as b
                        WHERE p.catId = c.catId  AND p.brandId = b.brandId 
                        ORDER BY p.productId DESC " ;
            $result = $this->db->select($query);
            return $result ;
        } 
        //--------------------------------------------------------------------------------------------//
        public function updateProduct($data,$files,$id)
        {
          
            $productName = mysqli_real_escape_string($this->db->link,$data['nameProduct']);
            $category    = mysqli_real_escape_string($this->db->link,$data['category']) ;
            $brand       = mysqli_real_escape_string($this->db->link,$data['brand']) ;
            $description = mysqli_real_escape_string($this->db->link,$data['description']) ;
            $price       = mysqli_real_escape_string($this->db->link,$data['price']) ;
            $type        = mysqli_real_escape_string($this->db->link,$data['type']) ;
            $name_image = $_FILES['image']['name'];
            if($productName == "" || $brand == "" || $category == "" || $description == "" ||$price == "" ||$type == "" )
            {
                    $alert = '<span> Fiedls must be not empty</span>' ;
                    return $alert ;
            }
            else
            {
                if($name_image) // up load files ảnh mới
                {
                    @unlink("../admin/uploads/$name_image") ;
                    $list = array('jpg','jpeg','png','zig');
                    $image_name_new = $_FILES['image']['name'];
                    $image_size = $_FILES['image']['size'] ;
                    $image_tmp  = $_FILES['image']['tmp_name'] ;
                    $check_size = $this->fi->checkSize($image_size,1024,10485760);
                    $exten_image_name = pathinfo($image_name_new,PATHINFO_EXTENSION);
                    if((in_array(strtolower($exten_image_name),$list ) && $check_size == true))
                    {
                        @move_uploaded_file($image_tmp,"../admin/uploads/$image_name_new") ;    
                    }
                    $query  = "UPDATE tbl_product SET 
                    productName = '$productName',catId = '$category', brandId ='$brand',type_product = '$type',description_product = '$description',
                    price  =  '$price' ,image_product = '$image_name_new' WHERE productId = '$id'     ";   
                            
                }
                else //giữ nguyên file ảnh
                {
                    $query  = "UPDATE tbl_product SET 
                            productName        =    '$productName',
                            catId              =    '$category',
                            brandId            =    '$brand',
                            type_product       =    '$type',
                            description_product=    '$description',
                            price              =     '$price' 
                            WHERE productId    =     '$id' ";
                   
                }
                $result = $this->db->update($query); // Select in Database
                            if($result)
                            {
                                $alert = '<span>Update sucessfully</span>' ;
                                return $alert ;
                            }
                            else
                            {
                                $alert = '<span>Update not sucess</span>' ;
                                return $alert ;
                            }                   
               
            }        
  
       

        }
        //-------------------------------------------------//
        public function deleteProduct($id)
        {
            if(isset($id))
                $query  = "DELETE FROM tbl_product WHERE productId = '$id' ";
                $result = $this->db->delete($query); // Select in Database
                if($result)
                {
                    $alert = '<span>DeLete sucessfully</span>' ;
                    return $alert ;
                }
                else
                {
                    $alert = '<span>Delete not sucess</span>' ;
                    return $alert ;
                }                     

        }
        public function get_id_product($id)
        {
            $query  = "SELECT * FROM tbl_product WHERE productId = '$id' " ;
            $result = $this->db->select($query);
            return $result ;
        }

        // END BACK_END
        // START FONT_END    
        public function getproduct_featured()
        {
            $query  = "SELECT * FROM tbl_product WHERE type_product = '1'  order by productId desc LIMIT 4 " ;
            $result = $this->db->select($query);
            return $result ;
        }
        public function getproduct_new()
        {
            $query  = "SELECT * FROM tbl_product order by productId desc LIMIT 4 " ;
            $result = $this->db->select($query);
            return $result ;
        }
        public function productDetails($id)
        {
            $query  = " SELECT tbl_product.*, tbl_category.catName,tbl_brand.brandName 
            FROM   tbl_product INNER JOIN  tbl_category ON  tbl_product.catId = tbl_category.catId 
            INNER JOIN  tbl_brand ON tbl_product.brandId = tbl_brand.brandId WHERE tbl_product.productId = '$id' ";
            $result = $this->db->select($query);
            return $result ;
        }
         //------START SIDER--------------//

        public function getIphone()
        {
            $query  = "SELECT * FROM tbl_product WHERE brandId = '4'  ORDER BY productId DESC LIMIT 1" ;
            $result = $this->db->select($query); 
            return $result ;
        }
        public function getSamsung()
        {
            $query  = "SELECT * FROM tbl_product WHERE brandId = '5'  ORDER BY productId DESC LIMIT 1" ;
            $result = $this->db->select($query); 
            return $result ;
        }
        public function getOppo()
        {
            $query  = "SELECT * FROM tbl_product WHERE brandId = '7'  ORDER BY productId DESC LIMIT 1" ;
            $result = $this->db->select($query); 
            return $result ;
        }
        public function getHuawai()
        {
            $query  = "SELECT * FROM tbl_product WHERE brandId = '6'  ORDER BY productId DESC LIMIT 1" ;
            $result = $this->db->select($query); 
            return $result ;
        }

    }
    

   
?>