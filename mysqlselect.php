<?php include('ketnoi.php');
// select id phim dang chieu
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

// goi ham in lich
$kq=$_SESSION['ngaykhoichieu2'];
//echo $kq;
$slphim=0;
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
        $slphim=$slphim+1;
     //   echo $_SESSION[$bien];
}
}
echo $slphim;
// chưa lấy được ngày theo phim
// echo $_SESSION['lichchieuphim2'];
/*
$phim=$_SESSION['lichchieuphim4'];
echo $phim;
 $sql3="CALL laylichchieutheongay_phim('$kq','$phim')";
$resu1=mysqli_query($conn,$sql3);
if(mysqli_num_rows($resu1)>0){
while($row1 = $resu1->fetch_assoc()){
   echo $row1['tenphim']." ".$row1['thoigianbatdau']." Phòng".$row1['tenphong'];
}
}
else{
echo "<h1>Không có lịch chiếu</h1>";
}*/
