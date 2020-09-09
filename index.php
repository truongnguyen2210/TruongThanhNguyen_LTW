<?php 
      session_start();
      include_once("libs/routing.php");
      $routing = new Routing();
      $path = $routing ->get_path();
?>
<?php include_once("libs/common.php") ?>
<?php include_once('views/header.php');?> 
<!-- hết khối header -->
<div class="ten-nguoidung"><p><?=isset($_SESSION['name']) ? $_SESSION['name'] : '' ?> <i class="fa fa-caret-down"></i></p></div>
<div class="thut-xuong"></div>
<?php include_once($path);?>
<!-- hết nội dung -->
<?php include_once('views/nutcrolltop.php');?>
<?php include_once('views/giaohang.php');?>
<!-- het nut croll -->
<?php include_once('views/footter.php');?>
<!-- het khoi footter -->
