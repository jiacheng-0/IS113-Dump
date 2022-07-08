<?php

require_once 'include/common.php';

$dao = new AccountDAO();

$errors = [];

if (!isset($_POST['email']) || !isset($_POST['pass'])) {

    header("Location: login.php");
    die();

} else {

    // Authenticate
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $accountDAO = new AccountDAO();
    $message = $accountDAO->authenticate($email, $pass);

    /*
     * 1 - Authentication successful
     * 2 - Password is incorrect
     * 3 - Email is not registered with us
     */
//    var_dump($message);
//    exit();

    if ($message == "Authentication successful") {
        $_SESSION['email'] = $email;
        header("Location: main.php");
        exit;

    } else {
        $_SESSION['errors'] = $message;
        header("Location: login.php");
        exit();
    }
}

//session_start();

?>

<html>

</html>
