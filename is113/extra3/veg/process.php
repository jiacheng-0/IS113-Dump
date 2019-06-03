<?php
// key: vegetable,  value: quantity
$vegQtyArr = [ 
    'cabbage'   => 3, 
    'lettuce'   => 3,
    'spinach'   => 2,
];

// get submitted value of form field 'vegetable'
$veg = $_GET['vegetable'];
?>

<html>
<body>
    <?php
        echo "<h1>$veg</h1>";

        $times_to_display = $vegQtyArr[$veg];

        for ($i = 0; $i < $times_to_display; $i++){
            echo "<img src='img/$veg.jpg' alt='img/$veg.jpg not found'/>";

        }

    ?>
</body>
</html>