<?php

// Create a script to construct the following pattern, using nested for loop.

// Complete this function

// According to the word document:
function create_shape($num) {
    $shape_array = [];
    
    // YOUR CODE GOES HERE
    for ($i = $num; $i >= 1; $i--){
        $curr = str_repeat("*", $i);
        $shape_array[] = $curr;
        array_unshift($shape_array, $curr);
    }
    return $shape_array;
}

// According to this php file.
// function create_shape($num) {
//     $shape_array = ["&nbsp;*"];
    
//     // YOUR CODE GOES HERE
//     for ($i = $num; $i >= 1; $i--){
//         $curr = str_repeat("* ", $i);
//         $shape_array[] = $curr;
//         array_unshift($shape_array, $curr);
//     }
//     return $shape_array;
// }

/* Example

Given Form Input 5, below code must print:

* 
* * 
* * * 
* * * * 
* * * * *
 *
* * * * * 
* * * * 
* * * 
* * 
* 

*/

$num = $_GET['num'];
$arr = create_shape($num);

foreach($arr as $item) {
    echo "$item<br>";
}

?>