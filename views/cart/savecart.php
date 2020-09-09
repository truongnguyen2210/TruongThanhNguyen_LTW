<?php
    include_once("models/M_cart.php");
    $f = new Cart();
    $p = $f->saveCart();
?>
<div class="col-sm-12 text-center"><div class="alert alert-info" role="alert"> 
    Thanh Toán Thành Công <i class="fa fa-donate"></i>. Chúng Tôi sẽ Giao Hàng0 Đến Bạn Sớm Nhất Có Thể <i class="fa fa-truck"></i>
 </div>