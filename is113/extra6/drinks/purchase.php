<?php

/*
purchase.php must display the following table with user input:

Your Purchase
+-----+--------+-------+----------+-----------+
| S/N | Name   | Price | Quantity | Sub-Total |
+-----+--------+-------+----------+-----------+ 
| 1   | <name> | <$$$> |   <num>  | <$$$>     |
+-----+--------+-------+----------+-----------+ 
| 2   | <name> | <$$$> |   <num>  | <$$$>     |
+-----+--------+-------+----------+-----------+ 
| ..  | ..     | ...   | ...      | ...       |
+-----+--------+-------+----------+-----------+ 
| n   | <name> | <$$$> |   <num>  | <$$$>     |
+-----+--------+-------+----------+-----------+ 
|                          Total: | <$$$>     |
+-----+--------+-------+----------+-----------+ 

*/


// By importing this file, we can access $drinks (Array of 5 Drink objects)
// Relative path (drinks.php is in the same directory as this file)

require_once 'drinks.php';


?>


<html>
<head>
    <title>Korean Drinks Shop - Purchase Summary</title>
</head>

<body>

<table border='1'>
    <tr>
        <th>S/N</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Sub-Total</th>
    </tr>

    <?php
    // YOUR CODE GOES HERE
    $count = 1;
    $total = 0;
    foreach ($drinks as $drink) {
        echo "<tr>";
        echo "<td>$count</td>";
        echo "<td>" . $drink->getName() . "</td>";
        echo "<td>" . $drink->getPrice() . "</td>";
        echo "<td>" . $_POST["quantity$count"] . "</td>";
        $sub_total = $_POST["quantity$count"] * $drink->getPrice();
        echo "<td>" . $sub_total . "</td>";
        echo "</tr>";

        $count++;
        $total += $sub_total;
    }
    echo "<tr>";
    echo "<td colspan='4' align='right'>Total</td>";
    echo "<td>" . $total . "</td>";
    echo "</tr>";
    ?>

</table>
</body>
</html>