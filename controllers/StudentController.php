<?php
session_start();
require_once('models/StudentModel.php');
require_once('Views/StudentView.php');

class StudentController
{
    public function getStudent()
    {
        if (isset($_SESSION['name'])) {
            $name = $_SESSION['name'];
            $stModel = new StudentModel();
            $students = $stModel->getStudent();
            $stView = new StudentView();
            $stView->showAllStudents($students, $name);
        } else {
            echo '<script type="text/javascript">alert("Bạn chưa đăng nhập!!!")</script>';
            $this->login();
        }
    }

    public function addStudent()
    {
        $stView = new StudentView();
        $stView->formAddStudent();
    }

    public function doAdd()
    {
        if (isset($_POST['name'], $_POST['username'], $_POST['password'], $_POST['NgaySinh'], $_POST['GioiTinh'], $_POST['QueQuan'], $_POST['email'])) {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $NgaySinh = $_POST['NgaySinh'];
            $GioiTinh = $_POST['GioiTinh'];
            $QueQuan = $_POST['QueQuan'];
            $email = $_POST['email'];
            $st = array('name' => $name,
                'username' => $username,
                'password' => $password,
                'NgaySinh' => $NgaySinh,
                'GioiTinh' => $GioiTinh,
                'QueQuan' => $QueQuan,
                'email' => $email,);
            $stModel = new StudentModel();
            $status = $stModel->addStudent($st);
            if ($status) {
                unset($_POST['name'], $_POST['username'], $_POST['password'], $_POST['NgaySinh'], $_POST['GioiTinh'], $_POST['QueQuan'], $_POST['email']);
                header('location: index.php?action=getStudent');
            } else {
                echo 'Thêm không thành công!!!';
            }
        }
    }

    public function editStudent()
    {
        $id = $_GET['id'];
        $stModel = new StudentModel();
        $student = $stModel->findEdit($id);
        $stView = new StudentView();
        $stView->editStudent($student);
    }

    public function doEdit()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $NgaySinh = $_POST['NgaySinh'];
        $GioiTinh = $_POST['GioiTinh'];
        $QueQuan = $_POST['QueQuan'];
        $email = $_POST['email'];
        $destination = "";
        if ($_FILES['avatar']['type'] != "image/jpeg" && $_FILES['avatar']['type'] != "image/png") {
            echo "Vui lòng chọn file theo định dạng *.jpg hoặc *.png";
        } else {
            if ($_FILES['avatar']['size'] > 3 * 1024 * 1024) {
                echo "File ảnh không được quá 3MB";
            } else {
                $now = getdate();
                $currentDate = $now["mday"] . "-" . $now["mon"] . "-" . $now["year"];
                $currentTime = $now["hours"] + 5 . "-" . $now["minutes"] . "-" . $now["seconds"];
                $path_parts = pathinfo($_FILES["avatar"]["name"]);
                $extension = $path_parts['extension'];
                $destination = "images/" . $username . "_" . $currentDate . "_" . $currentTime . "." . $extension;
                if (is_dir('images')) {
                    move_uploaded_file($_FILES["avatar"]["tmp_name"], $destination);
                } else {
                    mkdir('images');
                    move_uploaded_file($_FILES["avatar"]["tmp_name"], $destination);
                }
            }
        }
        $st = array('id' => $id,
            'avt' => $destination,
            'name' => $name,
            'username' => $username,
            'password' => $password,
            'NgaySinh' => $NgaySinh,
            'GioiTinh' => $GioiTinh,
            'QueQuan' => $QueQuan,
            'email' => $email,);
        $stModel = new StudentModel();
        $status = $stModel->editStudent($st);
        if ($status) {
            header('location: index.php?action=getStudent');
        } else {
            echo 'Sửa không thành công!!!';
        }
    }

    public
    function detailStudent()
    {
        $id = $_GET['id'];
        $stModel = new StudentModel();
        $studentDetail = $stModel->findStudent($id);
        $stView = new StudentView();
        $stView->detailStudent($studentDetail);
    }

    public
    function deleteStudent()
    {
        $id = $_GET['id'];
        $stModel = new StudentModel();
        $student = $stModel->findStudent($id);
        $stView = new StudentView();
        $stView->deleteStudent($student);
    }

    public
    function confirmDeleteStudent()
    {
        if ($_POST['confirm'] == 'Yes') {
            $id = $_GET['id'];
            $stModel = new StudentModel();
            $status = $stModel->deleteStudent($id);
            if ($status) {
                header('location: index.php?action=getStudent');
            } else {
                echo 'Xóa không thành công!!!';
            }
        } else {
            header('location: index.php?action=getStudent');
        }
    }

    public
    function login()
    {
        $stView = new StudentView();
        $stView->formLogin();
    }

    public
    function checkLogin()
    {
        if ($_POST['execute'] == 'Đăng nhập') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $st = array('username' => $username,
                'password' => $password,);
            $stModel = new StudentModel();
            $check = $stModel->checkLogin($st);
            if ($check) {
                $name = $stModel->findUser($username);
                $_SESSION['name'] = $name;
                header("location: index.php?action=getStudent");
            } else {
                echo '<script type="text/javascript">alert("Sai tên tài khoản hoặc mật khẩu!!!")</script>';
                $this->login();
            }
        } else {
            header("location: index.php?action=register");
        }
    }

    public
    function register()
    {
        $stView = new StudentView();
        $stView->formRegister();
    }

    public
    function doRegister()
    {
        if ($_POST['execute'] == 'Đăng ký') {
            if (isset($_POST['name'], $_POST['username'], $_POST['password'], $_POST['email'])) {
                $name = $_POST['name'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $u = array('name' => $name,
                    'username' => $username,
                    'password' => $password,
                    'email' => $email,);
                $stModel = new StudentModel();
                $status = $stModel->register($u);
                if ($status) {
                    $_SESSION['name'] = $name;
                    unset($_POST['name'], $_POST['username'], $_POST['password'], $_POST['email']);
                    header("location: index.php?action=getStudent");
                } else {
                    echo 'Đăng ký không thành công!!!';
                }
            }
        } else {
            header('location: index.php?action=login');
        }
    }

    public
    function logout()
    {
        unset($_SESSION['name']);
        header('location: index.php?action=login');
    }

    public
    function contact()
    {
        $stView = new StudentView();
        $stView->formContact();
    }

    public
    function doContact()
    {
        if (isset($_POST['email'], $_POST["message"], $_POST["name"])) {
            $email = $_POST['email'];
            $headers = "From: " . $_POST["email"];
            $message = $_POST["message"];
            $name = $_POST["name"];
            $subject = "Y kien sinh vien";
            $to = "tutienty1802@gmail.com";
            if ($email && $message && $name) {
                if (mail($to, $subject, $message, $headers)) {
                    echo '<script type="text/javascript">alert("Gửi ý kiến thành công!!!");</script>';
                    unset($_POST['email'], $_POST["message"], $_POST["name"]);
                    $this->getStudent();
                } else {
                    echo('<script type="text/javascript">alert("Gửi ý kiến không thành công!!!");</script>');
                    $this->contact();
                }
            } else {
                echo('<script type="text/javascript">alert("Bạn phải nhập đủ thông tin!!!");</script>');
                $this->contact();
            }
        }
    }

    public
    function search()
    {
//        if($_POST['NgaySinh']=="namsinh"){
//            $NS = "";
//        }else{
//            $NS = $_POST['NgaySinh'];
//        }
        if (!isset($_POST['GioiTinh'])) {
            $GioiTinh = "";
        } else {
            $GioiTinh = $_POST['GioiTinh'];
        }
        $name = $_POST['name'];
        $NS = $_POST['NgaySinh'];
        $QQ = $_POST['QueQuan'];
//        $GioiTinh = $_POST['GioiTinh'];
        $nameUser = $_SESSION['name'];
        $u = array('name' => $name,
            'NgaySinh' => $NS,
            'GioiTinh' => $GioiTinh,
            'QueQuan' => $QQ,);
        $stModel = new StudentModel();
        $student = $stModel->search($u);
        $stView = new StudentView();
        $stView->search($student, $nameUser);
    }
}

?>