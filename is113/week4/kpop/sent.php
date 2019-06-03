<?php

// YOUR CODE GOES HERE


//Commented testing codes
//echo "<pre>";
//var_dump($_REQUEST);
//echo "<hr/>";
//echo "</pre>";

if (!isset($_POST['stars'])){
    echo "OMG nobody selected";
} else {

    $stars = $_POST['stars'];

    foreach ($stars as $one_star){
        echo "<img src='images/$one_star.jpg'>";
    }
}