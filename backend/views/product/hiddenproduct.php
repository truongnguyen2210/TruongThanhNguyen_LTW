<?php if(!defined("BASEPATH")) exit('No direct script access allowed');?>
<?php
    include_once("models/product.php");
    $f = new products();
    $p = $f->trashProduct();
?>
<table class="table table-bordered" post('get')>
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Product_name</th>
      <th scope="col">Slug</th>
      <th scope="col">status</th>
      <th scope="col">Restore</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
      <?php $t=0; foreach($p as $vl):?>
        <tr> 
            <th scope="row"><?=$t?></th>
            <td><?=$vl["product_name"]?></td>
            <td><?=$vl["slug"]?></td>
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
            <td><a href="<?=$routing->site_url_backend('restore-product');?>/<?=$vl['id']?>"><img class="icon-table" src="<?=$routing->base_url_backend;?>assets/img/restore.png" alt="edit"></a></td>
            <td><a href="<?=$routing->site_url_backend('del-product');?>/<?=$vl['id']?>"><img class="icon-table" src="<?=$routing->base_url_backend;?>assets/img/delete.png" alt="delete"></a></td>
        </tr>
      <?php $t++;endforeach?>
  </tbody>
</table>