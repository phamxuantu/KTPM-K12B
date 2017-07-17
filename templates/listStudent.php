<html>
<head>
    <title>Danh sách sinh viên</title>
    <link type="text/css" rel="STYLESHEET" href="styles/listStyle.css">
    <link type="text/css" rel="STYLESHEET" href="styles/style.css">
</head>
<body>
<script language="JavaScript" src="js/addStudent.js"></script>
<div>
    <div>
        <div style="float: right">

            <h4>Xin chào <?php echo $name ?> | <a href="?action=contact">Liên hệ</a> | <a
                        href="?action=logout">Thoát</a></h4>
            <input type="button" value="Tìm kiếm" onclick="search()"/>
            <a href="?action=getStudent"><input type="button" value="Xóa tìm kiếm"/></a>
        </div>
        <div style="float: left">
            <h2>Danh sách sinh viên</h2>
            <h4><a href="javascript: showForm()">Thêm sinh viên</a></h4>
        </div>
    </div>
    <table>
        <tr>
            <th>Ảnh dại diện</th>
            <th>Họ Tên</th>
            <th>Ngày Sinh</th>
            <th>Giới Tính</th>
            <th>Quê Quán</th>
            <th>Email</th>
            <th>Quyền</th>
            <th>Chức Năng</th>
        </tr>
        <?php foreach ($students as $st): ?>
            <tr>
                <td>
                    <?php
                        if($st["avt"] == ""){?>
                            <img src="images/default.jpg" width="50" height="50">
                        <?php } else { ?>
                            <img src="<?php echo $st['avt']; ?>" width="50" height="50">
                        <?php } ?>
                </td>
                <td><?php echo $st['name']; ?></td>
                <td><?php echo $st['NgaySinh']; ?></td>
                <td><?php echo $st['GioiTinh']; ?></td>
                <td><?php echo $st['QueQuan']; ?></td>
                <td><?php echo $st['email']; ?></td>
                <td><?php echo $st['TenQ']; ?></td>
                <td>
                    <a href="?action=detailStudent&id=<?php echo $st['id']; ?>">Chi tiết</a> |
                    <a href="?action=editStudent&id=<?php echo $st['id']; ?>">Sửa</a> |
                    <a href="?action=deleteStudent&id=<?php echo $st['id']; ?>">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<script language="javascript" src="js/validate.js"></script>
<div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="myModalLabel"
     style="display: none; position: fixed; opacity: 1; z-index: 11000; left: 50%; margin-left: -200px; top: 10px;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Thêm sinh viên</h1><br>
            <form action="?action=doAdd" method="post" name="formStudent" onsubmit="return validate()">
                <input type="text" name="name" id="name" placeholder="Tên sinh viên">
                <input type="text" name="username" id="username" placeholder="Tên đăng nhập">
                <input type="password" name="password" id="password" placeholder="Mật khẩu">
                <input type="text" name="NgaySinh" id="NgaySinh" placeholder="Ngày sinh">
                <input type="text" name="GioiTinh" id=GioiTinh placeholder="Giới tính">
                <input type="text" name="QueQuan" id="QueQuan" placeholder="Quê Quán">
                <input type="text" name="email" id="email" placeholder="Email">
                <input type="submit" name="execute" class="login loginmodal-submit" value="Thêm">
            </form>
        </div>
    </div>
</div>

<div id="background" onclick="hideForm()"
     style="opacity: 0.6; display: none; position: fixed; z-index: 100; top: 0px; left: 0px; height: 100%; width: 100%; background: #000;"></div>
<div class="modal fade" id="search" tabindex="-1" aria-labelledby="myModalLabel"
     style="display: none; position: fixed; opacity: 1; z-index: 11000; left: 50%; margin-left: -200px; top: 120px;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Tìm kiếm</h1><br>
            <form action="?action=search" method="post" name="formStudent">
                <input type="text" name="name" id="name" placeholder="Tên sinh viên">
                <select name="NgaySinh">
                    <option value="">Năm Sinh</option>
                    <?php for ($i = 1980; $i<= 2017; $i++){ ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php } ?>
                </select>
                <div id="GioiTinh">
                    <input type="radio" name="GioiTinh" id="sex-m" value="Nam">
                    <label for="sex-m">Nam</label>
                    <input type="radio" name="GioiTinh" id="sex-f" value="Nữ">
                    <label for="sex-f">Nữ</label>
                </div>
                <?php
                $st="An Giang,Bà Rịa-Vũng Tàu,Bạc Liêu,Bắc Kạn,Bắc Giang,Bắc Ninh,Bến Tre,Bình Dương,
                Bình Định,Bình Phước,Bình Thuận,Cà Mau,Cao Bằng,Cần Thơ,Đà Nẵng,Đắk Lắk,Đăk Nông,Điện Biên,
                Đồng Nai,Đồng Tháp,Gia Lai,Hà Giang,Hà Nam,Hà Nội,Hà Tĩnh,Hải Dương,Hải Phòng,Hậu Giang,
                Hòa Bình,Thành phố Hồ Chí Minh,Hưng Yên,Khánh Hòa,Kiên Giang,Kon Tum,Lai Châu,Lâm Đồng,Lạng Sơn,
                Lào Cai,Long An,Nam Định,Nghệ An,Ninh Bình,Ninh Thuận,Phú Thọ,Phú Yên,Quảng Bình,Quảng Nam,
                Quảng Ngãi,Quảng Ninh,Quảng Trị,Sóc Trăng,Sơn La,Tây Ninh,Thái Bình,Thái Nguyên,Thanh Hóa,
                Thừa Thiên Huế,Tiền Giang,Trà Vinh,Tuyên Quang,Vĩnh Long,Vĩnh Phúc,Yên Bái";
                $province=explode(",",$st);
                ?>
                <select name="QueQuan">
                    <option value="">Quê Quán</option>
                    <?php for ($i=0;$i<=62;$i++){ ?>
                    <option value="<?php echo $province[$i] ?>"><?php echo $province[$i] ?></option>
                    <?php } ?>
                </select>
                <input type="submit" name="execute" class="login loginmodal-submit" value="Tìm kiếm">
            </form>
        </div>
    </div>
</div>
</body>
</html>