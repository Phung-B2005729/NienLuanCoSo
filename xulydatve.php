<?php
if(isset($_POST['datve'])){
    if(!isset($_POST['soghechon']) || empty($_POST['soghechon'])|| ($_POST['soghechon'])==0){
        $id_lich=$_SESSION['lichchieudachon'];
        echo '<script>alert("bạn chưa chọn ghế");
        window.location="muave.php?id='.$id_lich.'"</script>';
    }
    else{
        $sl= $_POST['soghechon'];
        for($i=1; $i<=$sl; $i++){
            $ghe=$_POST['ghe'.$i];
            echo $ghe;
        }
    }
    
}
?>