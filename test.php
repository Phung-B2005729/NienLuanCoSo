<?php 
include('ketnoi.php');
include('mysqlselect.php');
/*
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
/*
// goi ham in lichchieu
$kq=$_SESSION['ngaykhoichieu2'];
echo $kq."<br/>";
$sql="CALL phimduocchieutheongay('$kq')";
$resu=mysqli_query($conn,$sql);
if(mysqli_num_rows($resu)>0){
    while($row = $resu->fetch_assoc()){
        $phim=$row['id_phim'];
        $sql3="CALL laylichchieutheongay_phim('$kq','$phim')";
        $resu1=$conn->query($sql3);
        if(mysqli_num_rows($resu1)>0){
        while($row1 = $resu1->fetch_assoc()){
           echo $row1['tenphim']." ".$row1['thoigianbatdau']." Phòng".$row1['tenphong'];
        }
        }
        else{
        echo "<h1>Không có lịch chiếu</h1>";
        }
}
}
else{
    echo "<h1>Khong co lich chieu trong ngay nay</h1>";
}

$kq=$_SESSION['ngaykhoichieu2'];
echo $kq;
$sql="CALL phimduocchieutheongay('$kq')";
$resu=mysqli_query($conn,$sql);
if(mysqli_num_rows($resu)>0){
    $i=0;
    while($row = $resu->fetch_assoc()){
        $bien="lichchieuphim";
        $i=$i+1;
        $k=(string)$i;
        $bien.=$k;
        $_SESSION[$bien]=$row['id_phim'];
     //   echo $_SESSION[$bien];
}
}
else{
    echo "<h1>Khong co lich chieu trong ngay nay</h1>";
}
*/

$phim=$_SESSION['lichchieuphim1'];
$sql3="CALL laylichchieutheongay_phim('$kq','$phim')";
$resu1=$conn->query($sql3);
if(mysqli_num_rows($resu1)>0){
while($row1 = $resu1->fetch_assoc()){
   echo $row1['tenphim']." ".$row1['thoigianbatdau']." Phòng".$row1['tenphong'];
}
}
else{
echo "<h1>Không có lịch chiếu</h1>";
}

