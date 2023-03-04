<?php
/*for($i=1; $i<=$slphim; $i++){
    if(isset($_SESSION['rapchieuphim'.$i])&& isset($_SESSION['tenchieuphim'.$i])){
      $id_p = $_SESSION['rapchieuphim'.$i];
      $ten_p = $_SESSION['tenchieuphim'.$i];
      echo'<h5>'.$ten_p.'</h5>';
      $sqlr="CALL lichchieutheophim_rap_ngay('$get_ngay','$id_p','$get_rap')";
      $resur=mysqli_query($conn,$sqlr);
      if(mysqli_num_rows($resur)>0){
          $i=0;
          echo  '<div class="row  giochieu"><div class="d-flex flex-wrap col-12 offset-2">';
          while($row = $resur->fetch_assoc()) {
                $i=$i+1;
                $k=(string)$i;
                $bien3="giobatdau";
                $bien4="phongchieu";
                $bien4.=$k;
                $bien3.=$k;
              $_SESSION[$bien3]=$row['thoigianbatdau'];
              $_SESSION[$bien4]=$row['tenphong'];
             echo' <a href="#" class="btn m-1">'.$_SESSION[$bien3].'</br>'.$_SESSION[$bien4].'</a>';
            }
      }
          }
        }


        for($p=0;$p<=$slphim;$p++){
            $h=$p+1;
            if($_SESSION[$bien5]==$_SESSION['id_p'.$h]){
              $test=False;
              $i=$i-1;
              $_SESSION[$bien5]='';
              break;
            }
          }
          <div class="khunggio"><p class="mb-0">'.$phong.'</P>*/
 date_default_timezone_set('Asia/Ho_Chi_Minh');


print (date('H:i'));
$ht=date("G:i", time());
strtotime($ht);
if(strtotime($ht)>strtotime('9:30')){
  print("lon hon");
}
