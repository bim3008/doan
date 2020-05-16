<?php $filepath = realpath(dirname(__FILE__)); ?>
<?php require_once ($filepath.'/../helpers/format.php');?>
<?php require_once ($filepath.'/../lib/database.php');?>
<?php
    class cart
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function add_to_cart($id,$quantity)
        {  
            $quantity = $this->fm->validation($quantity);
            $quantity = mysqli_real_escape_string($this->db->link,$quantity);
            $id       = mysqli_real_escape_string($this->db->link,$id);
            $sId = session_id();
            $infoCart    = "SELECT * FROM tbl_cart WHERE productId = '$id' AND sessionId = '$sId' "  ;
            $result_cart = $this->db->select($infoCart);
            if($result_cart)  
            {   
                $msg = 'Product Already Added';
                return $msg;
            }
            else
            {       
                $query  = "SELECT * FROM tbl_product WHERE productId = '$id' " ;
                $result = $this->db->select($query)->fetch_assoc();                 
                $query_insert = " INSERT INTO tbl_cart(productId,productName,sessionId,price,quantity,image_cart) 
                VALUES ('$id','$result[productName]','$sId','$result[price]','$quantity','$result[image_product]')" ;
                $insert_cart = $this->db->insert($query_insert) ;
                if($insert_cart)
                {
                    header('Location:cart.php') ;
                }
                else
                {
                    header('Location:404.php') ;
                } 
            }              
        }

        public function get_product_cart()
        {
            $sId = session_id();
            $query = " SELECT *  FROM tbl_cart WHERE sessionId = '$sId' ";
            $result = $this->db->select($query);
            return $result ;
        }

        public function update_quantity($cartId,$quantity)
        {
            $quantity = $this->fm->validation($quantity);
            $quantity = mysqli_real_escape_string($this->db->link,$quantity);
            $cartId       = mysqli_real_escape_string($this->db->link,$cartId);

            $query  = "UPDATE tbl_cart SET  quantity = '$quantity' WHERE cartId = '$cartId' " ;
            $result = $this->db->update($query) ;
            if($result)
            {
                $atler =  " <span> Update Successfully </span>" ;
                return $atler;
            }
            else
            {
                $atler = "Update Not Success" ;
                return $atler;
            }
        }


        public function deleteCart($id)
        {
            $id = $this->fm->validation($id);
            $id = mysqli_real_escape_string($this->db->link,$id);

            $query  = " DELETE FROM tbl_cart WHERE cartId = '$id' ";
            $result =$this->db->delete($query) ;
            if($result)
            {
                $atler =  " <span style ='text-align : center '> Delete Successfully </span>" ;
                return $atler;
            }
            else
            {
                $atler = "Delete Not Success" ;
                return $atler;
            }
        }

        public function check_cart()
        {
            $sId = session_id();
            $query = " SELECT *  FROM tbl_cart WHERE sessionId = '$sId' ";
            $result = $this->db->select($query);
            return $result ;

        }
        // Xóa sản phẩm khi người dùng Logout
        public function delete_all_in_cart()
        {
            $sId = session_id();
            $query = " DELETE  FROM tbl_cart WHERE sessionId = '$sId' ";
            $result = $this->db->select($query);
            return $result ;
        }
        // Khi người dùng ORDER
        public function insert_order($customer_id)
        {
            $sId = session_id();
            $query = " SELECT *  FROM tbl_cart WHERE sessionId = '$sId' ";
            $get_order = $this->db->select($query);
            if($get_order)
            {
                // Thêm vào bảng order
                while($result= $get_order->fetch_assoc())
                {
                    $productId   = $result['productId'];
                    $productName = $result['productName'];
                    $quantity    = $result['quantity'];
                    $price       = $result['price'] * $quantity;
                    $image       = $result['image_cart'];
                    $customerid  = $customer_id ;
                    $query_order = " INSERT INTO tbl_oder(productId,productName,price,quantity,image_order,customer_id) 
                    VALUES ('$productId','$productName',' $price','$quantity','$image', ' $customerid')" ;
                    $insert_order = $this->db->insert($query_order) ;
                }
            }
        }

        public function get_ordered_cart()
        {
            $query  = "SELECT * FROM tbl_oder ORDER BY 'date' ";
            $result = $this->db->select($query);
            return $result; 
        }
        // Xử lý thông tin đặt hàng
        public function proccess_status($id,$price)
        {
            $id    = mysqli_real_escape_string($this->db->link,$id);
            $price = mysqli_real_escape_string($this->db->link,$price);

            $query  = "UPDATE tbl_oder SET status_order = '1' WHERE customer_id = '$id' AND price = '$price' " ;
            $result = $this->db->update($query) ;
            return $query ;
        }
        // Delete thông tin đặt hàng
        public function delete_process($id,$price)
        {
            $id    = mysqli_real_escape_string($this->db->link,$id);
            $price = mysqli_real_escape_string($this->db->link,$price);

            $query  = "DELETE FROM tbl_oder WHERE customer_id = '$id' AND price = '$price' " ;
            $result = $this->db->delete($query) ;
            return $result ; 
        }
    }
    
?>