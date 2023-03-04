
<?php
include("header.php");
include('ketnoi.php');
$sql = "SELECT id_phim FROM phim WHERE tinhtrang=5 ORDER BY ngaykhoichieu DESC;";
$result = $conn->query($sql);
if(mysqli_num_rows($result) > 0){
    $i=0;
    $_SESSION["sophimdangchieu"]=mysqli_num_rows($result);
    while($row = $result->fetch_row()){
        $bien="phimdangchieu";
        $i=$i+1;
        $k=(string)$i;
        $bien.=$k;
        foreach($row as $valeu){
          $_SESSION[$bien]=$valeu;
        }
        }
}
// select id phim sap chieu
$sql2 = "SELECT id_phim FROM phim WHERE tinhtrang=6 ORDER BY ngaykhoichieu DESC;";
$result2 = $conn->query($sql2);
if(mysqli_num_rows($result2) > 0){
    $i2=0;
    $_SESSION["sophimsapchieu"]=mysqli_num_rows($result2);
    while($row = $result2->fetch_assoc()){
        $bien2="phimsapchieu";
        $i2=$i2+1;
        $k2=(string)$i2;
        $bien2.=$k2;
        foreach($row as $valeu){
            $_SESSION[$bien2]=$valeu;
        }
}
}
// select id rap
$sql1 = "SELECT id_rap,tenrap FROM cumrap";
$result1 = $conn->query($sql1);
if(mysqli_num_rows($result1) > 0){
    $i3=0;
    $_SESSION["sorap"]=mysqli_num_rows($result1);
    while($row = $result1->fetch_assoc()){
        $bien3="rap";
        $bien4="tenrap";
        $i3=$i3+1;
        $k3=(string)$i3;
        $bien3.=$k3;
        $bien4.=$k3;
        $_SESSION[$bien3]=$row['id_rap'];
        $_SESSION[$bien4]=$row['tenrap'];
        }
}
?>
 <main id="content">
<?php
include "sile.php";
?>
<section class="section2">
  <div class="row context">
      <hr/>
      <hr/>
      <h1>MOVIE SELECTION</h1>
      <hr/>
      <hr/>
  </div>

  <div class="container">
    <?php
    if(isset($_SESSION['sophimdangchieu'])){
    $h=0;
    for($p=0;$p<=1;$p++){
        $k=0;
        echo'<div class="row movie">';
        for($i=$h+1; $i<($h+5); $i++){
        $k=$k+1;
         $bien="phimdangchieu";
        $m=(string)$i;
        $bien.=$m;
        $id_phim=$_SESSION[$bien];
        $caulenh="SELECT tenhinhanh FROM phim,hinhanh WHERE hinhanh.id_hinhanh=phim.id_hinhanh and id_phim='$id_phim'";
        $kq = $conn->query($caulenh);
        $row1= $kq->fetch_assoc();
        $anh ='';
        foreach($row1 as $vale){
             $anh = $vale;
        }
        echo'<div class="col-3">
          <div class="card" >
            <img src="Anh/'.$anh.'" class="card-img-top anh1" alt="...">
            <div class="card-body text-center">
              <a href="xemchitiet.php?id_phim='.$id_phim.'" class="btn">Xem Chi Tiết</a>
              <a href="lichchieu.php?id_phim='.$id_phim.'" class="btn">Mua Vé</a>
            </div>
          </div>
        </div>';
    }
    echo '</div>';
    $h=$k;
}
}
    ?>
  <div class="row content2">
    <h5 class="text-center"><a href="phimdangchieu.php" class="btn">XEM THÊM.....</a></h5>
  </div>
  </div>
</section>

<section class="section2">
  <div class="row context">
      <hr/>
      <hr/>
      <h1>CỤM RẠP ARCH</h1>
      <hr/>
      <hr/>
  </div>
  <div class="container">
  <?php
    if(isset($_SESSION['sorap'])){
        echo'<div class="row movie">';
        for($i=1; $i<5; $i++){
        $bien="rap";
        $k=(string)$i;
        $bien.=$k;
        $id_rap=$_SESSION[$bien];
        $caulenh="SELECT tenhinhanh FROM cumrap,hinhanh WHERE hinhanh.id_hinhanh=cumrap.hinhanh and id_rap='$id_rap'";
        $kq = mysqli_query($conn,$caulenh);
        $row1= $kq->fetch_assoc();
        $anh ='';
        foreach($row1 as $vale){
             $anh = $vale;
        }
        $caulenh2="SELECT tenrap FROM cumrap WHERE id_rap='$id_rap'";
        $kq2 = $conn->query($caulenh2);
        $row2= $kq2->fetch_assoc();
        $tenrap ='';
        foreach($row2 as $vale2){
             $tenrap = $vale2;
        }
        echo' <div class="col-3">
        <div class="card" >
          <img src="Anh/'.$anh.'" class="card-img-top" alt="'.$tenrap.'">
          <div class="card-body text-center">
            <a href="xemchitiet.php?id_rap='.$id_rap.'" class="btn">'.$tenrap.'</a>
          </div>
        </div>
      </div>';
    }
    echo '</div>';
}
    ?>
    <div class="row content2">
      <h5 class="text-center"><a href="rapphim.php" class="btn">XEM THÊM.....</a></h5>
    </div>
  </div>
  </section>
<section class="section2">
  <div class="row context">
    <hr/>
    <hr/>
    <h1>TIN TỨC & ƯU ĐÃI</h1>
    <hr/>
    <hr/>
</div>
<div class="container">
  <div class="row movie">
    <div class="col-3">
      <div class="card" style="width: 100%;">
        <img src="Anh/uudaishopee.jpg" class="card-img-top" alt="ARCH Ninh Kiều Cần Thơ">
        <div class="card-body text-center">
          <a href="#" class="btn ">Xem Chi Tiết</a>
        </div>
      </div>
    </div>
    <div class="col-3">
      <div class="card" style="width: 100%;">
        <img src="Anh/uudaithanhvien.jpg" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <a href="#" class="btn ">Xem Chi Tiết</a>
        </div>
      </div>
    </div>
    <div class="col-3">
      <div class="card" style="width: 100%;">
        <img src="Anh/uudia8-3.jpg" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <a href="#" class="btn ">Xem Chi Tiết</a>
        </div>
    </div>
    </div>
    <div class="col-3">
      <div class="card" style="width: 100%;">
        <img src="Anh/uudai20k.jpg" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <a href="rapphim.php" class="btn ">Xem Chi Tiết</a>
        </div>
    </div>
  </div>
  </div>
</div>
<hr/>
<hr/>
</section>
</main>
    <?php
    include("footer.php")?>