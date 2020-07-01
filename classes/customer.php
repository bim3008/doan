<?php $filepath = realpath(dirname(__FILE__)); ?>
<?php require_once ($filepath.'/../helpers/format.php');?>
<?php require_once ($filepath.'/../lib/database.php');?>
<?php
    class customer
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        // Đăng ký user
        public function insert_customer($data)
        {
            $username   = mysqli_real_escape_string($this->db->link,$data['username']);
            $password   = mysqli_real_escape_string($this->db->link,$data['password']);
            $repassword = mysqli_real_escape_string($this->db->link,$data['repassword']);
            $email      = mysqli_real_escape_string($this->db->link,$data['email']);
            $fullname   = mysqli_real_escape_string($this->db->link,$data['fullname']);
            $address    = mysqli_real_escape_string($this->db->link,$data['address']);
            $phone      = mysqli_real_escape_string($this->db->link,$data['phone']);

            if($username == " " || $password == " " || $repassword == " " || $email == "" || 
               $fullname == " " || $address == " "  ||   $phone == " " ){

                echo  '<h3 style= "text-align: center"> Vui lòng điền đầy đủ thông tin </h3>' ;
            }
            else
            {              
                if($password!= $repassword)
                {
                    echo '<h3 style= "text-align: center"> Mật khẩu không khớp </h3>' ;
                }
                else if( strlen($password)  < 6  || strlen($repassword)  < 6)
                {
                    echo '<h3 style= "text-align: center"> Mật khẩu lớn hơn 6 ký tự </h3>' ;
                }
                else
                {
                    $query        = "SELECT * FROM tbl_customer WHERE email = '$email' " ;
                    $result_email = $this->db->select($query);

                    $query_username        = "SELECT * FROM tbl_customer WHERE username = '$username' " ;
                    $result_username = $this->db->select($query_username);
                    
                    if($result_username){
                        echo '<h3 style= "text-align: center"> Tài khoản của bạn đã tồn tại </h3>' ;
                    }
                    else if($result_email)
                    {
                        echo '<h3 style= "text-align:center"> Email của bạn đã tồn tại </h3>' ;
                    }
                    else
                    {
                        $query_insert  = " INSERT INTO tbl_customer(username,password_cs,email,fullname,address_cs,phone) 
                                          VALUES ('$username','$password','$email','$fullname','$address','$phone')" ;
                        $result_insert = $this->db->insert($query_insert) ;
                        if($result_insert)
                        {
                            echo '<h3 style= "text-align: center"> ĐĂNG KÝ THÀNH CÔNG </h3>' ;
                        }
                        else
                        {
                            echo '<h3 style= "text-align: center"> ĐĂNG KÝ THẤT BẠI </h3>' ;
                        }
                    }
                }
            }
        }
        // Đăng nhập user
        public function login_customer($data)
        {
            $username   = mysqli_real_escape_string($this->db->link,$data['usernameLogin']);
            $password   = mysqli_real_escape_string($this->db->link,$data['passwordLogin']);
            if($username == " " || $password == " "  )
            {
                echo '<p style="text-align:center ;color:red">Username or Password not empty' ;
            }
            else
            {
                $query  = "SELECT * FROM tbl_customer WHERE username = '$username' AND password_cs = '$password' ";
                $result = $this->db->select($query) ;
                if($result) // Đăng nhập thành công 
                {
                    $value = $result->fetch_assoc();
                    Session::set('customer_login',true);
                    Session::set('customer_id',$value['id']);
                    Session::set('customer_name',$value['fullname']);
                    header('location:index.php') ;
                }
                else
                {
                    echo  'Username or Password not exist' ;
                }
            }
        }

        public function show_profile_customer($id)
        {
            $query  = "SELECT * FROM tbl_customer WHERE id = '$id' LIMIT 1" ;
            $result = $this->db->select($query);
            return $result ;
        }
        
        public function update_profile($data,$id)
        {
            $name        = mysqli_real_escape_string($this->db->link,$data['name']);
            $email       = mysqli_real_escape_string($this->db->link,$data['email']);
            $address     = mysqli_real_escape_string($this->db->link,$data['address']);
            $phone       = mysqli_real_escape_string($this->db->link,$data['phone']);
            if($name   == "" || $address == "" || $phone == "" || $email == "")
            {
                echo 'Please Not Empty' ;
            }
            else
            {
                $query  = "UPDATE tbl_customer SET fullname = '$name' , address_cs = '$address',email = '$email' , phone= '$phone'
                           WHERE id = '$id'
                ";
                $result = $this->db->update($query);
                
                if($result)
                {
                    echo 'Update Successfully' ;
                }
                else
                {
                    echo 'Update Not Success' ;
                }
            }
        }
        public function getInformationCustomer($id)
        {
            $query  = "SELECT * FROM tbl_customer WHERE id =  '$id' ";
            $result = $this->db->select($query);
            return $result ;

        }
        public function insertComment($customer_id,$data,$id)
        {
            $customer_id = mysqli_real_escape_string($this->db->link,$customer_id) ;
            $messge      = mysqli_real_escape_string($this->db->link,$data['messge']) ;
            $id = mysqli_real_escape_string($this->db->link,$id) ;


            $query  = "INSERT INTO  tbl_comment(customer_id,comment,productId)  VALUES ('$customer_id','$messge','$id') " ; 
            $result = $this->db->insert($query) ; 
        }

        public function insertFacebook($userData,$phone)
        {
            
           
           $phone    = mysqli_real_escape_string($this->db->link,$phone) ;  
           $API      = mysqli_real_escape_string($this->db->link,$userData['id']) ;
           $name     = mysqli_real_escape_string($this->db->link,$userData['name']);
           $email    = mysqli_real_escape_string($this->db->link,$userData['email']);
           $address  = mysqli_real_escape_string($this->db->link,$userData['location']['name']);

                                                    
           $query  = "INSERT INTO tbl_customer(`id`,`fullname`,`email`,`address_cs`,`phone`) VALUES ('$API','$name','$email','$address','$phone')
                      " ;
           $result =$this->db->insert($query);     
        }
     
        // public function getInforFacebookeOder($data)
        // {
        //     $name     = mysqli_real_escape_string($this->db->link,$data['fullname']);
        //     $email    = mysqli_real_escape_string($this->db->link,$data['email']);
        //     $address  = mysqli_real_escape_string($this->db->link,$data['location']['name']);
        //     $phone    = mysqli_real_escape_string($this->db->link,$data['phone']);

        //     $query  = "INSERT INTO tbl_fb(`fullname`,`address`,`email`,`phone`) VALUES ('$name','$address','$email','$phone')" ;
        //     $result =$this->db->insert($query);
        //     if($result)
        //     {
        //         header('location:success.php');
        //     }    

        // }

        
    }
    