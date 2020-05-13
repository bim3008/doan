<?php $filepath = realpath(dirname(__FILE__)); ?>
<?php require_once ($filepath.'/../helpers/format.php');?>
<?php require_once ($filepath.'/../lib/database.php');?>
<?php
    class brand
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        // INSERT INTO ON DATABASE
        public function insert_brand($brandName)
        {
            //check user and pass in ../helpers/format.php
            $brandName = $this->fm->validation($brandName);// kiểm tra tồn tại trim()
            $brandName = mysqli_real_escape_string($this->db->link,$brandName) ; // link kết nối với database ỏ lib->database.php
              
            if(empty($brandName) )
            {
                $alert = '<span>Brand must be not empty</span>' ;
                return $alert ;
            }
            else
            {
                $query  = "INSERT INTO tbl_brand(brandName) VALUES('$brandName') ";
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
        public function showBrand()
        {
            $query  = "SELECT * FROM tbl_brand order by brandId desc " ;
            $result = $this->db->select($query);
            return $result ;
        }  
        public function updateBrand($brandName,$id)
        {
            $brandName = $this->fm->validation($brandName);
            $brandName = mysqli_real_escape_string($this->db->link,$brandName) ;
            $id = mysqli_real_escape_string($this->db->link,$id) ;

            if(empty($brandName) )
            {
                $alert = '<span>Category must be not empty</span>' ;
                return $alert ;
            }
            else
            {
                $query  = "UPDATE tbl_brand SET brandName = '$brandName' WHERE  brandid = '$id' ";
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

        public function deleteBrand($id)
        {
       
            $id = mysqli_real_escape_string($this->db->link,$id) ;

            if(isset($id))
                $query  = "DELETE FROM tbl_brand WHERE brandId = '$id' ";
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
        public function editBrand($id)
        {
            $query  = "SELECT * FROM tbl_brand WHERE brandId = '$id' " ;
            $result = $this->db->select($query);
            return $result ;
        }

        

    }
    
?>