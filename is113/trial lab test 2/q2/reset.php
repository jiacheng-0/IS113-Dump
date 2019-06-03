<?php

/*
    Name:

    Email:
*/

require_once 'include/common.php';

// an array of error messages (if any)
$errors = [];

// Get username and password from FORM submission
$username = $_POST['username'];
$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];

// Code here
if (strlen($username) == 0) {
    $errors[] = "Username field is empty";
}
if (strlen($current_password) == 0 ){
    $errors[] = "Current password field is empty";
}
//var_dump($new_password);
if (strlen($new_password[0]) == 0) {
    $errors[] = "New password field is empty";
}
if (strlen($new_password[1]) == 0) {
    $errors[] = "Verify new password field is empty";
}
// see if the username & password combination is correct
$accountDAO = new AccountDAO();
if (!$accountDAO->authenticate($username, $current_password)) {
    $errors[] = "wrong username/password";
}

// see if the two “new” passwords match
if ($new_password[0] != $new_password[1]) {
    $errors[] = "New passwords do not match";
}

// forwards to new page
if (count($errors) > 0) {
    $_SESSION["error"] = $errors;
    header("Location: reset-view.php");
    exit();
}

// call reset password
$account = $accountDAO->retrieve($username);
if ($accountDAO->reset_password($account->getID(), $new_password[0])) {
    echo "Success!";
} else {
    echo "Failed update.";
}


?>
<html>
<head>
  <title>Reset</title>
</head>
<body>

</body>
</html>