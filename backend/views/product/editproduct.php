<?php if(!defined("BASEPATH")) exit('No direct script access allowed');?>
<?php 
    include_once('models/product.php');
    $p = new products();
    $id = $_GET['id'];
    $onePro = $p->getOneRecord("products", $id);
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      // $img = '';
      // $img = $_POST("image");
      // if( $img == null){
      //   $img = $onePro('image');
      // }
      $newPro = $p->editProduct($id);
      $url = $routing->site_url_backend('quan-ly-san-pham');
      header("location:$url");
      exit();
    }
    else{
?>
<div class="col-lg-5">
    <h1>EDIT PRODUCT</h1>
    <form action="<?=$routing->site_url_backend("edit-product/")?><?=$id?>" method="POST" name="faddpro" enctype="multipart/form-data">
      <div class="form-group"> 
        <label for="exampleFormControlInput1">product_name</label>
        <input type="text" class="form-control"  name="product_name"   id="exampleFormControlInput1" value = "<?=$onePro['product_name'];?>">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">slug</label>
        <input type="text" class="form-control"  name="slug" id="exampleFormControlInput1" value = "<?=$onePro['slug'];?>">
      </div>
      <div class="form-group">
        <label>product_category</label>
        <select class="form-control" name="product_category" id="exampleFormControlSelect1">
          <option value ="0">____-select category-______</option>
         <?php
            $allCat = $p->getAllRecords("category");
            foreach(  $allCat as $value)
            {
              if($onePro['product_category']==$value['id'])
                echo "<option selected value = '".$value['id']."'>".$value['category_name']."</option>";
              else
                echo "<option value = '".$value['id']."'>".$value['category_name']."</option>";
            }
          ?>
        </select>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Detail</label>
            <textarea class="form-control" name="product_detail" id="exampleFormControlTextarea1" rows="3"><?=$onePro['product_detail'];?></textarea>
        </div>

        <div class="form-group">
            <label for="<?=$onePro['image'];?>">Image</label>
            <input type="file" class="form-control-file" name="image" value="<?=$onePro['image'];?>"><?=$onePro['image'];?>
        </div>
        
        <div class="form-group">
            <label>Price</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="price" value="<?=$onePro['price'];?>">
        </div>

      </div>
      <div class="form-group">
        <label>status</label>
        <select class="form-control" name="status" id="exampleFormControlSelect1">
          <?php
            if($onePro['status'] == 1)
              echo "<option selected>Hiện</option>";
            else
              echo "<option>Ẩn</option>";
           ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
    <?php
      }
    ?>
</div>
