<?php
if (!isset($_POST['email']) || !isset($_POST['password'])) {
    echo "
            <h1>Attempting to access sensitive data without logging in? NO!</h1>
        ";
    exit();
}
// DO NOT MODIFY THIS ASSOCIATIVE ARRAY
$accounts = [
    'donald@trump.com' => 'donald123',
    'hillary@clinton.com' => 'hillary456'
];

$errors = []; // It will store one or more Authentication Error messages
$email = $_POST['email'];
$password = $_POST['password'];


// YOUR CODE GOES HERE
// FORM PROCESSING
// AUTHENTICATE email and password. Check against $accounts.
if (key_exists($email, $accounts) == false) {

    $errors[] = "Email address is not registered with us!";

} elseif ($accounts[$email] != $password) {

    $errors[] = "Password is incorrect!";

}


?>
<!doctype html>
<html>
<body>

<?php

// FEEL FREE TO WRITE MORE CODE HERE (IF NEEDED)
if (count($errors) > 0) {

    echo "<ul>
";
    foreach ($errors as $one_error) {
        echo "  <li>$one_error</li>";
    }
    echo "</ul>
";
} else {
    echo "
            <h1>Hello, $email and welcome back!</h1>
            <h1>Sensitive data...</h1>
        ";



}

?>

</body>
</html>