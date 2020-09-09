
<?php
    if(!isset($_SESSION['name'])){
        echo "<div class='alert alert-danger' role='alert'><h4>Bạn chưa đăng nhập.
         Vui lòng đăng nhập <a href ='".$routing->site_url('dang-nhap')."'>Tại Đây</a></h4></div>";
        exit();
    }
    include_once("models/M_cart.php");
    $f = new Cart();
    $p = $f->showCart();
    $a = $_SESSION['amount'];
    $info = $_SESSION['user'];
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">Fro File</div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-3"><p class="info-name"><?=$info["name"]?></p></div>
            </div>
        </div>
    </div>
</div>