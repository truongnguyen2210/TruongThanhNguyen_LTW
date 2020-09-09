<?php include_once('views/banner.php');?>
<?php include_once('views/aside.php');?>
<div class="motloaisanpham">
  <div class="container">
    <div class="row">
    <!-- nội dung nằm ở Đây -->
      <?php include_once('views/tincongnghe.php');?> 
      <!-- sản phẩm mới -->
      <div class="col-sm-9 sanphammoi">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="tdlaptopmoi">Sản Phẩm Mới Nhất </h1>
        </div>
        <?php 
            include_once("models/M_products.php");
            $p = new products();
            $new_products = $p->getNewProduct();
            foreach($new_products as $new_product):
         ?>
            <div class="col-sm-4 motsanpham">
                <div class="tren">
                <a href="<?= $routing->site_url('chi-tiet-san-pham/'.$new_product['slug_detail']);?>">
                    <img src=" <?= $routing->img_url;?><?= $new_product['image']?>" alt="" class="anhsanpham img-fluid">
                </a>
                </div>
                <div class="duoi">
                    <a href="<?= $routing->site_url('chi-tiet-san-pham/'.$new_product['slug_detail'])?>">
                        <h4 class="tensanpham"><?=$new_product['product_name'];?> </h4>
                    </a>
                    <a href="#">
                        <h4 class="sophienban">Có 
                            <p class="sopb"><?=$new_product['version'];?></p> phiên bản cấu hình
                        </h4>
                    </a>
                        <h4 class="giasanpham"><?=$new_product['price'];?>$<del><?=$new_product['price_origin']?>$  </del> 
                            <a href="<?=$routing->site_url("them-vao-gio-hang")?>/<?=$new_product['id'];?>"> <span class="themvaogiohang"></span><i class="fa fa-cart-plus"></i></a>
                        </h4>
                    <p class="thongtinthem"><?=$new_product['product_detail'];?></p>
                </div>
            </div>
          <!-- hết top 4 sản phẩm mới-->
         <?php endforeach?>
    </div>
</div>
<!-- het san pham moi -->
      <!-- sản phẩm mới -->
      <div class="col-sm-12 sanphammoi spbanchay">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="tdlaptopmoi">Sản Phẩm Bán Chạy </h1>
        </div>
        <?php 
            include_once("models/M_products.php");
            $p = new products();
            $order_products = $p->getOrderProducts();
            foreach( $order_products as $order_product):
         ?>
            <div class="col-sm-3 motsanpham">
                <div class="tren">
                <a href="<?= $routing->site_url('chi-tiet-san-pham/'.$order_product['slug_detail']);?>">
                    <img src=" <?= $routing->img_url;?><?= $order_product['image']?>" alt="" class="anhsanpham img-fluid">
                </a>
                </div>
                <div class="duoi">
                    <a href="<?= $routing->site_url('chi-tiet-san-pham/'.$order_product['slug_detail'])?>">
                        <h4 class="tensanpham"><?=$order_product['product_name'];?> </h4>
                    </a>
                    <a href="#">
                        <h4 class="sophienban">Có 
                            <p class="sopb"><?=$order_product['version'];?></p> phiên bản cấu hình
                        </h4>
                    </a>
                        <h4 class="giasanpham"><?=$order_product['price'];?>$<del><?=$order_product['price_origin']?>$  </del> 
                            <a href="<?=$routing->site_url("them-vao-gio-hang")?>/<?=$order_product['id'];?>"> <span class="themvaogiohang"></span><i class="fa fa-cart-plus"></i></a>
                        </h4>
                    <p class="thongtinthem"><?=$order_product['product_detail'];?></p>
                </div>
            </div>
          <!-- hết top 4 sản phẩm mới-->
         <?php endforeach?>
    </div>
</div>
<!-- het san pham moi -->
        <div class="nutchuyen text-center mt-3">
            <button type="button" class="btn btn-outline-primary">Xem Thêm <i class="fa fa-angle-double-right"></i></button>
        </div>
    </div>  
    <!-- hết row -->
  </div>
  <!-- hết container -->
</div> 
<!-- hết  sản phẩm -->
