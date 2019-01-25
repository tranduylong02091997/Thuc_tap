<?php
include('connect.php');
if(isset($_POST['data'])){
    $a = $_POST['data'];
    $sql = "select * from dangki where  hoten like '%$a%' or email like '%$a%' or Sodt like '%$a%' ";
   $query= mysqli_query($conn,$sql);
   $num_row=mysqli_num_rows($query);
    if($num_row > 0){
        while ($dulieu = mysqli_fetch_array($query)) {
            ?>
            <tr id="<?php echo $dulieu['id']; ?>"> <!-- hiện id-->
                <td data-target="Id"><?php echo $dulieu["id"]; ?> </td>
                <td data-target="HoTen"><?php echo $dulieu["hoten"]; ?> </td>
                <td data-target="DiaChi"><?php echo $dulieu["diachi"]; ?> </td>
                <td data-target="Email"><?php echo $dulieu["email"]; ?> </td>
                <td data-target="SoDT"><?php echo $dulieu["Sodt"]; ?> </td>
                <td><span  class="btn-edit glyphicon-pencil glyphicon" data-role="Edit" data-id="<?php echo $dulieu['id'] ;?>"></span></td>
                <td><span  style="width:42px;" type="button" value="" class="remove glyphicon glyphicon-trash"></span></td>
            </tr>
            <?php
        }
    }
}
?>