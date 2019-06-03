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
if (empty($username)) {
    $errors[] = "Username field empty";
}

if (count($errors ) > 0) {
    $_SESSION['my-errors'] = $errors;
    header("Location: reset-view.php");
    exit;
}
?>
<html>
<head>
  <title>Reset</title>
</head>
<body>
Success!
</body>
</html>
