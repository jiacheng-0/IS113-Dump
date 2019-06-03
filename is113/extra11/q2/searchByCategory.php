<html>
<head>
    <title>Product Search by Category</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Product Search by Category</h1>

<!-- form here -->
<form method="get">

    Category
    <!-- drop down list -->
    <?php

    require_once 'Warehouse.php';

    $categoryList = [];
    $warehouse = new Warehouse();
    $categoryList = $warehouse->getCategories();

    $selected_cat = $_GET['selected_cat'] ?? "";
    $selected = '';

    if (!empty($categoryList)) {
        echo "<select name='selected_cat'>";

        foreach ($categoryList as $one_category) {
            if ($selected_cat == $one_category) {
                $selected = 'selected';
            }
            echo "<option $selected>$one_category</option>";
            $selected = '';
        }

        echo "</select>";
    }

    ?>
    <!-- submit button -->
    <input type="submit" value="Search">

</form>


<table>
    <tr>
        <th> S/N</th>
        <th> Product</th>
        <th> Quantity</th>
        <th> Price</th>
    </tr>

<!--    <tr>-->
<!--        <td> S/N</td>-->
<!--        <td> Product</td>-->
<!--        <td style='color:red;'> Quantity < 10</td>-->
<!--        <td> Price</td>-->
<!--    </tr>-->
<!---->
<!--    <tr>-->
<!--        <td> S/N</td>-->
<!--        <td> Product</td>-->
<!--        <td style='color:orange;'> Quantity < 20</td>-->
<!--        <td> Price</td>-->
<!--    </tr>-->
<!---->
<!--    <tr>-->
<!--        <td> S/N</td>-->
<!--        <td> Product</td>-->
<!--        <td style='color:black;'> Quantity</td>-->
<!--        <td> Price</td>-->
<!--    </tr>-->
    <?php
    if ($selected_cat != "") {
        $warehouse = new Warehouse();
        $productList = $warehouse->searchByCategory($selected_cat);

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
        <td $quantityStyle> $quantity</td>
        <td> {$one_product->getPrice()}</td>
    </tr>";
            $serialNo++;
        }
    }
    ?>

</table>
</body>
</html>
