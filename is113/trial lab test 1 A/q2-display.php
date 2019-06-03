<?php
/* 
Name:  Teo Jia Cheng
Email: jcteo.2018
*/

if (!isset($_POST['fruit']) || empty($_POST['fruit'])){
    echo "<h1>Please select a fruit</h1>";
    exit();
} else {

//    var_dump($_POST['fruit']);
    $fruits = $_POST['fruit'];
}

?>
<html>
<body>

<table border="1">

    <?php

    foreach ($fruits as $fruit) {
        echo "<tr><td><img src='$fruit.jpg'></td></tr>";
    }
    ?>

</table>

</body>
</html>