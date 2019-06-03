<?php

session_start();

// WRITE YOUR CODES HERE
if (!isset($_SESSION['login_page'])) {
    header("Location: login.php");
    return;
} else {
    $username = $_SESSION['login_page'];
    echo "<h2>Good bye $username, you have logged out successfully</h2>";
    session_unset();
}

?>