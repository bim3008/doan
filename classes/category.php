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
        
        public function get_product_by_cat($id)
        {
            $query  = "SELECT * FROM tbl_product WHERE catId = '$id' ORDER BY catId DESC LIMIT 8 " ;
            $result = $this->db->select($query);
            return $result ;
        }

        public function get_name_by_cat($id)
        {
            $query  = "SELECT tbl_product.* , tbl_category.* FROM tbl_product,tbl_category WHERE tbl_product.catId = tbl_category.catId AND tbl_category.catId = '$id'  LIMIT 1" ;
            $result = $this->db->select($query);
            return $result ;
        }

    }
    
?>