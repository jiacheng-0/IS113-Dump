<?php

require_once 'q1.php';

echo '<html><body>';

if (sum_of_digits(123) == 6) {
    echo 'Test 1: Pass</ br>';
} else {
    echo 'Test 1: Fail</ br>';
}

echo '<p />';

if (sum_of_digits(10) == 1) {
    echo 'Test 2: Pass</ br>';
} else {
    echo 'Test 2: Fail</ br>';
}

echo '</body></html>';


?>