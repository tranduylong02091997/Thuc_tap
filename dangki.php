<?php
include("connect.php");
if(isset($_POST['Username'])) {
    $myusername = $_POST['Username'];
    $mypassword = md5($_POST['Password']);
    // check tofn tai o day
    $sql = " SELECT * FROM login WHERE Username = '$myusername' ";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    if($count == TRUE){ //
    }else{
        // insert db
        $sql_INSERT = "INSERT INTO login(Username,Password) values ('$myusername','$mypassword')";

        if (mysqli_query($conn, $sql_INSERT)) {
            echo "Data succesed";
        } else {
            echo ":Error " . $sql ;
        }
    }
}
mysqli_close($conn);
?>
