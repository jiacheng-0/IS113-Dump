<?php

// You can comment like this but 1 line at a time lah

# You can also comment like this but 1 line at a time lah

/*
  You can also comment MULTIPLE lines
  like
  this
  wow
*/

// There are TWO (2) very useful functions in PHP
// that you can use to print variables/objects
// var_dump($some_variable);
// print_r($some_variable);


//==================== Task 1 =====================
// Extract form input fields
// There are 2 ways to do this

// <form action="..." method="GET">
// If you used GET method to reach this PHP file, then
//   1) $_GET system variable (associative array) contains submitted form input fields/values
//   2) $_REQUEST system varriable (associative array) also contains the same
// If you used POST method to reach this PHP file, then
//   1) $_POST system variable (associative array) contains submitted form input fields/values
//   2) $_REQUEST system varriable (associative array) also contains the same
//
// $_REQUEST system variable contains:
//   1) $_GET
//   2) $_POST
//   3) $_COOKIE
//


//==================== Task 2 =====================
// Form Validation
//  isset($var)
//     --> determins if the variable $var is SET and is NOT NULL
//     --> does NOT check to see if the variable is EMPTY (empty string) or not
//     --> typically used when expect to receive FORM INPUT fields/values via GET/POST method
//  empty($var)
//     --> determines whether $var is considered empty.
//     --> $var is considered empty is:
//         --> it does NOT exist, OR
//         --> the value equals FALSE (or numeric zero 0)
//     --> IMPORTANT: empty() does NOT generate a warning if the variable does NOT exist.
//         --> Highly advisable to always use isset($var) to check if the variable exists
//         --> before checking on the variable's value
//
//  Suppose $_GET['firstname'] is expected to be a String input field value passed from the user (via FORM).
//  You can simply do the following for form validation on input text field:
/*             if( isset($_GET['firstname']) ) {
                   echo "The HTML form indeed does have an input field with name='firstname'";
                   echo "Next, let's see if it's empty or not";
                   if( $_GET['firstname'] != '' ) {
                       echo "The firstname field is NOT empty. The user filled out.";
                   }
                }

    You can combine both:
                if( isset($_GET['firstname]) && $_GET['firstname'] != '' )
                    echo "firstname input field exists in the FORM, and the field value is NOT empty";

    You may consider using trim($firstname) function, which Strip whitespace 
    (or other characters) from the beginning and end of a string.
    REFERENCE: http://php.net/manual/en/function.trim.php
*/

?>
<html>
<head>
    <title>Week 3 - Form Processing (process_form.php)</title>
</head>
<body>

    <h1>Form Processing</h1>
    <h2>My current location: (/is113/week3/process_form.php)</h2>

</body>
</html>