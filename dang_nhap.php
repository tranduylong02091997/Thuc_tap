<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Giao Diện</title>
    <link rel="stylesheet" href="dang_nhap.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" >
        $(document).ready(function ()
        {
            //khai baos nust submit
            var submit = $("button[type='submit']");
            //khi thuwjc hieejn click vafo nut dang nhap
            submit.click(function () {
                //khai baos bien
                var Username =$("input[name='Username']").val();//lay gia tri input tai khoan
                var Password =$("input[name='Password']").val();//lay gia tri cua password
                //kieem tra xem nhap tai khoan chua
                if(Username == ''){//neu username rong thif xuaast ra thong bao
                    alert('vui long nhap tai khoan');
                    return false;
                }
                if(Password == ''){//neu pas rong ti xuat thong bao
                    alert('xin moi nhap mat khau');
                    return false;
                }
                //lay toan bo du lieu trong form
                var data = $('form#form-login').serialize();
                //dsu dung ham ajax;
                $.ajax({
                    type : 'POST',//kieu post
                    url : 'submit.php',//lay du lieu tu trang submit
                    datatype : "json",
                    data : data,
                    success : function(data) {
                        console.log("aaa");
                    },
                    error : function (data, jqXHR) {
                        return false;
                        console.log("bbbb");
                        alert(data);
                    }
                });
                return false;
            });
        });
    </script>
</head>
<body class="login-layout" >
<div class="chuatoanbonoidung">
<header>

    <div class="header width-80">
        <a class="header-logo" href="http://demo.cloudclass.edu.vn/">
            <img class="logo" src="http://demo.cloudclass.edu.vn/assets/images/site/logo.png" alt="logo">
        </a>
        <div class="header-support">
            <span>Hotline: <span class="hotline"><strong>0965397xxx</strong></span></span>
        </div>
    </div>
</header>
<div class="content width-80">
    <div class="contentright">
        <div class="dangnhap"> Đăng Nhập </div>
        <p class="hienthongbao" style="color: red;text-align: center;   height: 10px;" ></p>
        <div class="has-eurro"></div>
        <form  action="submit.php" METHOD="POST" id="form-login">
            <div class="text-center">
                <div class="text-username">
                    <div class="Icon-username">
                        <img class="icon-input" src="http://demo.cloudclass.edu.vn/assets/images/site/icon-lock.svg" alt="icon-inbox">
                    </div>
                    <input class="username" name="Username" type="text" placeholder="Username" required>
                </div>
                <div class="text-password">
                    <div class="icon-password">
                        <img class="icon-input" src="http://demo.cloudclass.edu.vn/assets/images/site/icon-lock.svg" alt="password">
                    </div>
                    <input  class="password" name="Password"  type="password" placeholder="Password" required>
                    <img class="peek-password" src="http://demo.cloudclass.edu.vn/assets/images/site/icon-eye.svg" data-show="0" title="click để hiển thị mật khẩu">
                </div>
                <div class="ghinho">
                    <label >
                        <input type="checkbox" class="checkbox remember_me" name="remember">
                        Ghi nho
                    </label>
                </div>
                <input class="loginbtn" name="dangnhap" type="submit" value="Đăng nhập">
            </div>
            <button  class="dangkitbtn" name="dangki " ><a style="text-decoration: none;color: ghostwhite;font-size: 21px;" href="login_dangki.php">Đăng kí</a></button>
        </form>







</div>
</div>
</div>
</body>
</html>