<?php include('header.php');
include('ketnoi.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');
// lay thoigian hien tai
$tghientai=date('H:i');
// lay ngay hien tai
$k = date('Y-m-d');
//echo $k."<br/>";
$bien= getDate();
$ngayt=$bien['mday'];
$thangt=$bien['mon'];
$namt=$bien['year'];
for($i=1; $i<9; $i++){
    $ngaychieu="ngaykhoichieu";
    $ngay=$ngayt;
    $thang=$thangt;
    $nam=$namt;
    if(($ngay<10)&&($thang<10)){
        $k=$nam."-0".$thang."-0".$ngay;
    }
    elseif($ngay<10){
        $k=$nam."-".$thang."-0".$ngay;
    }
    elseif($thang<10){
        $k=$nam."-0".$thang."-".$ngay;
    }
    else{
    
    }
    $str=(string)$i;
    $ngaychieu.=$str;
    $_SESSION[$ngaychieu]=$k;
    $c=1;
    $ngay=$ngay+$c;
if((($ngay>28) && ($thang==2))){
    $thang=$thang+1;
    $ngay=1;
}
if(($ngay>31)&&($thang!=2)){
    $thang=$thang+1;
    $ngay=1;
}
if(($thang)>12){
    $nam=$nam+1;
    $thang=1;
    $ngay=1;
}
$namt=$nam;
$thangt=$thang;
$ngayt=$ngay;
}
if(empty($_GET['id_rap'])){
  $_GET['id_rap']=$_SESSION['rap1'];
}
$_SESSION['get_rap']=$_GET['id_rap'];
$get_rap=$_SESSION['get_rap'];
if(empty($_GET['ngaychieu'])){
  $_GET['ngaychieu']=$_SESSION['ngaykhoichieu1'];
}
$_SESSION['get_ngay']=$_GET['ngaychieu'];
$get_ngay=$_SESSION['get_ngay'];
if(!isset($_GET['id_phim'])){
  $_GET['id_phim']='';
  $get_phim=$_GET['id_phim'];
}
else{
  $p= $_GET['id_phim'];
  $sql="SELECT id_phim,tenphim FROM phim WHERE id_phim='$p' or tenphim='$p'";
  $resu=mysqli_query($conn,$sql);
  while($row = $resu->fetch_assoc()){
    $_SESSION['tenphim']=$row['tenphim'];
    $_SESSION['get_phim']=$row['id_phim'];
  }
  $get_phim=$_SESSION['get_phim'];
}


?>
<main>
<div id="lichchieu">
  <div class="arch">
<hr/>
<hr/>

    <h1>LỊCH CHIẾU PHIM</h1>
</div>
<div class="row selectrap mb-5">
<?php
if(empty($_GET['id_phim'])) {
  echo'<div class="col-8 m-0 ">
  <form class="row" action="lichchieu.php" method="get">
      <div class="col-4 offset-1 nhan">
            <label for="inputState" class="form-label">CỤM RẠP<span class="error">*</span></label>
        </div>
      <div class="col-3 tencumrap">
            <select id="inputState" placeholder="chọn cụm rạp" required name="id_rap" class="form-select">';
   
    echo'<option value="'.$get_rap.'">'.$_SESSION["tenrap".$get_rap].'</option>';
    $soluong=$_SESSION['sorap'];
  for($i=1; $i<=$soluong;$i++){
    $rap=$_SESSION['rap'.$i];
    $tenrap=$_SESSION['tenrap'.$i];
    if($get_rap!=$rap){
      echo' <option value="'.$rap.'">'.$tenrap.'</option>';
    }
  }
  echo'
</select>
</div>
<div class="col-4"> <button class="btn timkiem" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button></div>
</form>
</div>';
echo'<div class="col-4">
<form class="d-flex row" action="lichchieu.php" method="GET">
  <div class="col-6"><input class="form-control me-2" type="search" placeholder="Tìm phim" name=id_phim aria-label="Search"></div>
  <div class="col-6"> <button class="btn timkiem" type="submit">Search</button></div>
</form>
</div>
';
}
else{
  $get_rap='';
  echo'<div class="col-12 offset-6">
  <form class="d-flex row" action="lichchieu.php" method="GET">
    <div class="col-2"><input class="form-control me-2" type="search" placeholder="Tìm phim" name=id_phim aria-label="Search"></div>
    <div class="col-3"> <button class="btn timkiem" type="submit">Search</button></div>
  </form>
  </div>';
}

  ?>
</div>
<hr/>

    <hr/>

  <div class="container" id="lich">
    <?php
    if(empty($_GET['id_phim'])){
      $tenrap=$_SESSION["tenrap".$get_rap];
      echo'<h4 class="text-center mt-3">Cụm Rạp: '.$tenrap.'</h4>';
    }
    else{
      $tenphim=$_SESSION['tenphim'];
      echo'<h4 class="text-center mt-3">Phim: '.$tenphim.'</h4>';
    }
    ?>
    <div class="col-12 offset-1 phim">
      <?php
      for($i=1; $i<9; $i++){
        $bien="ngaykhoichieu";
        $bien.=$i;
        $ngaychieu = $_SESSION[$bien];
        if(isset($_GET['ngaychieu'])&&($ngaychieu==$_GET['ngaychieu'])){
          echo'<a href="lichchieu.php?ngaychieu='.$ngaychieu.'&id_rap='.$get_rap.'&id_phim='.$get_phim.'" class="btn col-1 ngay">'.$ngaychieu.'</a>';
        }
        else{
          echo'<a href="lichchieu.php?ngaychieu='.$ngaychieu.'&id_rap='.$get_rap.'&id_phim='.$get_phim.'" class="btn col-1 ngaychuachon">'.$ngaychieu.'</a>';   
        }
       
      }
      ?>
      </div>
      <hr/>
    <hr/>
<?php
  if(empty($_GET['id_rap'])&&(empty($_GET['id_phim']))){
    echo " <p>Vui phòng chọn rạp bạn muốn xem";
  }
  elseif(!empty($_GET['id_rap'])&&(empty($_GET['id_phim']))){
    if(isset($_GET['ngaychieu'])){
      $kq=$_GET['ngaychieu'];
      $sql="CALL phimchieutheongay_rap('$kq','$get_rap')";
    $slphim=0;
    $resu=mysqli_query($conn,$sql);
    if(mysqli_num_rows($resu)>0){
        $i=0;
        while($row = $resu->fetch_assoc()){
            $bien1='id_l';
            $bien2="tenchieuphim";
            $bien3="giobatdau";
            $bien4="tenphong";
            $i=$i+1;
            $k=(string)$i;
            $bien1.=$k;
            $bien2.=$k;
            $bien3.=$k;
            $bien4.=$k;
            $bien5='id_p';
            $bien5.=$k;
            $slphim=$slphim+1;
            $_SESSION[$bien1]=$row['id_lichchieu'];
            $_SESSION[$bien2]=$row['tenphim'];
            $_SESSION[$bien5]=$row['id_phim'];
            $_SESSION[$bien3]=$row['thoigianbatdau'];
            $_SESSION[$bien4]=$row['tenphong'];
          
          }
          }
    }
    if($slphim==0){
      echo'<h3 class="text-center mb-5">Không có lịch chiếu trong ngày này</h3>';
    }
    else{
       $tam='';
       for($i=1; $i<=$slphim; $i++){
        $ten_p = $_SESSION['tenchieuphim'.$i];
        $id_p= $_SESSION['id_p'.$i];
        if($tam==$_SESSION['tenchieuphim'.$i]){
             continue;
        }
        else{
          $tam=$_SESSION['tenchieuphim'.$i];
          echo'<div class="row  giochieu">';
          echo'<a href="lichchieu.php?id_phim='.$id_p.'" class="tentua"><h5>'.$ten_p.'</h5></a><div class="row gio">
          <div class="d-flex flex-wrap col-12 offset-2">';
          for($k=$i; $k<=$slphim; $k++){
            if($tam==$_SESSION['tenchieuphim'.$k]){
              $i_l=$_SESSION['id_l'.$k];
              $phong=$_SESSION['tenphong'.$k];
              $giobatdau=$_SESSION['giobatdau'.$k];
              if(strtotime($tghientai)>strtotime($giobatdau)){
                echo'<a href="muave.php?id_lichchieuchon='.$i_l.'" class="btn m-1 giobo" onclick="return false">'.$phong.'</br>'.$giobatdau.'</a>';  
              }
              else{
             echo'<a href="muave.php?id_lichchieuchon='.$i_l.'" class="btn m-1 giolay">'.$phong.'</br>'.$giobatdau.'</a>';
            }  
            }
          }
          echo'</div>
          </div>
    </div>';
        }

       }
      }
  }
  elseif(!empty($_GET['id_phim'])){
          $id_p=$get_phim;
          $sql="CALL laylichchieutheongay_phim('$get_ngay','$id_p')";
          $slrap=0;
          $resu=mysqli_query($conn,$sql);
          if(mysqli_num_rows($resu)>0){
              $i=0;
              while($row = $resu->fetch_assoc()){
                  $bien1="id_l";
                  $bien2="tenrap";
                  $bien='id_r';
                  $bien3="giobatdau";
                  $bien4="tenphong";
                  $i=$i+1;
                  $k=(string)$i;
                  $bien1.=$k;
                  $bien2.=$k;
                  $bien3.=$k;
                  $bien4.=$k;
                  $bien.=$k;
                  $slrap=$slrap+1;
                  $_SESSION[$bien1]=$row['id_lichchieu'];
                  $_SESSION[$bien]=$row['id_rap'];
                  $_SESSION[$bien2]=$row['tenrap'];
                  $_SESSION[$bien3]=$row['thoigianbatdau'];
                  $_SESSION[$bien4]=$row['tenphong'];
                }
                }
                if($slrap==0){
                  echo'<h3 class="text-center mb-5">Không có lịch chiếu trong ngay nay</h3>';
                }
                else{
                   $tam='';
                   for($i=1; $i<=$slrap; $i++){
                    $ten_r = $_SESSION['tenrap'.$i];
                    $id_r = $_SESSION['id_r'.$i];
                    if($tam==$_SESSION['tenrap'.$i]){
                         continue;
                    }
                    else{
                      $tam=$_SESSION['tenrap'.$i];
                      echo'<div class="row  giochieu">';
                      echo'<a href="lichchieu.php?id_rap='.$id_r.'" class="tentua"><h5>'.$ten_r.'</h5></a><div class="row gio">
                      <div class="d-flex flex-wrap col-12 offset-2">';
                      for($k=$i; $k<=$slrap; $k++){
                        if($tam==$_SESSION['tenrap'.$k]){
                          $i_l= $_SESSION['id_l'.$k];
                          $phong=$_SESSION['tenphong'.$k];
                          $giobatdau=$_SESSION['giobatdau'.$k];
                          if(strtotime($tghientai)>strtotime($giobatdau)){
                            echo'<a href="muave.php?id_lichchieuchon='.$i_l.'" class="btn m-1 giobo" onclick="return false">'.$phong.'</br>'.$giobatdau.'</a>';  
                          }
                          else{
                         echo'<a href="muave.php?id_lichchieuchon='.$i_l.'" class="btn m-1 giolay">'.$phong.'</br>'.$giobatdau.'</a>';
                        }  
                        }
                      }
                      echo'</div>
                      </div>
                </div>';
                    }
            
                   }
                  }
          }


?>
</div>
</div>
</main>
<?php
include('footer.php');
?>