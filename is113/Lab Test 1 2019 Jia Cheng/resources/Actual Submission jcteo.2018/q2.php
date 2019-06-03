<!--
    Name:  Teo Jia Cheng
    Email: jcteo.2018
-->


<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>

    <style type="text/css">
        table {
            border-collapse: collapse;
            border: 1px solid black;
            width: 30%;
        }

        th, td {
            border: 1px solid black;
        }
    </style>
</head>

<body>

<!-- Add your codes here to print Receipt ---->
<?php

// Layfoo say hardcode the price
$tea_price = [
    'Ah Kong Original Milk Tea' => 3.5,
    'Brown Sugar Green Tea Macchiato' => 3.8,
    'Earl Grey Milk Tea' => 3.00,
    'Rainbow Milk Tea' => 4.00,
];

$topping_price = 0.5;

if (!isset($_POST['tea'])) {
    echo "Please select a tea type!";
} else {
    $choice_of_tea = $_POST['tea'];
    echo "<table>";
    echo "<tr><td colspan='2' style='text-align: center'>Your Boba Order</td></tr>";

    $price = $tea_price[$choice_of_tea];
    $price_formatted = "$" . number_format($price, 2);

    echo "<tr><td>$choice_of_tea</td><td>$price_formatted</td></tr>";

    if (isset($_POST['topping'])) {
        echo "<tr><td colspan='2'>Toppings:</td></tr>";

        $toppings = $_POST['topping'];
        foreach ($toppings as $one_topping) {
            $topping_price_formatted = "$" . number_format($topping_price, 2);
            echo "<tr><td>$one_topping</td><td>$topping_price_formatted</td></tr>";
            $price += $topping_price;
        }
    } else {
        echo "<tr><td colspan='2'>No Toppings</td></tr>";
    }

    $total_price_formatted = "$" . number_format($price, 2);
    echo "<tr><td>Total:</td><td>$total_price_formatted</td></tr>";
    echo "</table>";
}

?>

</body>
</html>

