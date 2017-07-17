<html>
<head>
    <title>Thêm sinh viên</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
<script language="javascript" src="js/validate.js"></script>
<div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Thêm sinh viên</h1><br>
            <form action="?action=doAdd" method="post" name="formStudent" onsubmit="return validate()">
                <input type="text" name="name" id="name" placeholder="Tên sinh viên">
                <input type="text" name="username" id="username" placeholder="Tên đăng nhập">
                <input type="password" name="password" id="password" placeholder="Mật khẩu">
                <input type="text" name="NgaySinh" id="NgaySinh" placeholder="Ngày sinh">
                <input type="text" name="GioiTinh" id = GioiTinh placeholder="Giới tính">
                <input type="text" name="QueQuan" id="QueQuan" placeholder="Quê Quán">
                <input type="text" name="email" id="email" placeholder="Email">
                <input type="submit" name="execute" class="login loginmodal-submit" value="Thêm">
            </form>

            <div class="login-help">
                <a href="?action=register"><< Về trang chủ</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>