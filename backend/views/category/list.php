<?php if(!defined("BASEPATH")) exit('No direct script access allowed');?>
<?php
    include_once("models/category.php");
    $f = new category();
    if(!isset( $_GET['page'])){
        $cur_page = 1;
        $data = $f->getAllCategory();
    }
    else{
        $cur_page = $_GET['page'];
        $size = $_GET['size'];
        $data = $f->getAllCategory($size,  $cur_page);
    }
    $c = $data['category'];
    $trash = $f->getNumberOfTrashItem("category");
?>
<div class="btn btn-primary mt-4 mb-3"><a href="<?=$routing->site_url_backend("add-category")?>">ADD Category</a></div>
<div class="btn btn-info mt-4 mb-3"><a href="<?=$routing->site_url_backend("hidden-category")?>">TRASH(<?=$trash?>)</a></div>
<table class="table table-bordered" post('get')>
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Category_name</th>
      <th scope="col">Parent</th>
      <th scope="col">status</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
      <?php $t=0; foreach($c as $vl):?>
        <tr> 
            <th scope="row"><?=$t?></th>
            <td><?=$vl["category_name"]?></td>
            <td>
                <?php
                    $p =$f->getParentCategory($vl["parent"]);
                    echo $p["category_name"];
                ?>
            </td>
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
            <td><a href="<?=$routing->site_url_backend('edit-category');?>/<?=$vl['id']?>"><img class="icon-table" src="<?=$routing->base_url_backend;?>assets/img/edit.png" alt="edit"></a></td>
            <td><a href="<?=$routing->site_url_backend('delete-category');?>/<?=$vl['id']?>"><img class="icon-table" src="<?=$routing->base_url_backend;?>assets/img/delete.png" alt="delete"></a></td>
        </tr>
      <?php $t++;endforeach?>
  </tbody>
</table>
<?= $data['paginator'];?>