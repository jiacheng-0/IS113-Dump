<?php
require_once "common.php";

$errors = [];
$userDAO = new UserDAO();

// Get the data from form processing and check data
$username = $_POST['username'];
$originalpassword = $_POST['originalpassword'];
$newPassword = $_POST['newPassword'];
$newconfirmPassword = $_POST['newconfirmPassword'];

// name cannot be blank nor empty string
if (!isset($_POST['username']) or strlen($_POST['username']) == 0) {
    $errors[] = "Name cannot be blank nor empty string.";
}
if (!isset($_POST['originalpassword']) or strlen($_POST['originalpassword']) == 0) {
    $errors[] = "Original Password cannot be empty nor blank.";
}
if (!isset($_POST['newPassword']) or strlen($_POST['newPassword']) == 0) {
    $errors[] = "New Password cannot be empty nor blank";
}
if (!isset($_POST['newconfirmPassword']) or strlen($_POST['newconfirmPassword']) == 0) {
    $errors[] = "Confirmed New Password cannot be empty nor blank.";
}

// Errors to show in change_password.php
if ($errors) {
    $_SESSION["errors"] = $errors;
    $_SESSION["username"] = $username;
    header("Location: change_password.php");
    exit();
}


// username invalid
$userObject = $userDAO->get($username);
if ($userObject == null) {
    $errors[] = "Username is invalid.";
    $_SESSION["errors"] = $errors;
    $_SESSION["username"] = $username;
    header("Location: change_password.php");
    exit();
}

// The NEW passwords are different.
if ($newPassword != $newconfirmPassword) {
    $errors[] = "The NEW passwords are different.";
    $_SESSION["errors"] = $errors;
    $_SESSION["username"] = $username;
    header("Location: change_password.php");
    exit();
}
// Check if password is valid
if (!password_verify($originalpassword, $userObject->getPasswordHash())) {
    $errors[] = "Existing password is invalid.";
    $_SESSION["errors"] = $errors;
    $_SESSION["username"] = $username;
    header("Location: change_password.php");
    exit();
}

// update the based password in the database
$status = $userDAO->update($userObject);

// if password is successfully changed, redirect to login.php
// else reload the page

if ($status) {
    // success; redirect
    $_SESSION["login_page"] = $username;
    header("Location: login.php");
    exit();
} else {
    $_SESSION["pwd_change_fail"] = $username;
    $errors[] = "Error in update user user.";
}

?>