<?php
class StudentView{
    public function showAllStudents($students, $name){
        require_once ('templates/listStudent.php');
    }

    public function formAddStudent()
    {
        require_once ('templates/formAddStudent.php');
    }

    public function editStudent($student){
        require_once ('templates/editStudent.php');
    }

    public function detailStudent($studentDetail){
        require_once ('templates/detailStudent.php');
    }

    public function deleteStudent($student){
        require_once ('templates/deleteStudent.php');
    }

    public function formLogin(){
        require_once ('templates/formLogin.php');
    }

    public function formRegister(){
        require_once ('templates/formRegister.php');
    }

    public function formContact(){
        require_once ('templates/formContact.php');
    }

    public function search($student, $name){
        require_once ('templates/search.php');
    }
}
?>