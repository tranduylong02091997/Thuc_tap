<?php
include("connect.php");

if(isset($_POST["Username"]) && isset($_POST["Password"])){
    session_start();
    $myusername = $_POST['Username'];
    $mypassword = $_POST['Password'];
    echo $mypassword;
    // check tofn tai o day
    $sql = " SELECT * FROM login WHERE username = '$myusername' and  password ='$mypassword' ";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
        if($count == TRUE) { //login thanhS cong
            //session_register("myusername");
            $_SESSION['login_user'] = $myusername;
            header("location:Index.php");
            return true;
        }
        else {
            echo " <br><p> Tai khoan hoac mat khua khong chinh xac! moi nhap lai</p>";
            return false;
    }
}
mysqli_close($conn);
?>