<?php if(!defined("BASEPATH")) exit('No direct script access allowed');?>
<?php
    include_once("models/category.php");
    $f = new category();
    $cid = $_GET['id'];
    $f->restoreItem('category', $cid);
    $url = $routing->site_url_backend('hidden-category');
    header("location: $url");
?>