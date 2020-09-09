
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TechPro Demo</title>
	<!-- link file css --> 
  <link rel="stylesheet" href="<?= $routing->base_url;?>assets/CSS.css">
 
	<!-- link bootstrap 4 -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- jquery -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<!-- popper -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="<?= $routing->base_url;?>assets/JS.js"></script>
  <!-- link icon -->
	<script src="https://kit.fontawesome.com/fd76fb5f52.js" crossorigin="anonymous"></script>
  <!-- link font chử -->
  <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
  
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet">
	<!-- link javascript -->
	
  <!-- link anh demo https://via.placeholder.com/450x250 -->
  <style>
  
  </style>
</head>
<body>

<div class="menutop">
        <div class="container dungyen">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                  <a class="navbar-brand" href="<?= $routing->base_url;?>index.php"> Tech<p>Pr<i class="fa fa-dice-d20"></i></p></a>
                  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                      <a class="nav-link text-center" href="<?= $routing->site_url("tu-van")?>" >
                        <i class="fa fa-user-tie"><p class="textmenu">TƯ VẤN</p></i>
                         <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-center" href="<?= $routing->site_url("tin-tuc")?>">
                          <i class="fa fa-newspaper"><p class="textmenu">TIN TỨC</p></i>
                          <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-center" href="<?= $routing->site_url("lap-top")?>">
                          <i class="fa fa-laptop-code"><p class="textmenu">LAPTOP</p></i>
                          <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-center" href="#" >
                        <i class="fa fa-desktop"><p class="textmenu">PC</p></i>
                        <span class="sr-only">(current)</span>
                      </a>
                    </li>
                  <li class="nav-item active">
                    <a class="nav-link text-center" href="<?=$routing->site_url("dien-thoai")?>">
                      <i class="fa fa-mobile-alt"><p class="textmenu">Điện Thoại</p></i>
                      <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link text-center" href="<?= $routing->site_url("may-tinh-bang")?>">
                    <i class="fa fa-tablet-alt"><p class="textmenu" >TabLet</p></i>
                    <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link text-center" href="<?= $routing->site_url("dong-ho")?>" id="game-app"><i class="fa fa-gem">
                  <p class="textmenu">Đồng Hồ</p></i><span class="sr-only">(current)</span>
                </a>
            </li>
              <li class="nav-item active">
                <a class="nav-link text-center" href="<?= $routing->site_url("phu-kien")?>" ><i class="fa fa-headphones-alt">
                  <p class="textmenu">LINH KIỆN</p></i> <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item active">
               <a class="nav-link text-center" href="#" >
                    <i class="fa fa-gift"><p class="textmenu">KHUYẾN MÃI</p></i>
                     <span class="sr-only">(current)</span>
                 </a>
            </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Bạn tìm gì?" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                  </form>
                </div>
              </nav>
             
              <!-- hết navbar -->
        </div>
        <!-- hết container -->
    </div> 
    <!--  hết div menutop -->
    <div class="nguoidung-giohang">
      <div class="nguoidung">
          <ul class="cha-nguoidung">
            <li><i class="fa fa-user"></i>
              <ul  class="con-nguoidung">
                <?php
                    if(!isset($_SESSION['name']))
                    {
                      ?>
                        <li><a href="<?= $routing->site_url("dang-ky");?>">Đăng Ký</a></li>
                        <li><a href="<?= $routing->site_url("dang-nhap");?>">Đăng Nhập</a></li>
                      <?php
                    }else{
                      ?>
                           <li><a href="<?= $routing->site_url("ho-so");?>">Hồ Sơ</a></li>
                           <li><a href="<?= $routing->site_url("dang-xuat");?>">Đăng Xuất</a></li>
                      <?php
                    }
                ?>
              </ul>
            </li>
          </ul>
      </div>
      <div class="giohang">
          <p><a href="<?= $routing->site_url("gio-hang");?>"><i class="fa fa-shopping-cart">[<?php if(isset($_SESSION['cart'])){echo count($_SESSION['cart']);}else{echo '0';}?>]</i></a></p>
      </div>
    </div>
    