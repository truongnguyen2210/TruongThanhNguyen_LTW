<?php
    if(isset($_SESSION['name'])){
        include_once("models/M_cart.php");
        $c = new Cart();
        $c->addToCart();
        // $url = $routing->site_url('trang-chu');
        // ob_clean();
        // header("Location: $url");
        // exit;
        ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center"><div class="alert alert-info" role="alert">Đã Thêm Vào Giỏ Hàng. Tiếp Tục Mua Sắm <a href="<?=$routing->site_url("trang-chu")?>">Tại Đây</a></div></div>
                </div>
            </div>
        <?php
    }else{
        ?>
             <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center"><div class="alert alert-warning" role="alert">Bạn Chưa Đăng Nhập! Vui Lòng 
                         <a href="<?=$routing->site_url("dang-nhap")?>">Đăng Nhập</a> Hoặc
                        <a href="<?=$routing->site_url("dang-ky")?>">Đăng Ký</a> </div></div>
                </div>
            </div>
        <?php
    }
   
?>

