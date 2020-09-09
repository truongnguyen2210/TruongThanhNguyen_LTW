<?php if(!defined("BASEPATH")) exit('No direct script access allowed');?>
<?php 
    include_once('models/category.php');
    $cat = new category();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $newCat = $cat->addNewCategory();
    }
    else{
?>
<div class="col-lg-5">
    <h1>ADD CATEGORY</h1>
    <form action="<?=$routing->site_url_backend("add-category")?>" method="POST" name="faddc">
      <div class="form-group"> 
        <label for="exampleFormControlInput1">category_name</label>
        <input type="text" class="form-control"  name="catname"   id="exampleFormControlInput1" placeholder="input category_name">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">slug</label>
        <input type="text" class="form-control"  name="slug" id="exampleFormControlInput1" placeholder="input slug">
      </div>
      <div class="form-group">
        <label>parent</label>
        <select class="form-control" name="parent" id="exampleFormControlSelect1">
          <option value ="0">____-select category-______</option>
         <?php
            $allCat = $cat->getAllRecords("category");
            foreach(  $allCat as $value){
              echo "<option value = '".$value['id']."'>".$value['category_name']."</option>";
            }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>status</label>
        <select class="form-control" name="status" id="exampleFormControlSelect1">
          <option>1</option>
          <option>0</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
    <?php
      }
    ?>
</div>
