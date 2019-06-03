<?php
/**
 * Created by PhpStorm.
 * User: Teo Jia Cheng
 * Date: 23/4/2019
 * Time: 12:03 AM
 */

echo "<ol>";

if (isset($_POST['fruit'])) {
    foreach ($_POST['fruit'] as $var) {
        echo "<li>$var</li>";
    }
} else {
    echo "not set";
}

echo "</ol>";