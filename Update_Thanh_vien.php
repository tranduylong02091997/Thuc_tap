<?php
include("connect.php");
    if(isset($_POST['Id'])){
        $Id = $_POST['Id'];
        $HoTen = $_POST['HoTen'];
        $DiaChi = $_POST['DiaChi'];
        $Email = $_POST['Email'];
        $SoDT =$_POST['SoDT'];
        $query_sql="UPDATE dangki SET hoten ='$HoTen',diachi ='$DiaChi',email ='$Email',Sodt ='$SoDT' where id ='$Id'";
            $query = mysqli_query($conn,$query_sql);
            if($query){
                echo "Update success";
            }
    }
?>

