<?php
require_once "common.php";

$errors = [];

// Get the data from form processing
$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

$userDAO = new UserDAO();

// Check if username is already taken
if ($userDAO->get($username) != null) {
    // != null means already taken and you cannot register
    $errors[] = "Username is already taken.";
    $_SESSION['tmp_username'] = $username;
    $_SESSION['errors'] = $errors;
    header("Location: register.php");
    exit();
} else {

    // If one or more fields have validation error
    if (strlen($username) == 0) {
        $errors[] = "Name cannot be empty nor blank";
    }

    if (strlen($password) == 0) {
        $errors[] = "Password cannot be empty nor blank";
    }
    if (strlen($confirmPassword) == 0) {
        $errors[] = "Confirm password cannot be empty nor blank";
    }
}



#####
#### passwords do not match is not checked
####

$status = false;
// if everything is checked. Create user Object and write to database
if (empty($errors)) {

    $userObject = new User($username, $password);
    $status = $userDAO->create($userObject);
    // execute - create success
    // set status = true
} else {
    $_SESSION['errors'] = $errors;
    header("Location: register.php");
    exit();
}

if ($status) {
    // success; redirect page
    $_SESSION["login_page"] = $username;
    header("Location: login.php");
    exit();
}

?>

