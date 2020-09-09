<?php if(!defined("BASEPATH")) exit('No direct script access allowed');?>
<?php 
    include_once('models/product.php');
    $p = new products();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $newPro = $p->addNewProduct();
      $url = $routing->site_url_backend('quan-ly-san-pham');
      header("location:$url");
      exit();
    }
    else{
?>
<div class="col-lg-5">
    <h1>ADD PRODUCT</h1>
    <form action="<?=$routing->site_url_backend("add-product")?>" method="POST" name="faddpro" enctype="multipart/form-data">
      <div class="form-group"> 
        <label for="exampleFormControlInput1">product_name</label>
        <input type="text" class="form-control"  name="product_name"   id="exampleFormControlInput1" placeholder="input product_name">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">slug</label>
        <input type="text" class="form-control"  name="slug" id="exampleFormControlInput1" placeholder="input slug">
      </div>
      <div class="form-group">
        <label>product_category</label>
        <select class="form-control" name="product_category" id="exampleFormControlSelect1">
          <option value ="0">____-select category-______</option>
         <?php
            $allCat = $p->getAllRecords("category");
            foreach(  $allCat as $value){
              echo "<option value = '".$value['id']."'>".$value['category_name']."</option>";
            }
          ?>
        </select>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Detail</label>
            <textarea class="form-control" name="detail" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label >Image</label>
            <input type="file" class="form-control-file" name="image">
        </div>
        
        <div class="form-group">
            <label>Price</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="price" placeholder="Another input">
        </div>

      </div>
      <div class="form-group">
        <label>status</label>
        <select class="form-control" name="status" id="exampleFormControlSelect1">
          <option value="1">Ẩn</option>
          <option value="0">Hiện</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
    <?php
      }
    ?>
</div>
