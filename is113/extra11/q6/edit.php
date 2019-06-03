<?php

require_once 'common.php';

$id = '';
//echo isset($_GET['id']) ? "TRUE" : "FALSE";
//echo "<br/>";

if (isset($_GET['id'])) {
    $sku = $_GET['id'];
// Complete your codes here

    $foodDAO = new FoodDAO();
    $food_object = $foodDAO->getFoodbyID($sku);
    $foodDesc = $food_object->getFoodDesc();
    $category = $food_object->getCategory();
    $price = $food_object->getPrice();
}


// Complete your codes here


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

<form method='POST'>

    <?php
    if ($food_object) {

        // Complete your codes here

        echo "<h3> Update Food Item </h3>";

        echo "
                <table>
                <tr>
                    <td> SKU : </td> <td> $sku </td>
                </tr>
                <tr>
                    <td> Description : </td> <td> <input type=\"text\" name=\"fooddesc\" value='$foodDesc'/> </td>
                </tr>
                <tr>
                    <td> Category: </td> <td> <input type=\"text\" name=\"category\" value='$category'/> </td>
                </tr>
                <tr>
                    <td> Price : </td> <td> <input type=\"text\" name=\"price\" value='$price'/> </td>
                </tr>
                </table>";


        echo "
                <br>
                <input type='submit' value='Update Info'>
            <br/><br/>";
    }



    if (
        isset($_GET['id'])
        and isset($_POST['fooddesc'])
        and isset($_POST['category'])
        and isset($_POST['price'])
    ) {
//        echo "snake";
//        $sku = $_GET['id'];
        $foodDesc = $_POST['fooddesc'];
        $category = $_POST['category'];
        $price = $_POST['price'];

        if ($foodDAO->updateFood($sku, $foodDesc, $category, $price)) {
            echo "Food item: <b>$foodDesc</b> updated successful.";
        } else {
            echo "<h2>unknown error</h2>";
        }

    }

    echo "<br/><br/> Click <a href='maintain_menu.php'>here</a> to return to Main Page";
    ?>

</form>

</body>
</html>

