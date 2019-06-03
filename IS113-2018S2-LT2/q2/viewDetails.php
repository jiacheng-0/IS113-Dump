<?php

/*
    Name: Teo Jia Cheng

    Email: jcteo.2018@sis.smu.edu.sg
*/

require_once 'model/common.php';
require_once 'model/protect.php';

# == Part B : ENTER CODE HERE == 
$role = $_SESSION['role'];
$empId = $_SESSION['empId'];

$employeeDAO = new EmployeeDAO();
$employee = $employeeDAO->getEmployee($empId);

$name = $employee->getName();
$spouse = $employeeDAO->getSpouse($empId);
$spouseName = "None";
if ($spouse != null) {
    $spouseName = $spouse->getSpouseName();
}

$childrenArray = $employeeDAO->getChildren($empId);
$childString = $childrenArray == null ? "None" : "";
foreach ($childrenArray as $child_name => $age) {

    $childString .= $child_name . " : " . $age . "<br/>";
}

if ($role === "User") {
    echo "<table border='1'>";
    echo "<tr><th>Employee ID</th><th>Name</th><th>Spouse</th><th>Child</th></tr>";
    echo "<tr><td>$empId</td><td>$name</td><td>$spouseName</td><td>$childString</td></tr>";
    echo "</table>";
    echo "You are logged out";
    session_unset();
} elseif ($role === "Admin") {
    echo "<table border='1'>";
    echo "<tr><th>Employee ID</th><th>Name</th><th>Spouse</th><th>Child</th><th>Password</th></tr>";
    $allEmployees = $employeeDAO->getAllEmployees();
//    var_dump($allEmployees);
    foreach ($allEmployees as $employee) {

        $empId = $employee->getEmpId();
        $name = $employee->getName();
        $spouse = $employeeDAO->getSpouse($empId);
        $spouseName = "None";
        if ($spouse != null) {
            $spouseName = $spouse->getSpouseName();
        }

        $childrenArray = $employeeDAO->getChildren($empId);
        $childString = $childrenArray == null ? "None" : "";
        foreach ($childrenArray as $child_name => $age) {

            $childString .= $child_name . " : " . $age . "<br/>";
        }
        $password = $employee->getPassword();
        echo "<tr><td>$empId</td><td>$name</td><td>$spouseName</td><td>$childString</td>
                <td><a href='updatePassword.php?empId=$empId'>$password</td></tr>";
    }
    echo "</table>";

}

?>
