<?php
if(!isset($_POST['dangky'])){
    die('');
}
// nhúng file kết nối database
include('ketnoi.php');
    if(isset($_POST['dangky'])){
        // lấy dữ liệu từ fỏm đăng ký
        $fullname=trim($_POST['fullname']);
        $username=trim($_POST['user']);
        $email=trim($_POST['email']);
        $password=trim($_POST['password']);
        $gioitinh=trim($_POST['gioitinh']);
        $ngaysinh=trim($_POST['birthday']);
        $khuvuc=trim($_POST['khuvuc']);
        $sdt=trim($_POST['phone']);
        $sql1 = "SELECT * FROM khachhang WHERE sdt = '$sdt'";
        $sql2 = "SELECT * FROM khachhang WHERE email='$email'";
        $sql3 = "SELECT * FROM khachhang WHERE username='$username'";
            $result1 = mysqli_query($conn, $sql1);
            $result2 = mysqli_query($conn, $sql2);
            $result3 = mysqli_query($conn, $sql3);
            if (mysqli_num_rows($result1) > 0){
                echo '<script language="javascript">
                    alert("số điện thoại đã được sử dụng!!Vui lòng đăng ký số điện khác!!");
                     window.location="dangky.php";
                     </script>';
                }
         elseif(mysqli_num_rows($result2) > 0){
                    echo '<script language="javascript">
                        alert("email đã được sử dụng!!Vui lòng đăng ký email khác!!");
                         window.location="dangky.php";
                         </script>';
                    }
            elseif (mysqli_num_rows($result3) > 0){
                        echo '<script language="javascript">
                            alert("username đã được sử dụng!!Vui lòng đăng ký username khác!!");
                             window.location="dangky.php";
                             </script>';
                       
                }
        else{
           //  ma hoa mat kha truoc khi dua vao csdl
             $password=md5($password);
            $sql4 = "INSERT INTO khachhang (HoTen,NgaySinh,GioiTinh,sdt,Email,KhuVuc,username,pass) VALUES ('$fullname','$ngaysinh','$gioitinh','$sdt','$email','$khuvuc','$username','$password')";
            if(mysqli_query($conn, $sql4)){
                echo '<script language="javascript">alert("Đăng ký thành công!");window.location="dangnhap.php"; 
                </script>';
                }
                else {
                    echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="dangnhap.php";</script>';
                    }
                }
     }