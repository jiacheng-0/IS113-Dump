<?php

// Your code here:

$username = $_POST['username'];
$password = $_POST['password'];

if (strlen($username) < 6){
    echo "<font color='red'><b>Error 1a. : Username must be at least 6 chars</b></font>";
    die;
    //  same as exit
    /**/
}

for ($i = 0; $i < strlen($username); $i++){
    if (!ctype_alpha($username[$i])){
        echo "Invalid char. \"$username[$i]\" found. <br>";
        echo "<font color='red'><b>Error 1b. : Only lowercase and uppercase alphabets allowed.</b></font>";
        exit();
    }
}

if (strlen($password) < 8){
    echo "<font color='red'><b>Error 2. : Password must be at least 8 chars<b/></font>";
    die;
}

echo "<h1>Thanks for registering <font color='green'>" . $username . "</font>!</h1>";
