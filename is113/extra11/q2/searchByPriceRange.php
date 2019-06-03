<html>
<head>
    <title>Product Search by Price Range</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Product Search by Price Range</h1>

<!-- form here -->
<form method="get">

    Min price

    <?php
    $min_price = $_GET['min_price'] ?? "";
    echo "<input name='min_price' value='$min_price'>";
    ?>

    <br/>

    Max price

    <?php
    $max_price = $_GET['max_price'] ?? "";
    echo "<input name=\"max_price\" value='$max_price'>";
    ?>

    <br/>

    <!--
    You may assume that user will always enter valid floating numbers for min and max prices,
    and min price is less than or equal to max price.
    -->

    <!-- submit button -->
    <input type="submit" value="Search"/>
</form>


<table>
    <tr>
        <th> S/N</th>
        <th> Product</th>
        <th> Category</th>
        <th> Quantity</th>
        <th> Price</th>
    </tr>

<!--    <tr>-->
<!--        <td> S/N</td>-->
<!--        <td> Product</td>-->
<!--        <td> Category</td>-->
<!--        <td style='color:red;'> Quantity < 10</td>-->
<!--        <td> Price</td>-->
<!--    </tr>-->
<!---->
<!--    <tr>-->
<!--        <td> S/N</td>-->
<!--        <td> Product</td>-->
<!--        <td> Category</td>-->
<!--        <td style='color:orange;'> Quantity < 20</td>-->
<!--        <td> Price</td>-->
<!--    </tr>-->
<!---->
<!--    <tr>-->
<!--        <td> S/N</td>-->
<!--        <td> Product</td>-->
<!--        <td> Category</td>-->
<!--        <td style='color:black;'> Quantity</td>-->
<!--        <td> Price</td>-->
<!--    </tr>-->

    <?php

    if (isset($min_price) and isset($max_price)) {
        require_once 'Warehouse.php';
        $warehouse = new Warehouse();
        $productList = $warehouse->searchByPriceRange($min_price, $max_price);

        $serialNo = 1;
        foreach ($productList as $one_product) {

            $quantityStyle = "style='color:black;'";
            $quantity = $one_product->getQuantity();
            if ($quantity < 10) {
                $quantityStyle = "style='color:red;'";
            } else if ($quantity < 20) {
                $quantityStyle = "style='color:orange;'";
            }

            echo "    <tr>
        <td> $serialNo</td>
        <td> {$one_product->getProductName()}</td>
        <td> {$one_product->getCategoryName()}</td>
        <td $quantityStyle> $quantity</td>
        <td> {$one_product->getPrice()}</td>
    </tr>";

            $serialNo++;

        } // foreach loop ends
    } // if ends

    ?>

</table>
</body>
</html>
