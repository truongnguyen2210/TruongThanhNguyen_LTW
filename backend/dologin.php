<?php
session_start();
include_once("../libs/routing.php");
include_once("../libs/authorization.php");
$routing = new Routing();
$a = new Auth();
$_SESSION["admin"] == false;
if(isset($_POST["submit"])){
    $name = $a->loginAdmin();
    if($name != false){
        $_SESSION["admin"] =  true;
        $_SESSION["name"] = $name;
        $url = $routing->base_url_backend("index.php");
        header("Location: $url");
    }else{
        $url = $routing->base_url_backend("login.php");
        header("Location: $url");
    }
  
}

?>


