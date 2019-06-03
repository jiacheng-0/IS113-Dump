<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
$password = "abcdefghhhh";
$confirmPassword = "abcdefghhhh";

//write your codes here, change the value of the $password and $confirmPassword fields to test for the rules accordingly.

function checkNumCharacters($word)
{
    for ($i = 0; $i < strlen($word); $i++) {
        if (substr_count($word, substr($word, $i, 1)) > 3) {
            return false;
        }
    }
    return true;
}

if ($password !== $confirmPassword) {

    echo "The password and confirmed password must be the same.";

} else if (substr($password, 0, 1) === substr($password, (strlen($password) - 1), 1)) {

    echo "The password must not start and end with the same character.";

} else if (!checkNumCharacters($password)) {

    echo "The password must not contain the same character more than 3 times.";

} else {

    echo "The password is valid.";

}



?>

</body>
</html>