<?php

require_once 'include/common.php';

$_SESSION['James'] = "Looi";

var_dump($_SESSION);

// Clear ALL Session variables
//$_SESSION['James'] = "KYONG BOY BOY";
session_unset();
//var_dump($_SESSION['James']);
// session_destroy — Destroys all data registered to a session

//$_SESSION['James'] = "KYONG Girl";
//unset($_SESSION['James']);
//var_dump($_SESSION['James']);
// Free all session variables


?>