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
      <h1>CỤM RẠP ARCH</h1>
      <hr/>
      <hr/>
  </div>
  <div class="container">
   <?php
    if(isset($_SESSION['sorap'])){
        $h=0;
        $soluong=$_SESSION['sorap'];
        $k=0;
        for($m=0;$m<(int)($soluong/4);$m++){
            echo'<div class="row movie">';
            for($i=$h+1; $i<($h+5); $i++){
              $k=$k+1;
             $bien="rap";
            $p=(string)$i;
            $bien.=$p;
            $id_rap=$_SESSION[$bien];
            $caulenh="SELECT tenhinhanh FROM cumrap,hinhanh WHERE hinhanh.id_hinhanh=cumrap.hinhanh and id_rap='$id_rap'";
            $kq = $conn->query($caulenh);
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