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
$sql1="SELECT * FROM ghe order by id_ghe";
    $serul1 = mysqli_query($conn,$sql1);
    $soghe=mysqli_num_rows($serul1);
    $_SESSION['soghe']=$soghe;
    if(mysqli_num_rows($serul1) > 0){
        $i=0;
        $arr=array();
        while($row1 = $serul1->fetch_assoc()){
            $bien1='id_ghe';
            $bien3='id_loai';
            $i=$i+1;
            $k=(string)$i;
            $bien1.=$k;
            $bien3.=$k;
            $_SESSION[$bien1]=$row1['id_ghe'];
            $_SESSION[$bien3]=$row1['id_loaighe'];
            $arr[$i]['loaighe']=$row1['id_loaighe'];
            $arr[$i]['ghe']=$row1['id_ghe'];
        
        }}
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
        $sql="CALL hienthilichchieu('$id_lich')";
        $serul = mysqli_query($conn,$sql);
        if(mysqli_num_rows($serul)==1){
            while($row = $serul->fetch_assoc()){
                    $tenrap=$row['tenrap'];
                    $tenphim=$row['tenphim'];
                    $tenphong=$row['tenphong'];
                    $giobatdau=$row['thoigianbatdau'];
                    $gioketthuc=$row['thoigianketthuc'];
                    $ngaychieu=$row['ngaychieu'];
            }

        }
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
                                     echo'<input class="col-1 ghengoivip btn" value="'.$arr[$i]['ghe'].'" type="checkbox"onclick="ghechon(this)" ondblclick="ghebo(this)">';
                                 }
                                 elseif($arr[$i]['loaighe']=='T1'){
                                     echo'<button class="col-1 ghengoithuong btn" value="'.$arr[$i]['ghe'].'" onclick="ghechon(this)" ondblclick="ghebo(this)">'.$arr[$i]['ghe'].'</button>';
         
                                 }
                                 elseif($arr[$i]['loaighe']=='CD1'){
                                     echo'<button class="col-1 ghengoicapdoi btn" value="'.$arr[$i]['ghe'].'" onclick="ghechon(this)" ondblclick="ghebo(this)">'.$arr[$i]['ghe'].'</button>';
                                 }
                             
                             }
                        }
                    }
               else{     for($i=$h+1; $i<($h+13); $i++){
                       $k=$k+1;
                       $solan=$solan+1;
                        if($arr[$i]['loaighe']=='V1'){
                            echo'<button class="col-1 ghengoivip btn" value="'.$arr[$i]['ghe'].'"onclick="ghechon(this)" ondblclick="ghebo(this)">'.$arr[$i]['ghe'].'</button>';
                        }
                        elseif($arr[$i]['loaighe']=='T1'){
                            echo'<button class="col-1 ghengoithuong btn" value="'.$arr[$i]['ghe'].'" onclick="ghechon(this)" ondblclick="ghebo(this)">'.$arr[$i]['ghe'].'</button>';

                        }
                        elseif($arr[$i]['loaighe']=='CD1'){
                            echo'<button class="col-1 ghengoicapdoi btn" value="'.$arr[$i]['ghe'].'" onclick="ghechon(this)" ondblclick="ghebo(this)">'.$arr[$i]['ghe'].'</button>';
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
         <div class="col-12 rapphong">
           <p id="ghe">Ghế </p>
       </div>
       <hr/>
       <div class="col-12 rapphong">
       <p id="bapnuoc">Bắp Nước</p>
    </div>
    <hr/>
       <div class="col-12 rapphong">
         <p id="tien">Tổng tiền</p>
      </div>
      <hr/>
      <button class="btn btn-danger text-center" type="submit">Đặt Vé</button>
       <hr/>
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