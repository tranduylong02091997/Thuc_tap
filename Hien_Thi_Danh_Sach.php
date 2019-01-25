<?php
include("connect.php");
?>
<!doctype html>
<html lang="vi">
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <title>Document</title>
    <link rel="stylesheet" href="Danh_sach_thanh_vien.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="Tim_Kiem" style="">
    <label for="">Tìm Kiếm</label>
    <input type="text" class="txt_TimKiem" style="width: 200px;"  >
    <button style="background-color: hsl(122, 42%, 27%);color: wheat;" class="Btn_TimKiem" type="button">Search</button>
</div>
<div class="Danh_Sach" style="margin-top: 4%;">
    <h3 style="margin-bottom: 10px;background: none; text-align: center;color: #008040;">Danh Sách Thành Viên Đăng Kí</h3>
    <table class="table table-bordered">
        <thead style="background: #008040;  color: wheat;">
            <tr>
                <th style="text-align: center;">Id</th>
                <th style="text-align: center;">HỌ Tên</th>
                <th style="text-align: center;">Địa Chỉ</th>
                <th style="text-align: center;">Email</th>
                <th style="text-align: center;">SoDT</th>
                <th style="text-align: center;" colspan="2" >Action</th>
            </tr>
        </thead>
        <tbody id="Hien_Thi">
            <?php
                $row_sql = " SELECT * FROM dangki ";
                $row_thuchien = mysqli_query($conn,$row_sql);
                while($dulieu=mysqli_fetch_array($row_thuchien)){
            ?>
                    <tr id="<?php echo $dulieu['id']; ?>"> <!-- hiện id-->
                        <td data-target="Id"><?php echo $dulieu["id"]; ?> </td>
                        <td data-target="HoTen"><?php echo $dulieu["hoten"]; ?> </td>
                        <td data-target="DiaChi"><?php echo $dulieu["diachi"]; ?> </td>
                        <td data-target="Email" ><?php echo $dulieu["email"]; ?> </td>
                        <td data-target="SoDT"><?php echo $dulieu["Sodt"]; ?> </td>
                        <td><span  class="btn-edit glyphicon-pencil glyphicon" data-role="Edit" data-id="<?php echo $dulieu['id'] ;?>"></span></td>
                        <td><span  style="width:42px;" type="button" value="" class="remove glyphicon glyphicon-trash"></span></td>
                    </tr>
            <?php };
            ?>
        </tbody>
    </table>
</div>
<!-- Modal -->
<div Id="myModalEdit" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Họ Tên</label>
                    <input type="text" id="HoTen" class="form-control">
                </div>
                <div class="form-group">
                    <label>Địa Chỉ</label>
                    <input type="text" id="DiaChi" class="form-control">
                </div> <div class="form-group">
                    <label>Email</label>
                    <input type="text" id="Email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Số ĐT</label>
                    <input type="text" id="SoDT" class="form-control">
                </div>
                <input type="hidden" id="userId" class="form-control">
            </div>
            <div class="modal-footer">
                <span id="save" class="btn btn-primary pull-right">Edit</span>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</body>
    <script>
            $(document).on('click','.Btn_TimKiem',function () {
                var txt = $('.txt_TimKiem').val();//lay du lieu tu the in put
                $.ajax({
                    url : 'Search.php',
                    type : 'POST',
                    data : {data : txt},
                    success : function (data) {
                        // console.log('xxxx',data);
                        $('#Hien_Thi').html(data);
                    }
                });
            });
     // keet thuc phan
        $(document).on('click','.remove',function () {
            var Id = $(this).parents("tr").attr("Id");
            if (confirm("Bạn có muốn xóa không")) {
                $.ajax({
                    url: 'Delete_Thanh_Vien.php',
                    type: 'POST',
                    data: {Id: Id},
                    success : function (data) {
                        $("#" + Id).remove();
                        alert("Xóa Thành Công.");
                    }
                });
            }
        });
        //click hieerin thi data
        $(document).on('click','.btn-edit',function() {
            console.log('xxxx');
            var Id = $(this).attr('data-id');

            var HoTen = $('#' + Id).children('td[data-target=HoTen]').text();
            var DiaChi = $('#' + Id).children('td[data-target=DiaChi]').text();
            var Email = $('#' + Id).children('td[data-target=Email]').text();
            var SoDT = $('#' + Id).children('td[data-target=SoDT]').text();
            $('#myModalEdit').find('#HoTen').val(HoTen);
            $('#myModalEdit').find('#DiaChi').val(DiaChi);
            $('#myModalEdit').find('#Email').val(Email);
            $('#myModalEdit').find('#SoDT').val(SoDT);
            $('#myModalEdit').find('#userId').val(Id);
            $('#myModalEdit').modal('toggle');

            //bat su kien click cho nut save
            $('#save').click(function () {
                console.log('xxxx');
                    var Id = $('#myModalEdit').find('#userId').val();
                var HoTen = $('#myModalEdit').find('#HoTen').val();
                var DiaChi = $('#myModalEdit').find('#DiaChi').val();
                var Email = $('#myModalEdit').find('#Email').val();
                var SoDT = $('#myModalEdit').find('#SoDT').val();
                $.ajax({
                    url: 'Update_Thanh_vien.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        Id: Id,
                        HoTen: HoTen,
                        DiaChi: DiaChi,
                        Email: Email,
                        SoDT: SoDT
                    },
                     success: function (result)
                     {
                        $('#' + Id).children('td[data-target=HoTen]').text(HoTen);
                        $('#' + Id).children('td[data-target=DiaChi]').text(DiaChi);
                        $('#' + Id).children('td[data-target=Email]').text(Email);
                        $('#' + Id).children('td[data-target=SoDT]').text(SoDT);
                        $('#myModalEdit').modal('toggle');
                    }

                });

            });
        });
    </script>
</html>