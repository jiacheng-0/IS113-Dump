<html>
<head>
	<title>Product Category List</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Product Category List</h1>
	
    <?php

    require_once "Warehouse.php";
    $warehouse = new Warehouse();
    $categoryList = $warehouse->getCategories();

    if (!empty($categoryList)) {
        echo "<ol>";
        foreach ($categoryList as $one_category) {

            echo "<li><a href='searchByCategory.php?selected_cat=$one_category'>$one_category</li>";

        }
        echo "</ol>";
    }


    ?>
</body>
</html>
