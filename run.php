<?php
class Run
{
    function run()
    {
        require_once('controllers/StudentController.php');
        $stController = new StudentController();
        if (isset($_GET['action'])) {
            $stController->$_GET['action']();
        } else {
            $stController->login();
        }
    }
}
?>