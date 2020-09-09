<?php if(!defined("BASEPATH")) exit('No direct script access allowed');?>
<?php
    include_once("models/user.php");
    $f = new users();
    if(!isset( $_GET['page'])){
        $cur_page = 1;
        $data = $f->getAllUser();
    }
    else{
        $cur_page = $_GET['page'];
        $size = $_GET['size'];
        $data = $f->getAllUser($size,  $cur_page);
    }
    $c = $data['users'];
    $trash = $f->getNumberOfTrashItem("users");
?>
<table class="table table-bordered" post('get')>
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
    </tr>
  </thead>
  <tbody>
      <?php $t=0; foreach($c as $vl):?>
        <tr> 
            <th scope="row"><?=$t?></th>
            <td><?=$vl["name"]?></td>
            <td><?=$vl["email"]?></td>
            <td><?=$vl["phone"]?></td>
            <td><?=$vl["address"]?></td>
        </tr>
      <?php $t++;endforeach?>
  </tbody>
</table>
<?= $data['paginator'];?>