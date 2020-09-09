<?php if(!defined("BASEPATH")) exit('No direct script access allowed');?>
<?php 
    include_once('models/category.php');
    $cat = new category();
    $id = $_GET['id'];
    $oneCat = $cat->getOneRecord("category", $id);
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $editCat = $cat->editCategory($id);
      $url = $routing->site_url_backend('quan-ly-danh-muc');
      header("location: $url");
    }
    else{
?>
<div class="col-lg-5">
    <h1>EDIT CATEGORY</h1>
    <form action="<?=$routing->site_url_backend("edit-category/")?><?=$id?>" method="POST" name="faddc">
      <div class="form-group"> 
        <label>category_name</label>
        <input type="text" class="form-control"  name="catname" value = "<?=$oneCat['category_name'];?>">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">slug</label>
        <input type="text" class="form-control"  name="slug" value="<?=$oneCat['slug'];?>">
      </div>
      <div class="form-group">
        <label>parent</label>
        <select class="form-control" name="parent" id="exampleFormControlSelect1">
          <option value ="0">____-select category-______</option>
         <?php
            $allCat = $cat->getAllRecords("category");
            foreach(  $allCat as $value)
            {
              if($oneCat['parent']==$value['id'])
                echo "<option selected value = '".$value['id']."'>".$value['category_name']."</option>";
              else
                echo "<option value = '".$value['id']."'>".$value['category_name']."</option>";
            }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>status</label>
        <select class="form-control" name="status" id="exampleFormControlSelect1">
          <?php
            if($oneCat['status'] == 1)
              echo "<option selected>1</option>";
            else
              echo "<option>0</option>";
           ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
    <?php
      }
    ?>
</div>
