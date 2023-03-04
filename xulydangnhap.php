<?php
if(!isset($_POST['dangnhap'])){
    die('');
}
include('ketnoi.php');
if(isset($_POST['dangnhap'])){
    $username=trim($_POST['user']);
    $password=trim($_POST['password']);
    if(empty($username)){
        echo '<script language="javascript">
                    alert("Bạn chưa nhập username!!");
                     window.location="dangnhap.php";
                     </script>';
        die();
    }
    elseif(empty($password)){
        echo '<script language="javascript">
                    alert("Bạn chưa nhập password!!");
                     window.location="dangnhap.php";
                     </script>';
        die();
    }
    if($username == "admin"){
        $sql = "SELECT * FROM admin WHERE user='$username' and pass='$password'";
        $result= mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)!=1){
            echo '<script language="javascript">
                alert("username hoặc password không đúng");
                 window.location="dangnhap.php";
                 </script>';
            }
        else{
            $sql = "SELECT id_phanquyen FROM admin WHERE pass='$password'";
            $result= mysqli_query($conn,$sql);
            session_start();
            $_SESSION['user']=$username;
            $_SESSION['phanquyen']=$result;
            header("Location: admin.php");
        }
    }
    else{
        $password=md5($password);
        $sql = "SELECT * FROM khachhang WHERE username='$username' and pass='$password'";
        $result= mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)!=1){
            echo '<script language="javascript">
                alert("username hoặc password không đúng");
                 window.location="dangnhap.php";
                 </script>';
            }
        else{
            session_start();
            $_SESSION['user']=$username;
            header("Location: index.php");
        }
    }
   

}