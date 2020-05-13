<?php $filepath = realpath(dirname(__FILE__)); ?>
<?php 
        require_once ($filepath.'/../lib/session.php');
        Session::checkLogin() ;
        require_once ($filepath.'/../helpers/format.php');
        require_once ($filepath.'/../lib/database.php');
?>
<?php
    class adminlogin{
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function login_admin($adminUser,$adminPass)
        {
           
               //check user and pass in ../helpers/format.php
               $adminUser = $this->fm->validation($adminUser) ; 
               $adminPass = $this->fm->validation($adminPass) ;

                $adminUser = mysqli_real_escape_string($this->db->link,$adminUser) ; // link kết nối với database ỏ lib->database.php
                $adminPass = mysqli_real_escape_string($this->db->link,$adminPass) ;

                if(empty($adminUser) || empty($adminPass))
                {
                    $alert = 'Username or Password must be not empty' ;
                    return $alert ;
                }
                else
                {
                    $query  = "SELECT * FROM tbl_admin WHERE adminUser  = '$adminUser' AND adminPass = '$adminPass'";
                    $result = $this->db->select($query); // Select in Database
                    if($result == true )
                    {
                        $value = $result->fetch_assoc(); 
                         Session::set('adminlogin',true) ;
                         Session::set('adminId',  $value['adminId']) ;
                         Session::set('adminName', $value['adminName']) ;
                         Session::set('adminUser',$value['adminUser']);
                         Session::set('adminPass',$value['adminPass']) ;
                         header('location:index.php') ;
                        
                    }
                    else
                    {
                        $alert = 'Username or Password no match' ;
                        return $alert ;
                     }

               }

        }
    }
    
?>