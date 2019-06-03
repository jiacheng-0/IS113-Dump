<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 12/2/2019
 * Time: 12:55 PM
 */

?>

<!DOCTYPE html>
<html>
<head>
    <title>Compute Bus Fare in Far Far Away Land</title>
</head>
<body>
<?php


// Please enter code here
$rate = 0.10;
$distance = $_POST['distance'] ?? 0;


if (isset($_POST['time']) && $_POST['time'] == 'Peak') {
    $rate = 0.15;
}

//in decimal
$discount = 0;
//age discount
$age_group = $_POST['age_group'] ?? '';
if ($age_group == 'children') {
    $discount = 0.5;
} elseif ($age_group == 'senior') {
    $discount = 0.25;
}


$fare = $rate * $distance * (1 - $discount);

// End of code

echo "Fare is $" . $fare;
?>
</body>
</html>
