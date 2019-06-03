<?php
require_once 'common.php';


$errors = [];

// Get the data login.php
$username = $_POST['username'];
$password = $_POST['password'];

// Create the DAO object to facilitate connection to the database.
$userDAO = new UserDAO();

// Check if the username exists
$user = $userDAO->get($username);

if ($user) {
    // If username exists
    // get the hashed password from the database
    // Match the hashed password with the one which user entered
    // if it does not match. -> error
    // check if the plain text password is valid
    $status = password_verify($password, $user->getPasswordHash());
    if ($status) {
        $_SESSION["username"] = $username;
        header("Location: welcome.php");
        exit();
    } else {
        // password not valid
        // return to login page and show error
        $errors[] = "Invalid password";
        $_SESSION['errors'] = $errors;
        $_SESSION['login_page'] = $username;
        $_SESSION['login_page_password'] = $password;
        header("Location: welcome.php");
        exit();
    }

} else {
    $errors[] = "Username does not exist in the database.";
    $_SESSION['errors'] = $errors;
    $_SESSION['login_page'] = $username;
    header("Location: welcome.php");
    exit();

}

?>

