<?php

require_once 'q1.php';

echo '<html><body>';
if (is_divisible_by(9, 3)) {
    echo 'Test 1: Pass</ br>';
} else {
    echo 'Test 1: Fail</ br>';
}

echo '<p />';

if (!is_divisible_by(7, 3)) {
    echo 'Test 2: Pass</ br>';
} else {
    echo 'Test 2: Fail</ br>';
}

echo '</body></html>';


?>