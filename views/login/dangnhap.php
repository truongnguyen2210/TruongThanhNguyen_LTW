<?php
include_once("libs/routing.php");
$routing = new Routing();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?=$routing->base_url_backend;?>assets/css/css.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      /* css cho form dang nhap */
      button.btn.btn-primary.nut-dn {
    /* padding: 9px 126px; */
    margin-top: 20px;
    /* margin-left: 35px; */
    background-color: #03a9f44d;
    font-size: 20px;
    color: white;
    font-weight: 800;
    font-family: sans-serif;
    /* border-radius: 30px; */
    width: 375px;
}

button.btn.btn-primary.nut-dn:hover {
    background: linear-gradient(45deg, #2196f3,#0000ff4f,#ff22f1,#03a9f4);
}
.container.form-dn {
    background: linear-gradient(45deg, #2196f3,#0000ff4f,#ff22f1,#03a9f4);
    border-radius: 20px;
    padding: 30px 0px;
    margin-top: 2%;
    width: 51%;
}

.container.form-dn h3 {
    font-size: 49px;
    font-family: initial;
    color: #002d80;
}
.khoi-to {
    margin-top: 100px;
}
body{
  background-image: url("http://localhost:8888/TruongThanhNguyen_LTW/assets/img/bgdn.jpg");
  background-attachment: fixed;
  background-repeat: no-repeat;
  background-size: cover;
}
a.navbar-brand {
    color: #fdfdfd!important;
    font-family: inherit;
    font-weight: 800;
}
    </style>
  </head>
  <body>
  <div class="khoi-to">
    <div class="container  form-dn">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h3 class="text-center">Login</h3>
                <form action = "<?=$routing->base_url('views/login/xulydangnhap.php');?>" method="post">
                      <div class="form-group">
                          <label >Email</label>
                          <input type="email" class="form-control" name="email"  aria-describedby="emailHelpId" placeholder="input email">
                      </div>
                      <div class="form-group">
                      <label >Password</label>
                      <input type="password" class="form-control" name="pass"  placeholder="input password">
                      </div>
                      <div class="form-check">
                      <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="check" value="checkedValue" >
                          Display value
                      </label>
                      </div>
                      <div class="canh-giua">
                        <button type="submit" class="btn btn-primary nut-dn" name="submit">Login</button>
                        <button type="submit" class="btn btn-primary nut-dn" name="submit"><i class="fa fa-facebook-f">Facebook</i></button>
                        <button type="submit" class="btn btn-primary nut-dn" name="submit"><i class="fa fa-google">Google</i></button>
                      </div>
                     
                  </form>
                </div>
            </div>
        </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>