
<?php if(!defined("BASEPATH")) exit('No direct script access allowed');?>
<?php
    include_once("models/product.php");
    $f = new products();
    if(!isset( $_GET['page'])){
        $cur_page = 1;
        $data = $f->getAllProduct();
    }
    else{
        $cur_page = $_GET['page'];
        $size = $_GET['size'];
        $data = $f->getAllProduct($size,  $cur_page);
    }
    $c = $data['products'];
    $trash = $f->getNumberOfTrashItem("products");
?>
<div class="btn btn-primary mt-4 mb-3"><a href="<?=$routing->site_url_backend("add-product")?>">ADD Product</a></div>
<div class="btn btn-info mt-4 mb-3"><a href="<?=$routing->site_url_backend("hidden-product")?>">TRASH(<?=$trash?>)</a></div>
<table class="table table-bordered" post('get')>
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Product_name</th>
      <th scope="col">Slug</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">status</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
      <?php $t=0; foreach($c as $vl):?>
        <tr> 
            <th scope="row"><?=$t?></th>
            <td><?=$vl["product_name"]?></td>
            <td><?=$vl["slug"]?></td>
            <td><img src="<?=$routing->base_url;?>assets/img/<?=$vl["image"]?>" width="50px" alt="anh san pham"></td>
            <td><?=$vl["price"]?></td>
            <td>
                <?php
                    if($vl['status']==1)
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
            <td><a href="<?=$routing->site_url_backend('edit-product');?>/<?=$vl['id']?>"><img class="icon-table" src="<?=$routing->base_url_backend;?>assets/img/edit.png" alt="edit"></a></td>
            <td><a href="<?=$routing->site_url_backend('delete-product');?>/<?=$vl['id']?>"><img class="icon-table" src="<?=$routing->base_url_backend;?>assets/img/delete.png" alt="delete"></a></td>
        </tr>
      <?php $t++;endforeach?>
  </tbody>
</table>
<?= $data['paginator'];?>