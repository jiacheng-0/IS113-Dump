<?php

// By importing this file, we can access $drinks (Array of 5 Drink objects)
// Relative path (drinks.php is in the same directory as this file)
require_once 'drinks.php';


/*
Using the $drinks array, display the information as a table.
For the images, specify the thumbnail image.
When the user clicks on the thumbnail image, the full image will load in a new browser window/tab.
Quantity is an input of type number.
+-----+--------+-----------+-------+----------+
| S/N | Name   | Picture   | Price | Quantity |
+-----+--------+-----------+-------+----------+ 
| 1   | <name> | <Picture> | <$$$> |   <num>  |
+-----+--------+-----------+-------+----------+
| 2   | <name> | <Picture> | <$$$> |   <num>  |
+-----+--------+-----------+-------+----------+ 
| ..  | ..     | ....      | ...   | ...      |
+-----+--------+-----------+-------+----------+ 
| n   | <name> | <Picture> | <$$$> |   <num>  |
+-----+--------+-----------+-------+----------+ 
| [Purchase ]                                 |
+-----+--------+-----------+-------+----------+ 


The "Purchase" button will send users to the purchase.php page.

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

?>
<html>
<head>
    <title>Korean Drinks Shop</title>
</head>
<body>

<form action='purchase.php' method='POST'>
    <!--    <table border='1' style="border-collapse: collapse;" bgcolor="#add8e6">-->
    <table border='1'>
        <tr bgcolor="#87ceeb">
            <th>S/N</th>
            <th>Name</th>
            <th>Picture</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>

        <?php
        // YOUR CODE GOES HERE
        // index.php
        $count = 1;
        foreach ($drinks as $drink) {
            echo "<tr>";
            echo "<td>$count</td>";
            echo "<td>" . $drink->getName() . "</td>";
            echo "<td>
                    <a href='images/{$drink->getImage()}' target='_blank'>
                        <img src='images/thumbnail/{$drink->getImage()}'/>
                    </a>
                  </td>";
            echo "<td>" . $drink->getPrice() . "</td>";
            echo "<td>" . "<input type='number' name='quantity$count' value='0'/>" . "</td>";
            echo "</tr>";

            $count++;
        }
        ?>
        <tr>
            <td colspan="5"><input type='submit' value='Purchase'/></td>
        </tr>
    </table>
</form>
</body>
<html>