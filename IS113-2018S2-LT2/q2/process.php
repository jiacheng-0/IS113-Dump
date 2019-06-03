<?php

/*
    Name: Teo Jia Cheng

    Email: jcteo.2018@sis.smu.edu.sg
*/

require_once 'model/common.php';
require_once 'model/protect.php';

# == Part D : ENTER CODE HERE == 
$empId = $_GET['empId'];
$newPassword = $_GET['newPassword'];

$employeeDAO = new EmployeeDAO();
$employeeDAO->updatePassword($empId, $newPassword);

echo "Password updated. You are logged out";

session_unset();

?>