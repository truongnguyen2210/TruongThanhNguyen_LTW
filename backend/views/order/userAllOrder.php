
<?php
    include_once("models/order.php");
    $f = new orders();
    $customer_id = $_GET['customer_id'];
    $allUserOrder = $f->getAllOrderByUser( $customer_id);
    $nameCTM = $f->getOneUse($customer_id);
?>
<h3 class="tieude-chitiet-">TẤT CẢ MẶT HÀNG ĐÃ MUA</h3>
<h3 class="chitiet-donhang">Tên Khách Hàng:  <i><?=$nameCTM["name"]?></i></h3>
<table class="table table-bordered" post('get')>
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Order Code</th>
      <th scope="col">Product</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Qty</th>
      <th scope="col">Delivered</th>
      <th scope="col">Order Date</th>
    </tr>
  </thead>
  <tbody>
      <?php $date = ""; $code = ""; $t=0; foreach(  $allUserOrder as $vl):?>
        <?php 
              $namePro = $f->getOnePro($vl["product_id"]);
        ?>
        <tr> 
            <th scope="row"><?=$t?></th>
            <?php
              if($vl["order_code"] !=  $code){
                ?>
                  <td><?=$vl["order_code"]?></td>
                <?php
              }else{
                echo "<td></td>";
              }
            ?>
            
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
            <?php
              if($vl["order_date"] !=  $date){
                ?>
                   <td><?=$vl["order_date"]?></td>
                <?php
              }else{
                echo "<td></td>";
              }
            ?>
        </tr>
      <?php
      $date = $vl["order_date"];
       $code = $vl["order_code"];
       $t++;
       endforeach
       ?>
  </tbody>
</table>