<?php
    include_once("common.php");
    class Auth extends Common{
        //ham dang nhap backend
        function loginAdmin(){
            $e = $_POST['email'];
            $p = sha1($_POST['pass']);
            $sql = "SELECT * FROM users WHERE email = '".$e."' AND password  = '".$p."' AND role = 'admin'";
            $result = $this->getOne($sql);
            $name = $result['name'];
            if(is_null($result)){
                return false;
            }else{
                return $name;
            }
        }
        //ham dang nhap frontend
        function login(){
            $e = $_POST['email'];
            $p = sha1($_POST['pass']);
            $sql = "SELECT * FROM users WHERE email = '".$e."' AND password  = '".$p."'";
            $result = $this->getOne($sql);
            $name = $result['name'];
            if(is_null($result)){
                return false;
            }else{
                return $name;
            }
        }
        //lay id nguoi dung
        function customerID(){
            $e = $_POST['email'];
            $p = sha1($_POST['pass']);
            $sql = "SELECT * FROM users WHERE email = '".$e."' AND password  = '".$p."'";
            $result = $this->getOne($sql);
            $user = $result['id'];
            if(is_null($result)){
                return false;
            }else{
                return  $user ;
            }
        }
        //ham them nguoi dung
        function register(){
            $f = new common();
            $user = array(
                'name' => $_POST['hoten'],
                'email' => $_POST['email'],
                'phone' => $_POST['sdt'],
                'address' => $_POST['diachi'],
                'password' => sha1($_POST['matkhau']),
                'created_at' => date("Y-m-d H:i:s"),
            );
            $sql1 ="SELECT * FROM users WHERE email = '".$user['email']."'";
            $sql2 ="SELECT * FROM users WHERE  phone = '".$user['phone']."'";
            // echo $sql1;
            $result1 = $this->getOne($sql1);
            $result2 = $this->getOne($sql2);

            if(is_null($result1) || is_null($result2)){
                $f->addRecord("users", $user);
                return 1;
            }else{
                return 0;
            }

        }
        
    }
?>