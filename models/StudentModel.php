<?php
require_once('dbConnect.php');

class StudentModel extends DB_Connect
{
    public function getStudent()
    {
        $con = $this->connect();
        $result = $con->query('SELECT * FROM users, quyen WHERE users.MaQ = quyen.MaQ');
        $students = array();
        if ($result->num_rows > 0) {
            while ($st = $result->fetch_assoc()) {
                $students[] = $st;
            }
        }
        return $students;
    }

    public function addStudent($st)
    {
        $con = $this->connect();
        $sql = "INSERT INTO `users` (`id`, `name`, `username`, `password`, `NgaySinh`, `GioiTinh`, `QueQuan`, `MaQ`, `email`) 
                VALUES (NULL, '" . $st['name'] . "', '" . $st['username'] . "', '" . $st['password'] . "', '" . $st['NgaySinh'] . "', '" . $st['GioiTinh'] . "', '" . $st['QueQuan'] . "', '1', '" . $st['email'] . "');";
        $rs = $con->query($sql);
        return $rs;
    }

    public function findStudent($id)
    {
        $sql = "SELECT * FROM users, quyen WHERE users.MaQ = quyen.MaQ AND id = $id";
        $con = $this->connect();
        $rs = $con->query($sql);
        $student = array();
        if ($rs->num_rows > 0) {
            while ($st = $rs->fetch_assoc()) {
                $student[] = $st;
            }
        }
        return $student;
    }

    public function findEdit($id)
    {
        $sql = "SELECT * FROM `users` WHERE id=$id";
        $con = $this->connect();
        $rs = $con->query($sql);
        $student = array();
        if ($rs->num_rows > 0) {
            while ($st = $rs->fetch_assoc()) {
                $student[] = $st;
            }
        }
        return $student;
    }

    public function editStudent($st)
    {
        if ($st['avt'] == "") {
            $sql = "UPDATE `users` SET 
                `name` = '" . $st['name'] . "', 
                `username` = '" . $st['username'] . "', 
                `password` = '" . $st['password'] . "', 
                `NgaySinh` = '" . $st['NgaySinh'] . "', 
                `GioiTinh` = '" . $st['GioiTinh'] . "', 
                `QueQuan` = '" . $st['QueQuan'] . "', 
                `email` = '" . $st['email'] . "' 
                WHERE `users`.`id` = " . $st['id'] . ";";
        } else {
            $sql = "UPDATE `users` SET `avt` = '" . $st['avt'] . "',
                `name` = '" . $st['name'] . "', 
                `username` = '" . $st['username'] . "', 
                `password` = '" . $st['password'] . "', 
                `NgaySinh` = '" . $st['NgaySinh'] . "', 
                `GioiTinh` = '" . $st['GioiTinh'] . "', 
                `QueQuan` = '" . $st['QueQuan'] . "', 
                `email` = '" . $st['email'] . "' 
                WHERE `users`.`id` = " . $st['id'] . ";";
        }
        $con = $this->connect();
        $rs = $con->query($sql);
        return $rs;
    }

    public function deleteStudent($id)
    {
        $sql = "DELETE FROM `users` WHERE id = " . $id . ";";
        $con = $this->connect();
        $rs = $con->query($sql);
        return $rs;
    }

    public function checkLogin($st)
    {
        $con = $this->connect();
        $result = $con->query('SELECT * FROM users');
        $users = array();
        if ($result->num_rows > 0) {
            while ($u = $result->fetch_assoc()) {
                $users[] = $u;
            }
        }
        foreach ($users as $u):
            if (($st['username'] == $u['username']) && ($st['password'] == $u['password'])) {
                return $check = true;
            }
        endforeach;
    }

    public function register($u)
    {
        $sql = "INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`) 
                VALUES (NULL, '" . $u['name'] . "', '" . $u['username'] . "', '" . $u['password'] . "', '" . $u['email'] . "');";
        $con = $this->connect();
        $rs = $con->query($sql);
        return $rs;
    }

    public function findUser($username)
    {
        $con = $this->connect();
        $result = $con->query('SELECT * FROM users');
        $users = array();
        if ($result->num_rows > 0) {
            while ($u = $result->fetch_assoc()) {
                $users[] = $u;
            }
        }
        foreach ($users as $u):
            if ($username == $u['username']) {
                return $name = $u['name'];
            }
        endforeach;
    }

    public function search($u)
    {
        $sql = "SELECT * FROM users, quyen WHERE `name` LIKE '%" . $u['name'] . "%' AND `NgaySinh` LIKE '%" . $u['NgaySinh'] . "%' 
                AND `QueQuan` LIKE '%" . $u['QueQuan'] . "%' AND `GioiTinh` LIKE '%" . $u['GioiTinh'] . "' AND users.MaQ = quyen.MaQ";
        $con = $this->connect();
        $rs = $con->query($sql);
        $student = array();
        if ($rs->num_rows > 0) {
            while ($st = $rs->fetch_assoc()) {
                $student[] = $st;
            }
        }
        return $student;
    }
}

?>