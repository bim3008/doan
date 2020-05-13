<?php $filepath = realpath(dirname(__FILE__)); ?>
<?php require_once ($filepath.'/../helpers/format.php');?>
<?php require_once ($filepath.'/../lib/database.php');?>
<?php
    class order
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        } 
        public function get_ordered($customer_id)
        {
            $query  = "SELECT * FROM tbl_oder WHERE customer_id = '$customer_id'" ;
            $result = $this->db->select($query);
            return $result ;
        }

    }
    
?>