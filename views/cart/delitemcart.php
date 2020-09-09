<?php
    include_once("libs/routing.php");
    $routing = new Routing;
    include_once("models/M_cart.php");
    $f = new Cart();
    $id = $_GET['id'];
    $f->delItemCart($id);
    // $url = $routing->site_url('gio-hang');
    // header("Location: $url");
   
?>
 <div class="col-sm-12 text-center"><div class="alert alert-warning" role="alert"> 
     Sản Phẩm Đã Bị Gỡ Khỏi Giỏ Hàng Của Bạn!. Xem 
    <a href="<?=$routing->site_url("gio-hang")?>">Giỏ Hàng</a>
 </div>
