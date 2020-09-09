
<?php
    include_once("models/order.php");
    $f = new orders();
    $order_code = $_GET['order_code'];
    $customer_id = $_GET['customer_id'];
    $detail = $f->getDetailOrderBYOrderCode($order_code);
    $nameCTM = $f->getOneUse($customer_id);
    $order_date = $f->getOneOrderByOrderCode($order_code);
?>
<h3 class="tieude-chitiet-">CHI TIẾT ĐƠN HÀNG</h3>
<h3 class="chitiet-donhang">Mã Đơn Hàng:  <i><?= $order_code?></i></h3>
<h3 class="chitiet-donhang">Tên Khách Hàng:  <i><?=$nameCTM["name"]?></i></h3>
<h3 class="chitiet-donhang">Ngày Mua Hàng:  <i><?=$order_date["order_date"]?></i></h3>
<table class="table table-bordered" post('get')>
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Product</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Qty</th>
      <th scope="col">Delivered</th>
    </tr>
  </thead>
  <tbody>
      <?php $t=0; foreach( $detail as $vl):?>
        <?php 
              $namePro = $f->getOnePro($vl["product_id"]);
        ?>
        <tr> 
            <th scope="row"><?=$t?></th>
            <td><?=$namePro["product_name"]?></td>
            <td><img src="<?=$routing->base_url;?>assets/img/<?= $namePro["image"]?>" width="50px" alt="anh san pham"></td>
            <td><?=$namePro["price"]?>$</td>
            <td><?=$vl["qty"]?></td>
            <td> <?php
                    if($vl['delivered']==1)
                        {
                            ?>
                            <a href="#"><img class="icon-table" src="<?=$routing->base_url_backend;?>assets/img/check4.png" alt="check"></a>
                            <?php
                        }else{
                            ?>
                            <a href="#"><img class="icon-table" src="<?=$routing->base_url_backend;?>assets/img/cancel.png" alt="cancel"></a>
                            <?php
                        }
                ?>
            </td>
        </tr>
      <?php $t++;endforeach?>
  </tbody>
</table>