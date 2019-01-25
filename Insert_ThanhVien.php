<?php
include("connect.php");
session_start();
if(isset($_POST['HoTen'])){
    $myHoTen= $_POST['HoTen'];
    $myDiaChi = $_POST['DiaChi'];
    $myEmail= $_POST['Email'];
    $mySoDT = $_POST['SoDT'];
  // check tofn tai o day
    $sql = " SELECT * FROM dangki WHERE hoten = '$myHoTen' ";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    if($count == TRUE){ //
        echo " Error: Tài khoản đã tồn tại ";
    }else {
        // insert db
        $sql_INSERT = "INSERT INTO dangki(id,hoten,diachi,email,Sodt) values ('','$myHoTen','$myDiaChi','$myEmail','$mySoDT')";

        $query = mysqli_query($conn,$sql_INSERT);
        if ($query==true) {
            echo "Thêm Mới Thành Công ";
        } else {
            echo "Error: " . $sql_INSERT . "<br>" . mysqli_error($conn);
        }
   }
}
mysqli_close($conn);
?>
