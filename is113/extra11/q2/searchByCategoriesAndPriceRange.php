<html>
<head>
    <title>Product Search by Category</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <?php

    function getNumOfRowsInCategory($productList, $curr_category): int
    {
        $count = 0;
        foreach ($productList as $one_product) {
            if ($one_product->getCategoryName() == $curr_category) {
                $count++;
            }
        }
        return $count;
    }

    ?>
</head>
<body>
<h1>Product Search by Category</h1>

<!-- form here -->
<form>
    <table>
        <tr>
            <th>
                Categories:
            </th>
            <td>
                <!-- check boxes -->

                <?php
                require_once 'Warehouse.php';
                $warehouse = new Warehouse();
                $categoryList = $warehouse->getCategories();

                if (!empty($categoryList)) {

                    $selected_category = $_GET['selected_category'] ?? [];
//                    echo "<pre>" . var_dump($selected_category) . "</pre>";
                    foreach ($categoryList as $one_category) {
                        $checked = "";
                        // echo in_array($one_category, $selected_category) ? "in array - " : "not -";
                        if (in_array($one_category, $selected_category)) {
                            $checked = "checked";
                        }
                        echo "<label>
    <input type='checkbox' name='selected_category[]' value='$one_category' $checked/> $one_category
</label>";
                    }
                }

                ?>

            </td>
        </tr>
        <tr>
            <th>
                Min price
            </th>
            <td>
                <!-- text field -->
                <?php
                $min_price = $_GET['min_price'] ?? "";
                echo "<input name='min_price' value='$min_price'>";
                ?>
            </td>
        </tr>
        <tr>
            <th>
                Max price
            </th>
            <td>
                <!-- text field -->
                <?php
                $max_price = $_GET['max_price'] ?? "";
                echo "<input name=\"max_price\" value='$max_price'>";
                ?>
            </td>
        </tr>
    </table>
    <!-- submit button -->
    <input type="submit" value="Search"/>
</form>

<table>
    <tr>
        <th> S/N</th>
        <th> Category</th>
        <th> Product</th>
        <th> Quantity</th>
        <th> Price</th>
    </tr>

    <!--    <tr>-->
    <!--        <td> S/N</td>-->
    <!--        <td> Category</td>-->
    <!--        <td> Product</td>-->
    <!--        <td style='color:red;'> Quantity < 10</td>-->
    <!--        <td> Price</td>-->
    <!--    </tr>-->
    <!---->
    <!--    <tr>-->
    <!--        <td> S/N</td>-->
    <!--        <td> Category</td>-->
    <!--        <td> Product</td>-->
    <!--        <td style='color:orange;'> Quantity < 20</td>-->
    <!--        <td> Price</td>-->
    <!--    </tr>-->
    <!---->
    <!--    <tr>-->
    <!--        <td> S/N</td>-->
    <!--        <td> Category</td>-->
    <!--        <td> Product</td>-->
    <!--        <td style='color:black;'> Quantity</td>-->
    <!--        <td> Price</td>-->
    <!--    </tr>-->

    <?php

    if (isset($selected_category) and isset($min_price) and isset($max_price)) {
        require_once 'Warehouse.php';
        $warehouse = new Warehouse();
        $productList = $warehouse->searchByCategoriesPriceRange($selected_category, $min_price, $max_price);

        $serialNo = 1;

        $previousCategory = "";

        foreach ($productList as $one_product) {

            $quantityStyle = "style='color:black;'";
            $quantity = $one_product->getQuantity();
            if ($quantity < 10) {
                $quantityStyle = "style='color:red;'";
            } else if ($quantity < 20) {
                $quantityStyle = "style='color:orange;'";
            }

            $curr_category = $one_product->getCategoryName();
            $row_span = 1;
            $category_td = "";
            if ($previousCategory != $curr_category) {
                $row_span = getNumOfRowsInCategory($productList, $curr_category);
                $category_td = "<td rowspan='$row_span'>$curr_category</td>";
                $previousCategory = $curr_category;
            }


            echo "    <tr>
        <td> $serialNo</td>
        $category_td
        <td> {$one_product->getProductName()}</td>
        <td $quantityStyle> $quantity</td>
        <td> {$one_product->getPrice()}</td>
    </tr>";

            $serialNo++;

        } // foreach loop ends
    } // if ends

    ?>
</table>

<?php
//echo isset($_GET['selected_category']) ? "TRUE" : "NUUUU";
//?>

</body>
</html>
