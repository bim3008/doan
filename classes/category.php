<?php $filepath = realpath(dirname(__FILE__)); ?>
<?php require_once ($filepath.'/../helpers/format.php');?>
<?php require_once ($filepath.'/../lib/database.php');?>
<?php
    class category
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_category($catName)
        {
            //check user and pass in ../helpers/format.php
            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->link,$catName) ; // link kết nối với database ỏ lib->database.php
              
            if(empty($catName) )
            {
                $alert = '<span>Category must be not empty</span>' ;
                return $alert ;
            }
            else
            {
                $query  = "INSERT INTO tbl_category(catName) VALUES('$catName') ";
                $result = $this->db->insert($query); // Select in Database
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
        public function showCategory()
        {
            $query  = "SELECT * FROM tbl_category order by catId desc " ;
            $result = $this->db->select($query);
            return $result ;
        }  
        public function updateCat($catName,$id)
        {
            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->link,$catName) ;
            $id = mysqli_real_escape_string($this->db->link,$id) ;

            if(empty($catName) )
            {
                $alert = '<span>Category must be not empty</span>' ;
                return $alert ;
            }
            else
            {
                $query  = "UPDATE tbl_category SET catName = '$catName'  WHERE  catid = '$id' ";
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
        public function deleteCat($id)
        {
       
            $id = mysqli_real_escape_string($this->db->link,$id) ;

            if(isset($id))
                $query  = "DELETE FROM tbl_category WHERE catid = '$id' ";
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

        public function editCategory($id)
        {
            $query  = "SELECT * FROM tbl_category WHERE catId = '$id' " ;
            $result = $this->db->select($query);
            return $result ;
        }


        public function showAllCategory_FontEnd()
        {
            $query  = "SELECT * FROM tbl_category order by catId asc " ;
            $result = $this->db->select($query);
            return $result ;
        }   
        
       

        public function get_name_by_cat($id)
        {
            $query  = "SELECT tbl_product.* , tbl_category.* FROM tbl_product,tbl_category WHERE tbl_product.catId = tbl_category.catId AND tbl_category.catId = '$id'  LIMIT 1" ;
            $result = $this->db->select($query);
            return $result ;
        }

        // Hiển thị brand & sản phẩm iphone
        public function get_brand_iphone($id)
        {
            $query  = "SELECT tbl_product.* ,tbl_brand.* FROM tbl_product,tbl_brand WHERE tbl_product.brandId = tbl_brand.brandId AND tbl_product.catId = '$id' AND tbl_product.brandId = '4' LIMIT 1 "  ;
            $result = $this->db->select($query);
            return $result;

        }
        public function get_product_iphone($id)
        {
            $query  = "SELECT * FROM tbl_product WHERE catId = '$id' AND brandId = '4' ORDER BY productId DESC LIMIT 6 " ;
            $result = $this->db->select($query);
            return $result ;
        }
        // Hiển thị brand & sản phẩm Samsung
        public function get_brand_samsung($id)
        {
            $query  = "SELECT tbl_product.* ,tbl_brand.* FROM tbl_product,tbl_brand WHERE tbl_product.brandId = tbl_brand.brandId AND tbl_product.catId = '$id' AND tbl_product.brandId = '5' LIMIT 1 "  ;
            $result = $this->db->select($query);
            return $result;

        }
        public function get_product_samsung($id)
        {
            $query  = "SELECT * FROM tbl_product WHERE catId = '$id' AND brandId = '5' ORDER BY productId DESC LIMIT 4 " ;
            $result = $this->db->select($query);
            return $result ;
        }
        // Hiển thị brand & sản phẩm Oppo
        public function get_brand_oppo($id)
        {
            $query  = "SELECT tbl_product.* ,tbl_brand.* FROM tbl_product,tbl_brand WHERE tbl_product.brandId = tbl_brand.brandId AND tbl_product.catId = '$id' AND tbl_product.brandId = '7' LIMIT 1 "  ;
            $result = $this->db->select($query);
            return $result;

        }
        public function get_product_oppo($id)
        {
            $query  = "SELECT * FROM tbl_product WHERE catId = '$id' AND brandId = '7' ORDER BY productId DESC LIMIT 4 " ;
            $result = $this->db->select($query);
            return $result ;
        }
         // Hiển thị brand & sản phẩm huawai
         public function get_brand_huawai($id)
         {
             $query  = "SELECT tbl_product.* ,tbl_brand.* FROM tbl_product,tbl_brand WHERE tbl_product.brandId = tbl_brand.brandId AND tbl_product.catId = '$id' AND tbl_product.brandId = '6' LIMIT 1 "  ;
             $result = $this->db->select($query);
             return $result;
 
         }
         public function get_product_huawai($id)
         {
             $query  = "SELECT * FROM tbl_product WHERE catId = '$id' AND brandId = '6' ORDER BY productId DESC LIMIT 4 " ;
             $result = $this->db->select($query);
             return $result ;
         }
        
        //////////====== Get ipad
        public function get_brand_ipad($id_ipad)
        {
            $query  = "SELECT tbl_product.* ,tbl_brand.* FROM tbl_product,tbl_brand WHERE tbl_product.brandId = tbl_brand.brandId AND tbl_product.catId = '$id_ipad' AND tbl_product.brandId = '8' LIMIT 1 "  ;
            $result = $this->db->select($query);
            return $result;

        }
        public function get_product_ipad($id_ipad)
        {
            $query  = "SELECT * FROM tbl_product WHERE catId = '$id_ipad' AND brandId = '8' ORDER BY productId DESC LIMIT 6 " ;
            $result = $this->db->select($query);
            return $result ;
        }
        //======== Đồng hồ
        public function get_brand_clock_casio($id_clock)
        {
            $query  = "SELECT tbl_product.* ,tbl_brand.* FROM tbl_product,tbl_brand WHERE tbl_product.brandId = tbl_brand.brandId AND tbl_product.catId = '$id_clock' AND tbl_product.brandId = '9' LIMIT 1 "  ;
            $result = $this->db->select($query);
            return $result;

        }
        public function get_product_clock_casio($id_clock)
        {
            $query  = "SELECT * FROM tbl_product WHERE catId = '$id_clock' AND brandId = '9' ORDER BY productId DESC LIMIT 4 " ;
            $result = $this->db->select($query);
            return $result ;
        }

        public function get_brand_clock_rulex($id_clock)
        {
            $query  = "SELECT tbl_product.* ,tbl_brand.* FROM tbl_product,tbl_brand WHERE tbl_product.brandId = tbl_brand.brandId AND tbl_product.catId = '$id_clock' AND tbl_product.brandId = '11' LIMIT 1 "  ;
            $result = $this->db->select($query);
            return $result;

        }
        public function get_product_clock_rulex($id_clock)
        {
            $query  = "SELECT * FROM tbl_product WHERE catId = '$id_clock' AND brandId = '11' ORDER BY productId DESC LIMIT 4 " ;
            $result = $this->db->select($query);
            return $result ;
        }
        //============ LAPTOP MACBOOK
        public function get_brand_laptop_macbook($id_laptop)
        {
            $query  = "SELECT tbl_product.* ,tbl_brand.* FROM tbl_product,tbl_brand WHERE tbl_product.brandId = tbl_brand.brandId AND tbl_product.catId = '$id_laptop' AND tbl_product.brandId = '10' LIMIT 1 "  ;
            $result = $this->db->select($query);
            return $result;

        }
        public function get_product_laptop_macbook($id_laptop)
        {
            $query  = "SELECT * FROM tbl_product WHERE catId = '$id_laptop' AND brandId = '10' ORDER BY productId DESC LIMIT 4 " ;
            $result = $this->db->select($query);
            return $result ;
        }
        //============ LAPTOP Dell
        public function get_brand_laptop_dell($id_laptop)
        {
            $query  = "SELECT tbl_product.* ,tbl_brand.* FROM tbl_product,tbl_brand WHERE tbl_product.brandId = tbl_brand.brandId AND tbl_product.catId = '$id_laptop' AND tbl_product.brandId = '12' LIMIT 1 "  ;
            $result = $this->db->select($query);
            return $result;

        }
        public function get_product_laptop_dell($id_laptop)
        {
            $query  = "SELECT * FROM tbl_product WHERE catId = '$id_laptop' AND brandId = '12' ORDER BY productId DESC LIMIT 4 " ;
            $result = $this->db->select($query);
            return $result ;
        }
    }
    
?>