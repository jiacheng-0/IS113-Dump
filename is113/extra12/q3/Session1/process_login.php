<?php
if (!isset($_POST['email']) || !isset($_POST['password'])) {
    echo "
            <h1>Attempting to access sensitive data without logging in? NO!</h1>
        ";
    exit();
}
// THIS PAGE WILL ATTEMPT TO RETRIEVE SESSION VARIABLE
// TO DO THAT, THIS PAGE NEEDS TO START A SESSION
session_start();

// DO NOT MODIFY THIS ASSOCIATIVE ARRAY
$accounts = [
    'donald@trump.com' => 'donald123',
    'hillary@clinton.com' => 'hillary456'
];


$errors = [];
$email = $_POST['email'];
$password = $_POST['password'];
if (key_exists($email, $accounts) == false) {

    $errors[] = "Email address is not registered with us!";

} elseif ($accounts[$email] != $password) {

    $errors[] = "Password is incorrect!";

}


// YOUR CODE GOES HERE
// 1) COPY YOUR CODE from q3/NoSession/process_login.php
// AND
// 2) MODIFY IT
//
// If user login fails:
//    a) Store error message(s) into $errors (Indexed Array)
//    b) Set a new Session Variable $_SESSION['errors'] whose value will be $errors
//    c) Forward to login.php
//          login.php will then retrieve the value of Session Variable $_SESSION['errors'] and display
//
// Else (user login succeeds):
//    Go ahead and proceed with the below HTML (display sensitive data...)


?>
<html>
<body>

<?php

// FEEL FREE TO WRITE MORE CODE HERE (IF NEEDED)

if (count($errors) > 0) {
    $_SESSION['errors'] = $errors;
    header("Location: login.php");
    exit;

} else {
    echo "
            <h1>Hello, $email and welcome back!</h1>
            <h1>Sensitive data...</h1>
        ";
}

?>

</body>
</html>