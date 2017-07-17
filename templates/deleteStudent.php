<html>
<head>
    <title>Xóa sinh viên</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
    <h2 style="text-align: center">Xóa sinh viên</h2>
    <?php foreach ($student as $st): ?>
        <table style="margin: 0 auto">
            <tr>
                <td>Ảnh đại diện:</td>
                <td>
                    <img src="<?php echo $st['avt']; ?>" width="50" height="50"/>
                </td>
            </tr>
            <tr>
                <td>Tên sinh viên:</td>
                <td>
                    <?php echo $st['name']; ?>
                </td>
            </tr>
            <tr>
                <td>Tên đăng nhập:</td>
                <td>
                    <?php echo $st['username']; ?>
                </td>
            </tr>
            <tr>
                <td>Ngày sinh:</td>
                <td>
                    <?php echo $st['NgaySinh']; ?>
                </td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>
                    <?php echo $st['GioiTinh']; ?>
                </td>
            </tr>
            <tr>
                <td>Quê Quán:</td>
                <td>
                    <?php echo $st['QueQuan']; ?>
                </td>
            </tr>
        </table>
        <h3 style="text-align: center">Bạn có muốn xóa sinh viên <?php echo $st['name'] ?> khỏi hệ thống</h3>
    <div class="loginmodal-container-delete">
        <form action="?action=confirmDeleteStudent&id=<?php echo $st['id'] ?>" method="post">
            <input type="submit" name="confirm" class="login loginmodal-submit" value="Yes">
            <input type="submit" name="confirm" class="login loginmodal-submit" value="No">
        </form>
        <div class="login-help">
            <a href="?action=getStudent"><< Về trang chủ</a>
        </div>
    </div>
<?php endforeach; ?>

</body>
</html>