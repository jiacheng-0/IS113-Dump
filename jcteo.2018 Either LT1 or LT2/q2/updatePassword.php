<?php
/*
    Name: Teo Jia Cheng

    Email: jcteo.2018@sis.smu.edu.sg
*/

require_once 'model/common.php';
require_once 'model/protect.php';

# == Part C : ENTER CODE HERE == 
$empId = $_GET['empId'];

$employeeDAO = new EmployeeDAO();
$employee = $employeeDAO->getEmployee($empId);

$name = $employee->getName();
$pass = $employee->getPassword();
echo "<form action='process.php' method='get'>";
echo "<input type='hidden' name='empId' value='$empId'>";

echo "EmployeeID : " . $empId . "<br/>";
echo "Name : " . $name . "<br/>";
echo "Current Password : " . $pass . "<br/>";
$newPassword = generateRandomPassword();

echo "New Password : <input type='text' name='newPassword' value='$newPassword'>" . "<br/>";
echo "<input type='Submit' value='Update'>";
echo "</form>";
function generateRandomPassword()
{
# == Part C : ENTER CODE HERE == 
    $letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $newPassword = "";
    // generates a password of length 8
    for ($i = 0; $i < 8; $i++) {
        $randomIndex = random_int(0, strlen($letters) - 1);
        $newPassword .= substr($letters, $randomIndex, 1);
    }
    return $newPassword;
}

?>