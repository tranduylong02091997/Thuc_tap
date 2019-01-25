<?php
include('connect.php');
if(isset($_POST['Id'])) {
    $Id = $_POST['Id'];
    $sql = " DELETE FROM dangki where id = '$Id'";
    $query = mysqli_query($conn,$sql);
}
?>