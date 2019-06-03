<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 12/2/2019
 * Time: 1:13 PM
 */

$students = [
    ["name" => 'Ronald', "school" => 'SMU', "age" => 22],
    ["name" => 'Ronald', "school" => 'SMU', "age" => 22],
    ["name" => 'Ronald', "school" => 'SMU', "age" => 22]
];
?>


<html>

<body>
<table border="1">
    <?php
    $count = 1;
    foreach ($students as $s) {
        echo "<tr><th colspan='2'>Student $count </th></tr>";
        $count++;

        foreach ($s as $k => $v) {
            echo "<tr><td>$k</td><td>$k</td></tr>";
        }
    }
    ?>
</table>
</body>
</html>

