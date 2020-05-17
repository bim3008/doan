<?php $filepath = realpath(dirname(__FILE__)); ?>
<?php require_once ($filepath.'/../helpers/format.php');?>
<?php require_once ($filepath.'/../lib/database.php');?>
<?php
    class comments
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        } 

        public function showComment($id)
        {
            $query  = "SELECT * FROM tbl_comment AS c , tbl_customer AS k WHERE  c.customer_id = k.id AND productId = '$id' " ;
            $result = $this->db->select($query) ; 
            return $result ;
        }
      
    }
    
?>