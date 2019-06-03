<?php
/*
    Name:

    Email:
*/

if (!isset($_SESSION['uname'])) {
    header('Location: login-view.html');
    return;
}
?>

<html>
    <body>
        <h1>highly sensitive data. Must be protected</h1>
    </body>
</html>
