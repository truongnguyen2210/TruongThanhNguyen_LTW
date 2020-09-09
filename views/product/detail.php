
<div class="container">
    <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                    <?php 
                        include_once("models/M_products.php");
                        $f = new products();
                        $slug = $_GET['slug_detail'];
                        $p = $f->getProductDetailBySlug($slug);
                    ?>  
                    <div class="chitietsanpham">
                        <div class="row">
                            <div class="col-sm-12 tensp">
                                <h3><?=$p['product_name']?></h3>
                            </div>
                            <div class="col-sm-6">
                                <img  class="img-fluid" src="<?= $routing->img_url;?><?= $p['image']?>" alt="">
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-12 giasp">
                                        <h4 class="giasanpham"><?=$p['price'];?>$<del><?=$p['price_origin']?> $</del> 
                                    </div>
                                    <div class="col-sm-12 chitiet">
                                        <h5>Thông Số Kĩ Thuật: </h5>
                                        <p><?= $p['supper_detailed']?></p>
                                    </div>
                                     <div class="col-sm-10 muangay">
                                         <a href="<?=$routing->site_url("them-vao-gio-hang")?>/<?=$p['id'];?>">
                                            <h5>Mua Ngay</h5>
                                            <p>Giao Hàng Tận Nơi Hoặc Nhận Tại Siêu Thị</p>
                                        </a>
                                    </div>
                                    <div class="col-sm-5 tragop">
                                        <a href="#">
                                            <h5>Mua Trả Góp 0%</h5>
                                            <p>Thủ Tục Đơn Giản</p>
                                        </a>
                                    </div>
                                    <div class="col-sm-5 tragop canhtrai">
                                        <a href="#">
                                            <h5>Mua Trả Góp Qua Thẻ</h5>
                                            <p>Visa, Master, JCB</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- het san pham moi -->
    </div>
    <!-- hết row -->
</div>
 <!-- hết container -->
