<?php
include('header.php');
include('ketnoi.php');
?>
<main id="content">
<?php
include('sile.php');
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
    $soluong=$_SESSION['sophimdangchieu'];
    $k=0;
    for($m=0;$m<(int)($soluong/4);$m++){
        echo'<div class="row movie">';
        for($i=$h+1; $i<($h+5); $i++){
          $k=$k+1;
         $bien="phimdangchieu";
        $p=(string)$i;
        $bien.=$p;
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
  </div>
  <hr/>
  <hr/>
</section>
</main>
<?php
include('footer.php');