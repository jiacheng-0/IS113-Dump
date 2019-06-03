<?php

// THIS PAGE WILL ATTEMPT TO RETRIEVE SESSION VARIABLE
// TO DO THAT, THIS PAGE NEEDS TO START A SESSION
session_start();


// unset specific session variable
//    $_SESSION['loggedInEmail']
// YOUR CODE GOES HERE
//if (isset($_SESSION['loggedInEmail'])){
//    unset($_SESSION['loggedInEmail']);
//}

// clear all session variables
// same as doing $_SESSION = array();
// YOUR CODE GOES HERE
//$_SESSION = array();

// Your session is still alive
// after this, you can still register a new session variable to the current session


// destorys the whole session
// opposite of session_start();
// YOUR CODE GOES HERE
session_destroy();

// forward the user back to login.php
// YOUR CODE GOES HERE
header("Location: login.php");

?>