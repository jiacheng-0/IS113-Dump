<?php
// ?
include 'cars.php';
?>
<html>
<body>

<ul>
    <?php
    // YOUR CODE GOES HERE
    // Display Car objects
    foreach ($cars as $one_car) {
        echo "<li>" . $one_car->getMake() . ", " . $one_car->getModel() . "</li><br/>";
    }
    ?>
</ul>

</body>
</html>