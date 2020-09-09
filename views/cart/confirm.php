
<?php
    include_once("models/M_user.php");
    $u = new User();
    $use = $u->getOneUse($_SESSION['user']);
?>
<div class="container">
    <div class="row">
    <div class="col-sm-12">
            <h3 class="tieude-giohang  text-info mt-2"> <i class="fa fa-user-edit"></i> Thông Tin Giao Hàng</h3>
        </div>
        <div class="col-sm-12 thongtin-dathang">
            <div class="row">
                <div class="col-sm-6">
                    <table>
                         <tr>
                            <td><h4 class="truong-thongtin">Name: </h4></td>
                            <td><h4 class="giatri-truong-thongtin"><?=$use["name"];?></h4></td>
                        </tr>
                        <tr>
                            <td><h4 class="truong-thongtin">Email: </h4></td>
                            <td><h4 class="giatri-truong-thongtin"><?=$use["email"];?></h4></td>
                        </tr>
                        <tr>
                            <td><h4 class="truong-thongtin">Phone: </h4></td>
                            <td><h4 class="giatri-truong-thongtin"><?=$use["phone"];?></h4></td>
                        </tr>
                        <tr>
                            <td><h4 class="truong-thongtin">Address: </h4></td>
                            <td><h4 class="giatri-truong-thongtin"><?=$use["address"];?></h4></td>
                        </tr>
                    </table>
                    <a href="<?=$routing->site_url("cap-nhat-thong-tin")?>/<?=$use["id"]?>"><button class="btn-info btn-giohang">Change</button></a>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <h3 class="tieude-giohang  text-info mt-2"> <i class="fa fa-opencart"></i> Xác Nhận Đơn Hàng</h3>
        </div>
    </div>
</div>
<?php
    include_once("models/M_cart.php");
    $f = new Cart();
    if(!isset($_SESSION['cart'])){
        echo "<div class='alert alert-warning text-center' role='alert'>Chưa Có Sản Phẩm Trong Giỏ Hàng
        <i class='fa fa-dizzy'></i></div>";
        exit();
    }
    $i = 0;
    $sum = 0;
    $cart = $_SESSION['cart'];
    $amount = $_SESSION['amount'];
    $n = count($cart);
    $p = $f->showCart();
?>

<div class="container">
    <div class="row">
    <?php foreach($p as $value){?>
                <div class="col-sm-6 chitiet mb-2 xacnhan">
                        <p class="tensanpham"><i class="fa fa-caret-right"></i><?=$value["product_name"]?></p>
                        <p class="giohang-gia"><i class="fa fa-caret-right"></i><?=$value["price"]?>$ <del><?=$value["price_origin"]?>$</del></p>
                        <p class="giohang-soluong"><i class="fa fa-caret-right"></i>Số Lượng: <input type="number" value="<?php echo $amount[$i];?>" max="5" min="1"> 
                        <i class="fa fa-caret-right"></i>Color: <input type="color" value="red"></p>
                        <a href="<?=$routing->site_url("xoa-1-sanpham-giohang")?>/<?=$value["id"]?>"><button class="btn-danger btn-giohang">Delete</button></a>
                        <a href="<?=$routing->site_url("chi-tiet-san-pham")?>/<?=$value["slug_detail"]?>"><button class="btn-warning btn-giohang">Detail</button></a>
                </div>
    <?php $sum = $sum + $value["price"];}?>
        <div class="col-sm-12">
            <h3 class="tieude-giohang  text-info mt-2"> <i class="fa fa-paypal"></i> Xác Nhận Thanh Toán</h3>
        </div>
        <div class="col-sm-12 tong-sanpham">
            <p">Số Lượng Sản Phẩm: <i style="color: red"><?php echo $n;?></i></p>
            <p>Thành Tiền:     <i class="giohang-gia" style="color: red"><?php echo $sum;?>$</i></p>
            <a href="<?=$routing->site_url("xoa-sanpham-giohang")?>/<?=$value["id"]?>"><button class="btn-danger dell-all">Dell All</button></a>
        </div>
       <div class="col-sm-12 thanhtoan">
           <div class="row">
           <div class="col-sm-12 muangay muangay-giohang">
                 <a href="<?=$routing->site_url("thanh-toan")?>">
                     <h5>Thanh Toán</h5>
                    <p>Giao Hàng Tận Nơi Hoặc Nhận Tại Siêu Thị</p>
                </a>
            </div>
           <div class="col-sm-6 tragop ">
                 <a href="#">
                    <h5>Mua Trả Góp 0%</h5>
                    <p>Thủ Tục Đơn Giản</p>
                </a>
            </div>
           <div class="col-sm-6 tragop canhtrai">
                 <a href="#">
                    <h5>Mua Trả Góp Qua Thẻ</h5>
                    <p>Visa, Master, JCB</p>
                </a>
            </div>
           </div>
       </div>
    </div>
</div>
