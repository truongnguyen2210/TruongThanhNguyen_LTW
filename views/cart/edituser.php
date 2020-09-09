
<?php 
    include_once("models/M_user.php");
    $u = new User();
    $id = $_GET['id'];
    $use = $u->getOneUse($id);
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $editUse = $u->editProfile($id);
      ?>
      <div class="col-sm-12 text-center"><div class="alert alert-info" role="alert"> 
           Cập Nhật Thành Công <i class="fa fa-user-check"></i>. Tiếp Tục 
            <a href="<?=$routing->site_url("xac-nhan")?>">Thanh Toán.</a>
      </div>
      <?php
    //   $url = $routing->site_url_backend('xac-nhan');
    //   header("location: $url");
    }
    else{
?>
<div class="form-edit-profile">
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 form-capnhat">
            <h1 class="tieude-capnhat text-center mt-3">Update Profile</h1>
            <form action="<?=$routing->site_url("cap-nhat-thong-tin/")?><?=$id?>" method="POST" name="faddc">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="<?=$use["name"]?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="<?=$use["email"]?>">
                </div>
                <div class="form-group">
                    <label>Phone</label> 
                    <input type="text" class="form-control" name="phone" value="<?=$use["phone"]?>">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" value="<?=$use["address"]?>">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <?php
            }
            ?>
        </div>
    </div>
</div>
</div>