<!doctype html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Danh_sach_thanh_vien.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Index</title>
</head>
<body class="Body_Index" style="  background-color: #f1f1f1;">
<header class="Phandau">
    <div class="Dang_xuat"><a href="dang_nhap.php">Logut</a></div>
    <div class="Contai_ner"><?php require_once ('Dang_Ki_Thanh_Vien.php'); ?></div>
</header>
<div class="Than" style="margin-top: 30px;">
    <div class="Hien_cac_form"> <?php require_once ('Hien_Thi_Danh_Sach.php'); ?></div>
</body>
</html>
