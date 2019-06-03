<?php

require_once 'common.php';

$postDao = new FoodDAO();

// Add your codes here
if (isset($_GET['id'])) {
    $sku = $_GET['id'];
// Complete your codes here

    $food_object = $postDao->getFoodbyID($sku);
    $foodDesc = $food_object->getFoodDesc();
    $category = $food_object->getCategory();
    $price = $food_object->getPrice();

} else {    // push webpage into maintain_menu.php

    header("Location: maintain_menu.php");
}


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

    // Complete your codes here

    echo "<h3> Delete Item </h3>";

    echo "
                <table>
                    <tr>
                        <td> SKU : </td> <td> $sku </td> 
                    </tr>
                    <tr>
                        <td> Description : </td> <td> $foodDesc </td>
                    </tr>
                    <tr>
                        <td> Category: </td> <td> $category </td> <br>
                    </tr>
                    <tr> 
                        <td> Price : </td> <td> $price </td> 
                    </tr>
                </table>
                <br/>";

    echo "<input type='submit' name='action' value='Confirm'/>
<br/>
";


    // Add your codes here

    if (isset($_POST['action']) and $_POST['action'] == 'Confirm') {
        $status = $postDao->deleteFood($sku);

        if ($status) {
            echo "<h3>Delete was successful!</h3>";
        } else {
            echo "Error in deleted.";
        }
    }

    echo "</br></br> Click <a href='maintain_menu.php'>here</a> to return to Main Page";

    ?>

</form>


</body>
</html>

