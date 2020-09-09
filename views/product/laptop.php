  

    <div class="slidetop">
    <div class="container">
      <div class="row">
        <div class="col-sm-8">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100 anhslide img-fluid" src="<?= $routing->img_url;?>slidelaptop5.png " alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100 anhslide img-fluid" src="<?= $routing->img_url;?>slidelaptop4.png" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100 anhslide img-fluid" src="<?= $routing->img_url;?>slidelaptop3.png" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <!-- hết col-sm-8 -->
        <div class="col-sm-4">
          <div class="row">
            <div class="col-sm-12">
              <a href="#"> <img class="tuyendung img-fluid" src="<?= $routing->img_url;?>qclaptop1.png" alt="thông tin tuyển dụng"></a> 
            </div>
            <div class="col-sm-12">
              <a href="#"><img id="duoi" class="tuyendung img-fluid" src="<?= $routing->img_url;?>qclaptop2.png" alt="thông tin tuyển dụng"></a>
            </div>
          </div>
        </div>
        <!-- het  -->
          <div class="col-sm-12 mt-3 mb-3">
              <div class="row">
                  <div class="col-sm-2">
                      <a href=""><img src="<?= $routing->img_url;?>apple.png"  class="img-fluid"></a>
                  </div>
                  <div class="col-sm-2">
                      <a href=""><img src="<?= $routing->img_url;?>dell.png"  class="img-fluid"></a>
                  </div>
                  <div class="col-sm-2">
                      <a href=""><img src="<?= $routing->img_url;?>asus.png"  class="img-fluid"></a>
                  </div>
                  <div class="col-sm-2">
                      <a href=""><img src="<?= $routing->img_url;?>acer.png"  class="img-fluid"></a>
                  </div>
                  <div class="col-sm-2">
                      <a href=""><img src="<?= $routing->img_url;?>lenovo.png"  class="img-fluid"></a>
                  </div>
                  <div class="col-sm-2">
                      <a href=""><img src="<?= $routing->img_url;?>hp.png"  class="img-fluid"></a>
                  </div>
              </div>
          </div>
      </div>
     <!-- san pham -->
       <div class="col-sm-12">
         <div class="row">
         <?php 
            include_once("models/M_laptop.php");
            $p = new laptop();
            $laptops = $p->getlaptop();
            foreach($laptops as $laptop):
         ?>
            <div class="col-sm-3 motsanpham">
                <div class="tren">
                <a href="<?= $routing->site_url("chi-tiet-san-pham/".$laptop['slug_detail'])?>">
                    <img src=" <?= $routing->img_url;?><?= $laptop['image']?>" alt="" class="anhsanpham img-fluid">
                </a>
                </div>
                <div class="duoi">
                    <a href="<?= $routing->site_url("chi-tiet-san-pham/".$laptop['slug_detail'])?>">
                        <h4 class="tensanpham"><?=$laptop['product_name'];?> </h4>
                    </a>
                    <a href="#">
                        <h4 class="sophienban">Có 
                            <p class="sopb"><?=$laptop['version'];?></p> phiên bản cấu hình
                        </h4>
                    </a>
                        <h4 class="giasanpham"><?=$laptop['price'];?>₫<del><?=$laptop['price_origin']?> ₫</del> <br>
                            <a href="<?=$routing->site_url("them-vao-gio-hang")?>/<?=$laptop['id'];?>"> <span class="themvaogiohang">Thêm vào giỏ hàng </span><i class="fa fa-cart-plus"></i></a>
                        </h4>
                    <p class="thongtinthem"><?=$laptop['product_detail'];?></p>
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
       </div>
     </div>
      <!-- hết row -->
     <!-- hết container -->
</div>
        </div>
    </div>