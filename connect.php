
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "thanhvien";
    //them mowis co so du lieu
    $conn = mysqli_connect($servername, $username , $password,$dbname );
    if (!$conn){
        die("ket noi that bai".mysqli_connect_error());
    }
    mysqli_set_charset($conn,"utf8");
    //echo "ket noi thanh cong";
 ?>

