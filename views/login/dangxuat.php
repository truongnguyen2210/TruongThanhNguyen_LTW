<?php
   
    unset($_SESSION['user']);
    session_destroy();
    // $url = $routing->site_url('trang-chu');
    // header("Location: $url");
?>
 <div class="container">
    <div class="row">
        <div class="col-sm-12 text-center"><div class="alert alert-info" role="alert">Đã Đăng Xuất <i class="fa fa-user-shield"></i>. Tiếp Tục Mua Sắm <a href="<?=$routing->site_url("trang-chu")?>">Tại Đây</a></div></div>
    </div>
</div>