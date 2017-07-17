<html>
<head>
    <title>Chi tiết sinh viên</title>
    <link rel="stylesheet" type="text/css" href="styles/listStyle.css">
</head>
<body>
<h2>Chi tiết sinh viên</h2>
<?php foreach ($studentDetail as $st): ?>
    <table>
        <tr>
             <td>Ảnh đại diện: </td>
             <td>
                 <img src="<?php echo $st['avt']; ?>" width="50" height="50"/>
             </td>
        </tr>
        <tr>
            <td>Tên sinh viên: </td>
            <td>
                <?php echo $st['name']; ?>
            </td>
        </tr>
        <tr>
            <td>Tên đăng nhập: </td>
            <td>
                <?php echo $st['username']; ?>
            </td>
        </tr>
        <tr>
            <td>Ngày sinh: </td>
            <td>
                <?php echo $st['NgaySinh']; ?>
            </td>
        </tr>
        <tr>
            <td>Giới tính: </td>
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
        <tr>
            <td>Email:</td>
            <td>
                <?php echo $st['email']; ?>
            </td>
         </tr>
        <tr>
            <td>Quyền:</td>
            <td>
                <?php echo $st['TenQ']; ?>
            </td>
        </tr>
    </table>
    <div class="center"><a href="?action=editStudent&id=<?php echo $st['id']; ?>">Sửa thông tin</a></div>
<?php endforeach; ?>
<div class="center"><a href="?action=getStudent"><< Trở về trang chủ</a></div>
</body>
</html>