<?php
include('header.php');
include('ketnoi.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');
if(!isset($_SESSION['user'])){
   echo' <script language="javascript">
                    alert("Vui lòng đăng nhập tài khoản thành viên");
                     window.location="dangnhap.php";
                     </script>';
}

if((isset($_SESSION['user'])&&(!isset($_GET['id_lichchieuchon'])))){
        echo' <script language="javascript">
                     window.location="lichchieu.php";
                     </script>';
    }
    if(empty($_GET['id_lichchieuchon'])){
        echo' <script language="javascript">
                     window.location="lichchieu.php";
                     </script>';
    }
?>
<main>
   <?php
    if(isset($_SESSION['user'])&&isset($_GET['id_lichchieuchon'])&&!empty($_GET['id_lichchieuchon'])){
        $id_lich=$_GET['id_lichchieuchon'];
        $_SESSION['lichchieudachon']=$id_lich;
        $sql="SELECT * FROM phim,lichchieu,phongchieu,suatchieutrongngay,cumrap WHERE phim.id_phim=lichchieu.id_phim
        and lichchieu.id_suatchieu=suatchieutrongngay.id_suatchieu and phongchieu.id_phongchieu=lichchieu.id_phongchieu and phongchieu.id_rap=cumrap.id_rap
        and lichchieu.id_lichchieu='$id_lich'";
        $serul = mysqli_query($conn,$sql);
        if(mysqli_num_rows($serul)==1){
            while($row = $serul->fetch_assoc()){
                    $tenrap=$row['tenrap'];
                    $tenphim=$row['tenphim'];
                    $tenphong=$row['tenphong'];
                    $giobatdau=$row['thoigianbatdau'];
                    $gioketthuc=$row['thoigianketthuc'];
                    $ngaychieu=$row['ngaychieu'];
                    $khunggio=$row['id_khunggio'];
                 
            }

        }
        // lay ghe va gia ghe
        $sql1="SELECT ghe.id_ghe,gia, ghe.id_loaighe from giave, ghe,loaighe where giave.id_loaighe = loaighe.id_loaighe and ghe.id_loaighe=loaighe.id_loaighe and id_khunggio='$khunggio' ORDER by id_ghe;";
    $serul1 = mysqli_query($conn,$sql1);
    $soghe=mysqli_num_rows($serul1);
    $_SESSION['soghe']=$soghe;
    if(mysqli_num_rows($serul1) > 0){
        $i=0;
        $arr=array();
        while($row1 = $serul1->fetch_assoc()){
          //$bien1='id_ghe';
        // $bien3='id_loai';
         //   $bien4="gia";
            $i=$i+1;
        //$k=(string)$i;
         //$bien1.=$k;
         //$bien3.=$k;
         //   $bien4.=$k;
         //   $_SESSION[$bien1]=$row1['id_ghe'];
           // $_SESSION[$bien3]=$row1['id_loaighe'];
           // $_SESSION[$bien4]=$row1['gia']; // giá ghế 1
            $arr[$i]['loaighe']=$row1['id_loaighe'];
            $arr[$i]['ghe']=$row1['id_ghe'];
            $arr[$i]['gia']=$row1['gia'];
        }}
// lay ghe da duoc dat
      $sql = "SELECT id_ghe FROM datve, lichchieu, vephimdadat WHERE datve.id_datve=vephimdadat.id_datve and lichchieu.id_lichchieu=datve.id_lichchieu and lichchieu.id_lichchieu='$id_lich'";
      $serul1 = mysqli_query($conn, $sql);
      $slghedadat=0;
      if(mysqli_num_rows($serul1) > 0){
        $slghedadat = mysqli_num_rows($serul1);
        $ghedadat = array();
        $i=0;
        while($row = $serul1->fetch_assoc()){
            $i=$i+1;
            $ghedadat[$i]['id_ghedadat']=$row['id_ghe'];
        }
      }
// lay bat nuoc
        $sql2 = "SELECT * FROM bapnuoc, hinhanh where bapnuoc.hinhanh=hinhanh.id_hinhanh";
        $sul1 = mysqli_query($conn, $sql2);
        $slbap=mysqli_num_rows($sul1);
        $_SESSION['sobapnuoc']=mysqli_num_rows($sul1);
        if(mysqli_num_rows($sul1) > 0){
            $i=0;
           $bap=array();
            while($row = $sul1->fetch_assoc()){
                 $bien1='idbap';
                $bien3='tenbap';
                $bien4="gia";
                $i=$i+1;
                $k=(string)$i;
                $bien1.=$k;
                $bien3.=$k;
                $bien4.=$k;
              
                $_SESSION[$bien1]=$row['id_bapnuoc'];
                $_SESSION[$bien3]=$row['tensp'];
                $_SESSION[$bien4]=$row['giatien'];
                $bap[$i]['id_bap']=$row['id_bapnuoc'];
                $bap[$i]['tensp']=$row['tensp'];
                $bap[$i]['gia']=$row['giatien'];
                $bap[$i]['mota']=$row['mota'];
                $bap[$i]['hinhanh']=$row['tenhinhanh'];
                
            }
        }

// lay phuong thuc thanh toan
$sql2="SELECT * FROM phuongthucthanhtoan";
$sul1 = mysqli_query($conn, $sql2);
 $slpt=mysqli_num_rows($sul1);
 $_SESSION['sophuongthuc']=mysqli_num_rows($sul1);
 if(mysqli_num_rows($sul1) > 0){
     $i=0;
    $phuongthuc=array();
     while($row = $sul1->fetch_assoc()){
         $i=$i+1;
         $phuongthuc[$i]['id_pt']=$row['id_phuongthuc'];
         $phuongthuc[$i]['tenpt']=$row['ten_phuongthuc'];;
     }
 }

 // lay danhsach ngan hang
 $sql2="SELECT * FROM nganhanglienket";
 $sul1 = mysqli_query($conn, $sql2);
  $slnh=mysqli_num_rows($sul1);
  $_SESSION['songanhang']=mysqli_num_rows($sul1);
  if(mysqli_num_rows($sul1) > 0){
      $i=0;
     $nganhang=array();
      while($row = $sul1->fetch_assoc()){
          $i=$i+1;
          $nganhang[$i]['idnh']=$row['id_nganhang'];
          $nganhang[$i]['tengd']=$row['tengiaodich'];
      }
  }

        echo '<div class="container" id="thongtin" >
        <div class="row">
          <h2 class="">ĐẶT VÉ PHIM</h2>
          <div class="col-7">
          <div class="container" id="thongtinchieu">
                <div class="row rapphong">';
                    echo'<p>'.$tenrap.' | '.$tenphong.'<br/>'.$ngaychieu.' '.$giobatdau.' ~ '.$ngaychieu.' '.$gioketthuc.'</p>
                    </div>';
    
    ?>
      <?php 
                echo'    <div class="row manhinh">
                <h5>MÀN HÌNH</h5>
                <div class="container text-center">';
                $h=0;
                $k=0;
                $solanlap=(int)($soghe/12)+1;
                $solan=0;
                for($m=1;$m<=$solanlap;$m++){
                    echo'<div class="row hangngoi">';
                   
                    if($m==($solanlap)){
                      if(($soghe-$solan)<=12){
                            $conlai=$soghe-$solan;
                            for($i=$solan+1; $i<=$soghe; $i++){
                                $solan=$solan+1;
                                $kiemtra = false;
                                for($k=1; $k<=$slghedadat; $k++){
                                    if($arr[$i]['ghe']==$ghedadat[$k]['id_ghedadat']){
                                        $kiemtra=true;
                                        break;
                                    }
                                 }
                                 if($kiemtra==true){
                                    echo'<button class="col-1 ghedadat btn" value="'.$arr[$i]['loaighe'].'" id="'.$arr[$i]['ghe'].'" onclick="return false" >'.$arr[$i]['ghe'].'</button>';
                                 }
                                 else{
                                    if($arr[$i]['loaighe']=='V1'){
                                     echo'<button class="col-1 ghengoivip btn" value="'.$arr[$i]['loaighe'].'" id="'.$arr[$i]['ghe'].'" onclick="ghechon(\''.$arr[$i]['ghe'].'\','.$arr[$i]['gia'].')" >'.$arr[$i]['ghe'].'</button>';
                                 }
                                 elseif($arr[$i]['loaighe']=='T1'){
                                     echo'<button class="col-1 ghengoithuong btn" value="'.$arr[$i]['loaighe'].'" id="'.$arr[$i]['ghe'].'" onclick="ghechon(\''.$arr[$i]['ghe'].'\','.$arr[$i]['gia'].')" >'.$arr[$i]['ghe'].'</button>';
         
                                 }
                                 elseif($arr[$i]['loaighe']=='CD1'){
                                     echo'<button class="col-1 ghengoicapdoi btn" value="'.$arr[$i]['loaighe'].'" id="'.$arr[$i]['ghe'].'" onclick="ghechon(\''.$arr[$i]['ghe'].'\','.$arr[$i]['gia'].')">'.$arr[$i]['ghe'].'</button>';
                                 }
                                }
                             
                             }
                        }
                    }
               else{  
                for($i=$h+1; $i<($h+13); $i++){
                    $kiemtra=false;
                       $k=$k+1;
                       
                       for($kt=1; $kt<=$slghedadat; $kt++){
                        if($arr[$i]['ghe']==$ghedadat[$kt]['id_ghedadat']){
                            $kiemtra=true;
                            break;
                        }
                     }
                   
                     if($kiemtra==true){
                        echo'<button class="col-1 dadat btn " value="'.$arr[$i]['loaighe'].'" id="'.$arr[$i]['ghe'].'" onclick="return false" >'.$arr[$i]['ghe'].'</button>';
                     }
                     else{
                       $solan=$solan+1;
                        if($arr[$i]['loaighe']=='V1'){
                            echo'<button class="col-1 ghengoivip btn" id="'.$arr[$i]['ghe'].'" value="'.$arr[$i]['loaighe'].'"onclick="ghechon(\''.$arr[$i]['ghe'].'\','.$arr[$i]['gia'].')" >'.$arr[$i]['ghe'].'</button>';
                        }
                        elseif($arr[$i]['loaighe']=='T1'){
                            echo'<button class="col-1 ghengoithuong btn" id="'.$arr[$i]['ghe'].'" value="'.$arr[$i]['loaighe'].'" onclick="ghechon(\''.$arr[$i]['ghe'].'\','.$arr[$i]['gia'].')" >'.$arr[$i]['ghe'].'</button>';


                        }
                        elseif($arr[$i]['loaighe']=='CD1'){
                            echo'<button class="col-1 ghengoicapdoi btn" id="'.$arr[$i]['ghe'].'" value="'.$arr[$i]['loaighe'].'" onclick="ghechon(\''.$arr[$i]['ghe'].'\','.$arr[$i]['gia'].')">'.$arr[$i]['ghe'].'</button>';
                        }
                    }
                   
                    }
                    $h=$k;
                    echo '</div>';
                }
            }

                echo'</div>'
                ?>
                <div id="chuthich" class=" row">
            <div class="row">
              <div class="col-4">
                <div class="col-2 dangchon mb-1"><p></p></div>
                <div class="col-9"><p>Đang chọn</p></div>
               </div>
               <div class="col-4">
                <div class="col-2 dadat mb-1"><p></p></div>
                <div class="col-9"><p>ĐÃ ĐẶT</p></div>
               </div>
               <div class="col-4">
                <div class="col-2 ghethuong mb-1"><p></p></div>
                <div class="col-9"><p>Thường</p></div>
               </div>
            </div>
           <div class="row">
            <div class="col-4">
              <div class="col-2 ghevip mb-1"><p></p></div>
              <div class="col-9"><p>Vip</p></div>
             </div>
             <div class="col-4">
              <div class="col-2 ghecapdoi mb-1"><p></p></div>
              <div class="col-9"><p>Ghế đôi</p></div>
             </div>
           </div>
           </div>
               <h6><b>Lưu ý:</b> Giá vé đặt online sẽ được tính là giá vé người lớn</h6>
      </div>
        </div>
        </div>
        </div>
  <?php
  echo'<div class="col-1"></div>
  <div class="col-4">
  <div class="container" id="hoadon">';
  echo' <h5>'.$tenphim.'</h5>
  <hr/>
  <div class="col-12 rapphong">
  <p>'.$tenrap.' | '.$tenphong.'<br/>'.$ngaychieu.' '.$giobatdau.' ~ '.$ngaychieu.' '.$gioketthuc.'</p>
</div>
<hr/>
';
  

      echo' <hr/>
      <form action="xulydatve.php" method="POST" onsubmit="return datve(this)">
      <div class="col-12 rapphong">
        <p id="ghe">Ghế
        
        </p>
    </div>
    <hr/>
    <div class="col-12 rapphong">
    <p id="bapnuoc">Bắp Nước: </p>
    <input type="hidden" name="slbapnuocban" value="'.$slbap.'">
    <input type="hidden" name="ktrbapnuoc" value="0">';
    for($i=1; $i<=$slbap; $i++){
        echo'<input type="hidden" id="'.$bap[$i]['tensp'].'" name="bap'.$i.'" value="0">';
    }

 echo'</div>
 <hr/>
    <div class="col-12 rapphong">
      Tổng Tiền: <label id="nhan">0</label> VDN <input type="hidden" value="" name="tongtien" id="tien">
   </div>
   <hr/>
   <div class="col-12 rapphong mb-2">
      Phương Thức Thanh Toán:
   </div>
   <div class="col-12 rapphong">';
   ?>
   <?php 
   for($i=1; $i<=$slpt; $i++){
    echo'
    <input type="radio" class="inputradio" name="phuongthuc" value="'.$phuongthuc[$i]['id_pt'].'" onchange="doiphuongthuc()" id="'.$phuongthuc[$i]['tenpt'].'" autocomplete="off" >
<label class="nhanpt" for="'.$phuongthuc[$i]['tenpt'].'">'.$phuongthuc[$i]['tenpt'].'</label><br/>'; 
   }
   
      
  echo' </div><hr/>
  <div class="col-12 rapphong nhapstk text-left" id="stk" hidden>';
  echo'<label class="tennganhang mt-1">Tên ngân hàng:</label>
  <div class="col-7 offset-2">
   <select placeholder="chọn ngân hàng" class="form-select danhsachnganhang mt-3 mb-3 " id="nganhang" name="nganhang">
   <option value="'.$nganhang[1]['idnh'].'" checked>'.$nganhang[1]['tengd'].'</option>';
  for($i=2; $i<=$slnh; $i++){
   echo' <option value="'.$nganhang[$i]['idnh'].'">'.$nganhang[$i]['tengd'].'</option>';
}
 echo'</select></div>
 
 <label for="nhstk mb-3">STK: </label><input type="text" id="nhstk" class="inputstk text-drank mb-3" name="stk" placeholder="Số tài khoản ngân hàng"></br>
 <label for="nhpass mt-3 mb-3">Pass xác nhận: </label><input type="password" id="nhpass" class="inputstk text-drank" name="pass" placeholder="nhập mật khẩu của bạn">
 ';
  
  echo'</div>
   <hr/>
  <input type="hidden" name="id_khachhang" value="'.$_SESSION['user'].'">
  <input type="hidden" name="id_lichchieu" value="'.$_GET['id_lichchieuchon'].'">
  <input type="hidden" name="ngaydat" value="'.date('Y-m-d').'">
  <input type="hidden" id="soghe" name="soghechon" value="">
  <input type="hidden" id="sobap" name="sobapnuoc" value="0">
   <button class="btn btn-danger text-center offset-4" name="datve" type="submit">Đặt Vé</button>
    <hr/>
    </form>

           </div></div></div>';


 echo'<div class="row mb-5"><div  class="container" id="muabapnuoc">
           <h3 class="text-center">SẢN PHẨM BẮP NƯỚC</h3>';
   $h=0;
   $l=0;
   $slan=$slbap/3;
   $lap=0;
   for($i=1; $i<=$slan; $i++){
       echo'<hr/><hr/> <div class="row bap">';
       if($i==$slan){
        $lap=$slbap;
       }
       else{
        $lap=$h+3;
       }
     for($k=$h+1; $k<=$lap; $k++){
           $l=$l+1;
         
       echo'<div class="col-4 tungsp">
        <div class="row mb-3"> 
              <div class="col-3 anhbap"><img src="Anh/'.$bap[$k]['hinhanh'].'" border=1 width="70" height="70"></div>
              <div class="col-9 thongtinbap">
              <h5><b>'.$bap[$k]['tensp'].'</b></h5>
              <p>'.$bap[$k]['mota'].'</p>
              </div>
              </div>
           <div class="row chonsp">
         <span class="add-cart"><b>Số Lượng:</b>
          <input name="'.$bap[$k]['tensp'].'" class="slbapnuoc" type="number" min="0" max="100" size="3" value="0" onchange="chonbapnuoc(\''.$bap[$k]['tensp'].'\','.$bap[$k]['gia'].',this.value)" onkeydown="return false"/> 
           </div></div>';
         }
       
       $h=$l;
       echo '</div>';
        }
          echo'</div></div>';

  echo'</div>';
}
?>
             
</main>
<?php
include('footer.php');
?>