<?php 
    include("header.php");
    include('ketnoi.php')?>
    <main> <div class="contaner" id="chitiet"> 
     <?php
        if(isset($_GET['id_phim'])||isset($_GET['id_rap'])){
            if((isset($_GET['id_phim'])) && (!isset($_GET['id_rap']))){
                $valeu=$_GET['id_phim'];
            $sql="SELECT * FROM phim,hinhanh,loaiphim WHERE phim.id_hinhanh=hinhanh.id_hinhanh and phim.id_loaiphim=loaiphim.id_loaiphim and id_phim='$valeu'";
            $resul = mysqli_query($conn,$sql);
            if(mysqli_num_rows($resul)==1){
                $row = $resul->fetch_assoc();
                echo '<div class="contaner"> 
                <div class="row">
                <div class="col-5 offset-1">
                  <figure class="figure">
                    <img src="Anh/'.$row['tenhinhanh'].'" class="figure-img img-fluid rounded" alt="...">
                  </figure>
                
           </div>';
             // code php hinh anh phim hoac rap;
           echo '<div class="col-6">
           <div class="container videotrailer ml-3">
               <div class="row">
                   <h1>'.$row['tenphim'].'</h1>
               </div>
               <div class="row">
               <p><b>NỘI DUNG: </b>'.$row['noidung'].'</p>
               <p><b>NGÀY KHỞI CHIẾU:</b> '.date($row['ngaykhoichieu']).'</p>
               <p><b>THỜI LƯỢNG: </b>'.$row['thoiluong'].'</p>
               <p><b>THỂ LOẠI: </b>'.$row['tenloaiphim'].'</p>
               <div class="row"><div class="col-4 m-0">
               <a href="'.$row['trailer'].'"class="btn trailer" target="_blank"">CHI TIẾT TRAILER</a></div>
               <div class="col-4 mt-0">
               <a href="lichchieu.php?id_phim='.$_GET['id_phim'].'"class="btn trailer" target="_blank"">MUA VÉ</a></div></div>
               </div>
           </div>
       </div></div>
       </div>';
            }
            
        }
        else{
            $valeu=$_GET['id_rap'];
            $sql="SELECT * FROM cumrap,hinhanh WHERE cumrap.hinhanh=hinhanh.id_hinhanh and id_rap='$valeu'";
            $resul = mysqli_query($conn,$sql);
            if(mysqli_num_rows($resul)==1){
                $row = $resul->fetch_assoc();
                echo '<div class="contaner"> 
                <div class="row">
                <div class="col-5 offset-1">
                  <figure class="figure">
                    <img src="Anh/'.$row['tenhinhanh'].'" class="figure-img img-fluid rounded" alt="...">
                  </figure>
                
           </div>';
             // code php hinh anh phim hoac rap;
           echo '<div class="col-6">
           <div class="container videotrailer ml-3">
               <div class="row">
                   <h1>'.$row['tenrap'].'</h1>
               </div>
               <div class="row">
               <div class="col-6">
               <p><b>ĐỊA CHỈ: </b>'.$row['diachi'].'</p>
               <p><b>KHU VỰC:</b> '.$row['khuvuc'].'</p>
               <p><b>HOTLINE:</b> '.$row['hottline'].'</p>
               <div class="row">
               <div class="col-6">
               <a href="lichchieu.php?id_rap='.$_GET['id_rap'].'"class="btn trailer" target="_blank"">LỊCH CHIẾU</a>
               </div></div></div>
               <div class="col-6">
                        <a href="#">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62860.63879223682!2d105.75757035!3d10.03418695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0629f6de3edb7%3A0x527f09dbfb20b659!2zQ2FuIFRobywgTmluaCBLaeG7gXUsIEPhuqduIFRoxqE!5e0!3m2!1sen!2s!4v1677684560495!5m2!1sen!2s" width="250" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </a>
               </div>
              </div>
           </div>
       </div>
       </div>
       </div>';
            }
            
        }
    }
        ?>
     
        </div>
        <div class="giave container">
            <h2 class="text-center">BẢNG GIÁ VÉ ARCH CINEMA</h2>
            <table class="table table-striped" id="banggia" border="2">
                <thead>
                <tr>
                    <th></th>
                    <th>Người lớn</th>
                    <th>Trẻ Em dưới 15 tuổi</th>
                    <th>U22 - Học Sinh Sinh Viên</th>
              </tr>
                </thead>
                <tbody>
                    <tr>
                    <th>TRƯỚC 17h00 GIỜ</th>
                        <td>55.000 VND</td>
                        <td>45.000 VND</td>
                        <td>50.000 VND</td>
                    </tr>
                    <tr>
                    <th>SAU 17h00 GIỜ</th>
                        <td>65.000 VDN</td>
                        <td>55.000 VDN</td>
                        <td>60.000 VDN</td>
                    </tr>
                </tbody>   
                <tfoot>
                    <tr>
                    <td colspan="4"><b>Ghế Vip:</b> phụ thu 10.000 VDN</td>
                    </tr>
                    <tr><td colspan="4"><b>Ghế Couple:</b> phụ thu 5.000 VDN</td></tr>
                </tfoot>
</table>
                <div class="m-3">
                <h4>CHÚ Ý: </h4>
                <p>- Giá vé khi đặt vé trực tuyến trên website và ứng dụng ARCH là giá vé người lớn. 
                <br/>- Các loại vé như học sinh-sinh viên, vé trẻ em, vé U22 vui lòng mua trực tiếp tại quầy
                <br/>- Vui lòng xuất trình giấy tờ khi mua vé U22 hoặc học sinh sinh viên</p>
                </div>
        </div>
</main>
    <?php
    include("footer.php")?>