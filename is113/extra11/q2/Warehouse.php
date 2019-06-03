<?php

require_once 'ConnectionManager.php';
require_once 'Product.php';

/**
 * This class provides product-related retrieval/search functions.
 */
class Warehouse
{

    /**
     * Retrieve the list of product categories sorted alphabetically (case-sensitive) in ascending order.
     *
     * @return Indexed array of Strings - product categories sorted alphabetically (case-sensitive) in ascending order.
     */
    public function getCategories()
    {
        // Sample SQL
        // SELECT category_name FROM category ORDER BY category_name


        # Enter code here

        // STEP 1
        // Connect to database 'week11extras'
        $conn = new ConnectionManager();
        $pdo = $conn->connect();


        // STEP 2
        // Prepare SQL statement
        $sql = "Select category_name from category ORDER BY category_name";
        $stmt = $pdo->prepare($sql);


        // STEP 3
        // Run SQL
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        // Retrieve each row as an Associative Array


        // STEP 4
        // Retrieve query results - ONE ROW AT A TIME
        $categories = [];
        // Initialize an empty (indexed) Array
        // so I can return it to whoever called this function
        // Use WHILE loop to loop through
        while ($row = $stmt->fetch()) {
            $categories[] = $row["category_name"];
        }


        // STEP 5
        // Close DB Connection & SQL Statement
        $stmt->closeCursor();
        $pdo = null;


        // STEP 6
        // YAY! We're ready to return the array!

        return $categories;
    }


    /**
     * @param $category_name  Product category to search for
     * @return Indexed array of Product objects for the specified category
     * sorted by products' name alphabetically (case-sensitive) in ascending order.
     */
    public function searchByCategory($category_name)
    {
        // Sample SQL: For category 'Seafood'
        // SELECT product_name, category_name, quantity, price FROM product
        // WHERE category_name = 'Seafood'
        // ORDER BY product_name

        // STEP 1
        // Connect to database 'week11extras'
        $conn = new ConnectionManager();
        $pdo = $conn->connect();


        // STEP 2
        // Prepare SQL statement
        $sql = "SELECT product_name, category_name, quantity, price FROM product where category_name = :category_name ORDER BY product_name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":category_name", $category_name);


        // STEP 3
        // Run SQL
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        // Retrieve each row as an Associative Array


        // STEP 4
        // Retrieve query results - ONE ROW AT A TIME
        $products = [];
        // Initialize an empty (indexed) Array
        // so I can return it to whoever called this function
        // Use WHILE loop to loop through
        while ($row = $stmt->fetch()) {
            $products[] = new Product($row['product_name'], $row['category_name'], $row['quantity'], $row['price']);
        }


        // STEP 5
        // Close DB Connection & SQL Statement
        $stmt->closeCursor();
        $pdo = null;


        // STEP 6
        // YAY! We're ready to return the array!

        return $products;
    }

    /**
     * @param $min_price  Float. Minimum price to search for
     * @param $max_price  Float. Maximum price to search for
     * @return
     * Indexed array of Product objects whose price is between $min_price and $max_price inclusive.
     * The products are sorted by price, then product’s name alphabetically (case-sensitive) in ascending order.
     */
    public function searchByPriceRange($min_price, $max_price)
    {
        // Sample SQL: For min price is 2.5 and max price is 10.5
        // SELECT product_name, category_name, quantity, price FROM product 
        // WHERE 2.5 <= price AND price <= 10.5
        // ORDER BY price, product_name

        // STEP 1
        // Connect to database 'week11extras'
        $conn = new ConnectionManager();
        $pdo = $conn->connect();


        // STEP 2
        // Prepare SQL statement
        $sql = "SELECT product_name, category_name, quantity, price FROM product WHERE :min_price <= price AND price <= :max_price ORDER BY price, product_name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":min_price", $min_price);
        $stmt->bindParam(":max_price", $max_price);


        // STEP 3
        // Run SQL
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        // Retrieve each row as an Associative Array


        // STEP 4
        // Retrieve query results - ONE ROW AT A TIME
        $products = [];
        // Initialize an empty (indexed) Array
        // so I can return it to whoever called this function
        // Use WHILE loop to loop through
        while ($row = $stmt->fetch()) {
            $products[] = new Product($row['product_name'], $row['category_name'], $row['quantity'], $row['price']);
        }


        // STEP 5
        // Close DB Connection & SQL Statement
        $stmt->closeCursor();
        $pdo = null;


        // STEP 6
        // YAY! We're ready to return the array!

        return $products;
    }


    /**
     * @param $category_names  Indexed array of String.  Categories to search for
     * @param $min_price  Float.  Minimum price to search for
     * @param $max_price  Float.  Maximum price to search for
     * @return  Associative array.
     * Key is product category name
     * Value is an indexed array of Product objects for the specified category and
     *      whose price is between $min_price and $max_price inclusive.
     *      The products are sorted by category name then product's name alphabetically
     *      (case-sensitive) in ascending order.
     */
    public function searchByCategoriesPriceRange($category_names, $min_price, $max_price)
    {
        // Sample SQL: For min price is 2.5 and max price is 10.5, categories 'Seafood', 'Alcoholic Drink'
        // SELECT product_name, category_name, quantity, price FROM product 
        // WHERE 2.5 <= price AND price <= 10.5
        // 	AND category_name IN ( 'Seafood', 'Alcoholic Drink' )
        // ORDER BY category_name, product_name


        //  $category_products = [];
        //  return $category_products;

        // STEP 1
        // Connect to database 'week11extras'
        $conn = new ConnectionManager();
        $pdo = $conn->connect();

        // STEP 2
        // Prepare SQL statement

        $category_arr = [];
        for ($i = 0; $i < count($category_names); $i++) {
            $category_arr[] = ":param_$i";
        }
        $category = "(" . implode(" , ", $category_arr) . ")";
//        var_dump($category);
        var_dump($category_names);
        $sql = "SELECT product_name, category_name, quantity, price 
          FROM product WHERE 
          category_name IN $category  
          AND :min_price <= price AND price <= :max_price 
          ORDER BY category_name, price, product_name";
//        $sql = "SELECT product_name, category_name, quantity, price FROM product WHERE category_name IN :category AND :min_price <= price AND price <= :max_price ORDER BY category_name, price, product_name";
        $stmt = $pdo->prepare($sql);
//        $stmt->bindParam(":category", $category);
        $stmt->bindParam(":min_price", $min_price);
        $stmt->bindParam(":max_price", $max_price);

        for ($i = 0; $i < count($category_names); $i++) {
            $stmt->bindValue(":param_$i", $category_names[$i]);
        }
//        $count = 1;
//        foreach ($category_names as $one_category) {
//            $stmt->bindValue(":param_$count", $one_category);
//            $count++;
//        }

        echo "<pre>";
        echo $stmt->queryString;
        echo "</pre>";

        // STEP 3
        // Run SQL
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        // Retrieve each row as an Associative Array


        // STEP 4
        // Retrieve query results - ONE ROW AT A TIME
        $products = [];
        // Initialize an empty (indexed) Array
        // so I can return it to whoever called this function
        // Use WHILE loop to loop through
        while ($row = $stmt->fetch()) {
            $products[] = new Product(
                $row['product_name'],
                $row['category_name'],
                $row['quantity'],
                $row['price']
            );
        }


        // STEP 5
        // Close DB Connection & SQL Statement
        $stmt->closeCursor();
        $pdo = null;


        // STEP 6
        // YAY! We're ready to return the array!

        return $products;
    }

}
