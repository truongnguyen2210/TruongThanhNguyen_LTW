<?php
    include_once("models/M_cart.php");
    $f = new Cart();
    $f->delCart();
    // $url = $routing->site_url('trang-chu');
    // header("Location: $url");


?>
 <div class="col-sm-12 text-center"><div class="alert alert-warning" role="alert"> 
     Đã Xóa Toàn Bộ Giỏ Hàng Của Bạn!. Tiếp Tục Mua Sắm 
    <a href="<?=$routing->site_url("trang-chu")?>">Tại Đây</a>
 </div>