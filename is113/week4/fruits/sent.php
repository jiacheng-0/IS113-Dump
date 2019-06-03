<?php

// YOUR CODE GOES HERE

//if (isset($_REQUEST['fruit'])){
//    echo 'I got fruit from the <u>fruit.html</u> form!!<br/>';
//}

// Removed default values for $fruit and $num
//$fruit = $_REQUEST['fruit'] ?? 'apple';
//$num = $_REQUEST['quantity'] ?? 4;

if (empty($_REQUEST['fruit'])){

    echo "<pre>Must select fruit</pre>";
} else {

    $fruit = $_REQUEST['fruit'];
    $num = $_REQUEST['quantity'];

    for ($i = 0; $i < $num; $i++){
        echo "<img src='images/$fruit.jpg' alt='img not found'>";
    }
}