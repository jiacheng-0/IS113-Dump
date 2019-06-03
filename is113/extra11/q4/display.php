<?php
require_once "common.php";

/* Enter code here */
/* Retrieve list of locations and shop name */

$shopDAO = new ShopDAO();
$location_list = $shopDAO->retrieveAllLocation();
$store_name = $shopDAO->retrieveAllStoreName();

?>

<html>
<head>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>

<body>

<form method="POST" action="display.php">

    <?php
    echo "<h3> Products Available for the location and store : </h3>";
    echo "Enter the location : ";
    /* Enter codes here ....                                                         */
    /* display them in a dropdown list. It remembers the value that the user select. */
    echo "<select name='location'>";
    foreach ($location_list as $one_location) {
        echo "<option> $one_location </option>";
    }
    echo "</select>";

    echo "<br/>Choose the shop name : ";
    echo "<select name='store'>";
    foreach ($store_name as $one_store) {
        echo "<option> $one_store </option>";
    }
    echo "</select>";

    ?>

    <br/>
    <br/>

    <input type="submit" value="Submit"/>

    <br/>
    <br/>

    <!-- Prepare the table with the list of products from the store -->


    <?php

    /* Enter codes here to display the product list, if available or error statements */
    if (isset($_POST['location']) and isset($_POST['store'])) {
        $location = $_POST['location'];
        $store = $_POST['store'];
        $productDAO = new ProductDAO();
        $product_list = $productDAO->retrieveByShopName($store);

        if (!$shopDAO->retrieveLocationStorename($location, $store)) {
            echo "The location <b>$location</b> does not have shop <b>$store</b>.";
        } else if (empty($product_list)) {
            echo "The store <b>$store</b> in <b>$location</b> currently does not have any products for sale.";
        } else {

            echo "The list of Products available at <b>$store</b> in <b>$location</b>";
            echo "<br><br>";
            echo "
    <table>
        <tr>
            <th>Item</th>
            <th>Category</th>
            <th>Price</th>
        </tr>
        ";

            foreach ($product_list as $product) {
                $name = $product->getItem();
                $category = $product->getCategory();
                $price = $product->getPrice();
                echo "
        <tr>
            <td>$name</td>
            <td>$category</td>
            <td>$$price</td>
        </tr>
        ";
            }

            echo "
</table>";
        }

    }

    ?>

</form>
</table>
</body>
</html>