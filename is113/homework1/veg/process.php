<?php
// key: vegetable,  value: quantity
$vegQtyArr = [
    'cabbage' => 3,
    'lettuce' => 3,
    'spinach' => 2,
];

// get submitted value of form field 'vegetable'

if (!isset($_GET['vegetable'])){
    $veg = 'lettuce';
} else {
    $veg = $_GET['vegetable'];
}
?>

<html>
<body>

<?php
echo "<h1>$veg</h1>";

    for ($i = 0; $i < $vegQtyArr[$veg]; $i++) {
        echo "<img src='./img/$veg.jpg' alt='image not found'></img>";
    }
?>

</body>
</html>