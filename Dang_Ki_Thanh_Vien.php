<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng Kí Thành Viên</title>
    <link rel="stylesheet" href="Danh_sach_thanh_vien.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" >
        $(document).on('click','.btnThem',function ()
        {
              console.log('....');


               // khai baos bien
                var HoTen = $('.Ho_Ten').val();
                var DiaChi= $('.Dia_Chi').val();
                var Email = $('.Email').val();
                var SoDT = $('.SoDT').val();


                //var data = $('.myModalnsert').serialize();
                //dsu dung ham ajax;
                $.ajax({
                    type :'POST',//kieu post
                    url : 'Insert_ThanhVien.php',//lay du lieu tu trang submit
                    dataType : 'text',
                    data: {
                        HoTen : HoTen ,
                        DiaChi : DiaChi,
                        Email : Email,
                        SoDT : SoDT

                    },
                    success : function (data) {
                       alert(data);

                        }
                });
         });


    </script>
</head>
<body>


<div class="container"style="margin-left: 185px;">

    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalnsert">Them</button>
</div>
<div Id="myModalnsert" class="modal fade" role="dialog">
    <div class="modal-dialog">

<!--         Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Họ Tên</label>
                    <input type="text" class="Ho_Ten" class="form-control">
                </div>
                <div class="form-group">
                    <label>Địa Chỉ</label>
                    <input type="text" class="Dia_Chi" class="form-control">
                </div> <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="Email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Số ĐT</label>
                    <input type="text" class="SoDT" class="form-control">
                </div>
<!--               <input type="hidden" id="userId1" class="form-control">-->

            </div>

            <div class="modal-footer">

                <button class="btnThem btn-primary pull-right">Them</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>






</body>
</html>
