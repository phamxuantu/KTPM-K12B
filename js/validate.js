function validate()
{

    // Lấy giá trị
    var name = document.getElementById('name');
    var username = document.getElementById('username');;
    var password = document.getElementById('password');;
    var NgaySinh = document.getElementById('NgaySinh');;
    var GioiTinh = document.getElementById('GioiTinh');;
    var QueQuan = document.getElementById('QueQuan');;
    var email = document.getElementById('email');;
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    // Kiểm tra các giá trị
    if (name.value == ""){
        alert("Bạn chưa nhập tên của bạn");
        return false;
    }

    if (username.value == ""){
        alert("Bạn chưa nhập tên đăng nhập");
        return false;
    }

    if (password.value == ""){
        alert("Bạn chưa nhập mật khẩu");
        return false;
    }

    if (NgaySinh.value == ""){
        alert("Bạn chưa nhập ngày sinh");
        return false;
    }

    if (GioiTinh.value == ""){
        alert("Bạn chưa nhập giới tính");
        return false;
    }

    if (QueQuan.value == ""){
        alert("Bạn chưa nhập quê quán");
        return false;
    }

    if (email.value == ""){
        alert("Bạn chưa nhập email");
        return false;
    }
    if (!filter.test(email.value)) {
        alert('Hãy nhập địa chỉ email hợp lệ.\nExample@gmail.com');
        email.focus;
        return false;
    }

    if(password.value.length < 8){
        alert("Mật khẩu tối thiểu phải có 8 ký tự");
        return false;
    }

    return true;
}

function loadFile(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}