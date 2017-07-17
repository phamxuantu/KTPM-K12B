<html>
<head>
    <title>Sửa sinh viên</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
<script language="javascript" src="js/validate.js"></script>
<div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Sửa sinh viên</h1><br>
            <?php foreach ($student as $st) ?>
            <form action="?action=doEdit" method="post" name="formStudent" enctype="multipart/form-data" onsubmit="return validate()">
                <input type="text" name="id" hidden value="<?php echo $st['id'] ?>">
                <input type="text" name="name" value="<?php echo $st['name'] ?>">
                <input type="text" name="username" value="<?php echo $st['username'] ?>">
                <input type="password" name="password" value="<?php echo $st['password'] ?>">
                <input type="text" name="NgaySinh" value="<?php echo $st['NgaySinh'] ?>">
                <input type="text" name="GioiTinh" value="<?php echo $st['GioiTinh'] ?>">
                <input type="text" name="QueQuan" value="<?php echo $st['QueQuan'] ?>">
                <input type="text" name="email" value="<?php echo $st['email'] ?>">
                <p style="float: left">Chọn Avatar:</p>
                <label for="file-upload" class="custom-file-upload">
                    <?php if($st['avt'] == ""){ ?>
                        <img id="output" width="50" height="50" src="images/default.jpg"/>
                    <?php } else { ?>
                        <img id="output" width="50" height="50" src="<?php echo $st['avt'] ?>"/>
                    <?php } ?>
                </label>
                <input type="file" id="file-upload" name="avatar" value="<?php echo $st['avt'] ?>" onchange="loadFile(event)"/>
                <input type="submit" name="execute" class="login loginmodal-submit" value="Hoàn tất">
            </form>

            <div class="login-help">
                <a href="?action=getStudent"><< Về trang chủ</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>