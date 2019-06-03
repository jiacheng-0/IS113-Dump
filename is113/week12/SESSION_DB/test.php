<?php

require_once 'include/common.php';

//============================================================
//               Test Cases for TaskDAO methods
//============================================================
$grade_dao = new GradeDAO();

// Test Case - Retrieve grade row for email jcfrantz@smu.edu.sg
$email = 'jcfrantz@smu.edu.sg';
$grade = $grade_dao->retrieve($email);
echo '<hr>';
var_dump($grade);


// Test Case - Retrieve grade row for email robbie.ng@smu.edu.sg
$email = 'robbie.ng@smu.edu.sg';
$grade = $grade_dao->retrieve($email);
echo '<hr>';
var_dump($grade);




// Test Case - Retrieve grade components (Indexed Array) for email jcfrantz@smu.edu.sg
$email = 'jcfrantz@smu.edu.sg';
$components = $grade_dao->retrieveComponents($email);
echo '<hr>';
var_dump($components);


// Test Case - Retrieve grade components (Indexed Array) for email robbie.ng@smu.edu.sg
$email = 'robbie.ng@smu.edu.sg';
$components = $grade_dao->retrieveComponents($email);
echo '<hr>';
var_dump($components);


?>