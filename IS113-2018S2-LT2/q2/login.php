<?php

/*
    Name: Teo Jia Cheng

    Email: jcteo.2018@sis.smu.edu.sg
*/

require_once 'model/common.php';

# == Part A : ENTER CODE HERE ==
$empId = $_POST['empId'];
$password = $_POST['password'];
$employeeDAO = new EmployeeDAO();
$role = $employeeDAO->authenticate($empId, $password);
if ($role == null) {
    if (isset($_SESSION['countUnsuccessful'])) {
        $_SESSION['countUnsuccessful']++;
    } else {
        $_SESSION['countUnsuccessful'] = 1;
    }
} else {
    // successful
    $_SESSION['empId'] = $empId;
    $_SESSION['role'] = $role;
    unset($_SESSION['countUnsuccessful']);
    header("Location: viewDetails.php");
    exit();
}

?>

<html>
<body>

<?php
echo "<h1>Number of unsuccessful consecutive logins : {$_SESSION['countUnsuccessful']} </h1>";
echo "<a href='login-view.html'>Back to Login";
?>

</body>
</html>
