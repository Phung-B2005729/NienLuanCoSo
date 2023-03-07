<?php
include('header.php');
include('ketnoi.php');
if(isset($_POST['datve'])){
  //  echo'<script>alert("Lưu ý vé bán online là vé người lớn!! Khi thanh toán không đổi trả!!");</script>';
    $id_lich=$_SESSION['lichchieudachon'];
    if(!isset($_POST['soghechon']) || empty($_POST['soghechon'])|| ($_POST['soghechon'])==0){
        echo '<script>alert("bạn chưa chọn ghế");
        window.location="muave.php?id_lichchieuchon='.$id_lich.'"</script>';
    }
    elseif(!isset($_POST['phuongthuc']) || empty($_POST['phuongthuc'])){
            echo '<script>alert("bạn chưa chọn phương thức thanh toán");
        window.location="muave.php?id_lichchieuchon='.$id_lich.'"</script>';
        }
    elseif(isset($_POST['phuongthuc']) && ($_POST['phuongthuc']=="1") && empty($_POST['pass'])){
        echo '<script>alert("Bạn chưa nhập mã xác nhận");
        window.location="muave.php?id_lichchieuchon='.$id_lich.'"</script>';
    }
    elseif(isset($_POST['phuongthuc']) && ($_POST['phuongthuc']=="1") && empty($_POST['stk'])){
        echo '<script>alert("Bạn chưa nhập số tài khoản ngân hàng");
        window.location="muave.php?id_lichchieuchon='.$id_lich.'"</script>';
    }  
    else{
        $user=$_SESSION['user'];
        $sql = "SELECT id_khachhang,pass  FROM khachhang where username='$user'";
        $sul1 = mysqli_query($conn, $sql);
        if(mysqli_num_rows($sul1)==1){
            $row = $sul1->fetch_assoc();
            $id_khachhang=$row['id_khachhang'];
            $pass=$row['pass'];
            }
       if(isset($_POST['phuongthuc']) && ($_POST['phuongthuc']=="1")){
        if((md5($_POST['pass'])!=$pass) && !(empty($_POST['pass'])) ){
                echo '<script>alert("Mật khẩu xác nhận không chính xác!!!");
                    window.location="muave.php?id_lichchieuchon='.$id_lich.'"</script>';
            }
        }
         
        $id_lich=$_SESSION['lichchieudachon'];
        $soluongve=$_POST['soghechon'];
        $ngaydat=$_POST['ngaydat'];
        $id_phuongthuc=$_POST['phuongthuc'];
        $tongtien=$_POST['tongtien'];
        $phuongthuc=$_POST['phuongthuc'];
        // bap nuoc. ghe , tinh trang
        if($_POST['sobapnuoc']>0){
            $bapnuoc=1;
        }
        else{
            $bapnuoc=0;
        }
        if(isset($_POST['phuongthuc']) && ($_POST['phuongthuc']=="1")){
                 $tinhtrang=4; 
                 $tennganhang=$_POST['nganhang'];
                 $stk=$_POST['stk'];
                 echo'<script>alert("'.$tennganhang.'  '.$stk.'   '.$id_khachhang.'");</script>';
                 $sql="UPDATE `khachhang` SET `STK`='$stk',`id_nganhang`='$tennganhang' WHERE id_khachhang='$id_khachhang'";
                 mysqli_query($conn,$sql);
        }
        else{
            $tinhtrang=9;
        }
// insert dat ve
 $sql="INSERT INTO `datve`(`ngaydat`, `soluongve`, `tongtien`, `tinhtrang`, `id_lichchieu`, `id_khachhang`, `bapbuoc`, `phuongthucthanhtoan`) 
 VALUES ('$ngaydat','$soluongve','$tongtien','$tinhtrang','$id_lich','$id_khachhang','$bapnuoc','$phuongthuc')";
 if(mysqli_query($conn,$sql)){
    $iddatve= mysqli_insert_id($conn);
    for($i=1; $i<=$soluongve; $i++){
        $ghedat=$_POST['ghe'.$i];
        $sql = "INSERT INTO `vephimdadat`(`id_datve`, `id_ghe`) VALUES ('$iddatve','$ghedat')";
        mysqli_query($conn,$sql);
    }
    if($bapnuoc=1){
        for($i=1; $i<=$_POST['slbapnuocban']; $i++){
            $bap=$_POST['bap'.$i];
            $idbap=$_SESSION['idbap'.$i];
            $gia=$_SESSION['gia'.$i];
            $thanhtien=$gia*$bap;
            if($bap>0){
                $sql="INSERT INTO `chitietdatbapnuoc`(`id_datve`, `id_bapnuoc`, `soluong`, `thanhtien`) VALUES ('$iddatve','$idbap','$bap','$thanhtien')";
                mysqli_query($conn,$sql);
            }
        }
    }
 }
 echo'<script>alert("Đặt vé thành công!!");window.location="lichchieu.php"</script>';
}


}     ?>


<?php 
include('footer.php');
?>