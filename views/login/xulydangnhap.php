<?php
session_start();
include_once("../../libs/routing.php");
include_once("../../libs/authorization.php");
$routing = new Routing();
$a = new Auth();
if(isset($_POST["submit"])){
    $name = $a->login();
    $user = $a->customerID();
    if($name != false){
        $_SESSION["admin"] =  false;
        $_SESSION["name"] = $name;
        $_SESSION["user"] = $user;
        $url = $routing->base_url("index.php");
        header("Location: $url");
    }else{
        $url = $routing->site_url("dang-nhap");
        header("Location: $url");
    }
  
}

?>
  