<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/stype.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
    <title>ARCH</title>
</head>
<body>
<header>
<nav id="menu" class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="anh/logo5.jpg" alt="ARCH CINEMA">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link" href="index.php">ARCH CINEMA</a>
        </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="dropdownMenuButton1" aria-expanded="false">
            PHIM
          </a>
          <ul class="dropdown-menu danhsach" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="phimdangchieu.php">PHIM ĐANG CHIẾU</a></li>
            <li><a class="dropdown-item" href="phimsapchieu.php">PHIM SẮP CHIẾU</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="lichchieu.php">LỊCH CHIẾU</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="rapphim.php">RẠP PHIM</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="muave.php" tabindex="-1" aria-disabled="true">MUA VÉ</a>
        </li>
      </ul>
      <?php
      if(isset($_SESSION['user'])&&($_SESSION['user']!="")){
        echo'<ul class="navbar-nav">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="dropdownMenuButton1" aria-expanded="false">
        '.$_SESSION['user'].'
        </a>
        <ul class="dropdown-menu danhsach" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="thongtinnguoidung.php">CÁ NHÂN</a></li>
          <li><a class="dropdown-item" href="vecuatoi.php">VÉ CỦA TÔI</a></li>
        </ul>
      </li>
          <li class="nav-item">
            <a class="nav-link" href="dangxuat.php">ĐĂNG XUẤT</a>
          </li>
        </ul>';
      } 
      else{
      ?>
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link" href="dangnhap.php">ĐĂNG NHẬP</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="dangky.php">ĐĂNG KÝ</a>
        </li>
      </ul>
      <?php }?>
    </div>
  </div>
</nav>
</header>