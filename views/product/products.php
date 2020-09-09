<?php include_once('views/aside.php');?>
<div class="container">
    <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                    <?php 
                        include_once("models/M_products.php");
                        $f = new products();
                        $slug = $_GET['slug'];
                        $p = $f->getProductBySlug($slug);
                    ?> 
                    <?php
                        foreach($p as $value):
                    ?>
                        <div class="col-sm-3 motsanpham">
                            <div class="tren">
                            <a href="<?= $routing->site_url("chi-tiet-san-pham/".$value['slug_detail'])?>">
                                <img src=" <?= $routing->img_url;?><?= $value['image']?>" alt="" class="anhsanpham img-fluid">
                            </a>
                            </div>
                            <div class="duoi">
                                <a href="<?= $routing->site_url("chi-tiet-san-pham/".$value['slug_detail'])?>">
                                    <h4 class="tensanpham"><?=$value['product_name'];?> </h4>
                                </a>
                                <a href="#">
                                    <h4 class="sophienban">Có 
                                        <p class="sopb"><?=$value['version'];?></p> phiên bản cấu hình
                                    </h4>
                                </a>
                                    <h4 class="giasanpham"><?=$value['price'];?>₫<del><?=$value['price_origin']?> ₫</del> <br>
                                        <a href="<?=$routing->site_url("them-vao-gio-hang")?>/<?=$value['id'];?>"> <span class="themvaogiohang">Thêm vào giỏ hàng </span><i class="fa fa-cart-plus"></i></a>
                                    </h4>
                                <p class="thongtinthem"><?=$value['product_detail'];?></p>
                            </div>
                        </div>
                    <!-- hết top 4 sản phẩm mới-->
                    <?php endforeach?>
                </div>
            </div>
<!-- het san pham moi -->
    </div>
    <!-- hết row -->
</div>
 <!-- hết container -->