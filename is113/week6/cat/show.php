<?php

//Relative path
include 'cats.php';
?>

<html>
<head>
    <title>Cats - Show All Profiles</title>
</head>
<body>
<h3>Show All Profiles</h3>
<pre>
<table border='1' bgcolor="#ffe6e6" align="centre" style="border-collapse: collapse;">
    <?php
    $count = 1;
    foreach ($cats as $cat) {
        echo "<tr><th colspan='2' bgcolor='#ff3333'>Cat $count</th></tr>";
        $count++;

        echo "<tr><td>Name :</td><td>{$cat->getName()}</td></tr>";
        echo "<tr><td>Gender :</td><td>{$cat->getGender()}</td></tr>";
        echo "<tr><td>Age :</td><td>{$cat->getAge()}</td></tr>";

    }
    ?>
</table>
</pre>
</body>
</html>