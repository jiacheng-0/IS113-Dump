<?php

/*
    Name: Teo Jia Cheng

    Email: jcteo.2018@sis.smu.edu.sg
*/

require_once 'common.php';
# == Part E : ENTER CODE HERE == 
if (!isset($_SESSION['empId'])) {
    header("Location: login-view.html");
    exit();
}
?>