<?php

require_once 'Food.php';
require_once 'ConnectionManager.php';
class FoodDAO{

        # Default constructor is created by default if no constructor is specified

        // Retrieve ALL data from the table and sorted by the SKU
        // Return an indexed array of Food objects
        // SQL statement - SELECT * from food ORDER BY sku

        public function retrieveAll() {
            // Add your codes here

            // STEP 1
            // Connect to database 'week11extras'
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();

            // STEP 2
            // Prepare SQL statement
            $sql = "Select * from food order by SKU";
            $stmt = $pdo->prepare($sql);

            // STEP 3
            // Run SQL
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            // Retrieve each row as an Associative Array


            // STEP 4
            // Retrieve query results - ONE ROW AT A TIME
            $result = [];
            // Initialize an empty (indexed) Array
            // so I can return it to whoever called this function
            // Use WHILE loop to loop through
            while ($row = $stmt->fetch()) {
                $result[] = new Food(
                    $row["sku"],
                    $row["fooddesc"],
                    $row["category"],
                    $row["price"]
                );
            }


            // STEP 5
            // Close DB Connection & SQL Statement
            $stmt->closeCursor();
            $pdo = null;


            // STEP 6
            // YAY! We're ready to return the array!

            return $result;
        }

        // Retrieve data for a specific sku indicated by the user. 
        // This function can also be used to check if a sku exists.
        // Return an indexed array of Food object
        // SQL statement - SELECT * from food where sku = <value from user>"
        public function getFoodbyID($sku){

            // YOUR CODE GOES HERE

            // STEP 1
            // Connect to database 'week11extras'
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();

            // STEP 2
            // Prepare SQL statement
            $sql = "Select * from food where SKU = :sku";
            $stmt = $pdo->prepare($sql);

            // STEP 3
            // Run SQL
            $stmt->bindParam(":sku", $sku);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            // Retrieve each row as an Associative Array


            // STEP 4
            // Retrieve query results - ONE ROW AT A TIME
            $result = [];
            // Initialize an empty (indexed) Array
            // so I can return it to whoever called this function
            // Use WHILE loop to loop through
            while ($row = $stmt->fetch()) {
                $result[] = new Food(
                    $row["sku"],
                    $row["fooddesc"],
                    $row["category"],
                    $row["price"]
                );
            }


            // STEP 5
            // Close DB Connection & SQL Statement
            $stmt->closeCursor();
            $pdo = null;


            // STEP 6
            // YAY! We're ready to return the array!

            return $result[0];
        }

        // Add a new food item into the database. 
        // Note that the primary key is sku.
        // Return a status
        // SQL statement - INSERT into food (sku, fooddesc, category, price) 
        //                      values (sku, food description,the category, the price)
        public function addFood($sku, $foodDesc, $category, $price) {
            // YOUR CODE GOES HERE

            // STEP 1
            // Connect to database 'week11extras'
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();

            // STEP 2
            // Prepare SQL statement
            $sql = "INSERT INTO food VALUES (:sku, :foodDesc, :category, :price)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":sku", $sku);
            $stmt->bindParam(":foodDesc", $foodDesc);
            $stmt->bindParam(":category", $category);
            $stmt->bindParam(":price", $price);

            // STEP 3
            // Run SQL
            $isOk = $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            // Retrieve each row as an Associative Array


            // STEP 4
            // Retrieve query results - ONE ROW AT A TIME
            // skipped


            // STEP 5
            // Close DB Connection & SQL Statement
            $stmt->closeCursor();
            $pdo = null;

            return $isOk;
        }


        // Updates a record in the database. The statement updates all fields to keep it simple.
        // Return a status
        // SQL statement - UPDATE food SET fooddesc = food description, category = the category, 
        //                 price =  the price WHERE sku = sku;
        public function updateFood($sku, $foodDesc, $category, $price){
            // YOUR CODE GOES HERE

            // STEP 1
            // Connect to database 'week11extras'
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();

            // STEP 2
            // Prepare SQL statement
            $sql = "UPDATE food SET foodDesc = :foodDesc, category = :category, price = :price where sku = :sku";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":sku", $sku);
            $stmt->bindParam(":foodDesc", $foodDesc);
            $stmt->bindParam(":category", $category);
            $stmt->bindParam(":price", $price);

//            var_dump($stmt->queryString);

            // STEP 3
            // Run SQL
            $isOk = $stmt->execute();

            // STEP 4
            // Retrieve query results - ONE ROW AT A TIME
            // skipped


            // STEP 5
            // Close DB Connection & SQL Statement
            $stmt->closeCursor();
            $pdo = null;

            return $isOk;
        }

        // Delete a record in the database
        // Return a status
        // SQL statement - DELETE from food WHERE sku = sku

        public function deleteFood($sku){
            // YOUR CODE GOES HERE

            // STEP 1
            // Connect to database 'week11extras'
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();

            // STEP 2
            // Prepare SQL statement
            $sql = "DELETE FROM food where sku = :sku";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":sku", $sku);

            // STEP 3
            // Run SQL
            $isOk = $stmt->execute();

            // STEP 4
            // Retrieve query results - ONE ROW AT A TIME
            // skipped


            // STEP 5
            // Close DB Connection & SQL Statement
            $stmt->closeCursor();
            $pdo = null;

            return $isOk;
        }

    }


$foodDao = new FoodDAO();
// Method 1
//echo "retrieveAll()";
    //var_dump($foodDao->retrieveAll());

// Method 2 okay
//echo "getFoodbyID(302)";
//var_dump($foodDao->getFoodbyID(302));

// Method 3 okay
//echo "addFood(404, HTML Appetiser, Ellipsis, 6.90)";
//var_dump($foodDao->addFood(404, 'HTML Appetiser', 'Ellipsis', 6.90) ? "404 inserted" : "addfood() fail");

// Method 4 update okay
//echo "updateFood(404, HTML Appetiser, Ellipsis, 6.90)";
//var_dump($foodDao->updateFood(404, 'WAN YUE', 'Ellipsis', 6.90) ? "404 UPDATED" : "addfood() fail");

// Method 5 delete okay
//echo "deleteFood(404, HTML Appetiser, Ellipsis, 6.90)";
//var_dump($foodDao->deleteFood(404) ? "404 Deleted" : "addfood() fail");