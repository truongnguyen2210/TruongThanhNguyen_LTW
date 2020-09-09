<?php
include_once("libs/routing.php");
$routing = new Routing();
if($_POST['matkhau'] != $_POST['nlmatkhau'])
{
    echo "<div class='alert alert-warning text-center' role='alert'>
                <strong>Mật Khẩu Không Khớp!. Vui Lòng <a href='".$routing->site_url("dang-ky")."'>Đăng Ký</a> Lại</strong>
        </div>";
}
else{
    include_once("libs/authorization.php");
    $user = new Auth();
    $u = $user->register();
    if($u == 1){
        echo "<div class='alert alert-info text-center' role='alert'>
                <strong>Đăng Ký Thành Công. <a href='".$routing->site_url("dang-nhap")."'>Đăng Nhập</a> Ngay Để Nhận Ưu Đãi Khủng 
                <i class='fa fa-gifts'></i></strong>
             </div>";
    }else{
        echo "<div class='alert alert-warning text-center' role='alert'>
                <strong>SDT Hoặc Emai Đã Tồn Tại!. Vui Lòng <a href='".$routing->site_url("dang-ky")."'>Đăng Ký</a> Lại</strong>
             </div>";
    }
}
?>
