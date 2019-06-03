<?php

class ProductDAO
{

    // The DAO retrieve data from Product table in the database.

    public function retrieveAll()
    {

        // retrieve all data from the database to create an array index of Product objects
        // SQL statement : "Select * from product"


        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        // STEP 2
        $sql = "SELECT
                    *
                FROM product";
        $stmt = $conn->prepare($sql);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $result = []; // Indexed Array of Star objects
        while ($row = $stmt->fetch()) {
            $result[] =
                new Product(
                    $row['id'],
                    $row['shopname'],
                    $row['item'],
                    $row['category'],
                    $row['price']);
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $result;
    }

    public function retrieveByShopName($shopname)
    {

        // retrieve the data from the database to create an array index of Product objects that comes from the shop name
        // SQL statement : "Select * from product where shopname = :shopname";

        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        // STEP 2
        $sql = "SELECT
                    *
                FROM product
                WHERE shopname = :shopname";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":shopname", $shopname);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $result = []; // Indexed Array of Star objects
        while ($row = $stmt->fetch()) {
            $result[] =
                new Product(
                    $row['shopname'],
                    $row['item'],
                    $row['category'],
                    $row['price']
                );
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $result;
    }


}

?>