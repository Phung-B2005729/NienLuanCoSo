<?php
include('header.php');
include('ketnoi.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');
if(!isset($_SESSION['user'])){
    $_SESSION['lichchieudachon']=$_GET['id_lichchieuchon'];
   echo' <script language="javascript">
                    alert("Vui lòng đăng nhập tài khoản thành viên");
                     window.location="dangnhap.php";
                     </script>';
}
if(isset($_SESSION['user'])&&isset($_GET['id_lichchieuchon'])){

    }
if(isset($_SESSION['user'])&&(!isset($_GET['id_lichchieuchon']))){
        echo' <script language="javascript">
                     window.location="lichchieu.php";
                     </script>';
    }
?>
<main>
   <?php
    if(isset($_SESSION['user'])&&isset($_GET['id_lichchieuchon'])){
        $id_lich=$_GET['id_lichchieuchon'];
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
        $sql1="SELECT ghe.id_ghe,gia, ghe.id_loaighe from giave, ghe,loaighe where giave.id_loaighe = loaighe.id_loaighe and ghe.id_loaighe=loaighe.id_loaighe and id_khunggio='$khunggio' ORDER by id_ghe;";
    $serul1 = mysqli_query($conn,$sql1);
    $soghe=mysqli_num_rows($serul1);
    $_SESSION['soghe']=$soghe;
    if(mysqli_num_rows($serul1) > 0){
        $i=0;
        $arr=array();
        while($row1 = $serul1->fetch_assoc()){
            $bien1='id_ghe';
            $bien3='id_loai';
            $bien4="gia";
            $i=$i+1;
            $k=(string)$i;
            $bien1.=$k;
            $bien3.=$k;
            $bien4.=$k;
            $_SESSION[$bien1]=$row1['id_ghe'];
            $_SESSION[$bien3]=$row1['id_loaighe'];
            $_SESSION[$bien4]=$row1['gia']; // giá ghế 1
            $arr[$i]['loaighe']=$row1['id_loaighe'];
            $arr[$i]['ghe']=$row1['id_ghe'];
            $arr[$i]['gia']=$row1['gia'];

        
        }}
       echo '<div class="container" id="thongtin" >
        <div class="row">
          <h2 class="">ĐẶT VÉ ONLINE</h2>
          <div class="col-7" id="thongtinchieu">
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
                   
                        if(($soghe-$solan)<12){
                            $conlai=$soghe-$solan;
                          
                            for($i=$solan+1; $i<=$soghe; $i++){
                                $solan=$solan+1;
                                 if($arr[$i]['loaighe']=='V1'){
                                     echo'<button class="col-1 ghengoivip btn" value="'.$arr[$i]['ghe'].'" id="'.$arr[$i]['ghe'].'" onclick="ghechon(\''.$arr[$i]['ghe'].'\','.$arr[$i]['gia'].')" ondblclick="xoaghe(\''.$arr[$i]['ghe'].'\','.$arr[$i]['gia'].')"></button>';
                                 }
                                 elseif($arr[$i]['loaighe']=='T1'){
                                     echo'<button class="col-1 ghengoithuong btn" value="'.$arr[$i]['ghe'].'" id="'.$arr[$i]['ghe'].'" onclick="ghechon(\''.$arr[$i]['ghe'].'\','.$arr[$i]['gia'].')" ondblclick="xoaghe(\''.$arr[$i]['ghe'].'\','.$arr[$i]['gia'].')">'.$arr[$i]['ghe'].'</button>';
         
                                 }
                                 elseif($arr[$i]['loaighe']=='CD1'){
                                     echo'<button class="col-1 ghengoicapdoi btn" value="'.$arr[$i]['ghe'].'" id="'.$arr[$i]['ghe'].'" onclick="ghechon(\''.$arr[$i]['ghe'].'\','.$arr[$i]['gia'].')" ondblclick="xoaghe(\''.$arr[$i]['ghe'].'\','.$arr[$i]['gia'].')">'.$arr[$i]['ghe'].'</button>';
                                 }
                             
                             }
                        }
                    }
               else{     for($i=$h+1; $i<($h+13); $i++){
                       $k=$k+1;
                       $solan=$solan+1;
                        if($arr[$i]['loaighe']=='V1'){
                            echo'<button class="col-1 ghengoivip btn" id="'.$arr[$i]['ghe'].'" value="'.$arr[$i]['ghe'].'"onclick="ghechon(\''.$arr[$i]['ghe'].'\','.$arr[$i]['gia'].')" ondblclick="xoaghe(\''.$arr[$i]['ghe'].'\','.$arr[$i]['gia'].')">'.$arr[$i]['ghe'].'</button>';
                        }
                        elseif($arr[$i]['loaighe']=='T1'){
                            echo'<button class="col-1 ghengoithuong btn" id="'.$arr[$i]['ghe'].'" value="'.$arr[$i]['ghe'].'" onclick="ghechon(\''.$arr[$i]['ghe'].'\','.$arr[$i]['gia'].')" ondblclick="xoaghe(\''.$arr[$i]['ghe'].'\','.$arr[$i]['gia'].')">'.$arr[$i]['ghe'].'</button>';

                        }
                        elseif($arr[$i]['loaighe']=='CD1'){
                            echo'<button class="col-1 ghengoicapdoi btn" id="'.$arr[$i]['ghe'].'" value="'.$arr[$i]['ghe'].'" onclick="ghechon(\''.$arr[$i]['ghe'].'\','.$arr[$i]['gia'].')" ondblclick="xoaghe(\''.$arr[$i]['ghe'].'\','.$arr[$i]['gia'].')">'.$arr[$i]['ghe'].'</button>';
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
      <form action="xulydatve.php" method="POST">
         <div class="col-12 rapphong">
           <p id="ghe">Ghế 
           
           </p>
       </div>
       <hr/>
       <div class="col-12 rapphong">
       <p id="bapnuoc">Bắp Nước</p>
    </div>
    <hr/>
       <div class="col-12 rapphong">
         Tổng Tiền: <label id="nhan">0</label> VDN <input type="hidden" value="" name="tongtien" id="tien">
      </div>
      <hr/>
     <input type="hidden" name="id_khachhang" value="'.$_SESSION['user'].'">
     <input type="hidden" name="id_lichchieu" value="'.$_GET['id_lichchieuchon'].'">
     <input type="hidden" name="ngaydat" value="'.date('Y-m-d').'">
     <input type="hidden" id="soghe" name="soghechon" value="">
     <input type="hidden" id="sobapnuoc" name="soluongbapnuoc" value="">
      <button class="btn btn-danger text-center" name="datve" type="submit">Đặt Vé</button>
       <hr/>
       </form>
           </div>

      <div class="container" id="muabapnuoc">
           
      </div>
      </div>
    </div>
   
  </div>';
}
?>
</main>
<?php
include('footer.php');
?>