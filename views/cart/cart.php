<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="tieude-giohang  text-info mt-2"> <i class="fa fa-luggage-cart"></i>Giỏ Hàng Của Bạn</h3>
            </div>
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
                <div class="col-sm-6 giohang-sanpham mb-2">
                    <img src=" <?= $routing->img_url;?><?= $value['image']?>" alt="" class="giohang-anh" width="200px">
                </div>
                <div class="col-sm-6 chitiet mb-2">
                        <p class="tensanpham"><i class="fa fa-caret-right"></i><?=$value["product_name"]?></p>
                        <p class="giohang-gia"><i class="fa fa-caret-right"></i><?=$value["price"]?>$ <del><?=$value["price_origin"]?>$</del></p>
                        <p class="giohang-soluong"><i class="fa fa-caret-right"></i>Số Lượng: <input type="number" value="<?php echo $amount[$i];?>" max="5" min="0"> 
                        <i class="fa fa-caret-right"></i>Color: <input type="color" value="red"></p>
                        <a href="<?=$routing->site_url("xoa-1-sanpham-giohang")?>/<?=$value["id"]?>"><button class="btn-danger btn-giohang">Delete</button></a>
                        <a href="<?=$routing->site_url("chi-tiet-san-pham")?>/<?=$value["slug_detail"]?>"><button class="btn-warning btn-giohang">Detail</button></a>
                </div>
    <?php $sum = $sum + $value["price"];}?>
        <div class="col-sm-12 tong-sanpham">
            <p">Số Lượng Sản Phẩm: <i style="color: red"><?php echo $n;?></i></p>
            <p>Thành Tiền:     <i class="giohang-gia" style="color: red"><?php echo $sum;?>$</i></p>
            <a href="<?=$routing->site_url("xoa-sanpham-giohang")?>/<?=$value["id"]?>"><button class="btn-danger dell-all">Dell All</button></a>
        </div>
       <div class="col-sm-12 thanhtoan">
           <div class="row">
           <div class="col-sm-12 muangay muangay-giohang">
                 <a href="<?=$routing->site_url("xac-nhan")?>">
                     <h5>Đặt Hàng</h5>
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
