<?php
    include_once("../libs/routing.php");
    $routing = new Routing();
    $url = $routing->base_url_backend('login.php');
    unset($_SESSION['admin']);
    session_destroy();
    header("Location: $url");
?>