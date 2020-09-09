<?php if(!defined("BASEPATH")) exit('No direct script access allowed');?>
<?php
    include_once("models/order.php");
    $f = new orders();
    if(!isset( $_GET['page'])){
        $cur_page = 1;
        $data = $f->getAllOrder();
    }
    else{
        $cur_page = $_GET['page'];
        $size = $_GET['size'];
        $data = $f->getAllOrder($size,  $cur_page);
    }
    $c = $data['orders'];
    $trash = $f->getNumberOfTrashItem("orders");
?>
<table class="table table-bordered" post('get')>
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Order Code</th>
      <th scope="col">Customer</th>
      <th scope="col">Delivered</th>
      <th scope="col">Order Date</th>
    </tr>
  </thead>
  <tbody>
      <?php $t=0; foreach($c as $vl):?>
        <?php $nameCTM = $f->getOneUse($vl["customer_id"]);
              $namePro = $f->getOnePro($vl["product_id"]);
        ?>
        <tr> 
            <th scope="row"><?=$t?></th>
            <td><a href="<?=$routing->site_url_backend('chi-tiet-don-hang');?>/<?=$vl['order_code']?>/<?=$vl['customer_id']?>"><?=$vl["order_code"]?></a></td> 
            <td><a href="<?=$routing->site_url_backend('user-all-order');?>/<?=$vl['customer_id']?>"><?=$nameCTM["name"]?></a></td>
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
            <td><?=$vl["order_date"]?></td>
        </tr>
      <?php $t++;endforeach?>
  </tbody>
</table>
<?= $data['paginator'];?>