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
            $zipcode   = mysqli_real_escape_string($this->db->link,$data['zipcode']);
            $phone      = mysqli_real_escape_string($this->db->link,$data['phone']);

            if($username == " " || $password == " " || $repassword == " " || $email == "" || 
               $fullname == " " || $address == " " || $zipcode == "" || $phone == " " ){

                echo "Please complete all information" ;
            }
            else
            {
                if($password!= $repassword)
                {
                    echo "Your Password  Not The Same" ;
                }
                else
                {
                    $query        = "SELECT * FROM tbl_customer WHERE email = '$email' " ;
                    $result_email = $this->db->select($query);

                    if($result_email)
                    {
                        echo "Your Email Already Existed ";
                    }
                    else
                    {
                        $query_insert  = " INSERT INTO tbl_customer(username,password_cs,email,fullname,address_cs,zipcode,phone) 
                                          VALUES ('$username','$password','$email','$fullname','$address','$zipcode','$phone')" ;
                        $result_insert = $this->db->insert($query_insert) ;
                        if($result_insert)
                        {
                            echo  "Registion Successfully" ;
                        }
                        else
                        {
                            echo  "Registion Not Success" ;
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
            if($username == " " || $password == ""  )
            {
                echo "Username or Password not empty" ;
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
            $zipcode     = mysqli_real_escape_string($this->db->link,$data['zipcode']);
            $phone       = mysqli_real_escape_string($this->db->link,$data['phone']);
            if($name   == "" || $address == "" || $zipcode =="" || $phone == "" || $email == "")
            {
                echo 'Please Not Empty' ;
            }
            else
            {
                $query  = "UPDATE tbl_customer SET fullname = '$name' , address_cs = '$address',email = '$email' ,zipcode = '$zipcode' ,phone= '$phone'
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

        
    }
    
?>